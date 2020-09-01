 <style>
   .footer-menu li {
     width: 25% !important;
   }
  #noti-new {
    background-color: #DC143C;
    color:#FFFFFF;
    border-radius: 50px;
    height: 22px;
    min-width: 0px !important;
    padding-left: 5px;
    padding-right: 5px;
    font-size:12px;
  }
 </style>
 <script type="text/javascript" src="scripts/jquery.js"></script>
 <div class="footer-menu">
   <ul>

     <li>
       <a href="notfcation.php"> <i class="mdi mdi-shape-outline"></i>
         <span>الاشعارات<label id="noti-new"></label> </span>
       </a> 
      </li>
     <li>
       <a href="returned.php"> <i class="mdi mdi-backup-restore"></i>
         <span>الرواجع</span>
       </a>
     </li>
     <li>
       <a href="index.php" class=""> <i class="mdi mdi-home-outline"></i>
         <span>الرئسيه</span>
       </a>
     </li>
     <li>
       <a href="recived.php"> <i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i>
         <span>الواصل</span>
       </a>
     </li>
     <!-- <li>
       <a href="earnings.php"> <i class="mdi mdi-flask-outline"></i>
         <span>الكشوفات</span>
       </a>
      </li> -->

   </ul>
 </div>
 <script>
function newNotification(){
    $.ajax({
    url:"php/_getNotification.php",
    success:function(res){
      console.log(res);
      if(res.unseen != 0){
        $("#noti-new").text(res.unseen);
      }else{
        $("#noti-new").text("");
        $("#noti-new").css('padding','0px');
      }
    },
    error:function(e){
      console.log(e,'it for noti');
    }
  });
}
newNotification();

var page = document.location.pathname.match(/[^\/]+$/)[0];
if(page == 'notfcation.php'){
   $('[href="notfcation.php"]').addClass("active");
}else if(page == 'profile.php'){
   $('[href="profile.php"]').addClass("active");
}else if(page == 'index.php'){
   $('[href="index.php"]').addClass("active");
}else if(page == 'recived.php'){
   $('[href="recived.php"]').addClass("active");
}else if(page == 'returned.php'){
   $('[href="returned.php"]').addClass("active");
}
</script>