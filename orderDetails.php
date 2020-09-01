<?php
include_once("php/_access.php");
access();
include_once("config.php");
?>

<!DOCTYPE html>
<html class=" ">
<?php require_once('head.php'); ?>
<!-- END HEAD -->
<style>
  .carousel {
    overflow-y: scroll;
  }

  .carousel-item:after {
    background-color: #ff000000;
  }
  .call {
    display: block;
    width: 100%;
    height: 100%;
  }
  .chatbody {
  height: 350px;
  border-bottom:2px solid #D3D3D3;
  border-radius: 1px;
  overflow-y: scroll;
  padding-top:5px;
  width:100%;
  margin-top:10px;
 }
 .msg {
   display: block;
   position: relative;
   margin-bottom:15px;
   padding-bottom:10px;
 }
 .other{
   position: relative;
   margin-left:0px;
   width:80%;
   margin-right:auto;
   text-align: left !important;
 }
 .other .content {
   background-color: #F8F8FF;
   border-top-right-radius: 5px;
   border-bottom-right-radius: 5px;
   text-align: left !important;
 }

 .mine {
   position: relative;
   width:80%;
   margin-right: 2px;
   text-align: right;
 }
 .mine .content {
   background-color: #008B8B;
   color:#F8F8FF;
   border-top-left-radius: 5px;
   border-bottom-left-radius: 5px;
 }

 .content{
   position: relative;
   padding:5px;
   padding-left:15px;
   padding-right:15px;
   min-width:10px;
   max-width:80%;
   font-size: 16px;
   color:#000000;
   margin:0 !important;
   display: inline-block;
 }
.name {
  position: relative;
  display: inline-block;
  font-size:10px;
  margin-bottom:2px;
}
.time {
  display:inline-block;
  position: relative;
  font-size: 10px;
  color: #696969;
  margin-top:2px;
}
.inputs {
  margin-bottom:20px;
}
.chat-btn:hover{
  color: #F8F8FF;
  text-decoration: none;
}

.chat-btn {
  display: block;
  background-color: #F96332;
  color:#F8F8FF;
  text-align: center;
  padding: 2px;
  box-shadow: 0 5px 30px 0 rgba(0,0,0,.11),0 5px 15px 0 rgba(0,0,0,.08)!important;
}
.chat-btn span{
  width: 100%;
  height: 100%;
  display: block;
}

.input-chat-send {
  height: 40px !important;
  border-top-left-radius: 5px !important;
  border-bottom-left-radius: 5px !important;
}
.btn-chat-send {
  height: 40px;
  border-top-right-radius: 5px !important;
  border-bottom-right-radius:5px !important;
}
.input-field .prefix ~ textarea {
  margin-right: 2.6rem;
}

</style>

<body class="html" <?php echo $config['theme-config']; ?>>
  <?php include_once('pre.php'); ?>



  <!-- START navigation -->
  <?php include_once('top-menu.php'); ?>
  </li>
  <li class="copy-spacer"></li>
  <li class="copy-wrap">
    <div class="copyright">&copy; Copyright @ themepassion</div>



    </ul>
    <!-- END navigation -->



  </li>
  </ul>
  <div class="container">
    <div class="section">
      <!-- <button type="button" class="waves-effect waves-light btn red lighten-2 col s12 ">محادثه</button> -->
      <div class="divider"></div>
    </div>
  </div>
  <!-- ============================= -->
  <div class="container">
    <div class="row ">
    <div class="col s12 pad-0">
      <a class="col s12 waves-effect waves-light btn modal-trigger" href="#chat">محادثه</a>
    </div>
    <div class="row ">
      <div class="col s12 pad-0">
        <div class="row bot-0">
          <div class="col s12">
            <ul id="tabs-swipe-demo" style="direction: ltr !important;;" class="tabs tabs-swipable-ul tabs-fixed-width z-depth-1">
              <li class="tab col s3"><a class="active" href="#details">تفاصيل الطلب</a></li>
              <li class="tab col s3"><a href="#tracking">تتبع الطلب</a></li>
              <li class="tab col s3"><a href="#status">تحديث الحاله</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div id="details" class="col s12 ">
              <div class="" id="order-details">

              </div>
            </div>
            <div id="tracking" class="col s12 ">
              <div class="" id="orderTimeline">

              </div>
            </div>
            <div id="status" class="col s12 ">
              <div class="" id="status_update">
                <div class="content-boxed top-5 bottom-5">
                  <div class="bot-20 col s12" style="margin-top: 20px;">
                    <a class="col s12 waves-effect waves-light btn modal-trigger" href="#recived">واصل</a>
                  </div>
                  <div class="bot-20 col s12">
                    <a class=" col s12 waves-effect waves-light red btn modal-trigger" href="#fake">راجع كلي</a>
                  </div>
                  <div class="bot-20 col s12">
                    <a class="col s12 waves-effect waves-light orange btn modal-trigger" href="#posponded">مؤجل</a>
                  </div>
                  <div class="bot-20 col s12">
                    <a class="bot-10 col s12 waves-effect waves-light brown btn modal-trigger" href="#returned">راجع جزئي</a>
                  </div>
                  <div class="bot-20 col s12">
                    <a class="top-10 col s12  waves-effect waves-light yellow btn modal-trigger" href="#replace">استبدال</a>
                  </div>
                  <div class="bot-20 col s12">
                    <a class="col s12 waves-effect waves-light blue-grey btn btn-large modal-trigger" href="#change">نغير عنوان</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="recived" class="modal">
    <div class="modal-content">
      <h4>تفاصيل الطلب</h4>
      <h2 class="uppercase ultrabold text-center top-20">تم تسليم الطلبية ؟</h2>
      <p class="font-11 under-heading text-center bottom-20">يجب ادخال السعر المستلم</p>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg"></p>
      <div class="input-style has-icon input-style-1 input-required bottom-30">
        <span class="input-style-1-inactive">المبلغ المستلم</span>
        <input type="number" step="250" id="new_price" name="new_price" placeholder="المبلغ المستلم">
        <input type="hidden" id="order_price" />
      </div>
      <div class="input-style input-style-1 input-required">
        <span class="input-style-1-inactive">ملاحظات</span>
        <textarea id="note" name="note" placeholder="ملاحظات"></textarea>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="recived()" class="waves-effect waves-red btn-flat">تحديث حالة الطلب</button>
      <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
    </div>
  </div>

  <div id="returned" class="modal">
    <div class="modal-content">
      <h4>تفاصيل الطلب</h4>
      <h2 class="uppercase ultrabold text-center top-20">تم تسليم الطلبية ؟</h2>
      <p class="font-11 under-heading text-center bottom-20">يجب ادخال السعر المستلم</p>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg"></p>
      <div class="input-style has-icon input-style-1 input-required bottom-30">
        <span class="input-style-1-inactive">المبلغ المستلم</span>
        <input type="number" step="250" id="new_price" name="new_price" placeholder="المبلغ المستلم">
        <input type="hidden" id="order_price" />
      </div>
      <div class="input-style input-style-1 input-required">
        <span class="input-style-1-inactive">ملاحظات</span>
        <textarea id="note" name="note" placeholder="ملاحظات"></textarea>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="returned()" class=" waves-effect waves-red btn-flat">تحديث حالة الطلب</button>
      <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
    </div>
  </div>
  <div id="fake" class="modal">
    <div class="modal-content">
      <h2 class="uppercase ultrabold text-center top-20 color-red1-dark">راجع كلي</h2>
      <p class="font-11 under-heading text-center bottom-20">يجب ذكر السبب</p>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg_fake"></p>
      <div class="input-style input-style-1 input-required">
        <span class="input-style-1-inactive">السبب</span>
        <select name="note_fake" id="note_fake" class="form-control">
          <option value="">-- السبب --</option>
          <option value="لايرد">لايرد</option>
          <option value="لايرد مع رسالة">لايرد مع رسالة</option>
          <option value="تم اغلاق الهاتف">تم اغلاق الهاتف</option>
          <option value="رفض الطلب">رفض الطلب</option>
          <option value="مكرر">مكرر</option>
          <option value="كاذب">كاذب</option>
          <option value="الرقم غير معرف">الرقم غير معرف</option>
          <option value="رفض الطلب">رفض الطلب</option>
          <option value="حظر المندوب">حظر المندوب</option>
          <option value="لايرد بعد التاجيل">لايرد بعد التاجيل</option>
          <option value="مسافر">مسافر</option>
          <option value="تالف">تالف</option>
          <option value="راجع بسبب الحظر">راجع بسبب الحظر</option>
          <option value="لايمكن الاتصال به">لايمكن الاتصال به</option>
          <option value="مغلق بعد الاتفاق">مغلق بعد الاتفاق</option>
          <option value="مستلم سابقا">مستلم سابقا</option>
          <option value="لم يطلب">لم يطلب</option>
          <option value="لايرد بعد سماع المكالمة">لايرد بعد سماع المكالمة</option>
          <option value="غلق بعد سماع المكالمة">غلق بعد سماع المكالمة</option>
          <option value="مغلق">مغلق</option>
          <option value="تم الوصول والرفض">تم الوصول والرفض</option>
          <option value="لايرد بعد الاتفاق">لايرد بعد الاتفاق</option>
          <option value="غير داخل بالخدمة">غير داخل بالخدمة</option>
          <option value="خطأ بالعنوان">خطأ بالعنوان</option>
          <option value="مستلم سابقا">مستلم سابقا</option>
          <option value="خطأ بالتجهيز">خطأ بالتجهيز</option>
          <option value="نقص رقم">نقص رقم</option>
          <option value="زيادة رقم">زيادة رقم</option>
          <option value="وصل بدون طلبية">وصل بدون طلبية</option>
        </select>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="fake()" class="waves-effect waves-red btn-flat">تحديث حالة الطلب</button>
      <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
    </div>
  </div>

  <div id="replace" class="modal">
    <div class="modal-content">
      <h2 class="uppercase ultrabold text-center top-20 color-yellow1-dark">استبدال الطلب ؟</h2>
      <p class="font-11 under-heading text-center bottom-20">يجب ادخال السعر المستلم</p>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg_replace1"></p>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg_replace2"></p>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg_replace3"></p>
      <div class="input-style has-icon input-style-1 input-required bottom-30">
        <span class="input-style-1-inactive">المبلغ المستلم</span>
        <input type="number" step="250" id="new_price_re" name="new_price_re" placeholder="المبلغ المستلم">
      </div>
      <div class="input-style has-icon input-style-1 input-required bottom-30">
        <span class="input-style-1-inactive">عدد القطع </span>
        <input type="number" step="250" id="repalce_no" name="repalce_no" placeholder="عدد القطع ">
      </div>
      <div class="input-style input-style-1 input-required">
        <span class="input-style-1-inactive">ملاحظات</span>
        <textarea id="note_re" name="note_re" placeholder="ملاحظات"></textarea>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="replace()" class=" waves-effect waves-red btn-flat">تحديث حالة الطلب</button>
      <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
    </div>
  </div>
  <div id="change" class="modal">
    <div class="modal-content">
      <h2 class="uppercase ultrabold text-center top-20 color-blue1-dark">تغير عنوان الطلبية؟</h2>
      <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg_change"></p>
      <div class="input-style input-style-1 input-required">
        <span class="input-style-1-inactive">المحافظه</span>
        <select class="form-control" onchange="getTowns($('#town'),$(this).val())" id="city" name="city"></select>
      </div>
      <div class="input-style input-style-1 input-required">
        <span class="input-style-1-inactive">المنطقة</span>
        <select class="form-control" id="town" name="town"></select>
      </div>
      <div class="input-style input-style-1 input-required">

        <textarea id="address" name="address" placeholder="تفاصيل العنوان"></textarea>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="change()" class="modal-close waves-effect waves-red btn-flat">تحديث حالة الطلب</button>
      <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
    </div>
  </div>


  <div id="posponded" class="modal">
    <div class="modal-content">
      <div class="row">
        <h2 class="uppercase ultrabold text-center top-20 color-orange-dark">تأجيل الطلبية؟</h2>
        <p class="font-11 under-heading text-center bottom-20">يجب ذكر السبب</p>
        <p class="font-16 under-heading text-center bottom-20 red-text" id="err_msg_posponded"></p>
        <div class="input-field">
          <span class="input-style-1-inactive">سبب التأجيل</span>
          <textarea id="note_posponded" name="note_posponded" class="form-control" placeholder="سبب التأجيل"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="posponded()" class=" waves-effect waves-red btn-flat">تحديث حالة الطلب</button>
        <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
  <div id="chat" class="modal bottom-sheet modal-fixed-footer" style="max-height: 80%;">
    <div class="modal-content">
      <h4>المحادثه</h4>
      <div class="col-12 chatbody" id="chatbody">

      </div>
    </div>
    <div class="modal-footer">
    <div class="row">
                <button type="button" class="modal-close waves-effect waves-green btn-flat col s2" data-dismiss="modal">اغلاق</button>
                <textarea id="message" style="font-size: 20px;" placeholder="اكتب هنا..." class="col s8"></textarea>
                <button onclick="sendMessage()" style="font-size: 20px;" class="col s2 mdi btn-lg mdi-send  waves-effect waves-green btn-flat col s2" type="button">ارسال</button>
    </div>
    </div>
  </div>
</div>

  <input type="hidden" id="order_id" value="<?php echo $_GET['o'] ?>">
  <input type="hidden" id="user_id" value="<?php echo $_SESSION['userid']; ?>" />
  <input type="hidden" id="user_branch" value="<?php echo $_SESSION['user_details']['branch_id']; ?>" />
  <input type="hidden" id="user_role" value="<?php echo $_SESSION['role']; ?>" />
  <input type="hidden" value="<?php echo $_GET['notification']; ?>" id="notification_seen_id" />
  <?php include_once('footer.php'); ?>
  <?php include_once('bottom-menu.php'); ?>

  <!-- PWA Service Worker Code -->

  <script type="text/javascript">
    // This is the "Offline copy of pages" service worker

    // Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

    // Check compatibility for the browser we're running this in
    if ("serviceWorker" in navigator) {
      if (navigator.serviceWorker.controller) {
        console.log("[PWA Builder] active service worker found, no need to register");
      } else {
        // Register the service worker
        navigator.serviceWorker
          .register("pwabuilder-sw.js", {
            scope: "./"
          })
          .then(function(reg) {
            console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
          });
      }
    }
  </script>


  <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

  <!-- CORE JS FRAMEWORK - START -->
  <script src="assets/js/jquery-2.2.4.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- CORE JS FRAMEWORK - END -->


  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
  <script type="text/javascript">
    $(document).ready(function() {
      $(".tabs").tabs();
    });
  </script>
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


  <!-- CORE TEMPLATE JS - START -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/settings.js"></script>

  <script src="assets/js/scripts.js"></script>

  <!-- END CORE TEMPLATE JS - END -->


  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      $('.preloader-background').delay(10).fadeOut('slow');
    });
  </script>
  <script type="text/javascript" src="scripts/getCities.js"></script>
  <script type="text/javascript" src="scripts/getStores.js"></script>
  <script type="text/javascript" src="scripts/getTowns.js"></script>
  <script>
    getCities($("#city"));
    getTowns($("#town"), 1);

    function getorder() {
      $.ajax({
        url: "php/_getOrder.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val(),
        },
        success: function(res) {
          $("#order-details").html("");
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              $("#order-details").append(
                '<h1 class="text-center right-10">' + this.order_status + '</h1>' +
                '<h3 class="text-center">' + this.order_no + '</h3>' +
                '<table style="width:100%;" class="table-striped">' +
                '</thead><tr><th class="text-right right-10">النص</th><th>القيمة</th></th></thead>' +
                '<tbody>' +
                '<tr><td class="text-right right-10">اسم الزبون</td><td>' + this.customer_name + '</td></tr>' +
                '<tr><td class="text-right right-10">هاتف الزبون</td><td><a href="tel:' + this.customer_phone + '">' + this.customer_phone + '</a></td></tr>' +
                '<tr><td class="text-right right-10">اسم العميل</td><td>' + this.client_name + '</td></tr>' +
                '<tr><td class="text-right right-10">رقم هاتف العميل</td><td><a href="tel:' + this.client_phone + '">' + this.client_phone + '</a></td></tr>' +
                '<tr><td class="text-right right-10"><br />العنوان<br /></td><td>' + this.city + ' | ' + this.town + '<br />' + this.address + '</td></tr>' +
                '<tr><td class="text-right right-10">مبلغ الوصل</td><td>' + this.price + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ المستلم</td><td>' + this.new_price + '</td></tr>' +
                '</tbody>' +
                '</table>'
              );

              $("#order_price").val("" + this.price + "");
              $("#new_price").val("" + this.price + "");
            });
          } else {
            $("#order-details").append(
              '<h1>خطأ</h1>'
            );
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    $(document).ready(function() {
      getorder();
      OrderTracking($('#order_id').val());
      $(".modal").modal();
      $(".tabs").tabs();
      $("#tabs-swipe-demo").tabs({
        swipeable: true
      });
    });

    function OrderChat(id, last) {
      if (id != $("#order_id").val()) {
        chat = 1;
        $("#chatbody").html("");
      } else {
        chat = 0;
      }
      $("#chat_order_id").val(id);

      $.ajax({
        url: "php/_getMessages.php",
        type: "POST",
        data: {
          order_id: $("#order_id").val(),
          last: last
        },
        beforeSend: function() {

        },
        success: function(res) {
          if (res.success == 1) {
            if (res.last <= 0) {
              $("#chatbody").html("");
            }
            $.each(res.data, function() {
              clas = 'other';
              if (this.is_client == 1) {
                name = this.client_name
                role = "عميل"
                if (this.from_id == $("#user_id").val()) {
                  clas = 'mine';
                }
              } else {
                name = this.staff_name
                if (this.from_id == $("#user_id").val() && this.is_client == 1) {
                  clas = 'mine';
                }
                role = this.role_name;
              }
              message =
                "<div class='row'>" +
                "<div class='msg " + clas + "' msq-id='" + this.id + "'>" +
                "<span class='name'>" + name + " ( " + role + " ) " + "</span><br />" +
                "<span class='content'>" + this.message + "</span><br />" +
                "<span class='time'>" + this.date + "</span><br />" +
                "</div>" +
                "</div>"
              $("#chatbody").append(message);
              $("#last_msg").val(this.id);
            });
            $("#chatbody").animate({
              scrollTop: $('#chatbody').prop("scrollHeight")
            }, 100);
            $("#spiner").remove();
          }

        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function sendMessage() {
      $.ajax({
        url: "php/_sendMessage.php",
        type: "POST",
        data: {
          message: $("#message").val(),
          order_id: $("#order_id").val()
        },
        beforeSend: function() {
          $("#chatbody").append('<div id="spiner" class="spiner"></div>');
        },
        success: function(res) {
          OrderChat($("#order_id").val(), $("#last_msg").val());
          $("#chatbody").animate({
            scrollTop: $('#chatbody').prop("scrollHeight")
          }, 100);
          $("#message").val("");
          $("#message").focus();
          console.log(res);
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    var mychatCaller;
    mychatCaller = setInterval(function() {
      OrderChat($("#order_id").val(), $("#last_msg").val());
    }, 1000);


    function OrderTracking(id) {
      $.ajax({
        url: "php/_getOrderTrack.php",
        data: {
          id: id
        },
        beforeSend: function() {

        },
        success: function(res) {
          $("#orderTimeline").html('');
          $("#orderTimeline").append('<div class="timeline-deco"></div>');
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              address = "";
              if (this.order_status_id == 1) {
                icon = "fa-list";
                color = "blue1-light";
              } else if (this.order_status_id == 2) {
                icon = "fa-list";
                color = "blue1-light";
              } else if (this.order_status_id == 3) {
                icon = "fa-vehicle";
                color = "magenta2-dark";
              } else if (this.order_status_id == 4) {
                icon = "fa-hands";
                color = "green2-dark";
              } else if (this.order_status_id == 5) {
                icon = "fa-list";
                color = "yellow2-dark";
              } else if (this.order_status_id == 6) {
                icon = "fa-list";
                color = "red1-dark";
              } else if (this.order_status_id == 7) {
                icon = "fa-list";
                color = "orange-dark";
              } else if (this.order_status_id == 8) {
                icon = "fa-list";
                color = "blue1-dark";
                address = '<p class=" center-text color-theme top-5 bottom-0 font-12">' + 'تغير العنوان الى: ' + this.new_address +
                  '</p>';
              } else if (this.order_status_id == 9) {
                icon = "fa-list";
                color = "brown1-dark";
                9
              } else {
                icon = "fa-list";
                color = "blue1-light";
              }
              if (this.note != null) {
                note = this.note;
              } else {
                note = "";
              }

              $("#orderTimeline").append(
                '<div class="timeline-item">' +
                '<i class="fa ' + icon + ' bg-' + color + ' shadow-large timeline-icon"></i>' +
                '<div class="padding-none  timeline-item-content shadow-large round-small">' +
                '<p class="font-14 top-10 thin color-' + color + ' center-text">' + this.status + '<br />' + this.date + '<br />' + this.hour + '</p>' +
                '<p class=" center-text color-theme  bottom-0 font-12">' + note + '</p>' +
                //'<p class="color-'+color+' center-text color-theme top-5 bottom-0 font-14">عدد القطع: '+this.items_no+'</p>'+
                '' + address +
                '</div>' +
                '</div>'
              );
            });
          } else {
            $("#orderTimeline").append("<h4 class='text-center text-danger'>لا يوجد معلومات</h4>")
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function recived() {
      if ($("#order_price").val() != $("#new_price").val()) {
        if (confirm("السعر المدخل لا يساوي سعر الوصل. هل انت متاكد من السعر؟")) {
          $.ajax({
            url: "php/_orderRecived.php",
            type: "POST",
            beforeSend: function() {

            },
            data: {
              id: $("#order_id").val(),
              new_price: $("#new_price").val(),
              note: $("#note").val(),
            },
            success: function(res) {
              console.log(res);
              $("#err_msg").html("");
              if (res.success == 1) {
                $("#recived").removeClass('menu-active');
                M.toast({
                  html: 'تم تحديث الحاله',
                  classes: 'rounded teal lighten-2 white-text'
                });
                $('.modal').modal('close');
                getorder();
              } else {
                $("#err_msg").html(res.error.new_price + "<br />" + res.error.note);
              }
            },
            error: function(e) {
              console.log(e);
            }
          });

        } else {

        }
      } else {
        $.ajax({
          url: "php/_orderRecived.php",
          type: "POST",
          beforeSend: function() {

          },
          data: {
            id: $("#order_id").val(),
            new_price: $("#new_price").val(),
            note: $("#note").val(),
          },
          success: function(res) {
            console.log(res);
            $("#err_msg").html("");
            if (res.success == 1) {
              $("#recived").removeClass('menu-active');
              M.toast({
                html: 'تم تحديث الحاله',
                classes: 'rounded teal lighten-2 white-text'
              });
              $('.modal').modal('close');
              getorder();
            } else {
              $("#err_msg").html(res.error.new_price + "<br />" + res.error.note);

            }
          },
          error: function(e) {
            console.log(e);
          }
        });
      }
    }

    function change() {
      $.ajax({
        url: "php/_orderChange.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val(),
          address: $("#address").val(),
          town: $("#town").val(),
          city: $("#city").val(),
        },
        success: function(res) {
          console.log(res);
          $("#err_msg_change").html("");
          if (res.success == 1) {
            $("#change").removeClass('menu-active');
            M.toast({
              html: 'تم تحديث الحاله',
              classes: 'rounded teal lighten-2 white-text'
            });
            $('.modal').modal('close');
            getorder();
          } else {
            $("#err_msg_change").html(res.error.address);

          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function posponded() {
      $.ajax({
        url: "php/_orderPosponded.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val(),
          note: $("#note_posponded").val()
        },
        success: function(res) {
          console.log(res);
          $("#err_msg_change").html("");
          if (res.success == 1) {
            $("#posponded").removeClass('menu-active');
            M.toast({
              html: 'تم تحديث الحاله',
              classes: 'rounded teal lighten-2 white-text'
            });
            $('.modal').modal('close');
            getorder();
          } else {
            $("#err_msg_posponded").html(res.error.address);

          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function returned() {
      $.ajax({
        url: "php/_orderReturned.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val(),
          new_price: $("#new_price_r").val(),
          note: $("#note_r").val(),
          items_no: $("#returned_no").val()
        },
        success: function(res) {
          console.log(res);
          $("#err_msg_change").html("");
          if (res.success == 1) {
            $("#returned").removeClass('menu-active');
            M.toast({
              html: 'تم تحديث الحاله',
              classes: 'rounded teal lighten-2 white-text'
            });
            $('.modal').modal('close');
            getorder();
          } else {
            $("#err_msg_returned1").html(res.error.new_price);
            $("#err_msg_returned2").html(res.error.items_no);
            $("#err_msg_returned3").html(res.error.note);

          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function replace() {
      $.ajax({
        url: "php/_orderRepalce.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val(),
          new_price: $("#new_price_re").val(),
          note: $("#note_re").val(),
          items_no: $("#repalce_no").val()
        },
        success: function(res) {
          console.log(res);
          $("#err_msg_change").html("");
          if (res.success == 1) {
            $("#replace").removeClass('menu-active');
            M.toast({
              html: 'تم تحديث الحاله',
              classes: 'rounded teal lighten-2 white-text'
            });
            $('.modal').modal('close');
            getorder();
          } else {
            $("#err_msg_replace1").html(res.error.new_price);
            $("#err_msg_replace2").html(res.error.items_no);
            $("#err_msg_replace3").html(res.error.note);

          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function fake() {
      $.ajax({
        url: "php/_orderFake.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val(),
          note: $("#note_fake").val()
        },
        success: function(res) {
          console.log(res);
          $("#err_msg_change").html("");
          if (res.success == 1) {
            $("#fake").removeClass('menu-active');
            M.toast({
              html: 'تم تحديث الحاله',
              classes: 'rounded teal lighten-2 white-text'
            });
            $('.modal').modal('close');
            getorder();
          } else {
            $("#err_msg_fake").html(res.error.note);

          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function OrderTracking(id) {
      $.ajax({
        url: "php/_getOrderTrack.php",
        data: {
          id: id
        },
        beforeSend: function() {

        },
        success: function(res) {
          $("#orderTimeline").html('');
          $("#orderTimeline").append('<div class="timeline-deco"></div>');
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              address = "";
              if (this.order_status_id == 1) {
                icon = "fa-list";
                color = "blue1-light";
              } else if (this.order_status_id == 2) {
                icon = "fa-list";
                color = "blue1-light";
              } else if (this.order_status_id == 3) {
                icon = "fa-list";
                color = "magenta2-dark";
              } else if (this.order_status_id == 4) {
                icon = "fa-list";
                color = "green2-dark";
              } else if (this.order_status_id == 5) {
                icon = "fa-list";
                color = "yellow2-dark";
              } else if (this.order_status_id == 6) {
                icon = "fa-list";
                color = "red1-dark";
              } else if (this.order_status_id == 7) {
                icon = "fa-list";
                color = "orange-dark";
              } else if (this.order_status_id == 8) {
                icon = "fa-list";
                color = "blue1-dark";
                address = "تغير العنوان الى: " + this.new_address;
              } else if (this.order_status_id == 9) {
                icon = "fa-list";
                color = "brown1-dark";

              } else {
                icon = "fa-list";
                color = "blue1-light";
              }
              if (this.note != null) {
                note = this.note;
              } else {
                note = "";
              }
              $("#orderTimeline").append(
                '<div class="timeline-item">' +
                '<i class="fa ' + icon + ' bg-' + color + ' shadow-large timeline-icon"></i>' +
                '<div class="timeline-item-content shadow-large round-small">' +
                '<h5 class="thin color-' + color + ' center-text">' + this.status + '<br />' + this.date + '<br />' + this.hour + '</h5>' +
                '<p class=" center-text color-theme  bottom-0 font-14">' + note + '</p>' +
                '<p class="color-' + color + ' center-text color-theme top-5 bottom-0 font-14">عدد القطع: ' + this.items_no + '</p>' +
                '<p class=" center-text color-theme top-20 bottom-0 font-16">' + address + '</p>' +
                '</div>' +
                '</div>'
              );
            });
          } else {
            $("#orderTimeline").append("<h2 class='text-center'>لا يوجد معلومات</h2>")
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function OrderChat(id, last) {
      if (id != $("#order_id").val()) {
        chat = 1;
        $("#chatbody").html("");
      } else {
        chat = 0;
      }
      $("#order_id").val(id);

      $.ajax({
        url: "php/_getMessages.php",
        type: "POST",
        data: {
          order_id: $("#order_id").val(),
          last: last
        },
        beforeSend: function() {

        },
        success: function(res) {
          if (res.success == 1) {
            if (res.last <= 0) {
              $("#chatbody").html("");
            }
            $.each(res.data, function() {
              clas = 'other';
              if (this.is_client == 1) {
                name = this.client_name
                role = "عميل"
                if (this.from_id == $("#user_id").val()) {
                  clas = 'mine';
                }
              } else {
                name = this.staff_name
                if (this.from_id == $("#user_id").val()) {
                  clas = 'mine';
                }
                role = this.role_name;
              }
              message =
                "<div class='row'>" +
                "<div class='msg " + clas + "' msq-id='" + this.id + "'>" +
                "<span class='name'>" + name + " ( " + role + " ) " + "</span><br />" +
                "<span class='content'>" + this.message + "</span><br />" +
                "<span class='time'>" + this.date + "</span><br />" +
                "</div>" +
                "</div>"
              $("#chatbody").append(message);
              $("#last_msg").val(this.id);
            });
            $("#chatbody").animate({
              scrollTop: $('#chatbody').prop("scrollHeight")
            }, 100);
            //$("#spiner").remove();
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function sendMessage() {
      $.ajax({
        url: "php/_sendMessage.php",
        type: "POST",
        data: {
          message: $("#message").val(),
          order_id: $("#order_id").val()
        },
        beforeSend: function() {
          $("#chatbody").append('<div id="spiner" class="spiner"></div>');
        },
        success: function(res) {
          OrderChat($("#order_id").val(), $("#last_msg").val());
          $("#chatbody").animate({
            scrollTop: $('#chatbody').prop("scrollHeight")
          }, 100);
          $("#message").val("");
          $("#message").focus();
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    var mychatCaller;
    mychatCaller = setInterval(function() {
      OrderChat($("#order_id").val(), $("#last_msg").val());
    }, 1000);
    OrderTracking($('#order_id').val())
    getorder();
    if ($("#notification_seen_id").val() > 0) {
      $.ajax({
        url: "php/_setNotificationSeen.php",
        type: "POST",
        data: {
          id: $("#notification_seen_id").val()
        },
        success: function(res) {
          console.log(res);
        }
      });
    }
  </script>
</body>

</html>