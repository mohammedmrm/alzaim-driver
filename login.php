<?php require_once("config.php") ?>
<!DOCTYPE html>
<html class=" ">

<!-- END HEAD -->
<?php include_once('head.php'); ?>
<!-- BEGIN BODY -->
<style>
    .input-field .prefix~input,
    .input-field .prefix~textarea,
    .input-field .prefix~label,
    .input-field .prefix~.validate~label,
    .input-field .prefix~.helper-text,
    .input-field .prefix~.autocomplete-content {
        margin-right: 2.5rem !important;
    }

    .input-field.col label {
        right: .75rem;
    }

    body .login-area input[type="email"],
    body .login-area input[type="password"],
    body .login-area input[type="tel"],
    body .login-area input[type="text"] {
        border-bottom: 1px solid #4c4242;
        color: #3a2020;
    }
</style>

<body class="isfullscreen  html" data-header="light" data-footer="light" data-header_align="center" data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="light">
    <div class="preloader-background">
        <div class="preloader-wrapper">
            <div id="preloader"></div>
        </div>
    </div>
    <!-- START navigation -->
    <div class="fixedtop topbar navigation" role="navigation">
        <div class="nav-wrapper container">
            <div class="row">
                <div class="col s12 text-center">
                    <span id="logo-container" href="index.php" class="gray-text center-text"><?php echo $config['Company_name']; ?></span>
                </div>
                <div class="col s12 text-center">
                    <img width="250px" src="img/logos/logo.png" />
                </div>
            </div>
        </div>
    </div>
    <div class="access-login"></div>
    <div class="container login-area">
        <div class="section">
            <div class="row ">
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit center gray-text">تسجيل الدخول</h5>
                    <div class="row">
                        <label id="msg" class="red-text"></label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" type="text" class="black-text validate">
                            <label for="username" class="grey-text">رقم الهاتف</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="black-text validate">
                            <label for="password" class="grey-text">كلمه المرور</label>
                        </div>
                    </div>
                    <div class="row center">
                        <a onclick="login()" class="waves-effect waves-light btn-large bg-primary">تسجيل الدخول</a>
                        <div class="spacer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>















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
    <script>
        function login() {
            $.ajax({
                url: "php/_login.php",
                type: "POST",
                data: {
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                beforeSend: function() {
                    $("#loginDiv").addClass("loading");
                },
                success: function(res) {
                    $("#loginDiv").removeClass("loading");
                    console.log(res);
                    if (res.msg == 1) {
                        window.location.href = "index.php";
                    } else {
                        $("#msg").text(res.msg);
                    }
                },
                error: function(e) {
                    $("#loginDiv").removeClass("loading");
                    console.log(e.responseText);
                }
            });
        }
    </script>
</body>

</html>