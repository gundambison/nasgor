<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

ob_start();
echo '<pre>';
$f='';
if(myUri(2)=='edit')
{
	$f='edit_view';
}

if(myUri(2)=='baru')
{
	$f='new_view';
}

$data=array( 
	'id'=>myUri(3)
);
showView('store/'.$f, $data);
$post=ob_get_contents();	
ob_end_clean();    
echo $post;