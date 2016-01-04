/****
	Javascript	: belajar/belajarJqgrid1.js
	created	: 20-11-2015 14:27:40
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
jQuery("#list").jqGrid({
   	url:dataUrl1,
	datatype: "json",
   	colNames:['ID','Kode','Name', 'Price'],
   	colModel:[
   		{
			name:'id',
			index:'gun_id', 
			width:95,
			align:'right',
		},{
			name:'code',
			index:'gun_code', 
			width:95,
			align:'center',
		},
		{
			name:'name',
			index:'gun_name', 
			width:205
		},
   		{
			name:'price',
			index:'gun_price', 
			width:150,
			align:'right',
		}, 
   	],
   	rowNum:5,
   	rowList:[5,15,25,40],
   	pager: '#pager',
   	sortname: 'gun_id',
    viewrecords: true,
    sortorder: "asc",
    caption:"Gundam", 
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


jQuery("#a1").click( function(){
	var id = jQuery("#list").jqGrid('getGridParam','selrow');
	if (id)	{
		var ret = jQuery("#list").jqGrid('getRowData',id);
		alert("id="+ret.id+" name="+ret.name+"...");
		console.log(ret);
	} else { 
		alert("Please select row");
	}
});

jQuery("#a2").click( function(){
	var su=jQuery("#list").jqGrid('delRowData', 2);
	if(su){
		alert("Succes. Write custom code to delete row from server"); 
	}
	else {
		alert("Allready deleted or not in list");
	}
});

jQuery("#a3").click( function(){
	var su=jQuery("#list").jqGrid('setRowData',3301,{code:"zzzz",name:"unknown robot",price:"99999" });
	if(su){
		alert("Succes. Write custom code to update row in server"); 
	}
	else{
		alert("Can not update");
	}
});

jQuery("#a4").click( function(){
	var datarow = {id:99,code:"zzzz1",name:"unknown robot2",price:"89999"} ;
	var su=jQuery("#list").jqGrid('addRowData',99,datarow);
	if(su){
		alert("Succes. Write custom code to add data in server. update in bottom"); 
	}else{
		alert("Can not update");
	}
	
});