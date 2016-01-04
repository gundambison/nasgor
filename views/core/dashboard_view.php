<?php 
	/****
		views	: core/dashboard_view
		created	: 01-01-2016 13:38:57
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row-fluid">	

				<!--a class="quick-button metro blue span2">
					<i class="icon-group"></i>
					<p>Pasien <span class="numPasien">&nbsp;</span></p>
					
				</a-->
				<a class="quick-button metro green span2">
					<i class="icon-envelope"></i>
					<p>Aging</p>
					<span class="badge numAging">&nbsp;</span>
				</a>
				<!--a class="quick-button metro red span2">
					<i class="icon-heart-empty"></i>
					<p>Billing <span class="numBilling">&nbsp;</span></p>
					
				</a-->
				<a class="quick-button metro green span2">
					<i class="icon-home"></i>
					<p>Home Care</p>
					<span class="badge numHomecare">&nbsp;</span>
				</a>
			 
				<a class="quick-button metro blue span2">
					<i class="icon-plus"></i>
					<p>Asuransi <span class=" numAsuransi">&nbsp;</span> </p>
					
				</a>
				

				<a class="quick-button metro yellow span2">
					<i class="icon-plus"></i>
					<p>Perusahaan <span class=" numCompany">&nbsp;</span></p>
					
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-calendar"></i>
					<p>Today: <?=date("d-m-Y");?></p>
				</a>
				
				
								
			</div><!--/row-->
<script>
/*
	Silakan Ganti nama controller
*/
controller='dashboard'; 
var showLog=true; //matikan ini apabila di production
baseUrl		='<?=base_url();?>';
</script>