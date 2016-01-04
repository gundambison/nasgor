  $(function() { 
    $( "#cari" ).autocomplete({
      source: urlData,
      minLength: 3,
      select: function( event, ui ) {
        console.log(ui.item);
		$("#detail").empty().html("<h2>"+ui.item.value+"</h2>"+ui.item.detail+"<hr/>"+ui.item.howto);
		 $( "#cari" ).val('') ;
      }
    });
	
    $( "#cari2" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: urlData,
          dataType: "json",
          data: {
            search: request.term,
          },
          success: function( data ) {
            response( data.result );
          }
        });
      },
      minLength: 3,
      select: function( event, ui ) {
        console.log(ui);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
  });
console.log('guest/benefit 2');