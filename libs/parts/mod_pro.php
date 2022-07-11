<?php
require_once("panel/web/igihozo_didier.php");
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

  if (isset($_GET['reii'])) {
    $kt_id=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['reii'])))))))))-2018;
    $sel_nmm=mysql_query("SELECT * FROM bms_products WHERE product_id='$kt_id' AND bms_pr_bus='$all_id'")or die(mysql_error());
    $cnt_sel_nmm=mysql_num_rows($sel_nmm);
      if ($cnt_sel_nmm==1) {
        $ft_sel_nmm=mysql_fetch_assoc($sel_nmm);
        $pr_nm=$ft_sel_nmm['product_name'];
        $prdd_typ=$ft_sel_nmm['product_set_type'];
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Modify Product -- Pharmacy - Stock Management System by SEVEEEN Ltd " />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta property="fb:pages" content="171343222113" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Pharmacy - Stock Management System | Modify Product</title>
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
    <h2>Modify product:  <?php
    echo "<span id='hhdder_crdpymt_prnm'>".$pr_nm."</span>";
    ?>   </h2>
     <a href="../../index.php" id="hme_lgo"><span id="home_glyph"><label for="gyl_home">&nbsp&nbspHome</label><span class="glyphicon glyphicon-home" id="gyl_home"></span></span></a>
   
</div>
     <div class="table-responsive">
       <div id="mnny">
       <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
         <tr>
           <td>
             <table class="table table-bordered">
              <tr>
                <div class="input-group" id="incnt">
                  <td id="mdd">
                    <span class="input-group">
                      <label for="#dtls" id="dtls_lbl">Product in Stock</label>
                      <input type="radio" name="check_mod" class="form-control" id="dtls" checked>
                    </span>
                  </td>
                  <td id="mdc">
                    <span class="input-group">
                      <input type="radio" name="check_mod" class="form-control" id="cmt">
                      <label for="#cmt" id="cmt_lbl">Product Details</label>
                    </span>
                  </td>

                </div>
              </tr>
              <tr>
                <td style="width: 50%">
                  <table id="dv_qntt">
                    <tr>
                      <td>
                        Available Products
                      </td>
                      <td>
<input type="hidden" id="priid" value="<?php echo $kt_id?>">
<input type="hidden" id="prtypp" value="<?php echo $prdd_typ?>">
                        <?php
if ($ft_sel_nmm['product_set_type']=="Unique") {
  $pro_qntt=$ft_sel_nmm['product_quantity'];
?>            
                  <div class="input-group" id="incnt">
                    <input type="text" id="md_qntt_nm" class="form-control" disabled value="<?php echo  $pro_qntt;?>">
                    <span class="input-group-addon" id="glqt"><span class="glyphicon glyphicon-pencil" ></span></span>
                  </div>
                  <input type="hidden" id="prsstt" value="1"><!-- is unique -->
<?php
}else{
  $pr_set_q=$ft_sel_nmm['product_set_quantity'];
        $rndd=floor($ft_sel_nmm['product_quantity']/$ft_sel_nmm['product_set_quantity']);
        $rest=$ft_sel_nmm['product_quantity']-($rndd*$ft_sel_nmm['product_set_quantity']);
        //echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Ps</span>";
?>
                  <div class="input-group" id="incnt">
                    <label id="nnmd">Packs:&nbsp&nbsp</label> <input type="text" id="md_qnt_nm" class="form-control" disabled value="<?php echo  $rndd;?>">
                    <span class="input-group-addon" id="glqt"><span class="glyphicon glyphicon-pencil" ></span></span>
                    <label id="nnmd">Pieces:&nbsp&nbsp</label> <input type="text" id="md_qntt_nm" class="form-control" disabled value="<?php echo  $rest;?>">
                    <span class="input-group-addon" id="glqtt"><span class="glyphicon glyphicon-pencil" ></span></span>
                  </div>
                  <input type="hidden" id="prsstt" value="2"><!-- is Set -->
<?php
}
                        ?>

                      </td>
                    </tr>
               <tr>
                 <td colspan="3"><center>
                   <button class="btn btn-success" id="cont_upd" onclick="upCngPr()"><span class="glyphicon glyphicon-ok"></span> Update</button>
                 </center></td>
               </tr> 
                  </table>
                </td>
                <td style="width: 50%">
                  <table id="dv_dtls">
                     <tr>
                 <td>Product Name: </td>
                 <td>
                  <div class="input-group" id="incnt">
                    <input type="text" id="md_nm_nm" class="form-control" disabled value="<?php echo  $ft_sel_nmm['product_name'];?>">
                    <span class="input-group-addon" id="glnm"><span class="glyphicon glyphicon-pencil" ></span></span>
                  </div>
                 </td>
               </tr>
               <tr>
                 <td>Product Type: </td>
                 <td>
                  <div class="input-group" id="incnt">
                     <select id="md_ty_nm" class="form-control" disabled value="">
                    <option selected><?php echo  $ft_sel_nmm['product_category'];?></option>
                     <option>Drink</option>
                     <option>Food</option>
                     <option>Accessory</option>
                     <option>Others</option>
                   </select>
                    <span class="input-group-addon" id="glty"><span class="glyphicon glyphicon-pencil" ></span></span>
                  </div> 
                 </td>
               </tr>
               <tr>
                 <td>Product Price: </td>
                 <td>
                  <div class="input-group" id="incnt">
                    <input type="number" id="md_pr_nm" class="form-control" disabled value="<?php echo  $ft_sel_nmm['product_price'];?>">
                    <span class="input-group-addon" id="glpr"><span class="glyphicon glyphicon-pencil" ></span></span>
                  </div>                   
                 </td>
               </tr>
<?php
if ($prdd_typ=="Set") {
?>
               <tr>
                 <td>Product Set_Quantity: </td>
                 <td>
                  <div class="input-group" id="incnt">
                    <input type="number" id="md_st_nm" class="form-control" disabled value="<?php echo  $ft_sel_nmm['product_set_quantity'];?>">
                    <span class="input-group-addon" id="glst"><span class="glyphicon glyphicon-pencil" ></span></span>
                  </div>
                 </td>
               </tr> 
<?php
}
?>
               <tr>
                 <td colspan="3"><center>
                   <button class="btn btn-success" id="det_upd" onclick="updDtls()"><span class="glyphicon glyphicon-ok"></span> Update</button>
                 </center></td>
               </tr>         
                  </table>
                </td>
              </tr>    
             </table><span id="resp_uup"></span>
           </td>
           <td></td>
         </tr>
       </table>
<div style="vertical-align: bottom; margin-top: 16%">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="dl_header">
            <h5 class="modal-title" id="exampleModalLabel"><b><span class="glyphicon glyphicon-warning-sign"></span> Make Attetion Here !!</b></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="dl_cont">By deleting product you will <b>lose any data</b> belongs to this product like <b>credits</b>, <b>sold products</b> and <b>products remained in stock</b>.<br>
            Do you still want to delete this product ??
          </div>
          <div class="modal-footer" id="dl_footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="#" onclick="ysDlpr()">Yes, Delete it</a>
          </div>
        </div>
      </div>
    </div>
             <center>
               <button class="btn btn-danger nav-link" id="del_pd_btn" data-toggle="modal" data-target="#exampleModal"><span id="del_pd_btn_gly" class="glyphicon glyphicon-warning-sign"></span> Delete Product</button>
             </center>
</div>
     </div>  
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
      }else{
        echo "<b><h3>Action Failed : ERROR 01 - A Occured. || Please contact Administrator to solve this issue...</h3></b>";
      }
  }else{
    header('location:../../libs/parts/logout.php');
  }
}
}
}
?>
