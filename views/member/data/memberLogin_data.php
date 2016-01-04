<?php 
/****
	views	: member/data/memberLogin_data
	created	: 14-11-2015 01:50:52
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="member"; //change this 
$module2="userjomla";
$this->$module->synch();
$data0=$this->$module2->getData($post['username'],'username');
$data=$data0[0];
$pass1=$data['password'];
$password= $post['password'] ;
	$ar=explode(":",$pass1);
	$pass2=md5($password.$ar[1]).":".$ar[1] ;
//$data1=$this->$module2->getData($password,'user_password');
if($pass1==$pass2 ){ //$data0==$data1){
	echo 'OK';
	$status=true;
	$message='Please Wait, You will directed ';
	$data=array( 
		'erp_username'=>$post['username'],
		'erp_password'=>$pass2
	);
	
	$this->session->set_userdata($data);
	$time=date("Y-m-d H:i:s", strtotime("+1 hours"));
	$this->session->set_userdata('erp_time',$time);
	
}
else{ 
	echo 'FAILED '.$pass.'|'.$password;
	$status=false;
	$message='Check your username or password';
	
}
 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'status'=>$status,
	'message'=>$message,
	'url'=>site_url()
	//$this->session->userdata('target_url')  
);
echo json_encode($result);