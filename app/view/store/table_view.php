<style>
 
</style> 
 <table id="dg" title="<?php 
 echo $title;?>" class="easyui-datagrid" style="width:700px;height:450px"
			url="<?php echo my_url();?>storeData"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
			 <th field="str_code" width="50">Kode</th>
			 <th field="str_nama" width="100">Nama</th>			  
				<th field="link" width="100">&nbsp;</th>
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
          url: "<?php echo my_url();?>storeAction/update",
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
          url: "<?php echo my_url();?>storeAction/new",
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
	title:'store'
	});
}
function newform(){
	createWin();
	url="<?php echo my_url();?>storeForm/baru";
	$('#win').window('refresh', url);
	$('#win').window('open');
} 
function edit(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		createWin();
				//$('#dlg').dialog('open').dialog('setTitle','Edit store');
				//$("#dlg .form").empty();
				url="<?php echo my_url();?>storeForm/edit/"+row.id;
				$('#win').window('refresh', url);
				$('#win').window('open');
 
	}else{
		alert('Pilih yang akan di edit');
	
	}
}
</script>