<?php 
	/****
		views	: Phr/farmasiProductEditForm_view
		created	: 03-01-2016 00:52:05
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$module="farprod"; //change this
$data=$this->$module->getData($post['prod_id'],'prod_id');
$id=dbIdReport('id','edit farmasi_product',$post['prod_id']);  
$atr=array('id'=>'frmMain');
$hidden=array('type'=>'update','prod_id'=>$post['prod_id']);
echo form_open('', $atr, $hidden);
?>
<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
<?=bsText("Detail (Review Tampilan akhir) Tidak untuk di simpan, automatis update ketika di simpan",'full',$data['full']);?>		
<?php 
echo bsSelect("Category", "category", $this->farcat->selectData(),$data['category']);?>	
<?=bsInput("Code",'code', $data['code'],'Kode Yang Jelas');?>
<?=bsInput("Nama",'name', $data['name'],'Nama Yang Jelas');?>
<?=bsInput("Nama Lain",'name2', $data['name2'],'Nama Yang Jelas');?>

<?=bsInput("Komposisi",'tagKomposisi', $data['Komposisi'],'Pisahkan dengan ; ');?>
<?=bsInput("Indikasi",'tagIndikasi', $data['Indikasi'],'Pisahkan dengan ; ');?>
<?=bsInput("Dosis",'tagDosis', $data['Dosis'],'Pisahkan dengan ; ');?>
<?=bsInput("Pemberian Obat",'tagPemberian_Obat', $data['Pemberian_obat'],'Ketik Normal');?>
<?=bsInput("Kontra Indikasi",'tagKontra_Indikasi', $data['Kontra_indikasi'],'Pisahkan dengan ; ');?>

<?=bsInput("Perhatian",'tagPerhatian', $data['Perhatian'],'ketik normal');?>
<?=bsInput("Efek Samping",'tagEfek_Samping', $data['Efek_samping'],'Pisahkan dengan ; ');?>
<?=bsInput("Interaksi Obat",'tagInteraksi_Obat', $data['Interaksi_obat'],'Pisahkan dengan ; ');?>
<?=bsInput("Kemasan",'tagKemasan', $data['Kemasan'],'Pisahkan dengan ; ');?>

<?=bsInput("Golongan",'gol', $data['golongan'],'O,G,W,B');?>
<?php 
/*
echo bsInput("Referensi Produk",'refprodtxt', $data['referensi'],'optional');?>
<?php 
$name='refprod';
$inp = array(
			'name'          => $name,
			'id'            => 'input_'.$name,
			'value'         => $data[$name],			 
			'type'			=> 'hidden', 
		);

	echo  form_input($inp); 

*/
//input_hidden("refprod",$data['refprod']);?>
<?=bsText("Detail",'detail',$data['detail']);?>	
<?php
$atr=array('onclick'=>'saveFormData()'  );	
	echo bsButton('Save',0,'btn-save',$atr );?>
</form>
<script>
dataUrl	='<?=base_url();?>'+controller+'/data/';
$(function () {
	function split( val ) {
      return val.split( /;\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
	
	$("#input_tagKomposisi,#input_tagIndikasi, #input_tagDosis, #input_tagPemberian_Obat, #input_tagKontra_Indikasi, #input_tagPerhatian, #input_tagEfek_Samping, #input_tagInteraksi_Obat, #input_tagKemasan")
	// don't navigate away from the field on tab when selecting an item
	.bind("keydown", function (event) {
		if (event.keyCode === $.ui.keyCode.TAB &&
			$(this).autocomplete("instance").menu.active) {
			event.preventDefault();
		}
	})
	.autocomplete({
		source: function( request, response ) {
			nameTag=this.element[0].name;
			console.log(nameTag);
			console.log(this);
          $.getJSON( dataUrl + "prodTag?type="+nameTag, 
		  {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( "; " );
          return false;
        }
	});
	$("#input_tagKomp0").autocomplete({
		source : dataUrl + "prodTag?type=Komp",
		minLength : 3,
		select : function (event, ui) {
			console.log(ui.item);
			$("#detail").empty().html("<h2>" + ui.item.value + "</h2>" + ui.item.detail + "<hr/>" + ui.item.howto);
		}
	});

});

</script>
<?php 
$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content,
	'title'=>'Update Product',
	'footer'=>' ',
	'data'=>$data
);
echo json_encode($result);