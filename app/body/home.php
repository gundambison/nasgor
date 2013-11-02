<?php
if(!checkLogin())
{
	redirect(my_url()."login");

}

//===========HEAD
$data['head']['title']='SELAMAT DATANG';
//==========Nav
$data['nav']['active']='home';

 

//==========content
$data['fileContent']='marketing';
$data['tab']=array();

showView('index', $data);