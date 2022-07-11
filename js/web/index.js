/*!
IGIHOZO Didier All right reserved
    -------------------
Tel : +250722077175 , 250784424020
email : didierigihozo07@gmail.com
facebook : Didier Igihozo
Instagram : Kabaka_official_1

 */

 //---------------------------------DISPLAYING OR HIDING ' amount per set  '
 $("#nmb_qt").hide();
 $("#protType").click(function(){
            var prtpe=document.getElementById("protType").value;
            if (prtpe=="Set") {
$("#nmb_qt").show();
            }else{
 $("#nmb_qt").hide();
            }
})

//-------------------------------------EXPENSES
function expNss(){
		$("#resp_tkout").html("<center><div class='loader'></div></center>");
	var expresn=document.getElementById("expreasn").value;
	var expprc=document.getElementById("expprice").value;
	var expenss=1;
if (expresn=="" || (expprc=="") ) {
	document.getElementById("resp_tkout").innerHTML="Fill all fields please...";
				}else{
	$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{expenss:expenss,expresn:expresn,expprc:expprc},cache:false,success:function(res){$("#resp_tkout").html(res);}
	});
				}

}
//--------------------------------Takeout CREDITS
function tkOuttCrdt(){
	$("#tkout").attr("disabled","disabled");
	function enTbn(){
		$("#tkout").removeAttr("disabled");
	}
	window.setTimeout(enTbn,1000);
	$("#resp_tkout").html("<center><div class='loader'></div></center>");
	var prname=document.getElementById("prnmm").value;
	var prsttp=document.getElementById("prstty").value;
	var prqnt=document.getElementById("prqntt").value;
	var prcreditor=document.getElementById("prcrownr").value;
	var tktcrdt=1;
if (prqnt=="" || prcreditor=="" || prname=="" || prsttp=="") {
	document.getElementById("resp_tkout").innerHTML="Fill all fields please...";
				}else{
	$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{tktcrdt:tktcrdt,prname:prname,prsttp:prsttp,prqnt:prqnt,prcreditor:prcreditor},cache:false,success:function(res){$("#resp_tkout").html(res);}
	});
				}


}
//--------------------------------Take out products

function tkOutt(){
	$("#tkout").attr("disabled","disabled");
	function enTbn(){
		$("#tkout").removeAttr("disabled");
	}
	window.setTimeout(enTbn,1000);
	$("#resp_tkout").html("<center><div class='loader'></div></center>");
	var prname=document.getElementById("prnmm").value;
	var prsttp=document.getElementById("prstty").value;
	var prqnt=document.getElementById("prqntt").value;
	var tkout=1;
if (prqnt=="") {
	document.getElementById("resp_tkout").innerHTML="Fill product quantity please...";
				}else{
	$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{tkout:tkout,prname:prname,prsttp:prsttp,prqnt:prqnt},cache:false,success:function(res){$("#resp_tkout").html(res);}
	});	
				}

}

//----------------------------------------------login page/form
			$("#unm,#ups").keypress(function(event){
				if ( event.which==13) {
					$("#add_usr_btn").click();
					event.preventDefault();
				}
			})
			$("#add_usr_btn").click(function(){
				$("#respp").html("<center><div class='loader'></div></center>");
				var user=document.getElementById("unm").value;
				var pass=document.getElementById("ups").value;
				var loog=1;
				if (user!="" || pass!="") {
				$.ajax({url:"js/ajax/index.php",
				type:"GET",data:{loog:loog,user:user,pass:pass},cache:false,success:function(res){$("#respp").html(res);}
				});
				}else{
					document.getElementById("respp").innerHTML="Please fill all fields...";
				}
			})
//--------------------------------------REGISTER NEW PRODUCT
function regNwPr(){
		$("#resp_reg").html("<center><div class='loader'></div></center>");
		var prNm=document.getElementById("protName").value;
		var prStTp=document.getElementById("protType").value;
		var prCtgr=document.getElementById("protCategry").value;
		var prUnPrc=document.getElementById("proUnPrice").value;
		var setNmOne=document.getElementById("set_qnt").value;

		$.ajax({url:"js/ajax/index.php",
		type:"GET",data:{prNm:prNm,prStTp:prStTp,prCtgr:prCtgr,prUnPrc:prUnPrc,setNmOne:setNmOne},cache:false,success:function(res){$("#resp_reg").html(res);}
		});
}

//------------------------------------------------------------------------ADD PRODUCTS IN STOCK
function addProd(){
	$("#resp_reg").html("<center><div class='loader'></div></center>");
		var AdPrNm=document.getElementById("seprotName").value;
		var prQntty=document.getElementById("seprotPrice").value;
		if (prQntty=="") {
	document.getElementById("resp_reg").innerHTML="Fill product QUANTITY first..."
		}else{
	$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{AdPrNm:AdPrNm,prQntty:prQntty},cache:false,success:function(res){$("#resp_reg").html(res);}
	});
		}
}
//---------------------------------------------------------------PAYING CREDITS BTN
function payCrdt(){
	var creAmnt=document.getElementById("credit_amnt").value;
	var crdprNm=document.getElementById("rdt_nm").value;
	var crdprDt=document.getElementById("rdt_dt").value;
	var crdprQntt=document.getElementById("rdt_qntt").value;
	var crdprPyd=document.getElementById("rdt_pyd").value;
	var crepyst=1;
	$.ajax({url:"../../js/ajax/index.php",
	type:"GET",data:{crepyst:crepyst,creAmnt:creAmnt,crdprNm:crdprNm,crdprDt:crdprDt,crdprQntt:crdprQntt,crdprPyd:crdprPyd},cache:false,success:function(res){$("#resp_pmt").html(res);}
	});
}
//-----------------------------------------------------CHANGE PASSWORD
function chgPss(){
	$("#resp_chg_pss").html("<center><div class='loader'></div></center>");
	var crPss=document.getElementById("curr_pass").value;
	var nwPss=document.getElementById("new_pass").value;
	var cmfPss=document.getElementById("conf_pass").value;
	var cngpss=1;
	if (crPss=="" || nwPss=="" ||cmfPss=="") {
		document.getElementById("resp_chg_pss").innerHTML="<span style='text-align:right;float:right;color:red;font-weight:bolder'>Please fill all fields ...</span>";
	}else{
if (nwPss==cmfPss) {
	$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{cngpss:cngpss,crPss:crPss,nwPss:nwPss,cmfPss:cmfPss},cache:false,success:function(res){$("#resp_chg_pss").html(res);}
	});	
}else{
		document.getElementById("resp_chg_pss").innerHTML="<span style='text-align:right;float:right;color:red;font-weight:bolder'>Paswords don't match ...</span>";	
}
	}

}  
//----------------------------------------------------------------------------------------------GENERAL DATEPICKERS ON REPORTS------------------------------------------------------

$(function() {
    $( "#lblefrom,#lbleto" ).datepicker({
    });
  });
//----------------------------------------------------------------------------------------------DATE PICKERON SOLD--------------------------------------------------------

function datPckr(){
	openNavLoader();
	var ourdate=document.getElementById("lblefrom").value;
	var dtpp=1;
	if (ourdate!="") {
			$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{dtpp:dtpp,ourdate:ourdate},cache:false,success:function(res){$("#tbl_resp").html(res);}
	});
	}else{
		alert("Empy Field !   |  CHOOSE ANY DAY PLEASE ...");
	}
}

//----------------------------------------------------------------------------------------------DATE PICKER ON CREDITS--------------------------------------------------------
function datPckrCrdt(){
	openNavLoader();
	var ourdate=document.getElementById("lblefrom").value;
	var dtppcrdt=1;
	if (ourdate!="") {
			$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{dtppcrdt:dtppcrdt,ourdate:ourdate},cache:false,success:function(res){$("#resp_crdt_rprt").html(res);}
	});
	}else{
		alert("Empy Field !   |  CHOOSE ANY DAY PLEASE ...");
	}
}
//----------------------------------------------------------------------------------------------DATE PICKER ON EXPENSES--------------------------------------------------------
function datPckrExpss(){
	openNavLoader();
	var ourdate=document.getElementById("lblefrom").value;
	var dtppexps=1;
	if (ourdate!="") {
			$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{dtppexps:dtppexps,ourdate:ourdate},cache:false,success:function(res){$("#resp_rprt_expss").html(res);}
	});
	}else{
		alert("Empy Field !   |  CHOOSE ANY DAY PLEASE ...");
	}
}

//-----------------------------------------------------------------------------CLICK PRINT BTN-----------------------------------------------------
function prntPdf(){
	$("#ttpp_nt_sh,#prnt_btn").css("display","none");
	$("#dataTable").css("font-size","12px");
	window.print();
}
$("#prnt_btn").blur(function(){
	$("#ttpp_nt_sh,#prnt_btn").css("display","block");
})
function prntPdfCrt(){
	$("#scndtbl,#prnt_btn_crt,#pmtf,#hme_lgo").hide();
	window.print();
	function sdRdf(){
		$("#scndtbl,#prnt_btn_crt,#pmtf,#hme_lgo").show();
	}
window.setTimeout(sdRdf,1000);
}
function prntPdfCrtInvc(){
	$("#scndtbl,#prnt_btn_crt,#pmtf,#hme_lgo,#hhdder_crdpymt,small center,#dwn_btn_crt").hide();
	$("#dfsd").css("margin-top","-90px");
	$("#ivctbl").removeAttr("align");
	window.print();
	function sdRdf(){
		$("#scndtbl,#prnt_btn_crt,#pmtf,#hme_lgo,#hhdder_crdpymt,small center,#dwn_btn_crt").show();
		$("#dfsd").css("margin-top","10px");
		$("#ivctbl").attr("align","center");
	}
window.setTimeout(sdRdf,1000);
}
//------------------------------------------------------------------------ADDING SUB-USERS------------------------------
function addSubUsr(){
	$("#resp_reg").html("<center><div class='loader'></div></center>");
	var subFnm=document.getElementById("subfnm").value;
	var subLnm=document.getElementById("sublnm").value;
	var subUsrnm=document.getElementById("subusrnm").value;
	var subNpss=document.getElementById("subnewpss").value;
	var subCpss=document.getElementById("subcomfpss").value;
	var addsubusr=1;
	var lngPss=subNpss.length;
	if (subFnm=="" || subLnm=="" || subUsrnm=="" || subNpss=="" || subCpss=="") {
		document.getElementById("resp_reg").innerHTML="Fill all fields please...";
		}else{
		if (subNpss==subCpss) {
			if (lngPss>7) {
				if (lngPss<37) {
					$.ajax({url:"js/ajax/index.php",
					type:"GET",data:{addsubusr:addsubusr,subFnm:subFnm,subLnm:subLnm,subUsrnm:subUsrnm,subNpss:subNpss},cache:false,success:function(res){$("#resp_reg").html(res);}
					});
				}else{
					document.getElementById("resp_reg").innerHTML="Too long | Password range : <b> 8-36</b> characters.";
				}
			}else{
				document.getElementById("resp_reg").innerHTML="Too short | Password range : <b> 8-36</b> characters.";
			}
		}else{
			document.getElementById("resp_reg").innerHTML="Passwords don't match...";
	}

}
}
//-------------------------------------------------------------------------------SUB-USER LOGIN----------------------------------------------------------

function subUsrLgn(){
	$("#respp_sub").html("<center><div class='sub_loader'></div></center>");
	var subNmn=document.getElementById("sub_nm").value;
	var subPss=document.getElementById("sub_pss").value;
	var subUsrLg=1;
if (subNmn=="" || subPss=="") {
document.getElementById("respp_sub").innerHTML="Fill All Fields...";
}else{
	$.ajax({url:"js/ajax/index.php",
	type:"GET",data:{subUsrLg:subUsrLg,subNmn:subNmn,subPss,subPss},cache:false,success:function(res){$("#respp_sub").html(res);}
	});
}
}
$("#sub_nm,#sub_pss").keypress(function(event){
	if ( event.which==13) {
		$("#sub_lgn_btn").click();
		event.preventDefault();
	}
})


//----------------------------------------------------------------------SUB'''''''''''''SOLD-CREDITED-EXPENSEES----------------
//-----------------Sold
function sbnm_sld(){
	var subiid=document.getElementById("sub_id").value;
	var busiid=document.getElementById("bus_id").value;
	sld=1;
	$.ajax({url:"../../js/ajax/index.php",
	type:"GET",data:{sld:sld,subiid:subiid,busiid:busiid},cache:false,success:function(res){$("#tbl_resp").html(res);}
	});
}
//-----------------Credited
function sbnm_crd(){
	var subiid=document.getElementById("sub_id").value;
	var busiid=document.getElementById("bus_id").value;
	crd=1;
	$.ajax({url:"../../js/ajax/index.php",
	type:"GET",data:{crd:crd,subiid:subiid,busiid:busiid},cache:false,success:function(res){$("#tbl_resp").html(res);}
	});
}
//-----------------Expenses
function sbnm_exp(){
	var subiid=document.getElementById("sub_id").value;
	var busiid=document.getElementById("bus_id").value;
	exps=1;
	$.ajax({url:"../../js/ajax/index.php",
	type:"GET",data:{exps:exps,subiid:subiid,busiid:busiid},cache:false,success:function(res){$("#tbl_resp").html(res);}
	});
}
//-----------------Sub-SOLD DATE-PICKER
function datPckrSbSld(){
	var busiid=document.getElementById("bus_id").value;
	var subiid=document.getElementById("sub_id").value;
	var datefrm=document.getElementById("lblefrom").value;
	var dpkdsld=1;
	if (datefrm!="") {
	$.ajax({url:"../../js/ajax/index.php",
	type:"GET",data:{dpkdsld:dpkdsld,datefrm:datefrm,subiid:subiid,busiid:busiid},cache:false,success:function(res){$("#tbl_resp").html(res);}
	});
	}else{
		alert("Empy Field !   |  CHOOSE ANY DAY PLEASE ...");
	}
}

//---------------------------------------------------------ADD COMPANY--------------------
function addComp(){
	var compNm=document.getElementById("compnm").value;
	var compUsrnm=document.getElementById("compusr").value;
	var compNpss=document.getElementById("compnpass").value;
	var compCpss=document.getElementById("compcpass").value;
	var addscompp=1;
	var lngPss=compNpss.length;
	if (compNm=="" || compUsrnm=="" || compNpss=="" || compCpss=="") {	
		document.getElementById("resp_reg").innerHTML="Fill all fields please...";
		}else{
		if (compNpss==compCpss) {
			if (lngPss>7) {
				if (lngPss<37) {
					$.ajax({url:"../../../js/ajax/index.php",
					type:"GET",data:{addscompp:addscompp,compNm:compNm,compUsrnm:compUsrnm,compNpss:compNpss},cache:false,success:function(res){$("#resp_reg").html(res);}
					});
				}else{
					document.getElementById("resp_reg").innerHTML="Too long | Password range : <b> 8-36</b> characters.";
				}
			}else{
				document.getElementById("resp_reg").innerHTML="Too short | Password range : <b> 8-36</b> characters.";
			}
		}else{
			document.getElementById("resp_reg").innerHTML="Passwords don't match...";
	}

}
}
//-----------------------------------------------DESABLE,ENABLE,DELETE-COMPANY
function cmpEmbl(){
	var compp_iid=$('.comp_iid').val();
	alert(compp_iid);
}
//----------------------------------------------------------------------------------------------------MODIFYING PRODUCTS
$(document).ready(function(){
			$("#glst").click(function(){
			$("#md_st_nm").removeAttr("disabled");
							});
			$("#glpr").click(function(){
			$("#md_pr_nm").removeAttr("disabled");
							})
			$("#glty").click(function(){
			$("#md_ty_nm").removeAttr("disabled");
							})
			$("#glnm").click(function(){
			$("#md_nm_nm").removeAttr("disabled");
							})
			$("#glqt").click(function(){
			$("#md_qnt_nm,#md_qntt_nm").removeAttr("disabled");
							})
			$("#glqtt").click(function(){
			$("#md_qntt_nm").removeAttr("disabled");
							})
			$("#dtls").click(function(){
				$("#mdd").css("background-color","#b7c4ab");
				$("#mdc").css("background-color","#fff");
				$("#dv_qntt").css("display","block");
				$("#dv_dtls").css("display","none");
			})
			$("#cmt").click(function(){
				$("#mdc").css("background-color","#b7c4ab");
				$("#mdd").css("background-color","#fff");
				$("#dv_dtls").css("display","block");
				$("#dv_qntt").css("display","none");
			})
})
//------------------------------------------------Modify products contents
function upCngPr(){
	var prstt=document.getElementById("prsstt").value;
	if (prstt==2) {
		var prid=document.getElementById("priid").value;
		var pcQnt=document.getElementById("md_qnt_nm").value;
		var psQnt=document.getElementById("md_qntt_nm").value;
		var mmoppr=1;
		if (psQnt=="" || pcQnt=="") {
			document.getElementById("resp_uup").innerHTML="Please fill all fields";
		}else{
			$.ajax({url:"../../js/ajax/index.php",
			type:"GET",data:{mmoppr:mmoppr,prid:prid,prstt:prstt,pcQnt:pcQnt,psQnt:psQnt},cache:false,success:function(res){$("#resp_uup").html(res);}
			});
		}
	}else{
		var prid=document.getElementById("priid").value;
		var prstt=document.getElementById("prsstt").value;
		var psQnt=document.getElementById("md_qntt_nm").value;
		var mmoppr=1;
		if (psQnt=="") {
			document.getElementById("resp_uup").innerHTML="Please fill all fields";
		}else{
			$.ajax({url:"../../js/ajax/index.php",
			type:"GET",data:{mmoppr:mmoppr,prid:prid,prstt:prstt,psQnt:psQnt},cache:false,success:function(res){$("#resp_uup").html(res);}
			});
		}
	}

}
//------------------------------------------------Modify products details
function updDtls(){
	var prtyp=document.getElementById("prtypp").value;
	var priid=document.getElementById("priid").value;
	updttt=1;
	if (prtyp=="Set") {

		var prnm=document.getElementById("md_nm_nm").value;
		var prctgr=document.getElementById("md_ty_nm").value;
		var prprc=document.getElementById("md_pr_nm").value;
		var prsetq=document.getElementById("md_st_nm").value;

		if (prnm=="" || prprc=="" || prsetq=="" || prctgr=="") {
			document.getElementById("resp_uup").innerHTML="Please fill all fields";
		}else{
			//alert(prnm+" "+prctgr+" "+prprc+" "+prsetq);
			$.ajax({url:"../../js/ajax/index.php",
			type:"GET",data:{updttt:updttt,prtyp:prtyp,priid:priid,prnm:prnm,prctgr:prctgr,prprc:prprc,prsetq:prsetq},cache:false,success:function(res){$("#resp_uup").html(res);}
			});
		}
	}else if(prtyp=="Unique"){

		var prnm=document.getElementById("md_nm_nm").value;
		var prctgr=document.getElementById("md_ty_nm").value;
		var prprc=document.getElementById("md_pr_nm").value;

		if (prnm=="" || prprc=="" || prctgr=="") {
			document.getElementById("resp_uup").innerHTML="Please fill all fields";
		}else{
			//alert(prnm+" "+prctgr+" "+prprc);
			$.ajax({url:"../../js/ajax/index.php",
			type:"GET",data:{updttt:updttt,prtyp:prtyp,priid:priid,prnm:prnm,prctgr:prctgr,prprc:prprc},cache:false,success:function(res){$("#resp_uup").html(res);}
			});
		}
	}else{
		document.getElementById("resp_uup").innerHTML="<b><h3>Sji ERROR :  01 - A Occured. || Please contact Administrator to solve this issue...</h3></b>";
	}

}


//---------------------------------------------------------------------------------------------------------------DELETING PRODUCT
function ysDlpr(){
	var pr_id=document.getElementById("priid").value;
	var prdlys=1;
	$("#dl_header").css("display","none");
	$("#dl_footer").css("display","none");
	$.ajax({url:"../../js/ajax/index.php",
	type:"GET",data:{prdlys:prdlys,pr_id:pr_id},cache:false,success:function(res){$("#dl_cont").html(res);}
	});
}
//-------------------------------------------------------------------------------------------------------------------CHABGE USERNAME
function chgUsrnm(){
	$("#resp_chg_pss").html("<center><div class='loader'></div></center>");
	var newfNm=document.getElementById("new_pass").value;
	var newsNm=document.getElementById("conf_pass").value;
	var lngNmm=newfNm.length;
	var cngusr=1;
	if (newfNm=="" || newsNm=="") {
		document.getElementById("resp_chg_pss").innerHTML="Please fill all fields";
	}else{
		if (newfNm==newsNm) {
			if (lngNmm>4) {
				if (lngNmm<37) {
					$.ajax({url:"js/ajax/index.php",
					type:"GET",data:{cngusr:cngusr,newfNm:newfNm},cache:false,success:function(res){$("#resp_chg_pss").html(res);}
					});
				}else{
					document.getElementById("resp_chg_pss").innerHTML="Too long | Username range : <b> 5-36</b> characters.";
				}
			}else{
				document.getElementById("resp_chg_pss").innerHTML="Too short | Username range : <b> 5-36</b> characters.";
			}
		}else{
			document.getElementById("resp_chg_pss").innerHTML="Usernames don't match...";
	}
	}
}
//--------------------------------------------------------------------------------------ORIENT COMPANY TO Spr
function orntCmp(){
	var suComp=document.getElementById("pcomp").value;
	var suSpr=document.getElementById("pspr").value;
	var compSpr=true;
	if (suComp=="default" ||suComp=="" || suSpr=="default" || suSpr=="") {
		document.getElementById("resp_reg").innerHTML="Please fill all fields";
	}else{
		$.ajax({url:"../../../js/ajax/index.php",
		type:"GET",data:{compSpr:compSpr,suComp:suComp,suSpr:suSpr},cache:false,success:function(res){$("#resp_reg").html(res);}
		});
	}
}
//-----------------------------------------------------------------------------------------Datepicker---------- on Company Supr
function datSprPckr(){
	openNavLoader();
	var dtFrm=document.getElementById("lblefrom").value;
	var dtTo=document.getElementById("lbleto").value;
	var cmpSsb=document.getElementById("cmpssb").value;
	//var cmpRte=document.getElementById("cmprte").value;
	var dtPckSprDne=true;
	if (dtFrm=="" || dtTo=="") {
		closeNavLoader();
		alert("Please Fill all forms...");
	}else{
		if (dtFrm>dtTo) {
			closeNavLoader();
			alert("'FROM' Must be before or same as 'TO'");
		}else{
			$.ajax({url:"../../../js/ajax/index.php",
			type:"GET",data:{dtPckSprDne:dtPckSprDne,dtFrm:dtFrm,dtTo:dtTo,cmpSsb:cmpSsb/*,cmpRte:cmpRte*/},cache:false,success:function(res){$("#spr_tbbd").html(res);}
			});
		}
	}
}


//------------------------------------------------------------------------------------------------SPR SETTING ANOTHER RATE-------------------
function sprSetRate(){
	var sprNewRate=document.getElementById("newrrtin").value;
	var stantrte=true;
	$.ajax({url:"../../../js/ajax/index.php",
	type:"GET",data:{stantrte:stantrte,sprNewRate:sprNewRate},cache:false,success:function(res){$("#spr_tbbd").html(res);}
	});
}

//-------------------------------------------------------------------OPENING AND CLOSING NAVs on SCREEN LOADER OVERLAY
function openNavLoader() {
    document.getElementById("myNav").style.display = "block";
}

function closeNavLoader() {
    document.getElementById("myNav").style.display = "none";
}

function sprPrntDtl(){
 $(document).ready(function(){
 	$("#sprinvoice_link").click();
 })
}


//-------------------------------------------------------------------DOWNLOAD Spr INVOICE
 function pdwnPdfCrtInvc() {
 	window.location='../mpdf';
 }