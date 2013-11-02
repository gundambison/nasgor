<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

$data=array(
'title'=>'Produk',
'content'=>'item/table_view',
'tab'=>array(),
'nav'=>array(),
'breadcrumb'=>'Produk (item)'
);

showView('index1_view', $data); 