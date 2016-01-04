<?php 
/****
	views	: ksc/menu_view
	created	: 08-12-2015 00:35:52
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
$active='';
?>

<div class="container">
		<div class="row" style='margin-top: 15px;'>

<!--tab start-->			
<ul class="nav nav-tabs" id="menuTab">
  <li class='active'><a href="#home" data-toggle="tab">Home <i class="fa fa-home"></i></a></li>
  
  <!--li><a href="#pasien" data-toggle="tab">Pasien <i class="fa fa-venus-mars"></i></a></li-->
<?php 
$nActive=0;
foreach($mainMenu as $menuId=>$menus){
	if($this->member->getPermision($user['id'],$menus['show'])){
		if(!isset($menus['subMenu'])){
/*			
			$active=!isset($menus['active'])?'':'class="active"';
			$name=$menus['name'];
?>
		<li <?=$active;?>><a href="<?=base_url($menus['href']);?>" data-toggle="tab">
		<?=$menus['title'];?> 
		<i class="<?=$menus['icon'];?>"></i></a></li>	
		
<?php	
*/
		}
		else{
			if(isset($menus['active'])){ $nActive++; }
			//$active=!isset($menus['active'])?'':'class="active"';
			$name=$menus['name'];
?>
		<li <?=$active;?>><a href="#<?=$name;?>" data-toggle="tab"><?=$menus['title'];?> 
		<i class="<?=$menus['icon'];?>"></i></a></li>
<?php	}
	}else{}
?>

<?php 
}

//if($nActive==0) $active='active';
?>
  <!--li><a href="#billing" data-toggle="tab">Billing <i class="fa fa-money"></i></a></li><li><a href="#ri" data-toggle="tab">Rawat Inap <i class="fa fa-bed"></i></a></li><li><a href="#special" data-toggle="tab">Sejahtera <i class="fa fa-cube"></i></a></li><li><a href="#other" data-toggle="tab">Other <i class="fa fa-globe"></i></a></li><li><a href="#manage" data-toggle="tab">Setting <i class="fa fa-dashboard"></i></a></li--> 
</ul>

<div id="myTabContent" class="tab-content"> 
  <div class="tab-pane active <?=$active;?>" id="home">
  <div class='ribbon' total=3>
	  <dl>
		<dd><a href='<?=site_url();?>'><button><i class="fa fa-gear fa-spin fa-4x"></i></button></a><p>Halaman Depan</p></dd>
		<dd><a href='<?=base_url('dashboard/manual');?>'><button><i class="fa fa-gear  fa-4x"></i></button></a><p>Manual Cara Penggunaan</p></dd>
	  </dl>
	  <div class='clear'></div> 
  </div></div>
 
<?php 
foreach($mainMenu as $menuId=>$menus){
	//$active=!isset($menus['active'])?'':'active';
 if($this->member->getPermision($user['id'],$menus['show'])){
	if(isset($menus['subMenu'])){
		$name=$menus['name'];
?>		
   <div class="tab-pane <?=$active;?>" id="<?=$name;?>">
	<div class='ribbon' total='<?=count($menus['subMenu']);?>'>
	  <dl>
<?php 
		foreach($menus['subMenu'] as $menu){
			if($this->member->getPermision($user['id'],$menu['show'])){?>
		<dd><a href='<?=base_url($menu['href']);?>'><button>
		<i class="<?=$menu['icon'];?>"></i></button></a>
		<p><b><?=$menu['title'];?></b></p></dd>
<?php	
			}else{}
		}
?>		
	  </dl>
	
	  <div class='clear'></div> 
	</div>
  </div>	
<?php 
	}else{}
 }else{}
}
?>
</div>
<!--tab end--> 
	</div>
</div> 