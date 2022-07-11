<?php
require_once("libs/parts/panel/web/igihozo_didier.php");
/*!
Programmer: IGIHOZO Didier All codes reserved
    -------------------
Tel : +250722077175 , 250784424020
email : didierigihozo07@gmail.com
facebook : Didier Igihozo
Instagram : Kabaka_official_1

 */
if (!$sel || !$con) {
  print_r("<center><h2><font color='red'>PROBLEM OF SERVER CONNECTION...</font></h2></center>");
}else{
if (@!$_SESSION['svn_bms_usrnm']) {
?>
<script type="text/javascript">
  window.location="login.php";
</script>
<?php
}else{

$all_flnm=$_SESSION['svn_bms_usrnm'];
$se_all_id=mysql_query("SELECT * FROM bms_users WHERE bms_usr_full_name='$all_flnm'");
$cnt_se_all_id=mysql_num_rows($se_all_id);
if ($cnt_se_all_id!=1) {
 echo "<h1 style='color:red'><center>Something went wrong... ||  Please contact your administrator</center></h1>";
}else{
  $ft_cnt_se_all_id=mysql_fetch_assoc($se_all_id);
  $all_id=$ft_cnt_se_all_id['user_id'];

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Add Sub User -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Add Sub User</title>
<link rel="shortcut icon" href="libs/parts/imgs/bms.png">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/bootstrap/glyphicon/css/bootstrap.css" rel="stylesheet">
<style>
.loader {
  margin-top: -10px;
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #432445;
  border-right: 8px solid #64782a;
  border-bottom: 8px solid #a28021;
  border-left: 8px solid #cd5609;
  width: 35px;
  height: 35px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>

<body class="bg-dark">
  <div class="container">    
 <a href="index.php"><span id="home_glyph"><label for="gyl_home">&nbsp&nbspHome</label><span class="glyphicon glyphicon-home" id="gyl_home"></span></span></a>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><span id="hd_reg">Add Sub-User </span><span id="resp_reg"></span></div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="protName">First Name</label>
                <input class="form-control" id="subfnm" type="text" aria-describedby="nameHelp" placeholder="First Name">
              </div>
              <div class="col-md-6">
                <label for="protType">Last Name</label>
                  <input type="text" id="sublnm" class="form-control" placeholder="Last Name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="protCategry">User Name</label>
                <input type="text" id="subusrnm" class="form-control" placeholder="User Name">
              </div>
              <div class="col-md-6">
                <label for="protCategry">New Password</label>
                <input type="password" id="subnewpss" class="form-control" placeholder="New Password">
              </div>
              <div class="col-md-6">
                <label for="proUnPrice"> Comfirm Password</label>
                <input class="form-control" id="subcomfpss" type="password" placeholder="Comfirm Password">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block"  id="ssuubb" onclick="addSubUsr()"><span class="glyphicon glyphicon-saved"></span>&nbsp&nbsp Add</button>
      </div>
    </div>
  <?php
require("libs/parts/footer.php");
?>
  </div>
  <!-- Bootstrap core JavaScript-->

    <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/web/index.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
</body>

</html>
  <?php
}
}
}
?>