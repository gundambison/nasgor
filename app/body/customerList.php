<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

$data=array(
'title'=>'Daftar Pelanggan',
'content'=>'customer/table_view',
'tab'=>array(),
'nav'=>array(),
'breadcrumb'=>'Pelanggan'
);

showView('index1_view', $data); 