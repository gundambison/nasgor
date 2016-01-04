<?php 
/****
	views	: temp/data/tesbuah_data
	created	: 15-11-2015 00:05:22
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
//[{"id":"Phylloscopus humei","label":"Hume`s Leaf Warbler","value":"Hume`s Leaf Warbler"}]
$responce=array();
$responce[]=array('id'=>1, 'label'=>'satu3', 'value'=>'One3');
$responce[]=array('id'=>1, 'label'=>'satu4', 'value'=>'One4');
$responce[]=array('id'=>1, 'label'=>'satu5', 'value'=>'One5');
$responce[]=array('id'=>1, 'label'=>'satu', 'value'=>'One');

echo json_encode($responce);