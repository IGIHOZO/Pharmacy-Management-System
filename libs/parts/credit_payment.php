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

  if (isset($_GET['dreid'])) {
    $kt_id=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['dreid'])))))))))-2008;
    $sel_nmm=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_id='$kt_id' AND bms_kt_bus='$all_id'")or die(mysql_error());
    $cnt_sel_nmm=mysql_num_rows($sel_nmm);
    if ($cnt_sel_nmm==1) {
    $cnt_sel_ft=mysql_fetch_assoc($sel_nmm);
    $pppr_iid=$cnt_sel_ft['ktout_product_id'];
    $se_rr_pr=mysql_query("SELECT * FROM bms_products WHERE product_id='$pppr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
    $nm_se_rr_pr=mysql_num_rows($se_rr_pr);
    if ($nm_se_rr_pr==1) {
    $ft_se_rr_pr=mysql_fetch_assoc($se_rr_pr);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Credit Payment -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Credit Payment</title>
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
    <h2>Credit payment for  <?php
    echo "<span id='hhdder_crdpymt_prnm'>".$ft_se_rr_pr['product_name']."</span>";
    ?>   </h2>
     <a href="../../index.php" id="hme_lgo"><span id="home_glyph"><label for="gyl_home">&nbsp&nbspHome</label><span class="glyphicon glyphicon-home" id="gyl_home"></span></span></a>
   
</div>
     <div class="table-responsive">
       <div id="mnny">
       <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
         <tr>
           <td>
             <table class="table table-bordered">
               <tr style='font-weight:bold;text-decoration:underline;font-size: 20px;text-transform: uppercase;color: #033f2c;'>
                 <td>Creditor: </td>
                 <td><?php echo $cnt_sel_ft['product_creditor'];?></td>
               </tr>
               <tr>
                 <td>Product Name: </td>
                 <td><?php echo $ft_se_rr_pr['product_name']?></td>
               </tr>
               <tr>
                 <td>Product Type: </td>
                 <td><?php echo $ft_se_rr_pr['product_category']?></td>
               </tr> 
               <tr>
                 <td>Credit Cost: </td>
                 <td><?php echo standard_money($ft_se_rr_pr['product_price']*$cnt_sel_ft['ktout_product_quantity'])."<span style='font-size:12px;font-weight:lighter'>.00</span>";?></td>
               </tr> 
               <tr>
                 <td><b><u>Credit Paid:</u></b> </td>
                 <td><?php echo "<span id='prpyd'>".standard_money($cnt_sel_ft['ktout_product_payed'])."<span style='font-size:12px;font-weight:lighter'>.00</span></span>";?></td>
               </tr> 
               <tr  style='color:#b7063c'>
                 <td><b><u>Remaining credit:</u></b> </td><?php $rer=($ft_se_rr_pr['product_price']*$cnt_sel_ft['ktout_product_quantity'])-$cnt_sel_ft['ktout_product_payed']?>
                 <td><?php echo ("<span id='prpyd'>".standard_money($rer)."<span style='font-size:12px;font-weight:lighter'>.00</span></span>");?></td>
               </tr>  
               <tr>
                 <td>Date Credited: </td>
                 <td><?php echo substr($cnt_sel_ft['ktout_date'], 8,2)."/".substr($cnt_sel_ft['ktout_date'], 5,2)."/".substr($cnt_sel_ft['ktout_date'], 0,4)."-".substr($cnt_sel_ft['ktout_date'], 11,5);?></td>
               </tr>            
             </table>
           </td>
           <td></td>
         </tr>
         <tr>
           <td style=" max-height:50px">
             <table class="table table-bordered" style="max-width: 100%; max-height:50px" id="scndtbl">
               <thead>
                <p style="text-align: center; margin-left: -50%" id="pmtf">Payment form</p>
               </thead>
               <tbody>
                 <tr style=" max-height:50px">
                   <td>Payed Value: </td>
                   <td><div>
                   <input type="number" class="form-control" id="credit_amnt" style="position: relative;"><br>
                   <?php $kt_id=$crd_id=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($kt_id+2008)))))))));?>
                   <a href="credit_payment.php?dreid=<?php echo $kt_id;?>" id="rld_btn">Reload...</a>
                   <input type="hidden" id="rdt_nm" value="<?php echo $ft_se_rr_pr['product_name']?>">
                   <input type="hidden" id="rdt_dt" value="<?php echo $cnt_sel_ft['ktout_date']?>">
                   <input type="hidden" id="rdt_qntt" value="<?php echo $cnt_sel_ft['ktout_product_quantity']?>">
                   <input type="hidden" id="rdt_pyd" value="<?php echo $cnt_sel_ft['ktout_product_payed']?>">
                   </div></td>
                   <td><button class="btn btn-primary" onclick="payCrdt()"><span class="glyphicon glyphicon-saved"></span>&nbsp&nbsp Pay</button></td>
                   <td style="width: 60%"><span id="resp_pmt"></span></td>
                 </tr>
               </tbody>
             </table><button class="btn btn-info" style=" float: right;" id="prnt_btn_crt" onclick="prntPdfCrt()"><span class="glyphicon glyphicon-print" style="font-size: 20px"></span>&nbsp&nbspPrint PDF</button>
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
echo "<center><h1> ERROR RESPONDING : <h3> Products dublication found...</h3> </h1></center>";

    }else{
echo "<center><h1> ERROR RESPONDING : <h3> No products mathing...</h3> </h1></center>";
    }

    }else{
echo "<center><h1> ERROR RESPONDING : <h3> Unvailable credit identifitation...</h3> </h1></center>";
    }

  }else{
    header('location:../../libs/parts/logout.php');
  }
}
}
}
?>
