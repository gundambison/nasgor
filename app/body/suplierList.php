<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

$data=array(
'title'=>'Daftar Suplier',
'content'=>'suplier/table_view',
'tab'=>array(),
'nav'=>array(),
'breadcrumb'=>'Suplier'
);
 
 
showView('index1_view', $data);
 
