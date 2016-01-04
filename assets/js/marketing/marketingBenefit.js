/****
		Javascript	: marketing/marketingBenefit.js
		created	: 01-01-2016 00:56:42
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
			$("#frmMain").attr('action',urlFormSave);
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
		ben_id:lastsel
	}
	showLog('edit='+lastsel);
	if(lastsel>0) statusBtn=true;	
	if(statusBtn==true){
		//open new window 
		url=urlFormEdit+lastsel;
		//var myWindow = window.open(url, "edit_"+lastsel, "width=200, height=100");
		res=sendAjax(urlFormEdit0,param);
		res.success(function(result,status) {
			url=baseUrl+"core/blank";
			showLog(url);showLog(result);
			var myWindow2 = window.open(url, "edit2_"+lastsel, " scrollbars=yes, resizable=yes,width=800, height=500");
			myWindow2.body=result.body;
			
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
   	colNames:[  'Name', 'Created'],
   	colModel:[
   		{
			name:'name',
			index:'ben_name', 
			width:205
		},
   		{
			name:'created',
			index:'ben_created', 
			width:190,			
		}, 
   	],
   	rowNum:10,
   	rowList:[10,25,40],
   	pager: '#pager',
   	sortname: 'ben_pos',
    viewrecords: true,
    sortorder: "asc",
    caption:"Klinik Benefit",
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