<?php
include_once("php/_access.php");
access();
include_once("config.php");
?>

<!DOCTYPE html>
<html class=" ">
<?php require_once('head.php'); ?>
<!-- END HEAD -->

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
      <div class="row ">
        <div class="col s12 pad-0">
          <form id="searchForm">
            <nav class="ui-forms">
              <div class="nav-wrapper">
                <div class="input-field">
                  <input id="search" name="search-text" type="search">
                  <label for="search"><i class="mdi mdi-magnify"></i></label>
                  <i class="material-icons mdi mdi-close"></i>
                </div>
              </div>
            </nav>
            <div class="col s6">
              <select id="city" name="city">
              </select>
            </div>
            <div class=" col s6">
              <select id="store" name="town">
              </select>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" name="start" id="end" class="datepicker end">
                <label for="end" class="black-text">الى</label>
              </div>
              <div class="input-field col s6">
                <input type="text" name="end" id="start" placeholder="من" class="datepicker start">
                <label for="start" class="black-text">من</label>
              </div>
            </div>
            <button onclick="getorders('reload')" type="button" class="waves-effect waves-light btn-large green lighten-2 col s12">بحث</button>

        </div>
      </div>
      </form>
      <div class="divider"></div>
    </div>
  </div>
  <!-- ============================= -->
  <div class="container">
    <div class="section">
      <h5 class="pagetitle"> الطلبيات <span id="orders_count"></span></h5>
      <div class="divider"></div>
    </div>
  </div>
  <div class="container">
    <div class="section">
      <div class="row ">
        <div class="col s12 pad-0">
          <div id="orders"></div>
        </div>
      </div>
      <div class="divider"></div>
    </div>
  </div>

  <div id="orderdetailsModal" class="modal">
    <div class="modal-content">
      <h4>تفاصيل الطلب</h4>
      <div id="order-details"></div>
      <input type="hidden" id="order_id" />
    </div>
    <div class="modal-footer">
      <button type="button" onclick="showMore()" class="modal-close waves-effect waves-red btn-flat">عرض المزيد</button>
      <button type="button" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">اغلاق</button>
    </div>
  </div>

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
  <script type="text/javascript" src="scripts/instascan.min.js"></script>
  <script>
    var selectedCam;
    var scanner;

    function scanQR() {
      scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
      });
      scanner.addListener('scan', function(content) {
        window.location.href = "orderDetails.php?o=" + content
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
          selectedCam = cameras[0];
          $.each(cameras, (i, c) => {
            if (c.name.indexOf('back') != -1) {
              selectedCam = c;
              return false;
            }
          });

          scanner.start(selectedCam);
        } else {
          console.error('No cameras found.');
        }

        console.log(cameras);
      }).catch(function(e) {
        console.error(e);
      });
    }

    function close_qr() {
      scanner.stop(selectedCam);
      $("#sacnModal").removeClass('menu-active');
      $(".menu-hider").removeClass('menu-active');

    }

    function getorders(action) {
      if (action == "reload") {
        $("#currentPage").val(1);
      }
      $.ajax({
        url: "php/_getOrders.php",
        type: "POST",
        data: $("#searchForm").serialize(),
        beforeSend: function() {
          if (action == "reload") {
            $("#orders").addClass("loading");
          }
        },
        success: function(res) {
          if (action == "reload") {
            $("#orders").html('');
            $("#orders").removeClass("loading");
          }
          $("#loader").remove();
          $("#loading-items").remove();
          $("#currentPage").val(res.nextPage);
          $("#orders_count").text(" ( " + res.orders + " ) ");
          console.log(res);
          $.each(res.data, function() {
            if (this.order_status_id == 13) { // changed address
              color = 'bg-yallow_';
            } else { //not recieved yes
              color = 'bg-gray_';
            }
            $("#orders").append(
              `<div class="card darken-1">
               <a class="modal-trigger" href="#orderdetailsModal" onclick="getOrderDetails('` + this.id + `')">
                  <div class="card-content">
                      <span class="card-title  ">` + this.order_no + `</span>
                      <p class="text-center">` +
              this.price + '<br>' +
              this.customer_phone + '<br>' +
              this.city + ' | ' + this.town + ' | ' + this.address + '<br>' +
              this.store_name + '<br>' +
              'مضى ' + this.days + ' يوم على تسجيل الطلب<br>' +
              `</p>
                  </div>
              </a>
                <div class="card-action grey dark white-text">
                  <a class='call' href="tel:` + this.customer_phone + `" ><i class="mdi mdi-phone"></i> اتصال بالزبون</a>
                </div>
              </div>`
            );
          });
          if (res.pages >= res.nextPage) {
            $("#orders").append('<div id="loader" onclick="getorders(\'append\')" class="btn btn-link form-control color-black center-text top-10">تحميل المزيد</div>');
            $("#orders").append('<div id="loading-items"></div>');
          }
        },
        error: function(e) {
          $("#orders").removeClass("loading");
          console.log(e);
        }
      });
    }
    $(document).ready(function() {
      $('#start').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#end').datepicker({
        format: 'yyyy-mm-dd'
      });
      getorders('reload');
      getCities($("#city"));
      getStores($("#store"));
      $(".modal").modal();
      //$("select").formSelect();
    });

    function getOrderDetails(id) {
      $("#order_id").val(id);
      $.ajax({
        url: "php/_getOrder.php",
        type: "POST",
        beforeSend: function() {
          $("#order-details").addClass("loading");
        },
        data: {
          id: id
        },
        success: function(res) {
          $("#order-details").removeClass("loading");
          $("#order-details").html("");
          console.log(res);
          if (res.success == 1) {
            $.each(res.data, function() {
              $("#order-details").append(
                '<h1 class="text-center right-10">' + this.order_status + '</h1>' +
                '<h3 class="text-center">' + this.store_name + '</h3>' +
                '<h3 class="text-center">' + this.order_no + '</h3>' +
                '<table style="width:100%;" class="table-striped">' +
                '<tbody>' +
                '<tr><td class="text-right right-10">اسم الزبون</td><td>' + this.customer_name + '</td></tr>' +
                '<tr><td class="text-right right-10">هاتف الزبون</td><td><a href="tel:' + this.customer_phone + '">' + this.customer_phone + '</a></td></tr>' +
                '<tr><td class="text-right right-10">اسم العميل</td><td>' + this.client_name + '</td></tr>' +
                '<tr><td class="text-right right-10">رقم هاتف العميل</td><td><a href="tel:' + this.client_phone + '">' + this.client_phone + '</a></td></tr>' +
                '<tr><td class="text-right right-10"><br />العنوان<br /></td><td>' + this.city + ' | ' + this.town + '<br />' + this.address + '</td></tr>' +
                '<tr><td class="text-right right-10">مبلغ الوصل</td><td>' + this.price + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ المستلم</td><td>' + this.new_price + '</td></tr>' +
                '<tr><td class="text-right right-10">سعر التوصيل</td><td>' + this.dev_price + '</td></tr>' +
                '<tr><td class="text-right right-10">الخصم</td><td>' + this.discount + '</td></tr>' +
                '<tr><td class="text-right right-10">المبلغ الصافي</td><td>' + this.client_price + '</td></tr>' +
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
          $("#order-details").removeClass("loading");
          console.log(e);
        }
      });

    }

    function showMore() {
      window.location.href = "orderDetails.php?o=" + $("#order_id").val();
    }
  </script>
</body>

</html>