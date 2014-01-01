<?php
//table/show/1-bootstrap
$act=myUri(2);
$id=intval(myUri(3));

if($act=='showTutorial')
{

	$sql="select t.tutor_name tutor,t2.* from nasgor_tutorial t, nasgor_tutoriallist t2
	where tlist_tutor=$id 
	and tutor_id=tlist_tutor
	order by tlist_pos asc";
	$q=query($sql);$i=1;$dataTable=array();
	while($row=fetch($q))
	{
		$i++;
		$link="<input type='button' onclick='editTutorList(\"$row[tlist_id]\")' value='edit' >";
		$dataTable[]=array($row['tutor'],$row['tlist_name'],$row['tlist_pos'],$link); 
	}
	if($i==1)
	{
		$dataTable[]=array('-','-','-','-');
	}
	$a=array('aaData'=>$dataTable);
	echo json_encode($a);
}

if($act=='showTutorial2')
{

	$sql="select * from nasgor_tutoriallist where tlist_tutor=$id order by tlist_pos asc";
	$q=query($sql);$i=1;$dataTable=array();
	while($row=fetch($q))
	{
		$link="<input type='button' onclick='editTutorList(\"$row[tlist_id]\")' value='edit' >";
		$dataTable[]=array($i++,$row['tlist_name'],$row['tlist_pos'],$link); 
	}
	if($i==1)
	{
		$dataTable[]=array('-','-','-','-');
	}
	$a=array('aaData'=>$dataTable);
	echo json_encode($a);
}