<?php 
	/****
		views	: core/dashboard_view
		created	: 01-01-2016 13:38:57
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row-fluid" style='margin-top:20px'>
				
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart boxPasien"><?php 
	$sql="SELECT count(pat_id) total,date(pat_inp) FROM `klinik_pasien`  group by date(pat_inp) order by pat_inp desc 
limit 13";
	$row=$this->db->query($sql)->result_array();
	$dt=array();
	foreach($row as $r){
		$dt[]=$r['total'];
	}
	arsort($dt);
	echo implode(",",$dt);				
					
?></div>
					<div class="number numPasien">&nbsp;<i class="icon-arrow-up"></i></div>
					<div class="title">Pasien</div>
					<div class="footer">
						<a href="#"> On Progress</a>
					</div>	
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart"><?php 
	$sql="SELECT count(daf_id) total  FROM klinik_daftar, klinik_daftarpasien
		where daf_id=dafpat_dafid and dafpat_type=0 group by date(daf_timeArrive) order by daf_timeArrive desc 
limit 13";
	$row=$this->db->query($sql)->result_array();
	$dt=array();
	foreach($row as $r){
		$dt[]=$r['total'];
	}
	arsort($dt);
	echo implode(",",$dt);				
					
?></div>
					<div class="number numBilling">&nbsp;<i class="icon-arrow-up"></i></div>
					<div class="title">Billing</div>
					<div class="footer">
						<a href="#">On Progress</a>
					</div>
				</div>
				
				<!--div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
					<div class="number numUsage">982<i class="icon-arrow-up"></i></div>
					<div class="title">Usage</div>
					<div class="footer">
						<a href="#"> on Progress</a>
					</div>
				</div--> 	
				
			</div>