<?php
$open=myUri(2);
$data=array(
'title'=>'Welcome',
'content'=>'article/tutor',
'uri'=>$open 
);

showView('article/tutor_view', $data); 