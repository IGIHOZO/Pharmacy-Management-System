<?php
require_once("panel/web/igihozo_didier.php");/*!
Programmer: IGIHOZO Didier All codes reserved
    -------------------
Tel : +250722077175 , 250784424020
email : didierigihozo07@gmail.com
facebook : Didier Igihozo
Instagram : Kabaka_official_1

 */
echo " <link rel='shortcut icon' href='imgs/bms.png'>";
if (!$sel || !$con) {
  print_r("<center><h2><font color='red'>PROBLEM OF SERVER CONNECTION...</font></h2></center>");
}else{
if (@!$_SESSION['svn_bms_usrnm']) {
?>
<script type="text/javascript">
  window.location="../../login.php";
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

if (isset($_GET['reid'])) {
$sub_id=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['reid'])))))))))-2018;
$ssuub_id=$sub_id;
?>
<input type="hidden" id="bus_id" value="<?php echo $all_id?>">
<input type="hidden" id="sub_id" value="<?php echo $ssuub_id?>">
<?php
$sel_ssub=mysql_query("SELECT * FROM bms_sub_users WHERE sub_id='$sub_id' AND sub_bus_id='$all_id'");
$cnt_sel_ssub=mysql_num_rows($sel_ssub);
$ft_sel_ssub=mysql_fetch_assoc($sel_ssub);
$sub_namee=$ft_sel_ssub['sub_full_name'];
if ($cnt_sel_ssub==1) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Modify sub-user -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Modify sub-user</title>
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/glyphicon.css">
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../libs/datepiker/plugs/css/bootstrap-datepicker.min.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../../index.php">Pharmacy - Stock Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../../index.php">
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
              <a href="../../add_product.php">Add in stock</a>
            </li>
            <?php
          }

        if (isset($_SESSION['svn_bms_usrnm_sub'])){

          }else{
          ?>
            <li id="frNnSbnwpr">
              <a href="../../register.php">Register New Product</a>
            </li>
          <?php
          }?>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Stock-Take Out</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="../../sell.php">Sell</a>
                </li>
                <li>
                  <a href="../../credits.php">Credits</a>
                </li>
                <li>
                  <a href="../../expenses.php">Expenses</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <?php
        if (isset($_SESSION['svn_bms_usrnm_sub'])){
          }else{
            ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages" id="frNnSbnwpr">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagesPR" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> Reports </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePagesPR">
            <li>
              <a href="../../activities.php">Products sold</a>
            </li>
            <li>
              <a href="../../activities_credits.php">Credits</a>
            </li>
            <li>
              <a href="../../activities_expenses.php">Expenses</a>
            </li>
          </ul>
        </li>
            <?php
          }
          if (isset($_SESSION['svn_bms_usrnm_sub'])) {
          }else{
            ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables" id="frNnSbpr">
          <a class="nav-link" href="../../Products.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
            <?php
          }
          if (isset($_SESSION['svn_bms_usrnm_sub'])) {
          }else{
            ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages" id="frNnSb">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagess" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> My Acount </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePagess">
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti22">My Sub-Users</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti22">
              <?php
              $sel_my_sub=mysql_query("SELECT * FROM bms_sub_users WHERE sub_bus_id='$all_id' AND (sub_status='E' OR sub_status='D')");
              $cnt_sel_my_sub=mysql_num_rows($sel_my_sub);
              if ($cnt_sel_my_sub>0) {
                while ($ft_sel_my_sub=mysql_fetch_assoc($sel_my_sub)) {
$sub_id=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_my_sub['sub_id']+2018)))))))));
                  echo "<li><a href='modify_sub_users.php?reid=$sub_id' target='_blank' class='my_sub_usrs_lst'style='color:#55aaff'>".$ft_sel_my_sub['sub_full_name']."</a></li>";
                }
              }else{
                echo "<a href='#'>No Available Sub-User.</a>";
              }
              ?>
              </ul>
            </li>
            <li>
              <a href="../../add_sub_user.php">Add Sub-User</a>
            </li>
            <li>
              <a href="../../change_password.php">Change Password</a>
            </li>
          </ul>
        </li>
            <?php
          }
        ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="../../help.php" target="_blank">
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

      <!-- Example DataTables Card-->
      <div class="card mb-3" id="ttpp_nt_sh">
        <div class="card-header" style="height: 80px">
                <!-- Breadcrumbs-->
      <ol class="breadcrumb" style="height: 50px">
   <span>SUB-USER:   <?php
    echo "<span id='hhdder_crdpymt_prnm'>".$sub_namee."</span>";
    ?>   </span>
    <span class="button-group" id="sb_mns_tp">
      <button class="btn" style="border-radius:30px 0px 0px 0px;background-color: #112233;color: #ffffff" onclick="sbnm_sld()" id="subbb_btnm_sld">Sold</button><button class="btn" onclick="sbnm_crd()" id="subbb_btnm_crdt">Credited</button><button class="btn" style="border-radius:0px 30px 0px 0px;" onclick="sbnm_exp()" id="subbb_btnm_exps">Expenses</button>
<style type="text/css">#sb_mns_tp{margin-left: 2%}#sb_mns_tp button{border-radius: 0px;width: 10%;font-weight: bolder;background-color: grey;}#sb_mns_tp button:hover{background-color: #112233;color: #ffffff;cursor: pointer;border;}</style>
    </span>
<!--
        <li style="margin-top:-3%"><span class="form-inline my-2 my-lg-0 mr-lg-2" id="dte_grp"><div class="input-group"><label for="lblefrom"><b>&nbspChoose Day: &nbsp </b></label><input type="text" name="lblefrom" id="lblefrom" class="form-control" placeholder="Month / Day / Year"><button class="btn btn-primary" id="tke_btn" onclick="datPckrSbSld()" disabled><span class="glyphicon glyphicon-check"></span>&nbsp&nbspTake...</button></div></div></li>
-->
      </ol></div>
        <div class="card-body">
          <div class="table-responsive">
          <div id="tbl_resp">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Unit price</th>
                  <th>Insurance</th>
                  <th>Insurance cost</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Unit price</th>
                  <th>Insurance</th>
                  <th>Insurance cost</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
 <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_product_status='out' AND bms_kt_bus='$all_id'");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
    $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $kt_insur=$ft_sel_pro['ktout_insurance'];
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    $tkdtl=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_pro['ktout_id']+2018)))))))));
    ?>
    <tr>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_category']?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price'])?></td>
      <td>
        <?php
if ($kt_insur!=0) {
  $sel_insur_nme=mysql_query("SELECT * FROM bms_insurances WHERE insurance_id='$kt_insur' AND insurance_bus='$all_id'")or die(mysql_error());
  $ft_sel_insur_nme=mysql_fetch_assoc($sel_insur_nme);
  $insr_name=$ft_sel_insur_nme['insurance_name'];
  echo strtoupper($insr_name);
}else{
  echo "<center>-<center>";
}
        ?>
      </td>
      <td>
        <?php
$sel_insr_cost=mysql_query("SELECT * FROM bms_costs WHERE cost_product_id='$pr_id' AND cost_insurance_id='$kt_insur' AND cost_bus='$all_id'")or die(mysql_error());
if (mysql_num_rows($sel_insr_cost)>0) {
  $ft_sel_insr_cost=mysql_fetch_assoc($sel_insr_cost);
  $new_price_cst=$ft_sel_insr_cost['cost_value'];
  echo standard_money($new_price_cst);
}else{
  echo "<center>-<center>";
}
        ?>
      </td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Ps</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td style="font-weight: bolder;text-align: center;"><?php 
          if (mysql_num_rows($sel_insr_cost)>0) {
                $ft_sel_insr_cost=mysql_fetch_assoc($sel_insr_cost);
                echo standard_money($new_price_cst*$ft_sel_pro['ktout_product_quantity']);
                $cnt_prc=$new_price_cst;
              }else{
                echo standard_money($ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity']);
                $cnt_prc=$ft_sel_prn['product_price'];
              }
      ?></td>
      <td><p style="font-size: 10px;margin-left: -12px"><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?><a href="libs/parts/tkout_details.php?kkdts=<?php echo $tkdtl;?>" target="_blank" id="prourep"> .... </p></a></td>
    </tr>
    <?php
        $ttl_price+=$cnt_prc*$ft_sel_pro['ktout_product_quantity'];

  }
}
 ?>               
              </tbody>             
            </table>             
            <center><big><?php   if (isset($ttl_price)) {
              echo "Total Sold: ".standard_money($ttl_price)." Rfw";
            }else{
              echo "Total Sold: 0 Rfw";
            }
            ?></big></center>
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
?><button class="btn btn-info" style="display: none;float:right;margin-top: -3%;" id="prnt_btn" onclick="prntPdf()"><span class="glyphicon glyphicon-print" style="font-size: 20px"></span>&nbsp&nbspPrint PDF</button>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>  <center> <div class="text-center" style="background-color:#cddbcf;border-radius:20px;width: 70%;" id="footerlg"> <p>&#169 Copyright &#169 2018 Product of SEVEEEN Company...All rights reserved</p> </div></center></small>
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
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript--> 
    <script src="../../bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker-en-CA.js"></script>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/popper/popper.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../js/sb-admin-datatables.min.js"></script>
    <script src="../../libs/datepiker/plugs/js/bootstrap-datepicker.js"></script>
       <script src="../../js/web/index.js"></script>

  </div>
</body>

</html>
<?php
}else{
      header('location:logout.php');

}
}else{
      header('location:logout.php');
}

}
}
}
?>



