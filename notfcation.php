<!DOCTYPE HTML>
<html lang="en">
<?php require_once('head.php'); ?>

<body class="html" <?php echo $config['theme-config']; ?>>
<style type="text/css">
.bg-div1 {
 background-color: #CC0011;
}
.bg-div2 {
 background-color: #CC1122;
}
.bg-div3 {
 background-color: #CC2233;
}
.bg-div4 {
 background-color: #CC3344;
}
.bg-div5 {
 background-color: #CC4455;
}
.unseen{
  background-color: #66CCCC;
  line-height: 1.2rem;
  padding: 10px 20px;
  margin: 0;
  border-bottom: 1px solid #e0e0e0;
}
.seen  {
  background-color: #FFFFFF ;
  line-height: 1.2rem;
  padding: 10px 20px;
  margin: 0;
  border-bottom: 1px solid #e0e0e0;
}
.unseen a , .seen a{
 color: #000000;
}

.active-nav label {
    color: #FFFFFF!important;
}
</style>
<script type="text/javascript" src="scripts/jquery.js"></script>


    <?php include_once("pre.php");  ?>
    <?php include_once("top-menu.php");  ?>
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
    <div class="section">
        <div data-height="100" class="caption shadow-large caption-margins top-30 round-medium shadow-huge">
                <div class="caption-top top-10">
                    <h2 class="center-text color-white bolder fa-4x" id="noti-count"></h2>
                </div>
                <div class="caption-overlay bg-black opacity-80"></div>
                <div class="caption-bg bg-14"></div>
            </div>
            <select class="form-control" style="width: 90%;margin-right: 2 rem" id="seen" onchange="getNotification()">
                   <option value="">الكل</option>
                   <option value="1">مرئي</option>
                   <option value="2">غير مرئي</option>
                </select>
            <hr />
            <ul class="notifications">
            <div id="noti_menu">

            </div>
            </ul>
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
      $("select").formSelect();
    });
    document.addEventListener("DOMContentLoaded", function() {
      $('.preloader-background').delay(10).fadeOut('slow');
    });
  </script>
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


  <!-- CORE TEMPLATE JS - START -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/scripts.js"></script>

  <!-- END CORE TEMPLATE JS - END -->
<script>
function getNotification(){
    $.ajax({
    url:"php/_getNotification.php",
    beforeSend:function(){
    },
    data:{
      seen:$("#seen").val()
    },
    success:function(res){
      console.log(res);
      if(res.success == 1){
        $("#noti-count").text(res.unseen + ' اشعار جديد');
        $("#noti_menu").html("");
        $.each(res.data,function(){
          if(this.driver_seen == 0){
            bg = 'unseen';
          }else{
            bg = "seen";
          }
         $("#noti_menu").append(
           `
             <li class="`+bg+`">
              <a href="orderDetails.php?o=`+this.order_id+`&notification=`+this.id+`">
              <div class="notify">
                  <h4>`+this.title+' ('+this.order_no+')'+`</h4>
                  <p>`+this.body+`</p>
                  <p style="direction: ltr !important; text-align: left;font-size:12px;">`+this.date+`</p>
              </div>
              </a>
            </li>
            `
         );
        });
      }
    },
    error:function(e){
      console.log(e,'it for noti');
    }
  });
}
getNotification();

</script>
</body>
</html>
