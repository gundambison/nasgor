<a href='<?=my_url();?>'>Index</a>
<a href='<?=my_url();?>form/001kurs'>Tampilan</a>
<div class='detailScript'>Script ini tidak menggunakan login. Hanya untuk menunjukkan edit memakai popup</div>
<table align=center class='table1' border=1>
<tr>
<th>KODE</th><th>KURS</th>
<th>BELI</th><th>JUAL</th>
<th>TANGGAL</th> 
</tr>
<?php
$sql="select * from kurs";

$q=query($sql);
	while ($row = $q->fetch_assoc()) 
	{
	$det=json_decode($row['k_detail'],true);
	?>
	<tr><input type=hidden name='id' class='id' value='<?=$row['k_id'];?>' />
		<?=td($row['k_code']).td($row['k_name']);?>
		<?=td("<input class='buy' value='{$det['buy']}' onblur='changeValue(\"buy\",this );' size=5 />").
		td("<input class='sale' value='{$det['sale']}' onblur='changeValue(\"sale\",this);' size=5 	/>");?>
		<td>
		<input class='date' value='<?=$row['k_date'];?>' onchange='changeValue("date",this);' size=10 />
		</td>
		 
	</tr>
	<?
	}
?>
</table>
<div class='message'>
</div>
<script>
function changeValue(stat,t)
{
	$this=$(t);
	//msglog($this.val());
	id0=$('.id');date0=$('.date');
	code=$this.parent().parent().find(id0);
	date=$this.parent().parent().find(date0);
	//msglog(code.val());
	var request = $.ajax({
          url: "<?=my_url();?>kursUpdate",
          type: "POST",
          data: {id : code.val(), 
		  field:stat,
		  value: $this.val(),
		  date:date.val()
		  },
          dataType: "json"
    });
   
    request.success(function(res) {
	  msglog(res.txt);
	});
}
function msglog(s)
{
	$(".message").append(s);
	$(".message").append("<br/>");
}
$(function() {
	$( ".date" ).datepicker({showButtonPanel: true,
	dateFormat:"yy-mm-dd",  minDate: -3, maxDate: "+3D"  });
		$( "input[type=submit], a, button" )
			.button()
			.click(function( event ) {
				//event.preventDefault();
			});
	});
</script>