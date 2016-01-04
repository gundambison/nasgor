<?php
$prefix="raja_"; //change this
	if(isset($_GET['act']))
	{
	 
		ob_start();
		// echo '<pre>'; print_r($_POST);echo '</pre>';
		$sql="CREATE TABLE IF NOT EXISTS `raja_kursdetail` (
`kdet_id` int(11) NOT NULL AUTO_INCREMENT,
`kdet_detail`text COMMENT 'bla bla',
PRIMARY KEY (`kdet_id`) );";
	foreach($_POST as $n=>$v){
		if(!is_array($v))$$n=trim($v);
	}
		$sql="CREATE TABLE IF NOT EXISTS `{$prefix}{$nama}` (\n`{$prefnama}_id` int(11) NOT NULL AUTO_INCREMENT";
	foreach($_POST['form1']['name'] as $id=>$v2)
	{
		$sql.=",\n`{$prefnama}_$v2` ";
		$type=$_POST['form1']['type'][$id];
		if($type=='txt') 
			$sql.=" varchar(30) DEFAULT NULL ";
		if($type=='num') 
			$sql.=" Int(11) DEFAULT NULL";
			
		if($type=='date') 
			$sql.=" date";
			
	}	
	
		$sql.=",\n`{$prefnama}_time` timestamp,\nPRIMARY KEY (`{$prefnama}_id`) );\n\n";
		
	$comment='';
	foreach($_POST['form2']['name'] as $id=>$v2)
	{
		$comment.="$v2, ";
	}
	$comment.="etc";
	
		$sql.="CREATE TABLE IF NOT EXISTS `{$prefix}{$nama}detail` (\n`{$prefnama}det_id` int(11) NOT NULL AUTO_INCREMENT,\n`{$prefnama}det_detail`text COMMENT '$comment',\n";		
		$sql.="PRIMARY KEY (`{$prefnama}det_id`) );\n\n";
		?><div id="tabsForm2">
	<ul  >
		<li><a href="#form1a">SQL</a></li>
		<li><a href="#form2a">ACTION</a></li> 
		<li><a href="#form3a">BODY</a></li> 
		<li><a href="#form4a">VIEWS</a></li> 
	</ul>
	<div id='form1a'>
		SQL:<br/><textarea style='clear:both; margin:10px 0;width:800px;height:300px'><?=htmlentities($sql);?></textarea></div> 
		<?php
		$iForm=2;
		$aDir=array('action','body','views');
		foreach($aDir as $dir)
		{
		?><div id='form<?=$iForm++;?>a'><?php
			$d=dir($dir);
			while (false !== ($entry = $d->read())) {
			  if($entry !="."&&$entry !=".."&&$entry !="index.html")
			  {
				$f=file_get_contents("$dir/$entry");
				$f2=str_replace("base",$nama,"$dir/$entry<br>");
				$f2=str_replace("views/","views/$nama/",$f2);
				
				echo $f2;
				$f=parse($f,$_POST);
				?><textarea style='clear:both; margin:10px 0;width:800px;height:300px'><?=htmlentities($f);?></textarea><hr><?php
			  }
			  
			}
			$d->close();
		?></div><?php		
		
		}
		?> </div>
<script>
$(function() {
 
	$( "#tabsForm2" ).tabs();
});
</script>		
		<?php
{
/*
Array
(
    [nama] => kurs
    [prefnama] => kurs
    [codeModel] => 0
    [title] => kurs mata uang
    [show0] => 5
    [show1] => 10,30,50,100
    [form1] => Array
        (
            [title] => Array
                (
                    [1] => Kode
                    [2] => Nama
                    [3] => Status
                    [6] => Update
                    [7] => sumber
                )

            [name] => Array
                (
                    [1] => code
                    [2] => name
                    [3] => stat
                    [6] => update
                    [7] => link
                )

            [type] => Array
                (
                    [1] => txt
                    [2] => txt
                    [3] => txt
                    [6] => date
                    [7] => txt
                )

            [show] => Array
                (
                    [1] => on
                    [2] => on
                    [3] => on
                    [7] => on
                )

        )

    [form2] => Array
        (
            [title] => Array
                (
                    [4] => negara
                    [5] => code currency
                    [8] => cerita negara
                )

            [name] => Array
                (
                    [4] => country
                    [5] => cur
                    [8] => story
                )

            [type] => Array
                (
                    [4] => chr
                    [5] => chr
                    [8] => text
                )

        )

)
*/
}		
 
		$post=ob_get_contents();
		ob_end_clean();    
		$a=array(
			'post'=>$post
		);
		echo json_encode($a);
		die( );
	}

	
function parse($f, $ar)
{
	foreach($ar as $n=>$v)
	{
		if(!is_array($v))
			$f=str_replace("%$n%",$v,$f);
	}
 
	$n="%tableinsert%";$v=$ar['prefnama'].'_id=>$id';
	
	reset($ar);
	//echo '<pre>';print_r($ar['form1']['name']);echo'</pre>';
	foreach($ar['form1']['name'] as $v2)
	{
		//$v.=", {$ar['prefnama']}_{$v2}";
		$v.=", '{$ar['prefnama']}_{$v2}'=>\${$ar['prefnama']}_{$v2} ";
		
	}
	$f=str_replace($n,$v,$f);
 	
	$n="%tableupdate%";$v='';$i=0;
	foreach($ar['form1']['name'] as $v2)
	{
		$i>0?$v.=",\n":$v="\n";
		$v.=" {$ar['prefnama']}_{$v2} ='\".addslashes(\${$ar['prefnama']}_{$v2}).\"";
		$i++;
		//`%prefnama%name` =  '$%prefnama%name',
	} 
	$f=str_replace($n,$v,$f);
 	
	$n="%tableshow%"; $v='';
	foreach($ar['form1']['show'] as $i=>$v2)
	{
		$v.=",\n\t'{$ar['form1']['name'][$i]}'=>\$row[{$ar['form1']['name'][$i]}_{$v2}]";
		//'code'=>$row['%prefnama%_code'],
	}
	$f=str_replace($n,$v,$f);
	
	$n="%listMain%";$v='';
	foreach($ar['form1']['show'] as $i=>$v2)
	{
		$v.="<label>".
		strtoupper($ar['form1']['title'][$i]).
		"</label>\n\t    <?=\${$ar['form1']['name'][$i]};?>\n\t";
	}	
	$f=str_replace($n,trim($v),$f);
	
	$n="%listDetail%";$v='';
	foreach($ar['form2']['title'] as $i=>$v2)
	{
		$v.="<label>".
		strtoupper($ar['form2']['title'][$i]).
		"</label>\n\t    <?=\${$ar['form2']['name'][$i]};?>\n\t";
	}	
	$f=str_replace($n,trim($v),$f);
	
	$n="%listTable%";$v='';
	foreach($ar['form1']['show'] as $i=>$v2)
	{
		$v.="\n\t<th field='{$ar['form1']['name'][$i]}' width='90'>".
		strtoupper($ar['form1']['title'][$i]).
		"</th>" ;
	}	
	$f=str_replace($n,trim($v),$f);
	
	$n="%listNew%";$v='';
	foreach($ar['form1']['title'] as $i=>$v2)
	{
		$v.="<label type='{$ar['form1']['type'][$i]}'>".
		strtoupper($ar['form1']['title'][$i]).
		"</label>\n\t  <input type=text placeholder='{$ar['form1']['title'][$i]}' name='{$ar['prefnama']}_{$ar['form1']['name'][$i]}' />\n\t";
	}
	$v.="<h3>DETAIL</h3>\t";
	foreach($ar['form2']['title'] as $i=>$v2)
	{
		$v.="<label type='{$ar['form2']['type'][$i]}'>".
		strtoupper($ar['form2']['title'][$i]).
		"</label>\n\t  <input type=text placeholder='{$ar['form2']['title'][$i]}' name='det[{$ar['form2']['name'][$i]}]'  />\n\t";
	}	
	$f=str_replace($n,trim($v),$f);
	
	$n="%listEdit%";$v='';
	foreach($ar['form1']['title'] as $i=>$v2)
	{
		$v.="<label type='{$ar['form1']['type'][$i]}'>".
		strtoupper($ar['form1']['title'][$i]).
		"</label>\n\t  <input type=text placeholder='{$ar['form1']['title'][$i]}' name='{$ar['prefnama']}_{$ar['form1']['name'][$i]}' value='<?=\${$ar['form1']['name'][$i]};?>' />\n\t";
	}
	$v.="<h3>DETAIL</h3>\t";
	foreach($ar['form2']['title'] as $i=>$v2)
	{
		$v.="<label type='{$ar['form2']['type'][$i]}'>".
		strtoupper($ar['form2']['title'][$i]).
		"</label>\n\t  <input type=text placeholder='{$ar['form2']['title'][$i]}' name='det[{$ar['form2']['name'][$i]}]' value='<?=\$det[{$ar['form2']['name'][$i]}];?>' />\n\t";
	}	
	$f=str_replace($n,trim($v),$f);
	/*<label>Code</label>
	<input type=text placeholder='Code' name='%prefnama%_code' value='<?=$code;?>' readonly />*/
	
 
	
	return $f;
}	
	?>
<link  href="../assets/css/cupertino/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<style>
#tabs{
	width:800px;
	margin:30px auto 10px;
}
#tabsForm{
	width:600px;
	margin:30px auto 10px;
}
.form1{
width:800px;
margin:auto;
}
.myForm2{
	list-style: none;
	padding: 5px 0;
	
}
.myForm2 li{
	margin: 15px 0;
}
.hide{
  display:none;
}
.buttonGo{
	margin:0 15px 0;
	float:right;	
}
.clear{
	clear:both;
}
.detail{
	width:900px;
	margin:20px auto;
}
</style>
<div class='form1'>
<div class='hide'>
	<div class='tableForm1'> 
	<table><tr>
	 <td><input size='10' name='form1[title][_num_]' /></td>
	 <td><input size='10' name='form1[name][_num_]' /></td>
	 <td>
		 <input type=radio name='form1[type][_num_]' value='num' />Angka 
		 <input type=radio name='form1[type][_num_]' value='txt' checked />text 
		 <input type=radio name='form1[type][_num_]' value='date' />Tanggal
	 </td>
	 <td><input type=checkbox name='form1[show][_num_]' /></td>
	</tr></table> 
	</div>
	<div class='tableForm2'>
	<table><tr>
	 <td><input size='10' name='form2[title][_num_]' /></td>
	 <td><input size='10' name='form2[name][_num_]' /></td>
	 <td>
		 <input type=radio name='form2[type][_num_]' value='num' />Angka
		 <input type=radio name='form2[type][_num_]' value='char' checked />char
		 <input type=radio name='form2[type][_num_]' value='text' />Text
	 </td>
	  
	</tr></table>
	</div>
</div>
<form id='myCRUD'>
<div id="tabsForm">
	<ul  >
		<li><a href="#form1">Table</a></li>
		<li><a href="#form2">Detail</a></li> 
		<li><a href="#form3">Field Utama*</a></li> 
		<li><a href="#form4">Field Detail*</a></li> 
	</ul>
	<div id="form1">
	<ol class='myForm2'>
	<li><input class='folder' name='folder' placeholder='nama Folder'   /></li>
	<li><input class='nama' name='nama' placeholder='nama table' onblur='updateTable(this)' /></li>
	<li><input class='preftab' name='prefnama' placeholder='prefix table' /> 
	Untuk prefix nama field</li>
	<li>Model Code *)<br/><input type='radio' selected class='codeModel' name='codeModel' value=1  />Code sendiri<input type='radio' value=0 class='codeModel' name='codeModel'   checked /> Base</li>
	</ol>*) bila kode sendiri maka akan punya table counter sendiri
	</div>
	<div id="form2">
	<ol class='myForm2'>
		<li><input class='title' name='title' placeholder='Judul Tab' /></li>
		<li><input class='min' name='show0' value=10 /> Minimal data yang tampil</li>
		<li><input class='nama' name='show1' value='20,30,50,100' />Tampil data yang lain</li>
	</ol>
	</div>
	<div id='form3'>
	Form Utama : untuk yang bisa dipakai buat pencarian
	<table class="tableForm3">
	<thead>
	<tr>
	 <th>JUDUL</th><th>NAMA (FIELD)</th><th>TIPE</th><th>SHOW</th>
	</tr>
	</thead>
	<tbody >
<?php
$aTable=array(
'code'=>'Kode',
'name'=>'Nama',
'stat'=>'Status'
);
$i=0;
foreach($aTable as $nm=>$val)
{
	$i++;
?>	
	<tr>
	 <td><input size='10' name='form1[title][<?=$i;?>]' value='<?=$val;?>' /></td>
	 <td><input size='10' name='form1[name][<?=$i;?>]' value='<?=$nm;?>' /></td>
	 <td>
		 <input type=radio name='form1[type][<?=$i;?>]' value='num' />Angka
		 <input type=radio name='form1[type][<?=$i;?>]' value='txt' checked /> text
		 <input type=radio name='form1[type][<?=$i;?>]' value='date' />Tanggal
	 </td>
	 <td><input type=checkbox name='form1[show][<?=$i;?>]' checked /></td>
	</tr>
<?php
}
?>
	</tbody>
	</table>
	*lebih dari 5 lebih baik bikin table lagi*
	<span class='namaTable'>base</span>value<p>
	<button class="butSubmit" type='button' onclick='addField("tableForm3");return false;' >Tambah Field </button>
	</div>
<!-- detail -->
<div id='form4'>
	Form Detail : untuk yang tidak digunakan untuk pencarian. Untuk kenyamanan, edit di form edit
	<table class="tableForm4">
	<thead>
	<tr>
	 <th>JUDUL</th><th>NAMA (FIELD)</th><th>TIPE</th> 
	</tr>
	</thead>
	<tbody >
<?php
$aTable=array(
'data1'=>'data1',
'data2'=>'data2', 
);
 
foreach($aTable as $nm=>$val)
{
	$i++;
?>	
	<tr>
	 <td><input size='10' name='form2[title][<?=$i;?>]' value='<?=$val;?>' /></td>
	 <td><input size='10' name='form2[name][<?=$i;?>]' value='<?=$nm;?>' /></td>
	 <td>
		 <input type=radio name='form2[type][<?=$i;?>]' value='num' />Angka
		 <input type=radio name='form2[type][<?=$i;?>]' value='chr' checked />char
		 <input type=radio name='form2[type][<?=$i;?>]' value='text' />text
	 </td>
	 
	</tr>
<?php
}
?>
	</tbody>
	</table>
	<button class="butSubmit" type='button' onclick='addField2("tableForm4");return false;' >Tambah Field </button>
	</div>
</div>
<div class='buttonGo'><button class="butSubmit" type='button' 
onclick='showForm()'	>Go >> </button></div>
</form>
</div>
<div class='clear'></div>
<div class='detail'>
 
</div>

<script>
var num="<?=$i;?>";
function showForm()
{
var selectorform = 'form#myCRUD';   
    //form-prod-detail
	console.log('mulaiAjax dijalankan');
	var datax = $(selectorform).serialize();
 	
    var request = $.ajax({
          url: "?act=tes",
          type: "POST",
          data: datax,
          dataType: "json"
    });
	request.success(function(msg) {
		console.log(msg.post);
		console.log('ok');
		$(".detail").html(  msg.post );
		 
	});
}
function addField (t)
{
	num++;
	txt=$(".tableForm1").html();
	console.log(txt);
	txt = txt.replace('<table><tbody>', '  ');
	txt = txt.replace('</tbody></table>', '  ');
	txt = txt.replace(/_num_/gi, num);
	console.log("="+num);
	console.log(txt);
	$this=$("."+t ).append(txt);
}

function addField2(t)
{
	num++;
	txt=$(".tableForm2").html();
	console.log(txt);
	txt = txt.replace('<table><tbody>', ' ');
	console.log(txt);
	txt = txt.replace('<table><tbody>', '  ');
	txt = txt.replace('</tbody></table>', '  ');
	txt = txt.replace(/_num_/gi, num);
	console.log("="+num);
	console.log(txt);
	$this=$("."+t ).append(txt);
}

function updateTable(t)
{
	$this=$(t);
	name="prefix_"+$this.val();
	console.log(name);
	$(".namaTable").html( name );
}

$(function() {
	$( ".butSubmit" ).button();
	$( "#tabs" ).tabs();
	$( "#tabsForm" ).tabs();
});
</script>