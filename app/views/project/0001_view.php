<a href='<?=my_url();?>'>Index</a>
<a href='<?=my_url();?>admin/001kurs'>Admin</a>
<table align=center class='table1' border=1>
<tr>
<th>KODE</th><th>KURS</th>
<th>BELI</th><th>JUAL</th>
</tr>
<?php
$sql="select * from kurs";

$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
	$det=json_decode($row['k_detail'],true);
	?>
	<tr>
		<?=td($row['k_code']).td($row['k_name']);?>
		<?=td($det['buy']).td($det['sale']);?>
		 
	</tr>
	<?
	}
?>
</table>

<script>
$(function() {
		$( "input[type=submit], a, button" )
			.button()
			.click(function( event ) {
				//event.preventDefault();
			});
	});
</script>