<script>
var url="<?=my_url();?>table/showTutorial/1-bootstrap";
function reloadTable()
{
	obj= $('#dataTutorial').dataTable(  );
	obj.bRetrieve();
	
   
}

function saveForm()
{
	var selectorform="form#bootstrapForm";
	var datax = $(selectorform).serialize();
	var request = $.ajax({
		  url: "<?=my_url();?>tutor/save",
		  type: "POST",
		  data: datax ,
		  dataType: "json"
	});
	
	request.fail(function(jqXHR, textStatus) {
	  alert( "Request failed: " + textStatus );
	});
	
	request.success(function(msg) {
		if(msg.url)
		{
			window.location =msg.url;
		}else{
			alert(msg.alert);
		}
	});
}

function editTutorList(id)
{
	var request = $.ajax({
		  url: "<?=my_url();?>tutor/dataTutorial",
		  type: "POST",
		  data: {id:id} ,
		  dataType: "json"
	});
	request.fail(function(jqXHR, textStatus) {
	  alert( "Request failed: " + textStatus );
	});
	request.success(function(msg) {
	   console.log('berhasil');
	   for(i=0;i< msg.fieldName.length;i++)
	   {
			div="."+msg.fieldName[i];
			console.log(div);
			$(div).empty();
			$(div).val(msg.fieldData[i]);
	   }
	   
	   $(".tutorpreview").append(msg.tutorpreview);
	   
	});
}

$(document).ready(function() {
    $('#dataTutorial').dataTable( {
        "sPaginationType": "full_numbers",
        "bProcessing": true,
        "sAjaxSource": url
    } );
} );


</script>