<?php
if(isset($_GET['edit_text']))
{
 $file_name='flag.txt';
 $write_text=$_GET['edit_text'];

 $edit_file = fopen($file_name, 'w');
	
 fwrite($edit_file, $write_text);
 fclose($edit_file);
}


?>