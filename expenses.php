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
if ($sel && $con) {


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

$sub_id=$_SESSION['svn_bms_sub_id'];
$se_sub_cll=mysql_query("SELECT * FROM bms_sub_users WHERE sub_full_name='$all_flnm' AND sub_id='$sub_id'");
$ft_se_sub_cll=mysql_fetch_assoc($se_sub_cll);
$cnt_se_sub_cll=mysql_num_rows($se_sub_cll);

if ($cnt_se_all_id!=1 AND $cnt_se_sub_cll!=1) {
 echo "<h1 style='color:red'><center>Something went wrong... ||  Please contact your administrator</center></h1>";
}else{
  $ft_cnt_se_all_id=mysql_fetch_assoc($se_all_id);
  $all_id=$ft_cnt_se_all_id['user_id'];

  ?>
 <html lang="en">

<head>
  <meta name="description" content="Expenses -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Expenses</title>
  <link rel="shortcut icon" href="libs/parts/imgs/bms.png">
      <link rel="stylesheet" type="text/css" href="css/bootstrap/kabaka/css/bootstrap.css">

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
      <div class="card-header"><span id="hd_reg">Expense details </span><span id="resp_tkout"></span></div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <label for="protName">Expense Description</label>
                <textarea class="form-control" id="expreasn"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="proUnPrice">Price taken</label>
                <input class="form-control" id="expprice" type="number" placeholder="Price in RWF">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" id="expp" onclick="expNss()"><span class="glyphicon glyphicon-saved"></span>&nbsp&nbsp Take Out</button>
      </div>
    </div>
<?php
require("libs/parts/footer.php");
?>
  </div>
  <!-- Bootstrap core JavaScript-->

    <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/web/index.js"></script>

  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
 <?php
}}

}else{
	echo "<center><h1><font color='red'>NO SERVER CONNECTION...</font></h1></center>";
}
?>