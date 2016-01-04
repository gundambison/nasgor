<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['nasgorTitle']='Metro::admin';
$config['nasgorFooterJS']=array(			
			'metro/bootstrap.min.js',
			'jquery-ui.min.js',
	'tinymce.min.js',
	'jqgrid3.8/i18n/grid.locale-en.js',
			'jqgrid3.8/jquery.jqGrid.js', 
			'ksc/main.js',
		
);

$config['nasgorCss']=array(			
			'jqgrid3.8/ui.jqgrid.css',
			'ksc/bootstrapBlue.css',			
			'font-awesome.css',
			'metro/style.css',			
			'multi-select.css',
			'ksc/jquery-ui.min.css',
			'ksc/style.css',
		);	
		
	$config['nasgorJS']=array(			
		'jquery-1.9.min.js',
		'jquery.multi-select.js',
		'main.js'
		);
$config['nasgorBaseFolder']='ksc/';
$config['templateView']='ksc_view';