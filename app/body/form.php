<?php
$open=intval(myUri(2));
$data=array(
'title'=>'Welcome',
'content'=>'project/'.sprintf("%04s",$open)
 
);

showView('base_view', $data); 