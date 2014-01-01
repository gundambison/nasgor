<?php
loadMod('test_mod');
$a=array("Sleek, intuitive, and powerful mobile","first front-end framework for faster and easier web development.");
foreach($a as $s)
	echo testUri($s)."<br>";
	
echo "<br>a=".ord('a');//97
echo "<br>z=".ord('z');//122
echo "<br>A=".ord('A');
echo "<br>Z=".ord('Z');
echo "<br>1=".ord('1');
echo "<br>0=".ord('0');//48
echo "<br>9=".ord('9');//57
echo "<hr/>";
for($i=48;$i<123;$i++)
{
	echo chr($i);
}
