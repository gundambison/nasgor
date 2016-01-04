<?php 
/****
	views	: core/coreFixMyISAM_view
	created	: 20-11-2015 11:13:02
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<b>JANGAN JALANKAN INI Sebelum melakukan backup!!</b>
List Table:
<?php 
$ar=dbListTable();
//echo '<pre>'.print_r($ar,1).'</pre>';

