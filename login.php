<!--
Programmer: IGIHOZO Didier All codes reserved
    ________________________
Tel : +250722077175 , 250784424020
email : didierigihozo07@gmail.com
facebook : Didier Igihozo
Instagram : Kabaka_official_1
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Login -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pharmacy - Stock Management System | Login</title>
  <link rel="shortcut icon" href="libs/parts/imgs/bms.png">
  <style>
.loader {
  margin-top: 20px;
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
.sub_loader {
  position: relative;
  float: right;
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #432445;
  border-right: 8px solid #64782a;
  border-bottom: 8px solid #a28021;
  border-left: 8px solid #cd5609;
  width: 30px;
  height: 30px;
  
  -webkit-animation: sub_spin 2s linear infinite;
  animation: sub_spin 2s linear infinite;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@-webkit-keyframes sub_spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes sub_spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/web/login.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap/glyphicon/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class="rows">
    <div class="container container-fluid">
    <div class="card card-login mx-auto mt-5 col-xs-8 col-sm-8 col-md-8 col-lg-8" id="mmnllgdv">
<div class="rows"> 
  <center>
    <div id="cccnt" class="container container-fluid"> 
    <center><div class="brand brand-lg">
      <h3><b><strong>Pharmacy - Stock Management System</strong></b></h3>
  </div></center>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
      <center><span id="respp"></span><br><br></center><!--  RESPONSE SPAN-->
<center> 
            <div>
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input class="form-control" id="unm" type="text" placeholder="Enter User Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="ups" type="password" placeholder="Enter Password">
          </div>
          <button class="btn btn-primary btn-block col-8" id="add_usr_btn"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspLogin</button>

<a class="nav-link" data-toggle="modal" id="add_usr_btn_lnk" data-target="#subUsrLgnModal" style="background-color: transparent;"><i class="fa fa-fw fa-sign-out"></i><span class="glyphicon glyphicon-user" style="font-size: 20px"></span>&nbsp<span class="glyphicon glyphicon-user"></span>Sub-User Login</a>
          <a href="help.php" target="_blank" class="btn btn-link btn-block" id="add_usr_btn_lnk_frgt" style="background-color: transparent;">Forgot Password</a>
          <div class=""> 
            <br><br>
<div style="margin-top: -60px">
  <?php
require("libs/parts/footer.php");
?>
</div>


    <!-- ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''SUB-USER-LOGIN''''''''''''''''''''''''''''''''''''''''''''-->
    <div class="modal fade" id="subUsrLgnModal" tabindex="-1" role="dialog" aria-labelledby="subUsrLgnModalLabel" aria-hidden="true" style="background:linear-gradient(#54836b,#90dab4,#54836b);">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="subUsrLgnModalLabel">Sub-User Worker ?</h5> <center><span id="respp_sub"></span><br><br></center><!--  RESPONSE SPAN-->
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input class="form-control" id="sub_nm" type="text" placeholder="Enter User Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input class="form-control" id="sub_pss" type="password" placeholder="Enter Password">
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class=" btn btn-primary" onclick="subUsrLgn()" id="sub_lgn_btn">Login</button>
          </div>
        </div>
      </div>
    </div>
          </div>
      </div>
</center>
    </div>
  </div>
</center>
</div>
    </div>
  </div>
</div>
  </body>
     <script src="vendor/jquery/jquery.js"></script>
    <script src="js/web/index.js"></script>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>    
</html>
