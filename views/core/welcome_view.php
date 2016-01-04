<?php 
/****
	views	: core/welcome_view
	created	: 14-11-2015 02:31:37
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<select multiple="multiple" id="my-select" name="my-select[]">
      <option selected value='elem_1'>elem 1</option>
      <option value='elem_2'>elem 2</option>
      <option value='elem_3'>elem 3</option>
      <option selected value='elem_4'>elem 4</option>

      <option value='elem_100'>elem 100</option>
    </select>
<script>$('#my-select').multiSelect();</script>