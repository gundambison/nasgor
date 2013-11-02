<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

$data=array(
'title'=>'mata uang',
'content'=>'kurs/table_view',
'tab'=>array(),
'nav'=>array(),
'breadcrumb'=>'mata uang (kurs)'
);

showView('index1_view', $data); 