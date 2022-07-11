<?php
require_once("web/igihozo_didier.php");
?>
<!--
Programmer: IGIHOZO Didier All codes reserved
    ____________________
Tel : +250722077175 , 250784424020
email : didierigihozo07@gmail.com
facebook : Didier Igihozo
Instagram : Kabaka_official_1

-->
<?php
if (!$sel || !$con) {
  print_r("<center><h2><font color='red'>PROBLEM OF SERVER CONNECTION...</font></h2></center>");
}else{
if (@!$_SESSION['svn_bms_usrnm']) {
?>
<script type="text/javascript">
  window.location="../../../login.php";
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
  <meta name="description" content="Available Companies -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Available Companies</title>
  <link rel="shortcut icon" href="../../../libs/parts/imgs/bms.png">
  <!-- Bootstrap core CSS-->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin.css" rel="stylesheet">
  <script src="../../../vendor/jquery/jquery.min.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../../../index.php">Pharmacy - Stock Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../../../index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> Actions </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
<?php
          if (isset($_SESSION['svn_bms_usrnm_sub'])) {
          }else{
            ?>
            <li>
              <a href="../../../libs/parts/panel/add_company.php">Add Company</a>
            </li>
            <?php
          }
          ?>
          </ul>
        </li>
        <?php
        if (isset($_SESSION['svn_bms_usrnm_sub'])){
          }else{
            ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages" id="frNnSbnwpr">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagesPR" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> Manage </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePagesPR">
            <li>
              <a href="../../../libs/parts/panel/av_companies.php">Available Companies</a>
            </li>
            <li>
              <a href="../../../libs/parts/panel/av_company_requests.php">Company Requests</a>
            </li>
            <li>
              <a href="../../../libs/parts/panel/av_requests.php">Support Requests</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages" id="frNnSb">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagess" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> My Acount </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePagess">
            <li>
              <a href="#NOT-YET">Add Administrator</a>
            </li>
            <li>
              <a href="../../../change_password.php">Change Password</a>
            </li>
          </ul>
        </li>
            <?php
          }
        ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="../../../help.php" target="_blank">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Help</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>



      <ul class="navbar-nav ml-auto">


        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <?php
              if (isset($_SESSION['svn_bms_usrnm_sub'])) {
              echo"<span id='full_sub_name' style='text-decoration:none'>".$_SESSION['svn_bms_usrnm_sub']."</span>&nbsp&nbsp";
              echo"<span id='full_sub_name' style='text-decoration:none'>|| </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              }
               echo"<span id='fullname' style='text-decoration:none'>".$_SESSION['svn_bms_usrnm']."</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"?>
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Stock status</a>
        </li>
        <li class="breadcrumb-item active">Products level</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Products Available</div>
        <div class="card-body">
          <div class="table-responsive">
<div id="tt_res">
            <table class="table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Reg.Date</th>
                  <th>Status 1</th>
                  <th>Status 2</th>
                  <th>Status 3</th>
                  <th>Contact</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Company Name</th>
                  <th>Reg.Date</th>
                  <th>Status 1</th>
                  <th>Status 2</th>
                  <th>Status 3</th>
                  <th>Contact</th>
                </tr>
              </tfoot>
              <tbody>
<?php
$st_ad_e="A";
$st_ad_d="AD";
$se_comp=mysql_query("SELECT* FROM bms_users WHERE user_status!='$st_ad_e' AND user_status!='$st_ad_d' order by user_status,user_date desc");
$cnt_se_comp=mysql_num_rows($se_comp);
if ($cnt_se_comp>0) {
 while ($ft_se_comp=mysql_fetch_assoc($se_comp)) {
   ?>
<div>
  <tr  id="del_dis_enBtn">
    <!--<input type="hidden" class="comp_iid<?php echo$ft_se_comp['user_id']?>" value="<?php echo $ft_se_comp['user_id']?>">-->
    <script type="text/javascript">
        let compp_iid=$('.comp_iid<?php echo$ft_se_comp['user_id']?>').val();
    </script>
  <td>    <?php     echo $ft_se_comp['bms_usr_full_name'];    ?></td>
  <td>    <?php     echo substr($ft_se_comp['user_date'], 0,16)    ?></td>
  <td>
    <?php
    if (($ft_se_comp['user_status']!="E") AND ($ft_se_comp['user_status']!="Spr")) {
?>
<div class="form-group">
  <div class="button-group">
    <button class="btn btn-success" onclick="alert('<?php echo $ft_se_comp['user_id']?>')">Enable</button>
  </div>
</div>
<?php
    }else if (($ft_se_comp['user_status']=="E") OR ($ft_se_comp['user_status']=="Spr")) {
?>
<div class="form-group">
  <div class="button-group">
    <button class="btn btn-success" disabled><u>Enabled</u></button>
  </div>
</div>
<?php
    }
    ?>
  </td>
  <td>
        <?php
    if (($ft_se_comp['user_status']!="D") AND ($ft_se_comp['user_status']!="Spr-D")) {
?>
<div class="form-group">
  <div class="button-group">
    <button class="btn btn-secondary" onclick="cmpDisbl()">Disable</button>
  </div>
</div>
<?php
    }else if (($ft_se_comp['user_status']=="D") OR ($ft_se_comp['user_status']=="Spr-D")) {
?>
<div class="form-group">
  <div class="button-group">
    <button class="btn btn-secondary" disabled><u>Disabled</u></button>
  </div>
</div>
<?php
    }
    ?>
  </td>
  <td>
    <?php
    if (($ft_se_comp['user_status']!="Del") AND ($ft_se_comp['user_status']!="Spr-Del")) {
?>
<div class="form-group">
  <div class="button-group">
    <button class="btn btn-danger" onclick="cmpDelt()">Delete</button>
  </div>
</div>
<?php
    }else if (($ft_se_comp['user_status']=="Del") OR ($ft_se_comp['user_status']=="Spr-Del")) {
?>
<div class="form-group">
  <div class="button-group">
    <button class="btn btn-danger" disabled><u>Deleted</u></button>
  </div>
</div>
<?php
    }
    ?>
  </td>
  <td>
    <a href="#" target="_blank">Send Message...</a>
  </td>
</tr>
</div>
   <?php
 }
}
?>              
              </tbody>
            </table>
</div>
          </div>
        </div>
<?php 
//------------------------------------------------------last products modification
$sel_llst=mysql_query("SELECT * FROM bms_products WHERE pro_status='E' AND bms_pr_bus='$all_id' ORDER BY re_date DESC LIMIT 1");
$cnt_sel_llst=mysql_num_rows($sel_llst);
if ($cnt_sel_llst>=1) {
  while ($ft_sel_llst=mysql_fetch_assoc($sel_llst)) {
   ?>
<div class="card-footer small text-muted">Updated at <?php echo substr($ft_sel_llst['re_date'], 8,2)." / ".substr($ft_sel_llst['re_date'], 5,2)." / ".substr($ft_sel_llst['re_date'], 0,4)."&nbsp&nbsp - &nbsp&nbsp".substr($ft_sel_llst['re_date'], 11,5);?> </div>

   <?php
  }
}
?>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small> <center> <div class="text-center" style="background-color:#cddbcf;border-radius:20px;width: 70%;height: 50px" id="footerlg"> <p>&#169 Copyright &#169 2018 Product of SEVEEEN Company...All rights reserved</p> </div></center></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../../../libs/parts/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/popper/popper.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../../js/sb-admin-datatables.min.js"></script>
    <script src="../../../js/web/index.js"></script>
  </div>
</body>

</html>

  <?php
}}
}
?>
