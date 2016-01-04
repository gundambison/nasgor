<script type="text/javascript" language="javascript" 
src="<?=my_url();?>assets/js/jquery.dataTables.js"></script>
<style>
.textbox{
	width:600px;
}
dd{
	padding:10px 0;
}
dl{
	width:650px;
}
input.span2{
	min-width:300px;
}
</style>
<a href='<?=my_url();?>'>Index</a>|
<a href='<?=my_url();?>form/005bootstrap'>List Tutorial Bootstrap</a>
<hr/>
<div style='width:800px;margin:auto'>
<?php
 
$id=auto_id('nasgor_tutorial',1);
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id='dataTutorial'>
	<thead>
		<tr>
			<th>TUTOR</th>
			<th>Nama</th>
			<th>Posisi</th>
			<th>LINK</th>
		</tr>
	</thead>
	<tbody class='bodyTable'>
	<tr>
	<td> -</td><td> -</td><td> -</td><td> -</td>
	</tr>
	</tbody>
	<?php
	/*
$sql="select count(*) c from nasgor_tutorial t1,nasgor_tutoriallist t2 
where tlist_tutor=tutor_id and tutor_id=1"; //hanya buat bootstrapForm
$tableData= queryFetch($sql);
if($tableData['c']==0)
{
?>
	
<?php
}else{

}
*/
?>
	<tfoot>
		<tr>
			<th>TUTOR</th>
			<th>Nama</th>
			<th>Posisi</th>
			<th>LINK</th>
		</tr>
	</tfoot>
</table>
<input type=button onclick='reloadTable()' value='reload table' />
	<?php showView('project/0005script_view' );?>
<form id='bootstrapForm'><input name='tutorid' value="<?=$id;?>" class='span2 tutorid' type='hidden' />
<input name='tutorhead' value=1 type='hidden' /><br/><br/><br/>
 <dl class='input-prepend'>   
 <dd style='text-align:right'><input class='btn' value='save ' type='button' onclick='saveForm()' /><br/></dd>
 <dd>
	<span class="add-on">Nama</span><input type='text' name='tutorname' class='span2 tutorname' />
 </dd>
   
 <dd>
	<span class="add-on">Posisi</span><input type='text' name='tutorposisi' class='span2 tutorposisi' style='min-width:10px' />
 </dd>
 <dd>
	<span class="add-on">Preview</span><select name='tutorpreview' class='span2 tutorpreview'>
	<option value=0>Hide
	<option value=1>Ditampilkan
	</select>
 </dd>
 </dl>
 <dl>
  <dt>Detail / Keterangan  </dt>
 <dd> 
	<textarea name='tutordetail' rows=3 class='tutordetail textbox'></textarea>
 </dd>
  <dt>Kode  </dt>
 <dd>
	<textarea name='tutorcode' rows=3 class='tutorcode textbox'></textarea>
 </dd>
 <dd style='text-align:right'><input class='btn' value='save ' type='button' onclick='saveForm()' /><br/></dd>
 </dl>
	
</form>
</div>
<div style='clear:both;padding:30px 0'></div>
<div style='width:800px;margin:auto'>

<textarea style='height:300px;width:600px'><?php 
ob_start();
showView('project/0005sql_view' );
$post=ob_get_contents(); 
ob_end_clean();  
echo htmlentities($post);
?>
</textarea>
</div>