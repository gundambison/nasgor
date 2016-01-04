<style>
.inpMain{
  font-size:30px;
  margin:10px auto;
  padding:10px 27px;
  background:pink;
  color:purple;
  border:none;
  width:400px;
  
}
.mainForm{
width:850px;
margin:auto;
}
.listDaftar
{
	clear:both;
	margin:10px 0;
	padding:0px;
	list-style:none;
}
.listDaftar li
{
	float:left; margin:0 5px;
	background:pink;
	width:180px;
}
.break{
clear:both;
margin:20px 0;
height:10px;
}
</style>
<form id='form1'>
<div class='mainForm'>
   <input class='inpMain' name='main' autofocus autocomplete='off' placeholder='masukkan barcode disini ' />
<ol class='listDaftar'>
	<li class='txtBarcode'>1</li>
	<li class='txtCode'>2</li>
	<li class='txtBarang'>3</li>
	<li class='txtStatus'>4</li>
</ol><div class='break' ></div>
	<div class='hidden'>
	  <input class='inpBarcode' name='barcode' />
	  <input class='inpCode' name='code' />
	  <input class='inpUser' name='user' />
	  <input class='inpRak' name='rak' />
	  lainnya : ip, stat, tanggal
	</div>
	<input type='submit' value='Go >> ' onclick='formSubmit();return false' />
</div>
</form>
<div class='msg'></div>
<script>
function formSubmit()
{
	$(".msg").empty();
	$(".msg").append("<br> ok");
}

function mulaiAjax()
{     
	var selectorform = 'form#mainForm'; 
    var datax = $(selectorform).serialize();
 
    var request = $.ajax({
          url: "?act=tes",
          type: "POST",
          data: datax,
          dataType: "json"
    });
   
    request.success(function(msg) {
    
      $(".harga1").html( msg.harga1 );
      $(".harga2").val( msg.harga2 );
      $(".paket2").empty();
      $(".paket2").append( msg.paket2 );
     /*
     $(".hasil").html( msg  );*/
    });
     
    request.fail(function(jqXHR, textStatus) {
      alert( "Request failed: " + textStatus );
    });
      
} 
</script>