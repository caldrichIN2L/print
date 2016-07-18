<?php
include 'header.php'; 
$currentDir = getcwd();
$recDir = stripslashes($_GET["dir"] . "/*");
$recDirNoStar = $_GET["dir"];
//$path = $currentDir . "/docs/" . $recDir . "/*";
//$linkpath = $currentDir . "/docs/" . $recDir;
$titleArray = explode("/", $recDirNoStar);
$title = end($titleArray);
echo '<center><div class="titleBar2">' . stripslashes($title) . '</div><br>';
foreach(glob($recDir) as $file)  
	{  
		if(is_dir($file)){
		echo '<a href="readDir.php?dir=' . $recDirNoStar . '/' . basename($file) . '"><div class="linkholderfolder">' . basename($file) . '</div></a>';  
		}
		else{
		//check if the file is an image
		$extension = substr(basename($file), strrpos(basename($file), '.' )+1);
		$extension = strtolower($extension);
		
			if($extension == 'png' || $extension == 'jpg' || $extension == 'gif'){
				echo '<a href="' . str_replace('/home/content/i/n/2/in2lin2l/html/print/','',$file) . '"><div class="linkholderpicture">' . substr(basename($file), 0,strrpos(basename($file),'.')) . "</div></a>";			
			}
			//check for a text file. use text files to forward to a url
			if($extension == 'txt'){
				$pageForward = file_get_contents($file);
				echo '<a href="' . $pageForward . '"><div class="linkholderdoc">' . substr(basename($file), 0,strrpos(basename($file),'.')) . "</div></a>";			
			}
			else{
				echo '<a href="' . str_replace('/home/content/i/n/2/in2lin2l/html/print/','',$file) . '"><div class="linkholderdoc">' . substr(basename($file), 0,strrpos(basename($file),'.')) . "</div></a>";
			}
		 
		}
	}
	
echo "</center>";
include 'footer.php'; 

?>