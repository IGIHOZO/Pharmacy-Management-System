<?php
require_once("../../libs/parts/panel/web/igihozo_didier.php");
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
	@$all_flnm=$_SESSION['svn_bms_usrnm'];
$se_all_id=mysql_query("SELECT * FROM bms_users WHERE bms_usr_full_name='$all_flnm'");
$cnt_se_all_id=mysql_num_rows($se_all_id);
if ($cnt_se_all_id>1) {
 echo "<h1 style='color:red'><center>Something went wrong... ||  Please contact your administrator</center></h1>";
}else{
  $reg_date=date("Y-m-d H:i:s.00000");
  $ft_cnt_se_all_id=mysql_fetch_assoc($se_all_id);
  $all_id=$ft_cnt_se_all_id['user_id'];
	//$sub_user_id=$_SESSION['svn_bms_sub_id'];
if (isset($_SESSION['svn_bms_sub_id'])) {
	$sub_key=$_SESSION['svn_bms_sub_id'];
}else{
	$sub_key=0;
}

//----------------------------------------------------------------------------------------login---------------------------------------
if (isset($_GET['loog'])) {
	$usr=mysql_real_escape_string(stripcslashes($_GET['user']));
	$ups=mysql_real_escape_string(stripcslashes($_GET['pass']));
	$selc=mysql_query("SELECT * FROM bms_users WHERE user_name='$usr' AND user_pass='$ups'AND (user_status='E' OR user_status='A' OR user_status='Spr')")or die("<center><h2><font color='red'>".mysql_error()."</font></h2></center>");
	$cnt_selc=mysql_num_rows($selc);
	if ($cnt_selc!=1) {
		print_r("<span id='respf'>Wrong Username or Password</span>");
	}else{
$fetc=mysql_fetch_assoc($selc);
$_SESSION['svn_bms_usrnm']=$fetc['bms_usr_full_name'];
$_SESSION['svn_bms_sub_id']=0;
if ($fetc['user_status']=="Spr") {
	$_SESSION['svn_bms_Spr']=$fetc['user_status'];
	$_SESSION['svn_bms_spr_rate']=10;
}
?>
<script type="text/javascript">
	window.location="index.php";
</script>
<?php
	}
}
//--------------------------------------------------------------REW PRODUCT----------------------------------------------------------

if (isset($_GET['prNm'])) {
	$prmn=mysql_real_escape_string(stripcslashes($_GET['prNm']));
	$prtype=mysql_real_escape_string(stripcslashes($_GET['prStTp']));
	$prcategry=mysql_real_escape_string(stripcslashes($_GET['prCtgr']));
	$pruntprice=mysql_real_escape_string(stripcslashes($_GET['prUnPrc']));
	$prnmbrone=mysql_real_escape_string(stripcslashes($_GET['setNmOne']));
	$reg_date=date("Y-m-d H:i:s.00000");
	$status="E";
if ($prtype=="Set") {
	if ($prmn=="" || $prtype=="" || $prcategry=="" || $pruntprice=="" || $prnmbrone=="") {
		echo "<h5>Please Fill All Fields...</h5>";
	}else{
		$chch_if_is_arld=mysql_query("SELECT * FROM bms_products WHERE product_name ='$prmn' AND bms_pr_bus='$all_id'");
		$cnt_chch_if_is_arld=mysql_num_rows($chch_if_is_arld);
		if ($cnt_chch_if_is_arld==0) {
		$regstr=mysql_query("INSERT INTO bms_products VALUES('','$prmn','$prtype','$prcategry','$pruntprice','','$prnmbrone','$status','$all_id','$sub_key','$reg_date')");
		if ($regstr) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Registered  successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,3000);

			$("#protName,#protType,#protCategry,#proUnPrice,#set_qnt").val("");
	</script>
			<?php
		}else{
			echo "registration Failed";
		}
		}else{
			echo "<h5>Products already exists...";
		}

	}
}else{
	if ($prmn=="" || $prtype=="" || $prcategry=="" || $pruntprice=="") {
		echo "<h5>Please Fill All Fields...</h5>";
	}else{
		$regstr=mysql_query("INSERT INTO bms_products VALUES('','$prmn','$prtype','$prcategry','$pruntprice','','$prnmbrone','$status','$all_id','$sub_key','$reg_date')");
		if ($regstr) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Registered  successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,3000);

			$("#protName,#protType,#protCategry,#proUnPrice,#set_qnt").val("");
	</script>
			<?php
		}else{
			echo "registration Failed";
		}
	}
}

}
//--------------------------------------------ADD IN STOCK---------------------------------------------------

if (isset($_GET['AdPrNm'])) {
	$add_prmn=mysql_real_escape_string(stripcslashes($_GET['AdPrNm']));
	$add_prQntty=mysql_real_escape_string(stripcslashes($_GET['prQntty']));
	$sell_cpp=mysql_query("SELECT * FROM bms_products WHERE product_id='$add_prmn' AND bms_pr_bus='$all_id'");
	$cnnt_sell_cpp=mysql_num_rows($sell_cpp);
	if ($cnnt_sell_cpp>0) {
		$ft_sell_cpp=mysql_fetch_assoc($sell_cpp);
if ($ft_sell_cpp['product_set_type']=="Set") {
		$new_vvl=$ft_sell_cpp['product_set_quantity']*$add_prQntty;
		$ttl_now_in_stk=$ft_sell_cpp['product_quantity']+$new_vvl;
	
	$reg_date=date("Y-m-d H:i:s.00000");
	$upd_pr=mysql_query("UPDATE bms_products SET product_quantity='$ttl_now_in_stk',re_date='$reg_date' WHERE product_id='$add_prmn' AND bms_pr_bus='$all_id'")or die(mysql_error());
	if ($upd_pr) {
		echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Product Added  successfully</span>";
		?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#seprotPrice").val("");
</script>
		<?php
	}
}else{
		$sell_cpp=mysql_query("SELECT * FROM bms_products WHERE product_id='$add_prmn' AND bms_pr_bus='$all_id'");
		$cnnt_sell_cpp=mysql_num_rows($sell_cpp);
		$ft_sell_cpp=mysql_fetch_assoc($sell_cpp);
		$ttl_now_in_stk=$ft_sell_cpp['product_quantity']+$add_prQntty;

		if ($cnnt_sell_cpp>0) {
	$reg_date=date("Y-m-d H:i:s.00000");
	$upd_pr=mysql_query("UPDATE bms_products SET product_quantity='$ttl_now_in_stk',re_date='$reg_date' WHERE product_id='$add_prmn' AND bms_pr_bus='$all_id'")or die(mysql_error());
	if ($upd_pr) {
		echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Product Added  successfully</span>";
		?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#seprotPrice").val("");
</script>
		<?php
	}
		}
	

	}
}
}
//------------------------------------------------------TAKEOUT OF STOCK---------------------------------------
if (isset($_GET['tkout'])) {
	$pr_nm=mysql_real_escape_string(stripcslashes($_GET['prname']));
	$pr_sttp=mysql_real_escape_string(stripcslashes($_GET['prsttp']));
	$pr_qntt=mysql_real_escape_string(stripcslashes($_GET['prqnt']));
	$sel_set=mysql_query("SELECT * FROM bms_products WHERE product_name='$pr_nm' AND bms_pr_bus='$all_id'");
	$ftt_sel_set=mysql_fetch_assoc($sel_set);
	$pr_iid=$ftt_sel_set['product_id'];
	$pr_price=$ftt_sel_set['product_price'];
	$pr_stts="out";
	$tkout_date=date("Y-m-d H:i:s.00000");

	$cnt_sel_set=mysql_num_rows($sel_set);
	if ($cnt_sel_set==1) {
		if ($pr_sttp=="Set" AND $ftt_sel_set['product_set_type']=="Set") {
			$qntt_qnt=$ftt_sel_set['product_quantity'];
			$set_qntt=$ftt_sel_set['product_set_quantity'];
			$pro_new_val=$pr_qntt*$set_qntt;
			$nwe_updd_vl=$qntt_qnt-$pro_new_val;
			if ($pro_new_val<=$qntt_qnt) {
				$in_proo=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$pro_new_val','$pr_price','','','$pr_stts','$all_id','$sub_key','$tkout_date')")or die(mysql_error());
				$upd_pro=mysql_query("UPDATE bms_products SET product_quantity='$nwe_updd_vl',re_date='$tkout_date'WHERE product_id='$pr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
				if ($in_proo AND $upd_pro) {
					echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Action completed successfully...</span>";
							?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
				}else{
					echo "<center><h1>Take out-action FAILED 444 ...</h1></center>";
				}
			}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php

			}
		}else if ($pr_sttp=="Set" AND $ftt_sel_set['product_set_type']!="Set") {
			echo "This product is UNIQUE Type";
		}else if ($pr_sttp!="Set" AND $ftt_sel_set['product_set_type']=="Set") {
			$qntt_qnt=$ftt_sel_set['product_quantity'];
			$set_qntt=$ftt_sel_set['product_set_quantity'];
			$pro_new_val=$pr_qntt;
			$nwe_updd_vl=$qntt_qnt-$pro_new_val;
			if ($pro_new_val<=$qntt_qnt) {
				$in_proo=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$pro_new_val','$pr_price','','','$pr_stts','$all_id','$sub_key','$tkout_date')")or die(mysql_error());
				$upd_pro=mysql_query("UPDATE bms_products SET product_quantity='$nwe_updd_vl',re_date='$tkout_date'WHERE product_id='$pr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
				if ($in_proo AND $upd_pro) {
					echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Action completed successfully...</span>";
							?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
				}else{
					echo "<center><h1>Take out-action FAILED 66...</h1></center>";
				}
			}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr,#prcrownr").val("");
</script>
		<?php

			}
		}else{
			$qntt_qnt=$ftt_sel_set['product_quantity'];
			$set_qntt=$ftt_sel_set['product_set_quantity'];
			$pro_new_val=$pr_qntt;
			$nwe_updd_vl=$qntt_qnt-$pro_new_val;
			if ($pro_new_val<=$qntt_qnt) {
				$in_proo=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$pro_new_val','$pr_price','','','$pr_stts','$all_id','$sub_key','$tkout_date')")or die(mysql_error());
				$upd_pro=mysql_query("UPDATE bms_products SET product_quantity='$nwe_updd_vl',re_date='$tkout_date'WHERE product_id='$pr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
				if ($in_proo AND $upd_pro) {
					echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Action completed successfully...</span>";
							?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
				}else{
					echo "<center><h1>Take out-action FAILED 88...</h1></center>";
				}
			}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php

			}
		}
	}else{
			$sel_set_pp=mysql_query("SELECT * FROM bms_products WHERE product_name='$pr_nm' AND bms_pr_bus='$all_id'");
			$ft_sel_set=mysql_fetch_assoc($sel_set_pp);
			$pr_iid=$ft_sel_set['product_id'];
			$pr_pricee=$ft_sel_set['product_price'];
			$pr_sstts="out";
			$pr_ddate=$exp_date=date("Y-m-d H:i:s.00000");
			$ft_nm=$ft_sel_set['product_name'];
			$ft_stt=$ft_sel_set['product_set_type'];
			$ft_sttqntt=$ft_sel_set['product_set_quantity'];
			$ft_sttav_qtt=$ft_sel_set['product_quantity'];


if ($ft_sel_set['product_quantity']>0) {
			$iinqtt=$pr_qntt;                //intered number
			@$t_pr_ttl_qnt=$iinqtt/$ft_sttqntt;    // entered number as case
			@$t_pr_ttl_frdt=$iinqtt/$ft_sttav_qtt;    // total cases from inputed number
			$av_ttl=$ft_sttav_qtt*$ft_sttqntt;   // all availble but not set
			$nw_qntt=$ft_sttav_qtt-$t_pr_ttl_qnt;    //  new quantity
		if ($ft_stt=="Set") {
	if ($ft_sttqntt>=$t_pr_ttl_frdt) {

		
	//--------------inserting in takeout table
		$in_tkout=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$t_pr_ttl_qnt','$pr_pricee','','','$pr_sstts','$all_id','$sub_key','$pr_ddate')")or die(mysql_error());
		$new_pr_qty=$ftt_sel_set['product_quantity']-$pr_qntt;
	//----------------Update in product table
		$upd_pr=mysql_query("UPDATE bms_products SET product_quantity='$nw_qntt'WHERE product_name='$pr_nm' AND pro_status='E' AND product_set_type='$ft_stt' AND bms_pr_bus='$all_id'");
		if ($upd_pr && $in_tkout) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Out-taken successfully</span>";
		?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
		}else{
			echo "<span id='ressc'><H1>FAILED</H1></span>";
					?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
		}
	}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
	}
		
	}else{
		echo "This product is a UNIQUE type";
	}
}else{
	echo "<span id='ressc'>This product has been ended...</span>";
			?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
	}
}
}

//--------------------------------------------------------TAKEOUT CREDITS------------------------------------------

if (isset($_GET['tktcrdt'])) {
	$creditor=mysql_real_escape_string(stripcslashes($_GET['prcreditor']));
	$pr_nm=mysql_real_escape_string(stripcslashes($_GET['prname']));
	$pr_sttp=mysql_real_escape_string(stripcslashes($_GET['prsttp']));
	$pr_qntt=mysql_real_escape_string(stripcslashes($_GET['prqnt']));
	$sel_set=mysql_query("SELECT * FROM bms_products WHERE product_name='$pr_nm' AND bms_pr_bus='$all_id'");
	$ftt_sel_set=mysql_fetch_assoc($sel_set);
	$pr_iid=$ftt_sel_set['product_id'];
	$pr_price=$ftt_sel_set['product_price'];
	$pr_stts="credit";
	$tkout_date=date("Y-m-d H:i:s.00000");

	$cnt_sel_set=mysql_num_rows($sel_set);
	if ($cnt_sel_set==1) {
		if ($pr_sttp=="Set" AND $ftt_sel_set['product_set_type']=="Set") {
			$qntt_qnt=$ftt_sel_set['product_quantity'];
			$set_qntt=$ftt_sel_set['product_set_quantity'];
			$pro_new_val=$pr_qntt*$set_qntt;
			$nwe_updd_vl=$qntt_qnt-$pro_new_val;
			if ($pro_new_val<=$qntt_qnt) {
				$in_proo=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$pro_new_val','$pr_price','','$creditor','$pr_stts','$all_id','$sub_key','$tkout_date')")or die(mysql_error());
				$upd_pro=mysql_query("UPDATE bms_products SET product_quantity='$nwe_updd_vl',re_date='$tkout_date'WHERE product_id='$pr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
				if ($in_proo AND $upd_pro) {
					echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Action completed successfully...</span>";
							?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
				}else{
					echo "<center><h1>Take out-action FAILED 222 ...</h1></center>";
				}
			}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php

			}
		}else if ($pr_sttp=="Set" AND $ftt_sel_set['product_set_type']!="Set") {
			echo "This product is UNIQUE Type";
		}else if ($pr_sttp!="Set" AND $ftt_sel_set['product_set_type']=="Set") {
			$qntt_qnt=$ftt_sel_set['product_quantity'];
			$set_qntt=$ftt_sel_set['product_set_quantity'];
			$pro_new_val=$pr_qntt;
			$nwe_updd_vl=$qntt_qnt-$pro_new_val;
			if ($pro_new_val<=$qntt_qnt) {
				$in_proo=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$pro_new_val','$pr_price','','$creditor','$pr_stts','$all_id','$sub_key','$tkout_date')")or die(mysql_error());
				$upd_pro=mysql_query("UPDATE bms_products SET product_quantity='$nwe_updd_vl',re_date='$tkout_date'WHERE product_id='$pr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
				if ($in_proo AND $upd_pro) {
					echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Action completed successfully...</span>";
							?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
				}else{
					echo "<center><h1>Take out-action FAILED 333 ...</h1></center>";
				}
			}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php

			}
		}else{
			$qntt_qnt=$ftt_sel_set['product_quantity'];
			$set_qntt=$ftt_sel_set['product_set_quantity'];
			$pro_new_val=$pr_qntt;
			$nwe_updd_vl=$qntt_qnt-$pro_new_val;
			if ($pro_new_val<=$qntt_qnt) {
				$in_proo=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$pro_new_val','$pr_price','','$creditor','$pr_stts','$all_id','$sub_key','$tkout_date')")or die(mysql_error());
				$upd_pro=mysql_query("UPDATE bms_products SET product_quantity='$nwe_updd_vl',re_date='$tkout_date'WHERE product_id='$pr_iid' AND bms_pr_bus='$all_id'")or die(mysql_error());
				if ($in_proo AND $upd_pro) {
					echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Action completed successfully...</span>";
							?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
				}else{
					echo "<center><h1>Take out-action FAILED 11 ...</h1></center>";
				}
			}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php

			}
		}
	}else{
			$sel_set_pp=mysql_query("SELECT * FROM bms_products WHERE product_name='$pr_nm' AND bms_pr_bus='$all_id'");
			$creditor=mysql_real_escape_string(stripcslashes($_GET['prcreditor']));
			$ft_sel_set=mysql_fetch_assoc($sel_set_pp);
			$pr_iid=$ft_sel_set['product_id'];
			$pr_pricee=$ft_sel_set['product_price'];
			$pr_sstts="credit";
			$pr_ddate=$exp_date=date("Y-m-d H:i:s.00000");
			$ft_nm=$ft_sel_set['product_name'];
			$ft_stt=$ft_sel_set['product_set_type'];
			$ft_sttqntt=$ft_sel_set['product_set_quantity'];
			$ft_sttav_qtt=$ft_sel_set['product_quantity'];


if ($ft_sel_set['product_quantity']>0) {
			$iinqtt=$pr_qntt;                //intered number
			@$t_pr_ttl_qnt=$iinqtt/$ft_sttqntt;    // entered number as case
			@$t_pr_ttl_frdt=$iinqtt/$ft_sttav_qtt;    // total cases from inputed number
			$av_ttl=$ft_sttav_qtt*$ft_sttqntt;   // all availble but not set
			$nw_qntt=$ft_sttav_qtt-$t_pr_ttl_qnt;    //  new quantity
		if ($ft_stt=="Set") {
	if ($ft_sttqntt>=$t_pr_ttl_frdt) {

		
	//--------------inserting in takeout table
		$in_tkout=mysql_query("INSERT INTO bms_product_take_out VALUES('','$pr_iid','$t_pr_ttl_qnt','$pr_pricee','','$creditor','$pr_sstts','$all_id','$sub_key','$pr_ddate')")or die(mysql_error());
		$new_pr_qty=$ftt_sel_set['product_quantity']-$pr_qntt;
	//----------------Update in product table
		$upd_pr=mysql_query("UPDATE bms_products SET product_quantity='$nw_qntt'WHERE product_name='$pr_nm' AND pro_status='E' AND product_set_type='$ft_stt' AND bms_pr_bus='$all_id'");
		if ($upd_pr && $in_tkout) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Out-taken successfully</span>";
		?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
		}else{
			echo "<span id='ressc'><H1>FAILED</H1></span>";
					?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
		}
	}else{
		echo "<span id='ressc'>Products available are less than requested ones</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
	}
		
	}else{
		echo "This product is a UNIQUE type";
	}
}else{
	echo "<span id='ressc'>This product has been ended...</span>";
			?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
	}
}
}


//----------------------------------------------------------EXPENSES TAKEN----------------------------------
if (isset($_GET['expenss'])) {
	$exp_rsn=mysql_real_escape_string(stripcslashes($_GET['expresn']));
	$exp_prc=mysql_real_escape_string(stripcslashes($_GET['expprc']));
	$exp_status="Exp";
	$exp_date=date("Y-m-d H:i:s.00000");
	$in_exp=mysql_query("INSERT INTO bms_expenses VALUES('','$exp_rsn','$exp_prc','$exp_status','$all_id','$sub_key','$exp_date')")or die(mysql_error());
	if ($in_exp) {
		echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Expense recorded successfully</span>";
		?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#expreasn,#expprice").val("");
</script>
		<?php
	}else{
		echo "<span id='ressc'>Failed to record...</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#prnmm,#prstty,#prqntt,#prcrownr").val("");
</script>
		<?php
	}
}

//-----------------------------------------------CLICKING PAY CREDIT BUTTON---------------
if (isset($_GET['crepyst'])) {
	$payed_nmbr=$_GET['creAmnt'];
	$payed_pr_mn=$_GET['crdprNm'];
	$payed_pr_dt=$_GET['crdprDt'];
	$payed_pr_qntt=$_GET['crdprQntt'];
	$payed_pr_pyd=$_GET['crdprPyd'];
	$payed_pr_new_payed=$payed_pr_pyd+$payed_nmbr;
if ($payed_nmbr!="") {
	$ft_ssssell=mysql_fetch_assoc(mysql_query("SELECT * FROM bms_products WHERE product_name='$payed_pr_mn' AND bms_pr_bus='$all_id'"));
	$proo_iid=$ft_ssssell['product_id'];
	$upd_crd_py=mysql_query("UPDATE bms_product_take_out SET ktout_product_payed='$payed_pr_new_payed' WHERE ktout_product_id='$proo_iid' AND ktout_date='$payed_pr_dt' AND bms_kt_bus='$all_id'")or die(mysql_error());
	if ($upd_crd_py) {
		echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Payed successfully...</span>";
				?>

<script type="text/javascript">
		function hhidef(){
			$("#ressc").hide();
		}
	window.setTimeout(hhidef,3000);

		$("#credit_amnt").val("");
</script>
		<?php
	}
}else{
		echo "<h5 style='color:red'>Please Fill paid Value...</h5>";
	}
}


//--------------------------------------------------------
if (isset($_GET['cltkbtn'])) {
?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Unit price</th>
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
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    ?>
    <tr>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_category']?></td>
      <td><?php echo $ft_sel_prn['product_price']?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Ps</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo $ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?></td>
    </tr>
    <?php
        $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];

  }
}
 ?>               
              </tbody>
            </table>
<?php
}

//-------------------------------------------------------------------------------------------------------------CHANGING PASSSWORD-------
if (isset($_GET['cngpss'])) {
	$crnt_pss=mysql_real_escape_string(stripcslashes($_GET['crPss']));
	$new_pss=mysql_real_escape_string(stripcslashes($_GET['nwPss']));
	$comf_pss=mysql_real_escape_string(stripcslashes($_GET['cmfPss']));
	$usr_nm=$_SESSION['svn_bms_usrnm'];
if (isset($_SESSION['svn_bms_usrnm_sub'])) {
	$usr_nm_sub=$_SESSION['svn_bms_usrnm_sub'];
	$sel=mysql_query("SELECT * FROM bms_sub_users WHERE sub_full_name='$usr_nm_sub'");
	$ftt=mysql_fetch_assoc($sel);
	$cnt_sel=mysql_num_rows($sel);
	if ($cnt_sel==1) {
		$usrr_nnm=$ftt['sub_user_name'];
		$np_lng=strlen($new_pss);
		$usrr_pss=$ftt['sub_password'];
		if ($crnt_pss==$usrr_pss) {
			if ($np_lng>7) {
				if ($np_lng<37) {
						$updt_pss=mysql_query("UPDATE bms_sub_users SET sub_password='$new_pss' WHERE sub_full_name='$usr_nm_sub' AND sub_user_name='$usrr_nnm' AND sub_password='$usrr_pss'");
						if ($updt_pss) {
							echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:17px'>Password updated successfully | LOGOUT to be sure..</span>";
												?>

								<script type="text/javascript">
										$("#curr_pass,#new_pass,#conf_pass").val("");
								</script>
										<?php
						}else{
							echo "<span id='ressc'>Password updating failed..</span>";
						}
				}else{
					echo "<span id='ressc'>Too long | Password range : <b> 8-36</b> characters.</span>";	
					}
			}else{
					echo "<span id='ressc'>Too short | Password range : <b> 8-36</b> characters.</span>";	
					}
		}else{
			?>
			<script> 
	function Redirect() {     window.location="libs/parts/logout.php"; }  
	document.getElementById("resp_chg_pss").innerHTML="Wrong Password | You will be redirected to main page in 4 sec"; setTimeout('Redirect()', 4000);
			</script>
			<?php
		}
	}else{
		echo "<span id='ressc'>Your Changing Password failed  Unfortunately.</span>";
	}
}else{
	$sel=mysql_query("SELECT * FROM bms_users WHERE bms_usr_full_name='$usr_nm'");
	$ftt=mysql_fetch_assoc($sel);
	$cnt_sel=mysql_num_rows($sel);
	if ($cnt_sel==1) {
		$usrr_nnm=$ftt['user_name'];
		$np_lng=strlen($new_pss);
		$usrr_pss=$ftt['user_pass'];
		if ($crnt_pss==$usrr_pss) {
			if ($np_lng>7) {
				if ($np_lng<37) {
						$updt_pss=mysql_query("UPDATE bms_users SET user_pass='$new_pss' WHERE bms_usr_full_name='$usr_nm' AND user_name='$usrr_nnm' AND user_pass='$crnt_pss'");
						if ($updt_pss) {
							echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:17px'>Password updated successfully | LOGOUT to be sure..</span>";
												?>

								<script type="text/javascript">
										$("#curr_pass,#new_pass,#conf_pass").val("");
								</script>
										<?php
						}else{
							echo "<span id='ressc'>Password updating failed..</span>";
						}
				}else{
					echo "<span id='ressc'>Too long | Password range : <b> 8-36</b> characters.</span>";	
					}
			}else{
					echo "<span id='ressc'>Too short | Password range : <b> 8-36</b> characters.</span>";	
					}
		}else{
			?>
			<script> 
	function Redirect() {     window.location="libs/parts/logout.php"; }  
	document.getElementById("resp_chg_pss").innerHTML="Wrong Password | You will be redirected to main page in 4 sec"; setTimeout('Redirect()', 4000);
			</script>
			<?php
		}
	}else{
		echo "<span id='ressc'>Your Changing Password failed  Unfortunately.</span>";
	}
}
}



//-----------------------------------------------------------------------DATEPICKER ON SOLD PRODUCTS--------------------------------------
if (isset($_GET['dtpp'])) {
	echo "<script>closeNavLoader();</script>";
	$new_date=mysql_real_escape_string(stripcslashes($_GET['ourdate']));
	$new_order_date=substr($new_date, 6,4)."-".substr($new_date, 0,2)."-".substr($new_date, 3,2);		//y-m-d
?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Unit price</th>
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
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
 <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_date LIKE '$new_order_date%' AND ktout_product_status='out' AND bms_kt_bus='$all_id'");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
    $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $tkdtl=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_pro['ktout_id']+2018)))))))));
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    ?>
    <tr>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_category']?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price'])?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Ps</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity']);?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?><a href="libs/parts/tkout_details.php?kkdts=<?php echo $tkdtl;?>" target="_blank" id="prourep"> .... </a></td>
    </tr>
    <?php
        $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];

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
<?php
	}




//------------------------------------------------------------DATEPICKER ON CREDITS--------------------------------------

if (isset($_GET['dtppcrdt'])) {
	echo "<script>closeNavLoader();</script>";
	$new_date=mysql_real_escape_string(stripcslashes($_GET['ourdate']));
	$new_order_date=substr($new_date, 6,4)."-".substr($new_date, 0,2)."-".substr($new_date, 3,2);		//y-m-d
?>
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Creditor</th>
                  <th>Product</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Creditor</th>
                  <th>Product</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
              </tfoot>
              <tbody>
 <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_date LIKE '$new_order_date%' AND ktout_product_status='credit' AND bms_kt_bus='$all_id'");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
  $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    $crd_id=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_pro['ktout_id']+2008)))))))));
    ?>
    <tr>
      <td><?php echo "<span style='text-decoration:underline;font-weight:bold;color:#3f2903;text-transform: uppercase;font-size:12px'>".$ft_sel_pro['product_creditor']."</span>";?></td>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price']);?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Pcs</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity']);?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?></td>
      <td><?php if ($ft_sel_pro['ktout_product_status']=="credit") {

        if (($ft_sel_pro['ktout_product_price']*$ft_sel_pro['ktout_product_quantity'])>$ft_sel_pro['ktout_product_payed']) {
           echo "<a href='libs/parts/credit_payment.php?dreid=$crd_id' target='_blank' style='color:red;font-weight:bolder;'>Not yet ...</a>";
        }else{
           echo "<a href='libs/parts/credit_payment.php?dreid=$crd_id' class='crd_pyd' target='_blank' style='color:green;font-weight:bolder;'>All paid ...</a>";
        }
      }else{echo "Payed";}?></td>
    </tr>
    <?php
    $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];
  }
}
 ?>               
              </tbody>
            </table>             
            <center><big><?php   if (isset($ttl_price)) {
              echo "Total credit: ".standard_money($ttl_price)." Rfw";
            }else{
              echo "Total credit: 0 Rfw";
            }
            ?></big></center>
          </div>
<?php
	}


//-----------------------------------------------------------DATEPICKER ON EXPENSES--------------------------------------

if (isset($_GET['dtppexps'])) {
	echo "<script>closeNavLoader();</script>";
	$new_date=mysql_real_escape_string(stripcslashes($_GET['ourdate']));
	$new_order_date=substr($new_date, 6,4)."-".substr($new_date, 0,2)."-".substr($new_date, 3,2);		//y-m-d
?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Expense details</th>
                  <th>Cost</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Expense details</th>
                  <th>Cost</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
<?php
$sel_exp=mysql_query("SELECT * FROM bms_expenses WHERE expense_date LIKE '$new_order_date%' AND expense_status='Exp' AND bms_exp_bus='$all_id'")or die(mysql_error());
$cnt_sel_exp=mysql_num_rows($sel_exp);
if ($cnt_sel_exp>0) {
  $exp_ttl_prc=0;
  while ($ft_sel_exp=mysql_fetch_assoc($sel_exp)) {
    ?>
    <tr>
      <td><?php echo $ft_sel_exp['expense_name'];?></td>
      <td><?php echo standard_money($ft_sel_exp['expense_price']);?></td>
      <td><?php echo substr($ft_sel_exp['expense_date'], 8,2)."/".substr($ft_sel_exp['expense_date'], 5,2)."/".substr($ft_sel_exp['expense_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_exp['expense_date'], 11,5);?></td>
    </tr>
    <?php
    $exp_ttl_prc+=$ft_sel_exp['expense_price'];
  }
}
?>              

              </tbody>
            </table>             
            <center><big><?php   if (isset($exp_ttl_prc)) {
              echo "Total expenses: ".standard_money($exp_ttl_prc)." Rfw";
            }else{
              echo "Total credit: 0 Rfw";
            }
            ?></big></center>
          </div>
<?php
	}

//------------------------------------------------------------------------ADDING SUB-USERS-------------------------------------------------
	if (isset($_GET['addsubusr'])) {
		$sub_fmn=mysql_real_escape_string(stripcslashes($_GET['subFnm']));
		$sub_lmn=mysql_real_escape_string(stripcslashes($_GET['subLnm']));
		$sub_usrmn=mysql_real_escape_string(stripcslashes($_GET['subUsrnm']));
		$sub_pss=mysql_real_escape_string(stripcslashes($_GET['subNpss']));
		$sub_full_nm=ucfirst($sub_fmn." ".$sub_lmn);
		$add_sub_date=date("Y-m-d H:i:s.00000");
		$sub_stts="E";
		$sel_sub=mysql_query("SELECT * FROM bms_sub_users WHERE sub_bus_id='$all_id' AND sub_full_name='$sub_full_nm' AND sub_user_name='$sub_usrmn'AND sub_status='E'")or die(mysql_error());
		$cnt_sel_sub=mysql_num_rows($sel_sub);
		if ($cnt_sel_sub==0) {
			$ins_sub=mysql_query("INSERT INTO bms_sub_users VALUES('','$sub_full_nm','$sub_usrmn','$sub_pss','$all_id','$sub_stts','$add_sub_date')")or die(mysql_error());
			if ($ins_sub) {
				echo "<span id='ressc' style='color:#a9ace7;font-weight:lighter;font-size:15px'>SUB_USER <span style='color:#44ed64'>".$sub_full_nm."</span> Registered  successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,4000);

			$("#subfnm,#sublnm,#subusrnm,#subnewpss,#subcomfpss").val("");
	</script>
			<?php
			}
		}else{
			echo "<h5 style='color:red'>Registration Failed. || Names or Username already exist...</h5>";
		}
		
	}

//-----------------------------------------------------------------------------SUB-USER LOGIN-------------------------------------
if (isset($_GET['subUsrLg'])) {
	$sub_usr_nm=mysql_real_escape_string(stripcslashes($_GET['subNmn']));
	$sub_usr_pss=mysql_real_escape_string(stripcslashes($_GET['subPss']));

	$sel_sub_lg=mysql_query("SELECT * FROM bms_sub_users WHERE sub_user_name='$sub_usr_nm' AND sub_password='$sub_usr_pss'");
	$cnt_sel_sub_lg=mysql_num_rows($sel_sub_lg);
	if ($cnt_sel_sub_lg==1) {
$fetc=mysql_fetch_assoc($sel_sub_lg);
$bu_id=$fetc['sub_bus_id'];
$se_bbus=mysql_query("SELECT * FROM bms_users WHERE user_id='$bu_id'");
$ft_se_bbus=mysql_fetch_assoc($se_bbus);
$_SESSION['svn_bms_usrnm']=$ft_se_bbus['bms_usr_full_name'];
$_SESSION['svn_bms_usrnm_sub']=$fetc['sub_full_name'];
$_SESSION['svn_bms_sub_id']=$fetc['sub_id'];
?>
<script type="text/javascript">
	window.location="index.php";
</script>
<?php
	}else{
		print_r("<span id='respf'>Wrong Username or Password</span>");
	}
}

//-----------------------------------------------------CONTROLING-SUB-USERS----------------------
//---------------------SOLD
if (isset($_GET['sld'])) {
	$ssubb_id=$_GET['subiid'];
	$bbuss_id=$_GET['busiid'];
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#subbb_btnm_sld").css("background-color","#112233");
	$("#subbb_btnm_sld").css("color","#ffffff");
	$("#subbb_btnm_crdt,#subbb_btnm_exps").css("background-color","grey");
	$("#subbb_btnm_crdt,#subbb_btnm_exps").css("color","#000000");
})
</script>
<div id="tt_res">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Unit price</th>
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
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
 <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_product_status='out' AND bms_kt_bus='$bbuss_id' AND ktout_sub='$ssubb_id'");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
    $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$bbuss_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    ?>
    <tr>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_category']?></td>
      <td><?php echo $ft_sel_prn['product_price']?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Ps</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo $ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?></td>
    </tr>
    <?php
        $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];

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


<?php
}
//---------------------CREDITED
if (isset($_GET['crd'])) {
	$ssubb_id=$_GET['subiid'];
	$bbuss_id=$_GET['busiid'];
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#subbb_btnm_crdt").css("background-color","#112233");
	$("#subbb_btnm_crdt").css("color","#ffffff");
	$("#subbb_btnm_sld,#subbb_btnm_exps").css("background-color","grey");
	$("#subbb_btnm_sld,#subbb_btnm_exps").css("color","#000000");
})
</script>

 <div id="tt_res">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Creditor</th>
                  <th>Product</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Creditor</th>
                  <th>Product</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
              </tfoot>
              <tbody>
 <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_product_status='credit' AND bms_kt_bus='$bbuss_id' AND ktout_sub='$ssubb_id'");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
  $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$bbuss_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    $crd_id=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_pro['ktout_id']+2008)))))))));
    ?>
    <tr>
      <td><?php echo "<span style='text-decoration:underline;font-weight:bold;color:#3f2903;text-transform: uppercase;font-size:12px'>".$ft_sel_pro['product_creditor']."</span>";?></td>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_price']?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Pcs</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo $ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?></td>
      <td><?php if ($ft_sel_pro['ktout_product_status']=="credit") {

        if (($ft_sel_pro['ktout_product_price']*$ft_sel_pro['ktout_product_quantity'])>$ft_sel_pro['ktout_product_payed']) {
           echo "<a href='credit_payment.php?dreid=$crd_id' target='_blank' style='color:red;font-weight:bolder;'>Not yet ...</a>";
        }else{
           echo "<a href='credit_payment.php?dreid=$crd_id' class='crd_pyd' target='_blank' style='color:green;font-weight:bolder;'>All paid ...</a>";
        }
      }else{echo "Payed";}?></td>
    </tr>
    <?php
    $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];
  }
}
 ?>               
              </tbody>
            </table>             
            <center><big><?php   if (isset($ttl_price)) {
              echo "Total credit: ".standard_money($ttl_price)." Rfw";
            }else{
              echo "Total credit: 0 Rfw";
            }
            ?></big></center>
 </div>
<?php
	}

//---------------------EXPENSES
if (isset($_GET['exps'])) {
	$ssubb_id=$_GET['subiid'];
	$bbuss_id=$_GET['busiid'];
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#subbb_btnm_exps").css("background-color","#112233");
	$("#subbb_btnm_exps").css("color","#ffffff");
	$("#subbb_btnm_sld,#subbb_btnm_crdt").css("background-color","grey");
	$("#subbb_btnm_sld,#subbb_btnm_crdt").css("color","#000000");
})
</script>
<div id="tt_res">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Expense details</th>
                  <th>Cost</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Expense details</th>
                  <th>Cost</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
<?php
$sel_exp=mysql_query("SELECT * FROM bms_expenses WHERE expense_status='Exp' AND bms_exp_bus='$bbuss_id' AND exp_sub='$ssubb_id'")or die(mysql_error());
$cnt_sel_exp=mysql_num_rows($sel_exp);
if ($cnt_sel_exp>0) {
  $exp_ttl_prc=0;
  while ($ft_sel_exp=mysql_fetch_assoc($sel_exp)) {
    ?>
    <tr>
      <td><?php echo $ft_sel_exp['expense_name'];?></td>
      <td><?php echo $ft_sel_exp['expense_price'];?></td>
      <td><?php echo substr($ft_sel_exp['expense_date'], 8,2)."/".substr($ft_sel_exp['expense_date'], 5,2)."/".substr($ft_sel_exp['expense_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_exp['expense_date'], 11,5);?></td>
    </tr>
    <?php
    $exp_ttl_prc+=$ft_sel_exp['expense_price'];
  }
}
?>              

              </tbody>
            </table>             
            <center><big><?php   if (isset($exp_ttl_prc)) {
              echo "Total Expenses: ".$exp_ttl_prc." Rfw";
            }else{
              echo "Total Expense: 0 Rfw";
            }
            ?></big></center>
</div>
<?php
}


if (isset($_GET['dpkdsld'])) {
	$dtt=mysql_real_escape_string(stripcslashes($_GET['datefrm']));
	$new_order_date=substr($dtt, 6,4)."-".substr($dtt, 0,2)."-".substr($dtt, 3,2);	
	$ssubb_id=$_GET['subiid'];
	$bbuss_id=$_GET['busiid'];

?>
 <div id="tt_res">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Creditor</th>
                  <th>Product</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Creditor</th>
                  <th>Product</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
              </tfoot>
              <tbody>
 <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE ktout_product_status='out' AND bms_kt_bus='$bbuss_id' AND ktout_sub='$ssubb_id' AND ktout_date LIKE '$new_order_date%'");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
  $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$bbuss_id'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    $crd_id=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_pro['ktout_id']+2008)))))))));
    ?>
    <tr>
      <td><?php echo "<span style='text-decoration:underline;font-weight:bold;color:#3f2903;text-transform: uppercase;font-size:12px'>".$ft_sel_pro['product_creditor']."</span>";?></td>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_price']?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Pcs</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo $ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?></td>
      <td><?php if ($ft_sel_pro['ktout_product_status']=="credit") {

        if (($ft_sel_pro['ktout_product_price']*$ft_sel_pro['ktout_product_quantity'])>$ft_sel_pro['ktout_product_payed']) {
           echo "<a href='credit_payment.php?dreid=$crd_id' target='_blank' style='color:red;font-weight:bolder;'>Not yet ...</a>";
        }else{
           echo "<a href='credit_payment.php?dreid=$crd_id' class='crd_pyd' target='_blank' style='color:green;font-weight:bolder;'>All paid ...</a>";
        }
      }else{echo "Payed";}?></td>
    </tr>
    <?php
    $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];
  }
}
 ?>               
              </tbody>
            </table>             
            <center><big><?php   if (isset($ttl_price)) {
              echo "Total credit: ".standard_money($ttl_price)." Rfw";
            }else{
              echo "Total credit: 0 Rfw";
            }
            ?></big></center>
 </div>
<?php
}
//-------------------------------------------------------------------------------ADDING COMPANY---
if(isset($_GET['addscompp'])){
		$comp_nm=mysql_real_escape_string(stripcslashes($_GET['compNm']));
		$comp_usr=mysql_real_escape_string(stripcslashes($_GET['compUsrnm']));
		$comp_pss=mysql_real_escape_string(stripcslashes($_GET['compNpss']));
		$add_sub_date=date("Y-m-d H:i:s.00000");
		$comp_stts="E";
		$sel_sub=mysql_query("SELECT * FROM bms_users WHERE bms_usr_full_name='$comp_nm' OR user_name='$comp_usr'")or die(mysql_error());
		$cnt_sel_sub=mysql_num_rows($sel_sub);
		if ($cnt_sel_sub==0) {
			$ins_sub=mysql_query("INSERT INTO bms_users VALUES('','$comp_nm','$comp_usr','$comp_pss','$comp_stts','$add_sub_date')")or die(mysql_error());
			if ($ins_sub) {
				echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>COMPANY:  <span style='color:#44ed64'>".$comp_nm."</span> Registered  successfully</span>";
			?>

	<script type="text/javascript">
			$("#compnm,#compusr,#compnpass,#compcpass").val("");
	</script>
			<?php
			}
		}else{
			echo "<h6 style='color:red'>Registration Failed. || Company-Name or Username already exist...</h6>";
		}
		
}

//---------------------------------------------------------------------------Modify products---------------
if (isset($_GET['mmoppr'])) {
	$pr_id=mysql_real_escape_string(stripcslashes($_GET['prid']));
	$pr_ststt=mysql_real_escape_string(stripcslashes($_GET['prstt']));
	@$pr_pck_qnt=mysql_real_escape_string(stripcslashes($_GET['pcQnt']));
	$pr_pcss_qnt=mysql_real_escape_string(stripcslashes($_GET['psQnt']));
	//echo "prid: ".$pr_id." prstt: ".$pr_ststt." pck: ".$pr_pck_qnt." pscs: ".$pr_pcss_qnt;
	if ($pr_ststt==1) {
		$upd_pr=mysql_query("UPDATE bms_products SET product_quantity='$pr_pcss_qnt' WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'")or die(mysql_error());
		if ($upd_pr) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:14px'>Product stock quantity updated successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,5000);
	</script>
			<?php
		}else{
			echo "Product updating unfortunately failed. || Try Again or Contact Admininstrator for help...";
		}
	}elseif ($pr_ststt==2) {
		$sel_pr=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'")or die(mysql_error());
		$cnt_sel_pr=mysql_num_rows($sel_pr);
		if ($cnt_sel_pr==1) {
			$ft_sel_pr=mysql_fetch_assoc($sel_pr);
			$prset_qt=$ft_sel_pr['product_set_quantity'];
			//echo $prset_qt."<br>";
			$alqntpc=$pr_pck_qnt*$prset_qt;
			$pr_all=$alqntpc+$pr_pcss_qnt;
		$upd_pr=mysql_query("UPDATE bms_products SET product_quantity='$pr_all' WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'")or die(mysql_error());
		if ($upd_pr) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:14px'>Product stock quantity updated successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,5000);
	</script>
			<?php
		}		}else{
			echo "<b><h3>Action Failed : ERROR 01 - A1 Occured. || Please contact Administrator to solve this issue...</h3></b>";
		}
	}else{
		echo "<b><h3>Action Failed : ERROR 00 - A1 Occured. || Please contact Administrator to solve this issue...</h3></b>";
	}
}


//---------------------------------------------------modifying products details
if (isset($_GET['updttt'])) {
	$prid=mysql_real_escape_string(stripcslashes($_GET['priid']));
	$prtyp=mysql_real_escape_string(stripcslashes($_GET['prtyp']));
	$prnm=mysql_real_escape_string(stripcslashes($_GET['prnm']));
	$prctgr=mysql_real_escape_string(stripcslashes($_GET['prctgr']));
	$prprc=mysql_real_escape_string(stripcslashes($_GET['prprc']));
	if (isset($_GET['prsetq'])) {
		$prstq=mysql_real_escape_string(stripcslashes($_GET['prsetq']));
		$sel_pr=mysql_query("SELECT * FROM bms_products WHERE product_id='$prid' AND bms_pr_bus='$all_id'")or die(mysql_error());
		$cnt_sel_pr=mysql_num_rows($sel_pr);
		if ($cnt_sel_pr==1) {
			$upd_pr=mysql_query("UPDATE bms_products SET product_name='$prnm',product_category='$prctgr',product_price='$prprc',product_set_quantity='$prstq' WHERE product_id='$prid' AND bms_pr_bus='$all_id'")or die(mysql_error());
		if ($upd_pr) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Product stock quantity updated successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,5000);
	</script>
			<?php
		}else{
			echo "Product updating unfortunately failed. || Try Again or Contact Admininstrator for help...";
		}
		}else{
			echo "<b><h3>Action Failed : ERROR 02 - A1 Occured. || Please contact Administrator to solve this issue...</h3></b>";
		}
	}else{
		$sel_pr=mysql_query("SELECT * FROM bms_products WHERE product_id='$prid' AND bms_pr_bus='$all_id'")or die(mysql_error());
		$cnt_sel_pr=mysql_num_rows($sel_pr);
		if ($cnt_sel_pr==1) {
			$upd_pr=mysql_query("UPDATE bms_products SET product_name='$prnm',product_category='$prctgr',product_price='$prprc' WHERE product_id='$prid' AND bms_pr_bus='$all_id'")or die(mysql_error());
		if ($upd_pr) {
			echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:14px'>Product stock quantity updated successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,5000);
	</script>
			<?php
		}else{
			echo "Product updating unfortunately failed. || Try Again or Contact Admininstrator for help...";
		}
		}else{
			echo "<b><h3>Action Failed : ERROR 02 - A1 Occured. || Please contact Administrator to solve this issue...</h3></b>";
		}	
	}
}
if (isset($_GET['prdlys'])) {
	$pr_id=mysql_real_escape_string(stripcslashes($_GET['pr_id']));
	$sel_pr=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'")or die(mysql_error());
	$cnt_sel_pr=mysql_num_rows($sel_pr);
	if ($cnt_sel_pr==1) {
		$del_pr=mysql_query("DELETE FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$all_id'")or die(mysql_error());
		if ($del_pr) {
			$de_tout=mysql_query("DELETE FROM bms_product_take_out WHERE ktout_product_id='$pr_id' AND bms_kt_bus='$all_id'")or die(mysql_error());
			if ($de_tout) {
			echo "<span id='ressc'>Product DELETED successfully</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
				window.location="../../products.php";
			}
		window.setTimeout(hhidef,3000);
	</script>
			<?php
			}else{
				echo "<b style='color:red'><h7>Action Failed : ERROR 53 - A1 Occured. || Please contact Administrator to solve this issue...</h7></b>";
			}
		}else{
			echo "<b style='color:red'><h7>Action Failed : ERROR 56 - A1 Occured. || Please contact Administrator to solve this issue...</h7></b>";
		}
	}else{
		echo "<b style='color:red'><h7>Action Failed : ERROR 02 - A1 Occured. || Please contact Administrator to solve this issue...</h7></b>";
	}
}


//=================================================================================================================CHANGING USERNAME
if (isset($_GET['cngusr'])) {
	$new_nm=mysql_real_escape_string(stripcslashes($_GET['newfNm']));
	if (isset($_SESSION['svn_bms_sub_id']) && ($_SESSION['svn_bms_sub_id']>0)) {
		$sub_id=$_SESSION['svn_bms_sub_id'];
		$up_usr=mysql_query("UPDATE bms_sub_users SET sub_user_name='$new_nm' WHERE sub_id='$sub_id' AND sub_bus_id='$all_id'")or die(mysql_error());
		if ($up_usr) {
			echo "<span id='ressc'>Username have been changed to<span id='nwu'> ".$new_nm." </span>successfully. Please re-login with new Username.</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
				window.location="libs/parts/logout.php";
			}
		window.setTimeout(hhidef,10000);
		$("#new_pass,#conf_pass").val("");
	</script>
			<?php
		}else{
			echo "<b style='color:red'><h7>Action Failed : ERROR 20 - A1 Occured. || Please contact Administrator to solve this issue...</h7></b>";
		}
	}else{
		$usr_id=$all_id;
		$up_usr=mysql_query("UPDATE bms_users SET user_name='$new_nm' WHERE user_id='$usr_id'")or die(mysql_error());
		if ($up_usr) {
			echo "<span id='ressc'>Username have been changed to<span id='nwu'> ".$new_nm." </span>successfully. Please re-login with new Username.</span>";
			?>

	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
				window.location="libs/parts/logout.php";
			}
		window.setTimeout(hhidef,10000);
		$("#new_pass,#conf_pass").val("");
	</script>
			<?php
		}else{
			echo "<b style='color:red'><h7>Action Failed : ERROR 20 - A1 Occured. || Please contact Administrator to solve this issue...</h7></b>";
		}
	}
}
//------------------------------------------------------------------------------------------ORIENT COMPANY TO Spr
if (isset($_GET['compSpr'])) {
	$sbcomp=mysql_real_escape_string(stripcslashes($_GET['suComp']));
	$sprcomp=mysql_real_escape_string(stripcslashes($_GET['suSpr']));
	$sel_spr=mysql_query("SELECT * FROM bms_spr_relate WHERE spr_relate_spr='$sprcomp' AND spr_relate_sub_comp='$sbcomp' AND spr_relate_status='E'");
	if (mysql_num_rows($sel_spr)>0) {
		echo "<h6 style='color:red'><center>This company already belongs a company.</center></h6>";
	}else{
	$insespr=mysql_query("INSERT INTO bms_spr_relate VALUES('','$sprcomp','$sbcomp','E','$reg_date')")or die(mysql_error());
	if ($insespr) {
		echo "<span id='ressc' style='color:#a9ace7;font-weight:bolder;font-size:20px'>Company oriented successfully...</span>";
		?>
	<script type="text/javascript">
			function hhidef(){
				$("#ressc").hide();
			}
		window.setTimeout(hhidef,3000);

			$("#pcomp,#pspr").val("");
	</script>
		<?php
	}
	}
}

//----------------------------------------------------------------------------Datepicker---------- on Company Supr

if (isset($_GET['dtPckSprDne'])) {
	echo "<script>closeNavLoader();</script>";
	$spr_frm=mysql_real_escape_string(stripcslashes($_GET['dtFrm']));
	$spr_to=mysql_real_escape_string(stripcslashes($_GET['dtTo']));


$rsdate_t = date_create($spr_to);
date_add($rsdate_t, date_interval_create_from_date_string('1 day'));
$r_date_t = date_format($rsdate_t, 'd-m-Y');


	$fsoursee=$spr_frm;
	$fdate=new DateTime($fsoursee);
	$tsoursee=$r_date_t;
	$tdate=new DateTime($r_date_t);
	$ssfrm=$fdate->format("Y-m-d H:i:s");
	$ssto=$tdate->format("Y-m-d H:i:s");
	$cmp_sub=mysql_real_escape_string(stripcslashes($_GET['cmpSsb']));
	$ssspr_rte=mysql_real_escape_string(stripcslashes($_SESSION['svn_bms_spr_rate']));

	$sel_sbnm=mysql_query("SELECT *FROM bms_users WHERE user_id='$cmp_sub' AND user_status='E'")or die(mysql_error());
	if (mysql_num_rows($sel_sbnm)==1) {
		$ft_sel_sbnm=mysql_fetch_assoc($sel_sbnm);
		$spsbnm=$ft_sel_sbnm['bms_usr_full_name'];
?>
      <div class="card mb-3" id="spr_tbbd">
        <div class="card-header">
      <div class="input-group">

	        <span class="input-group-addon" style="font-weight: bolder;background-color: #e7cdcd"><label>Rate: </label></span>
        <input style="font-weight: bolder" type="number" value="<?php echo $_SESSION['svn_bms_spr_rate']?>" class="form-control col-1"  id="newrrtin">
        <span class="input-group-addon" style="font-weight: bolder;background-color: #e7cdcd"><label>% </label></span>
       <a href=""><button class="btn btn-success" style="height: 100%;" onclick="return sprSetRate()"> <span class="glyphicon glyphicon-ok"></span> Apply</button></a><button class="btn btn-inverse" onclick="return sprPrntDtl()"><span class="glyphicon glyphicon-print"></span></button>

    </div>
    <span id="hhdttl" style="position: relative;float: right;margin-top: -35px;font-weight: bolder;background-color: #708c8b">&nbsp</span>
</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Unit price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Date</th>
                </tr>
              </thead>
            <tbody>
              <?php
$sel_pro=mysql_query("SELECT * FROM bms_product_take_out WHERE (ktout_date BETWEEN '$ssfrm' AND '$ssto') AND bms_kt_bus='$cmp_sub' order by ktout_date asc");
$cnt_sel_pro=mysql_num_rows($sel_pro);
if ($cnt_sel_pro>0) {
    $ttl_price=0;
  while ($ft_sel_pro=mysql_fetch_assoc($sel_pro)) {
    $pr_id=$ft_sel_pro['ktout_product_id'];
    $sel_prn=mysql_query("SELECT * FROM bms_products WHERE product_id='$pr_id' AND bms_pr_bus='$cmp_sub'");
    $ft_sel_prn=mysql_fetch_assoc($sel_prn);
    $tkdtl=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ft_sel_pro['ktout_id']+2018)))))))));
    ?>
    <tr>
      <td><?php echo $ft_sel_prn['product_name']?></td>
      <td><?php echo $ft_sel_prn['product_category']?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price'])?></td>
      <td><?php

       if ($ft_sel_prn['product_set_type']=="Set"){ 
        $rndd=floor($ft_sel_pro['ktout_product_quantity']/$ft_sel_prn['product_set_quantity']);
        $rest=$ft_sel_pro['ktout_product_quantity']-($rndd*$ft_sel_prn['product_set_quantity']);
        echo"<span class='pr_qq'>". $rndd."</span><span style='float:right'> and  ".$rest." Ps</span>";
      }else{
        echo"<span class='pr_qq'>". $ft_sel_pro['ktout_product_quantity']."</span>";
        }?></td>
      <td><?php echo standard_money($ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity']);?></td>
      <td><?php echo substr($ft_sel_pro['ktout_date'], 8,2)." / ".substr($ft_sel_pro['ktout_date'], 5,2)." / ".substr($ft_sel_pro['ktout_date'], 0,4)."&nbsp-&nbsp".substr($ft_sel_pro['ktout_date'], 11,5);?></td>
    </tr>
    <?php
        $ttl_price+=$ft_sel_prn['product_price']*$ft_sel_pro['ktout_product_quantity'];

  }
    ?>
    <script type="text/javascript">
      document.getElementById("hhdttl").innerHTML="<?php if (isset($ttl_price)) {
              echo "Total Sold: ".standard_money($ttl_price)." Rfw &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id='ttlernd'>  Amount Earned: ".standard_money(round($ttl_price*$ssspr_rte/100));
              echo "</span>";
            }else{
              echo "Total Sold: 0 Rfw &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAmount Earned:&nbsp;&nbsp;0 Rfw";
            }?>";
    </script>
            </tbody>
          </table>
<?php
$lk_sprsld=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ttl_price)))))))));//   Total sold
$lk_sprsub=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($spsbnm)))))))));//   SUB COMPANY
$lksprsbid=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($cmp_sub+2018)))))))));//  sub comp id
$lk_sprrt=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ssspr_rte)))))))));//   earning RATE
$lk_sprfrm=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($ssfrm)))))))));//   from datepicker
$lk_sprto=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($spr_to)))))))));//   to datepicker

?>
<a style="display: none;" href="../sprinvoice.php?ttsd='<?php echo $lk_sprsld;?>'&spsub='<?php echo $lk_sprsub;?>'&rrte='<?php echo $lk_sprrt;?>'&sbd='<?php echo $lksprsbid;?>'&spfrm='<?php echo $lk_sprfrm;?>'&sptoo='<?php echo $lk_sprto;?>'" target="_blank"><button id="sprinvoice_link"></button></a>
            <center><big><?php   if (isset($ttl_price)) {
              echo "Total Sold: ".standard_money($ttl_price)." Rfw &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id='ttlernd'> Amount Earned: ".standard_money(round($ttl_price*$ssspr_rte/100));
              echo "</span>";
            }else{
              echo "Total Sold: 0 Rfw &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAmount Earned:&nbsp;&nbsp;0 Rfw";
            }
            ?></big></center>
          </div>
        </div>
<?php 
}

//------------------------------------------------------last products modification
$sel_llst=mysql_query("SELECT * FROM bms_products WHERE pro_status='E' AND bms_pr_bus='$cmp_sub' ORDER BY re_date DESC LIMIT 1");
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
	<?php
	}else{
	 echo "<h1 style='color:red'><center>Something went wrong... ||  Please contact your administrator... error: E32</center></h1>";
	}
	
}


//-------------------------------------------------------------------------------SPR SETTING ANOTHER RATE------------------


if (isset($_GET['stantrte'])) {
	$spr_new_rate=mysql_real_escape_string(stripcslashes($_GET['sprNewRate']));
	$_SESSION['svn_bms_spr_rate']=$spr_new_rate;
}





































































































































}
}
?>
