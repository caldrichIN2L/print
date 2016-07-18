<?php
$currentDir = getcwd();
$recDir = $_GET["dir"] . "/*";
$recDirNoStar = $_GET["dir"];
//$path = $currentDir . "/docs/" . $recDir . "/*";
//$linkpath = $currentDir . "/docs/" . $recDir;

foreach(glob($recDir) as $file)  
	{  
		if(is_dir($file)){
		echo '<a href="readDir2.php?dir=' . $recDirNoStar . '/' . basename($file) . '">' . basename($file) . '</a>' . ' ------ FOLDER<br>';  
		}
		else{
		echo basename($file) . "<br>"; 
		}
	}

?>