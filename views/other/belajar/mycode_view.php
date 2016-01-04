<?php 
/****
	views	: belajar/mycode_view
	created	: 20-11-2015 14:59:23
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($files as $file){ 
	echo '<h4>'.$file['name'].'</h4>';
	$txt=$this->load->view($file['source'] ,$this->param,true);
?><textarea style='width:90%;padding:30px;height:150px'><?=htmlentities($txt);?></textarea>
<?php
}

foreach($filesjs as $file){ 
	echo '<h4>'.$file['name'].'</h4>';
	$txt=file_get_contents("assets/js/".$file['source']);
?><textarea style='width:90%;padding:30px;height:150px'><?=htmlentities($txt);?></textarea>
<?php
}

