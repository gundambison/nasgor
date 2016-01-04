<?php 
/****
	views	: temp/listjs_view
	created	: 12-11-2015 19:41:08
	By		: Gunawan Wibisono
	Using 	: CI3 Main Model
****/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row-fluid"><div><pre>
<?php 
if ($handle = opendir('assets/js/metro')) {
    echo "Directory handle: $handle\n";
    echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        echo "'metro/$entry',\n";
    }

     

    closedir($handle);
}


?></pre>
</div></div>