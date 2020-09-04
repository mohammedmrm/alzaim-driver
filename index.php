<?php
include_once("php/_access.php");
access();
include_once("config.php");
?>
<!DOCTYPE html>
<html class=" ">


<!-- END HEAD -->

<!-- BEGIN BODY -->
<?php require_once('head.php'); ?>

<style>
    .returned {
        background-color: tomato;
    }

    .posponded {
        background-color: tan;
    }

    .recived {
        background-color: green;
    }

    .waiting {
        background-color: slateblue;
    }

    .today {
        background-color: yellowgreen;
    }
    .fa-2x *{
      font-size:18px;
    }

</style>

<body class="html" <?php echo $config['theme-config']; ?>>
    <div class="preloader-background">
        <div class="preloader-wrapper">
            <div id="preloader"></div>
        </div>
    </div>



    <!-- START navigation -->
    <?php require_once('top-menu.php'); ?>

    </li>
    <li class="copy-spacer"></li>
    <li class="copy-wrap">
        <div class="copyright">&copy; Copyright @ AL-Zaim الزعيم</div>



        </ul>
        <!-- END navigation -->
        <ul id="slide-settings" class="sidenav sidesettings right fixed">
            <li class="menulinks">
                <ul class="collapsible">
                </ul>
            </li>
        </ul>
    </li>
    </ul>







    <div class="carousel carousel-fullscreen carousel-slider about_carousel">
        <div class="carousel-item" href="#one!">
            <div class="item-content center-align white-text">
                <?php echo $config['d_ad1']?>
            </div>
        </div>
        <div class="carousel-item" href="#one!">
            <div class="item-content center-align white-text">
                <?php echo $config['d_ad2']?>
            </div>
        </div>
    </div>
    <div class="row primary-bg">

        <div class="divider"></div>
        <div class="spacer"></div>
        <h5 class="center bot-0 sec-tit white-text">احصائيات</h5>
        <p class="center-align white-text">احصائيات بجميع الطلبيات</p>
        <div class="row">
          <div class="col s6 pad-0 text-center today white-text  fa-2x">
              <span class="text-center font-22 h3" id="">طلبيات اليوم</span>
              <br>
              <span class="text-center font-22 h3" id="today">0</span>
          </div>
          <div class="col s6 pad-0 text-center waiting white-text  fa-2x">
              <span class="text-center font-22">قيد الانتظار</span>
              <br>
              <span class="text-center font-22" id="waiting">0</span>
          </div>
        </div>
        <div class="row">
          <div class="col s4 pad-0 text-center returned white-text  fa-2x">
              <span class="text-center font-25" id="returned">0</span>
              <br>
              <span class="text-center font-22">الرواجع</span>
          </div>
          <div class="col s4 pad-0 text-center bg-orange posponded white-text fa-2x">
              <span class="text-center font-22" id="posponded">0</span>
              <br>
              <span class="text-center font-22 " id="">المؤجلات</span>
          </div>
          <div class="col s4 pad-0 text-center recived white-text  fa-2x">
              <span class="text-center font-22" id="recived">0</span>
              <br>
              <span class="text-center font-22" id="">المستلمة</span>
          </div>
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

            $(".carousel-fullscreen.carousel-slider").carousel({
                fullWidth: true,
                indicators: true
            });
            setTimeout(autoplay, 3500);

            function autoplay() {
                $(".carousel").carousel("next");
                setTimeout(autoplay, 3500);
            }

            $(".slider3").slider({
                indicators: false,
                height: 200,
            });

        });
    </script>
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="text/javascript"></script>
    <script type="text/javaScript">
        $("[data-fancybox=images]").fancybox({
  buttons : [ 
    "slideShow",
    "share",
    "zoom",
    "fullScreen",
    "close",
    "thumbs"
  ],
  thumbs : {
    autoStart : false
  }
});
</script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE TEMPLATE JS - START -->
    <script src="assets/js/init.js"></script>
    <script src="assets/js/settings.js"></script>

    <script src="assets/js/scripts.js"></script>

    <!-- END CORE TEMPLATE JS - END -->


    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            $('.preloader-background').delay(5).fadeOut('slow');
        });

        function static() {
            $.ajax({
                url: "php/_static.php",
                type: "POST",
                data: $("#searchForm").serialize(),
                success: function(res) {
                    console.log(res);
                    $.each(res.data, function() {
                        $("#today").text(res.today);
                        $("#waiting").text(res.waiting);
                        $("#returned").text(this.returned);
                        $("#posponded").text(this.posponded);
                        $("#recived").text(this.recived);
                    })
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }
        static();

        function search(search, type) {
            $.ajax({
                url: "php/_search.php",
                type: "POST",
                data: {
                    search: search,
                    type: type
                },
                beforeSend: function() {
                    $("#orders").addClass("loading");
                },
                success: function(res) {
                    $("#orders").removeClass("loading");
                    $("#orders").html('');
                    $("#orders_count").text(" ( " + res.orders + " ) ");
                    console.log(res);
                    if (res.orders == 0) {
                        $("#orders").html("<center><h1>لايوجد طلبيات مطابقة للبحث</h1></center>")
                    }
                    $.each(res.data, function() {
                        if (this.order_status_id == 9) {
                            color = 'bg-red1-dark';
                        } else if (this.order_status_id == 6) {
                            color = 'bg-red1-light';
                        } else if (this.order_status_id == 4) {
                            color = 'bg-green1-dark';
                        } else if (this.order_status_id == 5) {
                            color = 'bg-yellow1-dark';
                        } else if (this.order_status_id == 7) {
                            color = 'bg-orange-light';
                        } else if (this.order_status_id == 1) {
                            color = 'bg-dark1-dark';
                        } else {
                            color = 'bg-magenta1-light';
                        }
                        $("#orders").append(
                            '<div class="content-boxed ' + color + '">' +
                            '<div class="content  list-columns-right">' +
                            '<div>' +
                            '<a style="z-index:100;" class="call" href="tel:' + this.driver_phone + '"><i class="fa fa-phone color-green1-light call fa-2x"></i></a>' +
                            '<a href="orderDetails.php?o=' + this.id + '">' +
                            '<h1 class="bolder text-center text-white">' + this.order_no + '</h1>' +
                            '<p class=" text-center text-white">' +
                            this.customer_phone +
                            '<br />' + this.city + ' | ' + this.town + ' | ' + this.address +
                            '<br />' + this.store_name +
                            '<br /><b>' + this.driver_name + '-' + this.driver_phone + '</b>' +
                            '<br />( ' + this.t_note +
                            ' )</p>' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );
                    });
                },
                error: function(e) {
                    $("#orders").removeClass("loading");
                    console.log(e);
                }
            });
        }
    </script>
    <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-messaging.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <!--<script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-analytics.js"></script>
-->
    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-firestore.js"></script>
    <script>
        // Check that service workers are supported
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('sw.js')
            });
        }
    </script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCmIr87Ihp8nXtHrKWZyeH1GcvFrHxmtJw",
            authDomain: "alnahr-3a32e.firebaseapp.com",
            databaseURL: "https://alnahr-3a32e.firebaseio.com",
            projectId: "alnahr-3a32e",
            storageBucket: "alnahr-3a32e.appspot.com",
            messagingSenderId: "410160983978",
            appId: "1:410160983978:web:22a64081a20724ec9185d3",
            measurementId: "G-QYSFSMTB8R"
        };
        // Initialize Firebase
        if (firebase.messaging.isSupported()) {
            firebase.initializeApp(firebaseConfig);
            //  firebase.analytics();
            const messaging = firebase.messaging();
            navigator.serviceWorker.register('scripts/firebase-sw.js')
                .then((registration) => {
                    messaging.useServiceWorker(registration);
                    messaging.requestPermission()
                        .then(function() {
                            console.log(messaging.getToken());
                            return messaging.getToken();
                        })
                        .then(function(token) {
                            console.log(token);
                            updateUserToken(token);
                        })
                        .catch(function(err) {
                            console.log("error")
                        });
                    messaging.onMessage(function(payload) {
                        console.log('On message', payload);
                        Toast.success(payload.notification.body, payload.notification.title);
                        getNotification();
                    });
                });
        } else {
            Notification.requestPermission().then(function(result) {
                console.log(Notification.getToken());
            });
        }

        function updateUserToken(token) {
            $.ajax({
                url: "php/_updateToken.php",
                data: {
                    token: token
                },
                type: "POST",
                success: function(res) {
                    console.log(res);
                },
                error: function(e) {
                    console.log(e);
                },
            });
        }
    </script>
</body>

</html>