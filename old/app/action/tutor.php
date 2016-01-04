<?php
$act=myUri(2);
$id=isset($_POST['id'])?intval($_POST['id']):0;
ob_start();
if($act=='save')
{
	//print_r($_POST);
	foreach($_POST as $nm=>$val)$$nm=$val;
	$sql="select count(tlist_id) c from nasgor_tutoriallist where tlist_id=$tutorid";
	$row=queryFetch($sql);
	if($row['c']==0)
	{
	//insert
		$uriname=createUri($tutorname, "nasgor_tutoriallist","tlist_uri");
		$data=array(
			"tlist_id"=>$tutorid,
			"tlist_name"=>$tutorname,
			"tlist_tutor"=>$tutorhead,
			"tlist_pos"=>$tutorposisi,
			"tlist_prev"=>$tutorpreview,
			"tlist_uri"=>$uriname
		);
		dbInsert("nasgor_tutoriallist", $data);
		
		$data=array(
			'ttext_list'=>$tutorid,
			'ttext_detail'=>$tutordetail,
			'ttext_code'=>$tutorcode
		);
		dbInsert("nasgor_tutorialtext", $data);
		
	}else{
	//update
		$uriname=createUri($tutorname, "nasgor_tutoriallist","tlist_uri");
		$data=array(			 
			"tlist_name"=>$tutorname,
			"tlist_tutor"=>$tutorhead,
			"tlist_pos"=>$tutorposisi,
			"tlist_prev"=>$tutorpreview,
			"tlist_uri"=>$uriname
		);
		$where="tlist_id='$tutorid'";
		
		dbUpdate("nasgor_tutoriallist", $data,$where );
		$data=array(			
			'ttext_detail'=>$tutordetail,
			'ttext_code'=>$tutorcode
		);
		$where="ttext_list='$tutorid'";
		dbUpdate("nasgor_tutorialtext", $data, $where );
		
	}
	$url=my_url()."form/005bootstrap";

}

if($act=='dataTutorial')
{
	$sql="select  tlist_id tutorid, tlist_name tutorname, ttext_detail tutordetail, ttext_code tutorcode,tlist_pos tutorposisi,tlist_prev tutorpreview
	from  nasgor_tutorial t1, nasgor_tutoriallist t2, nasgor_tutorialtext t3
	where tutor_id=tlist_tutor 
	and tlist_id=ttext_list
	and tlist_id='$id'";
	$row=queryFetch($sql);
	print_r($row);echo $sql;
	
	$afieldName=$afieldData=array();
	foreach($row as $nm=>$val)
	{
		if($nm=='tutorpreview') continue;
		$afieldName[]=$nm;
		$afieldData[]=$val;
	}
	//preview
	$afieldName[]='tutorpreview';
	$list="<option value=0 ";
	$list.=$row['tutorpreview']==0?"selected >":">";
	$list.="Hide</option>";
	$list.="<option value=1 ";
	$list.=$row['tutorpreview']==1?"selected >":">";
	$list.="Ditampilkan</option>";	
	
	$afieldData[]=$tutorpreview=$list;
	
}

$post=ob_get_contents(); 
    ob_end_clean();    
    $a=array(
		'post'=>$post
    );
	
if(isset($afieldName)){
	$a['fieldName']=$afieldName;
}

if(isset($afieldData)){
	$a['fieldData']=$afieldData;
}

if(isset($tutorpreview)){
	$a['tutorpreview']=$tutorpreview;
}

if(isset($url))
{
	$a['url']=$url;
}


$json= json_encode($a);
die($json);