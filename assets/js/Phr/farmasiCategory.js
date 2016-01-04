/****
		Javascript	: Phr/farmasiCategory.js
		created	: 02-01-2016 23:32:47
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
var lastsel;
/*
===================SAVE and UPDATE===========
*/
function saveFormData()
{
	target=$("#frmMain");
	showLog( target.serialize());
	param=target.serialize(); 
	res=sendAjax(urlFormSave,param); 
		res.success(function(result,status) { 
			showLog("success");
			showLog(result);
			$("#modalBody").empty().append(result.body);
			$("#footerDetail").empty().append(result.footer);
			$("#modalHead").empty().append(result.title);
			$("#myModal").modal({show: false}); 
			jQuery("#list,#list2").trigger('reloadGrid');	
		});
		res.error(function(xhr,status,msg){			 
			showLog("Error");
			showLog(status);
			showLog(msg);
			showLog(xhr);			
		});
		
}
/*
===================ADD DATA===========
*/
function btnAdd()
{
	param={
		action:"addSub"
	}
	res=sendAjax(urlFormAdd,param);
	res.success(function(result,status) {
		lastsel=result.id;
		btnEdit();	
	});
		res.error(function(xhr,status,msg){
			$("#modalBody").empty().append(msg);
			$("#footerDetail").empty().append("status :"+status);
			$("#modalHead").empty().append("ERROR");
			$("#myModal").modal({
				show: true
			});
			showLog("Error");
			showLog(status);
			showLog(msg);
			showLog(xhr);			
		});
	
}
function btnAdd0()
{
statusBtn=true;
	param={
		action:"addSub"
	}
	if(statusBtn==true){
		res=sendAjax(urlFormAdd,param);
		res.success(function(result,status) {
			$("#modalBody").empty().append(result.body);
			$("#footerDetail").empty().append(result.footer);
			$("#modalHead").empty().append(result.title);
			$("#myModal").modal({
				show: true
			});			 
			showLog("success");showLog(result);			 
		});
		res.error(function(xhr,status,msg){
			$("#modalBody").empty().append(msg);
			$("#footerDetail").empty().append("status :"+status);
			$("#modalHead").empty().append("ERROR");
			$("#myModal").modal({
				show: true
			});
			showLog("Error");
			showLog(status);
			showLog(msg);
			showLog(xhr);			
		});
		
	}
	else{ 
		$("#modalBody").empty().append("Check kembali Input Anda");
			$("#footerDetail").empty() ;
			$("#modalHead").empty().append("Warning");
			$("#myModal").modal({
				show: true
			});
	
	}
}
/*
===========EDIT DATA ==============
*/
function btnEdit()
{
statusBtn=false;
	param={
		cat_id:lastsel
	}
	showLog('edit='+lastsel);
	if(lastsel>0) statusBtn=true;	
	if(statusBtn==true){
		res=sendAjax(urlFormEdit,param);
		res.success(function(result,status) {
			$("#modalBody").empty().append(result.body);
			$("#footerDetail").empty().append(result.footer);
			$("#modalHead").empty().append(result.title);
			$("#myModal").modal({show: true});			 
			showLog("success");showLog(result);			 
		});
		res.error(function(xhr,status,msg){
			$("#modalBody").empty().append(msg);
			$("#footerDetail").empty().append("status :"+status);
			$("#modalHead").empty().append("ERROR");
			$("#myModal").modal({show: true});
			showLog("Error");
			showLog(status);
			showLog(msg);
			showLog(xhr);			
		});
		
	}
	else{ 
		$("#modalBody").empty().append("Pilih Salah satu Data");
			$("#footerDetail").empty() ;
			$("#modalHead").empty().append("Warning");
			$("#myModal").modal({
				show: true
			});
	
	}
}

/*
========================
Change the field. remember change the data 
*/
jQuery("#list").jqGrid({
   	url:dataUrl1,
	datatype: "json",
   	colNames:[ 'Kode','Name', 'Position'],
   	colModel:[
   		 {
			name:'code',
			index:'cat_code', 
			width:125,
			align:'center',
		},
		{
			name:'name',
			index:'cat_name', 
			width:405
		},
   		{
			name:'pos',
			index:'cat_pos', 
			width:60,	
			align:'center',
		}, 
   	],
   	rowNum:10,
   	rowList:[10,25,40],
   	pager: '#pager',
   	sortname: 'cat_id',
    viewrecords: true,
    sortorder: "asc",
    caption:"farmasi_category",
	editurl:urlother,
	onSelectRow: function(id){
		if(id && id!==lastsel){			 
			lastsel=id;
			
		}
	}
});
jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false});
/*
no log in production
*/
function showLog(txt)
{
	if(showLog==true){
		console.log(txt);
	}
}