<div class='content'>
<div class='menu'><pre>
<a class='menuLink' title='kurs bank' detail='Kurs Hanya Untuk Dilihat' link='001kurs'>Kurs Bank</a>
<a class='menuLink' title='kurs bank admin' detail='Kurs Yang Dapat di Edit dan ditambah' link='002kurs'>Kurs Bank(admin)</a>
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
	
	$(".menuLink").click(function(){
	$this=$(this);
	link="<a href='<?=my_url();?>form/"+$this.attr('link')+"'>";
	link=link+"lanjut</a>";
	//console.log($this.attr('detail'));
	$(".detail").empty();
	$(".detail").append($this.attr('detail'));
	$(".detail").append("<div>"+link+"</div>");
	});
	 
</script>