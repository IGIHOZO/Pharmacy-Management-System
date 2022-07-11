<?php
require_once("web/igihozo_didier.php");
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
  $sel_al_e_cmp=mysql_query("SELECT* FROM bms_users WHERE user_status='E'")or die(mysql_error()); //========SELECT E COMPANIES
  $sel_al_spr_cmp=mysql_query("SELECT* FROM bms_users WHERE user_status='Spr'")or die(mysql_error()); //========SELECT Spr COMPANIES


  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Orient Company -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Orient Company</title>
<link rel="../../../shortcut icon" href="../../../libs/parts/imgs/bms.png">
  <!-- Bootstrap core CSS-->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin.css" rel="stylesheet">
  <link href="../../../css/bootstrap/glyphicon/css/bootstrap.css" rel="stylesheet">
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
 <a href="../../../index.php"><span id="home_glyph"><label for="gyl_home">&nbsp&nbspHome</label><span class="glyphicon glyphicon-home" id="gyl_home"></span></span></a>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><span id="hd_reg">Add Sub-User </span><span id="resp_reg"></span></div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="protType">Select company to be oriented</label>
                  <select class="form-control" id="pcomp">
                    <option value="default">Select Company</option>
                    <?php
                    if (mysql_num_rows($sel_al_e_cmp)>0) {
                      while ($ft_e_cmp=mysql_fetch_assoc($sel_al_e_cmp)) {
                        echo "<option value='".$ft_e_cmp['user_id']."'>".$ft_e_cmp['bms_usr_full_name']."</option>";
                      }
                    }else{
                       echo "<option> No Company enabled company Available</option>";
                    }
                    ?>
                  </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="protCategry">Choose where to orient</label>
                  <select class="form-control" id="pspr">
                    <option value="default">Select Main Company</option>
                    <?php
                    if (mysql_num_rows($sel_al_spr_cmp)>0) {
                      while ($ft_spr_cmp=mysql_fetch_assoc($sel_al_spr_cmp)) {
                        echo "<option value='".$ft_spr_cmp['user_id']."'>".$ft_spr_cmp['bms_usr_full_name']."</option>";
                      }
                    }else{
                       echo "<option> No Main Company Available </option>";
                    }
                    ?>
                  </select>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block"  id="ssuubb" onclick="return orntCmp()"><span class="glyphicon glyphicon-saved"></span>&nbsp&nbsp Add</button>
      </div>
    </div>
  <?php
require("../footer.php");
?>
  </div>
  <!-- Bootstrap core JavaScript-->

    <script src="../../../vendor/jquery/jquery.js"></script>
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/popper/popper.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../js/web/index.js"></script>
    <script src="../../../vendor/jquery/jquery.js"></script>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
</body>

</html>
  <?php
}
}
}
?>