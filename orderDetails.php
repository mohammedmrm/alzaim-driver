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
</style>
<!-- BEGIN BODY -->

<style>
  .call {
    display: block;
    width: 100%;
    height: 100%;
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
        <div class="row bot-0">
          <div class="col s12">
            <ul id="tabs-swipe-demo" style="direction: ltr !important;;" class="tabs tabs-swipable-ul tabs-fixed-width z-depth-1">
              <li class="tab col s3"><a class="active" href="#details">تفاصيل الطلب</a></li>
              <li class="tab col s3"><a href="#tracking">تتبع الطلب</a></li>
              <li class="tab col s3"><a href="#status">تحديث الحاله</li>
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
                  <div class="one-half">
                    <div class="bottom-5 color-white font-20 link-list link-list-1 bg-green1-light rounded">
                      <a href="#" class="link" data-menu="recived">
                        <span class="text-center color-white left-0 right-0 top-10 bottom-10">تم التسليم</span>
                      </a>
                    </div>
                  </div>
                  <div class="one-half last-column">
                    <div class="bottom-5 color-white font-20 link-list link-list-1 bg-brown1-dark rounded">
                      <a href="#" data-menu="returned" class="link">
                        <span class="text-center color-white left-0 right-0 top-10 bottom-10">راجع جزئي</span>
                      </a>
                    </div>
                  </div>
                  <div class="clear"></div>
                  <div class="one-half">
                    <div class="bottom-5 color-white font-20 link-list link-list-1 bg-orange-light rounded">
                      <a href="#" data-menu="posponded" class="link">
                        <span class="text-center color-white left-0 right-0 top-10 bottom-10">مؤجل</span>
                      </a>
                    </div>
                  </div>
                  <div class="one-half last-column">
                    <div class="bottom-5 color-white font-20 link-list link-list-1 bg-blue1-light rounded">
                      <a href="#" data-menu="change" class="link">
                        <span class="text-center color-white left-0 right-0 top-10 bottom-10">تغير العنوان</span>
                      </a>
                    </div>
                  </div>
                  <div class="clear"></div>
                  <div class="one-half">
                    <div class="bottom-5 color-white font-20 link-list link-list-1 bg-yellow1-dark rounded">
                      <a href="#" data-menu="replace" class="link">
                        <span class="text-center color-white left-0 right-0 top-10 bottom-10">استبدال</span>
                      </a>
                    </div>
                  </div>
                  <div class="one-half last-column">
                    <div class="bottom-5 color-white font-20 link-list link-list-1 bg-red1-dark rounded">
                      <a href="#" data-menu="fake" class="link">
                        <span class="text-center color-white left-0 right-0 top-10 bottom-10">راجع كلي</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  <script>
    function getorder() {
      $.ajax({
        url: "php/_getOrder.php",
        type: "POST",
        beforeSend: function() {

        },
        data: {
          id: $("#order_id").val()
        },
        success: function(res) {
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              $("#order-details").append(
                '<h2 class="text-center right-10">' + this.order_status + '</h2>' +
                '<h4 class="text-center">' + this.order_no + '</h4>' +
                '<table style="width:100%;" class="table-striped">' +
                '</thead><tr><th class="text-right right-10">النص</th><th>القيمة</th></th></thead>' +
                '<tbody>' +
                '<tr><td class="text-right right-10">اسم الزبون</td><td>' + this.customer_name + '</td></tr>' +
                '<tr><td class="text-right right-10">هاتف الزبون</td><td>' + this.customer_phone + '</td></tr>' +
                '<tr><td class="text-right right-10">اسم الصفحه</td><td>' + this.store_name + '</td></tr>' +
                '<tr><td class="text-right right-10">رقم هاتف العميل</td><td>' + this.client_phone + '</td></tr>' +
                '<tr><td class="text-right right-10"><br />العنوان<br /></td><td>' + this.city + ' | ' + this.town + '<br />' + this.address + '</td></tr>' +
                '<tr><td class="text-right right-10">مبلغ الوصل</td><td>' + this.price + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ المستلم</td><td>' + this.new_price + '</td></tr>' +
                '<tr><td class="text-right right-10">سعر التوصيل</td><td>' + this.dev_price + '</td></tr>' +
                '<tr><td class="text-right right-10">الخصم</td><td>' + this.discount + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ الصافي</td><td>' + this.client_price + '</td></tr>' +
                '</tbody>' +
                '</table>'
              );
            });
          } else {
            $("#order-details").append(
              '<h1 class="text-danger text-center">لا يوجد معلومات</h1>'
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
      if (id != $("#chat_order_id").val()) {
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
          order_id: $("#chat_order_id").val(),
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
          order_id: $("#chat_order_id").val()
        },
        beforeSend: function() {
          $("#chatbody").append('<div id="spiner" class="spiner"></div>');
        },
        success: function(res) {
          OrderChat($("#chat_order_id").val(), $("#last_msg").val());
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
      OrderChat($("#chat_order_id").val(), $("#last_msg").val());
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
  </script>
</body>

</html>