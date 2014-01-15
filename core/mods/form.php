<?php

function inputShow($params,$val="")
{
	$s="<input ";
	if(is_array($params))
	{
		if(!isset($params['type']))
			$params['type']='text';
		
		foreach($params as $n=>$v)
		{
			$s.="$n='".addslashes($v)."' ";
		}
	
	}else{
		$s.="type='text' ";
		$s.="name='".addslashes($params)."' value='".addslashes($val)."' ";
	}
	
	$s.=" />";
	return $s;
}