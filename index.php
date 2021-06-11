<style type="text/css">
html, body{
  min-height: 100%;
}
</style>
<?php 
  ini_set('display_errors', 0);
  ini_set('max_execution_time',0);

  date_default_timezone_set("Asia/Jakarta");

  session_start();
  include "3rdparty/engine.php";

  if ($_SESSION['userid'] == "") {
      include "header.php";

      include "pages/login.php";

      include "footer.php";

  } else {
      if ($_GET['m'] == 'logout') {
          unset($_SESSION['userid']);
          unset($_SESSION['nama']);
          session_destroy($_SESSION['userid']);
          session_destroy($_SESSION['nama']);
          //echo '<script language="javascript">window.location = "index.php";</script>';
          echo '
            <script language="javascript">window.location.href = "r";</script>
          ';
      } else {
          include "header.php";
          include "navigation-top.php";
          include "side-menu.php";
          include "main-page.php";

          //print_r($_SESSION);
          if ($_GET['m'] == "" and $_GET['s'] == "") {
            //insert to log
              include "pages/utama.php";
          } else if ($_GET['m'] != "" and $_GET['s'] != "") {
              include "pages/".$_GET['m']."/".$_GET['s'].".php";
          }
          include "footer.php";
      }
  }


?>

