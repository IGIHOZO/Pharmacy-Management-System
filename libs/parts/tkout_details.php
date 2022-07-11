<?php
require_once("panel/web/igihozo_didier.php");/*!
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

  if (isset($_GET['kkdts'])) {
    $kt_id=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['kkdts'])))))))))-2018;
    $sel_nmm=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_id='$kt_id' AND bms_kt_bus='$all_id'")or die(mysql_error());
    $cnt_sel_nmm=mysql_num_rows($sel_nmm);
    if ($cnt_sel_nmm==1) {
    $cnt_sel_ft=mysql_fetch_assoc($sel_nmm);
    $pppr_iid=$cnt_sel_ft['ktout_product_id'];
    $pprktiid=$cnt_sel_ft['ktout_id'];
    $invid="SVNBMSA".$pprktiid;  //--------------------INVOICE ID
    $se_rr_pr=mysql_query("SELECT * FROM bms_products WHERE product_id='$pppr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
    $nm_se_rr_pr=mysql_num_rows($se_rr_pr);
    if ($nm_se_rr_pr==1) {
    $ft_se_rr_pr=mysql_fetch_assoc($se_rr_pr);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Details-take-out -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Details-take-out</title>
  <link rel="shortcut icon" href="imgs/bms.png">
  <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/datepicker.css">
  <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/datepicker-costom.css">

  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/bootstrap/glyphicon/css/bootstrap.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <div class="container-fluid">
    
  </div>
  <div class="card-body">
    <div class="text-center" id="hhdder_crdpymt">
    <a  href="../../index.php" style="float: left;color: white"><span"><label>Pharmacy - Stock Management System</label></span></a>
    <h2>Receipt for  <?php
    echo "<span id='hhdder_crdpymt_prnm'>".$ft_se_rr_pr['product_name']."</span>";
    ?>   </h2>
     <a href="../../index.php" id="hme_lgo"><span id="home_glyph"><label for="gyl_home">&nbsp&nbspHome</label><span class="glyphicon glyphicon-home" id="gyl_home"></span></span></a>
   
</div>
     <div class="table-responsive" id="dfsd">
       <div id="mnny">
       <table class="table"  id="dataTable" width="100%" cellspacing="0" style="border: 0px transparent solid">
         <tr>
           <td>
<table id="ivctbl" align="center">
  <tr>
    <td colspan="2" id="ttlinvfr"><?php echo "Receipt From<span id='ffrcmp'> ".$all_flnm."</span>"?></td>
  </tr>
  <tr>
    <td>
      Date:
    </td>
    <td>
      <?php echo $cnt_sel_ft['ktout_date'];?>
    </td>
  </tr>
    <tr style="font-weight: bold">
    <td>
      Receipt Id:
    </td>
    <td>
      <?php echo $invid;?><br>
    </td>
  </tr>
<tr>
  <td colspan="2">
    <center>*********************************************************</center>
  </td>
</tr>
  <tr>
    <td>
      Product Name:
    </td>
    <td>
      <?php echo $ft_se_rr_pr['product_name'];?>
    </td>
  </tr> 
    <tr>
    <td>
      Price per unit:
    </td>
    <td>
      <?php echo standard_money($ft_se_rr_pr['product_price'])." Rwf";?>
    </td>
  </tr> 
<tr>
  <td>
    Pieces:
  </td>
  <td>
    <?php
if ($ft_se_rr_pr['product_set_type']=="Set") {
  echo $ft_se_rr_pr['product_set_quantity'];
}else{
  echo 1;
}
    ?>
  </td>
</tr>
    <tr>
    <td>
      Quantity:
    </td>
    <td>
        <?php

       if ($ft_se_rr_pr['product_set_type']=="Set"){ 
        $rndd=floor($cnt_sel_ft['ktout_product_quantity']/$ft_se_rr_pr['product_set_quantity']);
        $rest=$cnt_sel_ft['ktout_product_quantity']-($rndd*$ft_se_rr_pr['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span>&nbsp;-&nbsp;".$rest." ps</span>";
      }else{
        echo"<span class='pr_qq'>". $cnt_sel_ft['ktout_product_quantity']."</span>";
        }
        ?>
    </td>
  </tr>
    <tr style="font-weight: bolder;text-decoration: underline;">
    <td>
      Total price:
    </td>
    <td>
      <?php echo standard_money($ft_se_rr_pr['product_price']*$cnt_sel_ft['ktout_product_quantity'])." Rwf";?>
    </td>
  </tr>
<tr style="margin-top: -100px">
  <td colspan="2">
      <center style="font-size: 12px">
        <label>***Thank you, for shopping with us.***</label>
      </center>
    <center>*********************************************************</center>
  </td>
</tr>
<tr>
  <td colspan="2" id="prddstt"> &nbsp; Powered by Stock-Management-System &nbsp;*&nbsp;&#169;&nbsp;SEVEEEN Ltd</td>
</tr>
</table>
           </td>
           <td></td>
         </tr>
         <tr>
           <td style=" max-height:50px">
<button class="btn btn-info" style=" float: right;" id="prnt_btn_crt" onclick="prntPdfCrtInvc()"><span class="glyphicon glyphicon-print" style="font-size: 20px"></span>&nbsp&nbspPrint PDF</button>
           </td>
         </tr>
       </table></div>  
<small> <center> <div class="text-center" style="background-color:#cddbcf;border-radius:20px;width: 70%;height: 50px" id="footerlg"> <p>&#169 Copyright &#169 2018 Product of SEVEEEN Company...All rights reserved</p> </div></center></small>     
    </div>
  </div>
</body>
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
        <script src="../../../js/jquery.js"></script>
    <script src="../../js/web/index.js"></script>

  </div>
</body>

</html>

  <?php
    }else if ($nm_se_rr_pr<1) {
echo "<center><h1> ERROR RESPONDING : <h3> Products duplication found...</h3> </h1></center>";

    }else{
echo "<center><h1> ERROR RESPONDING : <h3> No products matching...</h3> </h1></center>";
    }

    }else{
echo "<center><h1> ERROR RESPONDING : <h3> Unvailable Stock take-out identifitation...</h3> </h1></center>";
    }

  }else{
    header('location:../../libs/parts/logout.php');
  }
}
}
}
?>
