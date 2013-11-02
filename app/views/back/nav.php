<div class="container">
    <div class="header">
      <ul class="nav nav-pills pull-right">
<?php
$aMenu=array(	
	'home'=>array('#home','Home'),
	'about'=>array('#about','About Me'),
	'contact'=>array('#contact','Contact Us'),
);
 
foreach($aMenu as $nm=>$det)
{
	if($active==$nm)
	{	
		$class1='active';
	}else{
		$class1=$nm;
	}
?>
		<li class="<?=$class1;?>">
          <a href="<?=$det[0];?>"><?=$det[1];?></a>
        </li>
<?php
}
?> 
      </ul>
<!-- lagi males logic-->	  
      <h3 class="text-muted">JUALAN ONLINE</h3>
      <div class="masthead">
        <ul class="nav nav-justified">
          <li>
            <a href="#">Home</a>
          </li>
 
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product</a>
            <ul class="dropdown-menu">
              <li>
                <a href="#">About</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Profile</a>
          </li>
		  <li>
            <a href="#">Cart</a>
          </li>
        </ul>
      </div>
    </div>
    <!--menu-->
  </div>