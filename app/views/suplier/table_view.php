<style>
 
</style> 
 <table id="dg" title="<?php 
 echo $title;?>" class="easyui-datagrid" style="width:700px;height:450px"
			url="<?php echo my_url();?>suplierData"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="sup_code" width="50">Kode</th>
				<th field="sup_nama" width="100">Nama</th>
				<th field="status" width="50">Status</th>
				 
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newform()">New</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class='form'></div>
	</div>
	<div id="win">
    &nbsp;
	</div>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>	
<script>
function updateForm()
{
	selectorform="form#UpdateForm";
	var datax = $(selectorform).serialize();
	console.log(datax);
	var request = $.ajax({
          url: "<?php echo my_url();?>suplierAction/update",
          type: "POST",
          data: datax,
          dataType: "json"
    });
	request.success(function(msg) {
		console.log('data sudah terkirim');		 
	});
	$('#win').window('close');
	$('#dg').datagrid('reload');
}

function newData()
{
	selectorform="form#UpdateForm";
	var datax = $(selectorform).serialize();
	console.log(datax);
	var request = $.ajax({
          url: "<?php echo my_url();?>suplierAction/new",
          type: "POST",
          data: datax,
          dataType: "json"
    });
	request.success(function(msg) {
		console.log('data sudah terkirim');		 
		if(msg.err)
		{
			alert(msg.err);
			
		}else{
			$('#win').window('close');
			$('#dg').datagrid('reload');
		}
		
	});
 
}

function createWin()
{
	$('#win').window({
    width:600,
    height:400,
    modal:true,
	title:'Suplier'
	});
}
function newform(){
	createWin();
	url="<?php echo my_url();?>suplierForm/baru";
	$('#win').window('refresh', url);
	$('#win').window('open');
} 
function edit(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		createWin();
				//$('#dlg').dialog('open').dialog('setTitle','Edit Suplier');
				//$("#dlg .form").empty();
				url="<?php echo my_url();?>suplierForm/edit/"+row.id;
				$('#win').window('refresh', url);
				$('#win').window('open');
				/*
				var request = $.ajax({
					  url: "<?php echo my_url();?>suplierForm",
					  type: "POST",
					  data: {id:row,act:'edit'},
					  dataType: "json"
				});
				request.success(function(msg) {
					console.log('data sudah terkirim');
					//$("#dlg .form").html(msg.post);
					
					
				});
				*/
	}else{
		alert('Pilih yang akan di edit');
	
	}
}
</script>