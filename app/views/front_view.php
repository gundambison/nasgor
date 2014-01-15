<div class='content'>
<div class='menu'><pre>
<a class='btn' title='kurs bank' detail='Kurs Hanya Untuk Dilihat' link='001kurs'>Kurs Bank</a>
<a class='btn' title='kurs bank admin' detail='Kurs Yang Dapat di Edit dan ditambah' link='002kurs'>Kurs Bank(admin)</a>
<a class='btn' title='phpinfo' detail='phpinfo untuk melihat detail' link='003php'>PHP INFO</a>
<a class='btn' title='barcode' detail='Program Stock Opname' link='004barcode'>Barcode</a>
<a class='btn' title='bootstrap tutorial' detail='List Tutorial Bootstrap' link='005bootstrap'>Latihan Bootstrap (list)</a>
<a class='btn' title='bootstrap tutorial' detail='Membaca Tutorial Bootstrap' link='006bootstrap'>Latihan Bootstrap (membaca)</a>
<a class='btn' title='Test URI' detail='Mencoba URI' link='007uri'>Testing URI</a>
<a class='btn' title='Order Edit' detail='Edit Order' link='008order'>Edit Order Memakai Flexy Grid</a>
</pre></div>
<div class='detail'>
</div>
<br class='clear' />
</div>

<script>
	$(function() {
		$( "input[type=submit], a, button" )
			.button()
			.click(function( event ) {
				event.preventDefault();
			});
	});
	
	$(".btn").click(function(){
	$this=$(this);
	link="<a href='<?=my_url();?>form/"+$this.attr('link')+"'>";
	link=link+"lanjut</a>";
	//console.log($this.attr('detail'));
	$(".detail").empty();
	$(".detail").append($this.attr('detail'));
	$(".detail").append("<div>"+link+"</div>");
	});
	 
</script>