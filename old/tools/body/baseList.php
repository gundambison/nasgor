<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

$data=array(
'title'=>'%title%',
'content'=>'%nama%/table_view',
'tab'=>array(),
'nav'=>array(),
'breadcrumb'=>'%title% (%nama%)'
);

showView('index1_view', $data); 