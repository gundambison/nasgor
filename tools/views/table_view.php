<style>
 
</style> 
<div class='cari'>Search 
<!--edit this manualy-->
	<select class='cariSelect'>
		<option value='code'>Code 
		 
	</select>
	<input type=text class='cariText' />
	<input type=button class='cariButton' value='cari'
	onclick='cariData()' />
</div>
 <table id="dg" title="<?php 
 echo $title;?>" class="easyui-datagrid" style="width:700px;height:450px"
			url="<?php echo my_url();?>%nama%Data"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
			 %listTable%			 
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newform()">New</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="view()">View</a>
		
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class='form'></div>
	</div>
	<div id="win">
    &nbsp;
	</div>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" 
		onclick="saveUser()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>	
<script>
 

function cariData()
{
	$('#dg').datagrid('load',{
        type: $('.cariSelect').val(),
        key: $('.cariText').val()
    });
}

function updateForm()
{
	selectorform="form#UpdateForm";
	var datax = $(selectorform).serialize();
	console.log(datax);
	var request = $.ajax({
          url: "<?php echo my_url();?>%nama%Action/update",
          type: "POST",
          data: datax,
          dataType: "json"
    });
	request.success(function(msg) {
		console.log('data sudah terkirim');		 
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

function newData()
{
	selectorform="form#UpdateForm";
	var datax = $(selectorform).serialize();
	console.log(datax);
	var request = $.ajax({
          url: "<?php echo my_url();?>%nama%Action/new",
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
	title:'%nama%'
	});
}

function newform(){
	createWin();
	url="<?php echo my_url();?>%nama%Form/baru";
	$('#win').window('refresh', url);
	$('#win').window('open');
} 

function edit(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		createWin(); 
				url="<?php echo my_url();?>%nama%Form/edit/"+row.id;
				$('#win').window('refresh', url);
				$('#win').window('open');
 
	}else{
		alert('Pilih yang akan di edit');
	
	}
}

function view(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		createWin();
 
				url="<?php echo my_url();?>%nama%Form/view/"+row.id;
				$('#win').window('refresh', url);
				$('#win').window('open');
 
	}else{
		alert('Pilih yang akan di lihat');
	
	}
}
</script>