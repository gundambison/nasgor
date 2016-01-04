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