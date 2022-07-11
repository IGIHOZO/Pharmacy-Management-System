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

  if (isset($_GET['ttsd']) && isset($_GET['spsub']) && isset($_GET['rrte']) && isset($_GET['sbd']) && isset($_GET['spfrm']) && isset($_GET['sptoo'])) {
    $sprttl=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['ttsd'])))))))));
    $sprsub=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['spsub'])))))))));
    $sprsbd=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['sbd'])))))))))-2018;
    $sprrrt=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['rrte'])))))))));
    $spfrom=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['spfrm'])))))))));
    $sptoo=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['sptoo'])))))))));
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Invoice-Sub company -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Invoice-Sub company</title>
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

<body>
       <div id="mnny">
       <table class="table"  id="dataTable" width="100%" cellspacing="0" style="border: 0px transparent solid">
         <tr>
           <td>
<table id="ivctbl" align="center">
  <tr>
    <td colspan="2" id="ttlinvfr"><?php echo "Invoice From<span id='ffrcmp'> ".$all_flnm."</span>"?></td>
  </tr>
  <tr>
    <td>
      Date:
    </td>
    <td>
      <?php echo date("D, d-M-Y H:i:s");?>
    </td>
  </tr>
  <tr>
    <td>
      Recipient:
    </td>
    <td>
      <?php echo "<span style='font-family:Baskerville Old Face;font-weight:bolder'>".$sprsub."</span>";?>
    </td>
  </tr> 
    <tr style="font-weight: bold">
    <td>
      Invoice Id:
    </td>
    <td>
      <?php echo "SVNBMSU".date("Hs")."".$all_id."".date("i")."".$sprsbd?><br>
    </td>
  </tr>
<tr>
  <td colspan="2">
    <center>*********************************************************</center>
  </td>
</tr>
<tr>
  <td>
    Rate: &nbsp;
  </td>
  <td>
    <?php
    echo "<u><b>".$sprrrt."% </b></u>";
    ?>
  </td>
</tr>
<tr>
  <td>
    Period: &nbsp;
  </td>
  <td>
    <?php
  //$fsoursee=$spr_frm;
  $rg_fdate=new DateTime($spfrom);
  $rg_tdate=new DateTime($sptoo);
  $rg_ssfrm=$rg_fdate->format("d/M/Y    H:i:s");
  $rg_ssto=$rg_tdate->format("d/M/Y    H:i:s");
    //echo substr($spfrom, 0,10)."&nbsp;&nbsp; <----->&nbsp;&nbsp; ".substr($sptoo, 0,10)."<br>";
    echo substr($rg_ssfrm, 0,14)."&nbsp;&nbsp; ------ &nbsp;&nbsp; ".substr($rg_ssto, 0,14);
    ?>
  </td>
</tr> 
<tr>
  <td>
    Total sold:
  </td>
  <td>
    <?php
    echo standard_money($sprttl)."<span style='font-size:11px'> Rwf</span>";
    ?>
  </td>
</tr>
  <tr style="font-weight: bolder;font-style: italic;font-size: 20px">
    <td>
      Amount Earned:
    </td>
    <td>
      <?php echo standard_money(round($sprttl*$sprrrt/100))."<span style='font-size:11px'> Rwf</span>";?>
    </td>
  </tr>

<tr style="margin-top: -100px">
  <td colspan="2">
      <center style="font-size: 12px">
        <label>***Thank you, for partnering  with us.***</label>
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
            <table  style=" float: right;">
              <tr>
                <td>
<button class="btn btn-info" id="prnt_btn_crt" onclick="prntPdfCrtInvc()"><span class="glyphicon glyphicon-print" style="font-size: 20px"></span>&nbsp&nbspPrint PDF</button>
                </td>
                <td>
<?php
$pg_ref="../../sprinvoice.php";
?>
<input type="hidden" id="pg_ref" value="<?php echo $pg_ref;?>">
<button class="btn btn-success" style=" float: right;" id="dwn_btn_crt" onclick="pdwnPdfCrtInvc()"><span class="glyphicon glyphicon-print" style="font-size: 20px"></span>&nbsp&nbspDownload PDF</button>
                </td>
              </tr>
            </table>

    
           </td>
         </tr>
       </table></div> 
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


  }else{
    header('location:../../libs/parts/logout.php');
  }
}
}
}
?>
