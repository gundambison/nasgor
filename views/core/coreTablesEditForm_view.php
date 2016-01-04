<?php 
/****
	views	: core/coreTablesEditForm_view
	created	: 13-11-2015 21:36:57
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start(); 
?>

<?php 
$aStatus=array();

	$SQL="select stat_id id,stat_name name from {$this->status->table} 
	order by stat_name asc";//{$data['menu_parent']}";
	$result=dbQuery($SQL,1);
		$i=0;
	$aStatus=$selectStatus=array();		
		foreach ($result->result_array() as $row){
			$aStatus[$row['id']]=$row['name'];
		}
		
	$aStatTale=$this->status->statusTable( $post['table_id']);
	foreach($aStatTale as $row){
		$selectStatus[]=$row['id'];
	}
	
echo  bsSelect("Status", "status", $aStatus, $selectStatus);
?>
<script>$('#input_status').multiSelect();</script>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Mengedit Data Table ',
	'footer'=>' '

);
echo json_encode($result);