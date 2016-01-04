<?php
loadMod('tutor_mod');
$id=1;
$sql="select * from nasgor_tutorial";
$row=queryFetch($sql);
?><h1><?=$row['tutor_name'];?></h1>
<h3><?=$row['tutor_detail'];?></h3>
LIST CONTENT:<dl>
<?php
$aTutor=listTutor($id);
foreach($aTutor as $row)
{
?><dd><a href='<?=my_url();?>read/<?=$row['tlist_uri'];?>' class='btn'><?php
echo $row['tlist_name'];?></a></dd>
<?php
}
?>
</dl>