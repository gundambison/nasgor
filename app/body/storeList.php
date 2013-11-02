<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

$data=array(
'title'=>'Daftar Toko / Gudang',
'content'=>'Store/table_view',
'tab'=>array(),
'nav'=>array(),
'breadcrumb'=>'Toko'
);
 
 
showView('index1_view', $data);
 
