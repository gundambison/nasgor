<?php
//===========HEAD
$data['head']['title']='SELAMAT DATANG';
//==========Nav
$data['nav']['active']='home';

$data['jumboTron']=1;
//$data['carousal']=1;

//==========content
$data['fileContent']='marketing';
$data['content']=array('test');

showView('index', $data);