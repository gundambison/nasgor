<?php
function listTutor($id)
{
	$sql="select * from nasgor_tutoriallist where tlist_tutor=$id order by tlist_pos asc";
	$ar=queryFetchAll($sql,"",1);
	return $ar;
}

function tutorShowUri($uri)
{
	$sql="select tlist_name name, tlist_prev preview, tlist_uri uri, ttext_detail detail,
	ttext_code code
	from nasgor_tutoriallist, nasgor_tutorialtext where
	ttext_list=tlist_id and tlist_uri like '$uri'";
	return queryFetch($sql);
	
}