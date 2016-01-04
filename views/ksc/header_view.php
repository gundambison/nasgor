<?php 
/****
	views	: ksc/header_view
	created	: 08-12-2015 00:16:17
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-header">
  <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                 
                <a class="navbar-brand" href="#">Klinik Sejahtera</a>
            </div>
            
			<ul class="nav navbar-right top-nav" style='margin-right:10px; ' >
                <li class="dropdown">
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?=$user['username'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#"></a>
							<div class='well'>
                                <div class="media">
                                    <span class="pull-left">
                                        <img />
                                    </span>
									 
                                    <div class="media-body">
                                        <h5 class="media-heading">
										<strong><?=$user['username'];?></strong>
										<a class='btn btn-default' href="<?=base_url();?>member/settings"><i class="halflings-icon user"></i> Profile</a>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Today:  <?=$today;?></p>
                                        <p><a class='btn btn-default' href='#'>Edit</a></p>
										<p><a class='btn btn-default' href="<?=base_url('member/logout');?>"><i class="halflings-icon off"></i> Logout</a></p>
										<!-- -->
                                    </div>
                                </div>
                            </div>
                        </li>
					</ul>
				</li>
			</ul>
        </nav>
</div>