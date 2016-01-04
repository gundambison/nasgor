/* editor */
 tinymce.init({
    selector: ".tinyMce",
	 plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save paste textcolor"
   ], 
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
   
        {title: 'Table styles'},
        {title:	 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 });  	
  
$(".ribbon").each(function(){
	tot=$(this).attr('total');
	width=tot*100+110;
	if(width>900){
		$(this).css('width', width);
	}
});  
  