<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
require_once("_sendNoti.php");
$id = $_SESSION['userid'];
$order_id = $_REQUEST['id'];
$city = $_REQUEST['city'];
$town = $_REQUEST['town'];
$address = $_REQUEST['address'];
$error = [];

use Violin\Violin;

require_once('../validator/autoload.php');
$v = new Violin;
$v->addRuleMessages([
    'required' => 'الحقل مطلوب',
    'int'      => 'فقط الارقام مسموع بها',
    'min'      => 'قصير جداً',
    'max'      => 'مسموح ب {value} رمز كحد اعلى ',
]);

$v->validate([
    'id'         => [$id,       'required|int'],
    'town'       => [$town,       'required|int'],
    'city'       => [$city,       'required|int'],
    'address'    => [$address, 'required|max(250)'],
    'order_id'   => [$order_id, "required|int"],
]);
function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
if ($v->passes()) {
    $autosql = "SELECT * FROM `tracking`  WHERE order_id =? order by  date DESC limit 1";
    $auto = getData($con, $autosql, [$order_id]);
    if ($auto[0]['staff_id'] == 1) {
        $error['address'] = "لايمكن تحديث الحالة. محدث تلقائياً";
    } else {
        $sql = 'select * from driver_towns where town_id=?';
        $driver = getData($con, $sql, [$town]);
        $sql = 'update orders set order_status_id =? where id=? and driver_id=? and driver_invoice_id=0 and invoice_id=0';
        $result = setData($con, $sql, ['8', $order_id, $id]);

        if ($result > 0) {

            $success = 1;
            $sql = 'insert into tracking (order_status_id,note,order_id,new_address,staff_id) values(?,?,?,?,?)';
            $result = setData($con, $sql, ['8', 'تغير العنوان', $order_id, $city . "-" . $town . "-" . $address, $id]);
            $sql = "select staff.token as s_token, orders.id as id , clients.sync_dns as dns, clients.sync_token as token, orders.isfrom as isfrom, clients.token as c_token from orders inner join staff
            on
            staff.id = orders.manager_id
            or
            staff.id = orders.driver_id
            inner join clients on clients.id = orders.client_id
            where orders.id =  ?";
            $res = getData($con, $sql, [$order_id]);
            if ($res[0]['isfrom'] == 2) {
                $response = httpPost(
                    $res[0]['dns'] . '/api/orderStatusSync.php',
                    [
                        'token' => $res[0]['token'],
                        'status' => 8,
                        'note' => 'تغير العنوان - ' . $note,
                        'city' => $city,
                        'town' => $town,
                        'id' => $order_id,
                    ]
                );
            }
            //$sql = "update orders set driver_id=?,to_city=?,to_town=? where id=?";
            //setData($con,$sql,[$driver[0]['driver_id'],$city,$town,$order_id]);
            sendNotification([$res[0]['s_token'], $res[1]['s_token'], $res[0]['c_token']], [$order_id], 'طلب رقم  ', "تغير عنوان الطلب - " . $note, "../orderDetails.php?o=" . $order_id);
        } else {
            $error['address'] = "لايمكن تحديث الحالة";
        }
    }
} else {
    $error = [
        'id' => implode($v->errors()->get('id')),
        'address' => implode($v->errors()->get('address')),
        'town' => implode($v->errors()->get('town')),
        'order_id' => implode($v->errors()->get('order_id')),
    ];
}
echo json_encode([json_decode(substr($response, 3)), 'success' => $success, 'error' => $error]);
