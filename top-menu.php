<?php require_once("config.php") ?>
<style type="text/css">
  a:hover {
    text-underline: none;
  }
</style>
<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
<nav class="fixedtop topbar navigation" role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="index.php" class=" brand-logo "><?php echo $config['Company_name']; ?></a>
    <a href="#" data-target="" class="waves-effect waves-circle navicon back-button htmlmode show-on-large "><i class="mdi mdi-chevron-left" data-page=""></i></a>

    <a href="index.php" data-target="slide-nav" class="waves-effect waves-circle navicon sidenav-trigger show-on-large"><i class="mdi mdi-menu"></i></a>


    <a onclick="logout()" href="logout.php" class="waves-effect waves-circle navicon right nav-site-mode show-on-large"><i class="mdi mdi-logout-variant"></i></a>
  </div>
</nav>
<ul id="slide-nav" class="sidenav sidemenu">
  <li class="menu-close"><i class="mdi mdi-close"></i></li>
  <li class="user-wrap">
    <div class="user-view row">
      <!-- <div class="background">
        <img src="assets/images/office.jpg">
      </div> -->
      <img width="300" src="img/logos/logo.png">
      <div class="col s12 imgarea">

      </div>
      <!-- <div class="col s9 infoarea">
        <a href="#name"><span class="name">Cherry Smith</span></a>
        <a href="#email"><span class="email">cherrysmith@gmail.com</span></a>
      </div> -->
    </div>
  </li>


  <!-- <li class="menulinks col s12"> -->
  <li class="">
    <ul class="collapsible">
      <!-- SIDEBAR - START -->

      <!-- MAIN MENU - START -->

      <li class="sh-wrap">
        <div class="subheader">الصفحات</div>
      </li>
      <li class="lvl1 ">
        <div class=" waves-effect ">
          <a href="orders.php">
            <i class="mdi mdi-format-list-bulleted"></i>
            <span class="title">الطلبيات</span>
          </a>
        </div>
      </li>
      <li class="lvl1 ">
        <div class=" waves-effect ">
          <a href="returned.php">
            <i class="mdi mdi-open-in-app"></i>
            <span class="title">الرواجع</span><span class="badge blue-grey lighten-3 badge-rounded">NEW</span>
          </a>
        </div>
      </li>
      <li class="lvl1 ">
        <div class=" waves-effect ">
          <a href="posponded.php">
            <i class="mdi mdi-timetable"></i>
            <span class="title">المؤجلات</span>
          </a>
        </div>
      </li>
      <li class="lvl1">
        <div class=" waves-effect ">
          <a href="recived.php">
            <i class="mdi mdi-flask-outline"></i>
            <span class="title">الواصل</span>
          </a>
        </div>
      </li>
      <li class="lvl1 ">
        <div class=" waves-effect ">
          <a href="instorage.php">
            <i class="mdi mdi-textbox"></i>
            <span class="title"> رواجع بالمخزن </span>
          </a>
        </div>
      </li>
  </li>
</ul>
<script>
  function logout(){
    window.location.href = 'logout.php';
  }
</script>