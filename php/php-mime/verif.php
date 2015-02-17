<?php

$array = array("application/pdf", "image/jpeg", "text/plain");
print("Liste de fichiers valides :<br />");
print_r($array);

print("<br /> Verification : <br /><br />");

$file_info = new finfo(FILEINFO_MIME);
foreach(glob("*") as $file)
{
	print ("FICHIER : ".$file." : <br />");
	print $file_info->file($file);
	print("<br />");
	
	preg_match("#^(.+);.+$#", $file_info->file($file), $sort);
	print_r($sort);
	print("<br />");
	
	if(in_array($sort[1], $array))
	{
		print("-->Type de fichier accepte.");
	} else {
		print("-->Type de fichier non accepte !");
	}
	
		print("<br /><br />");
}

?>