<?php
include 'header.php'; 
echo '<center><div class="titleBar2">iN2L Print</div><br>';

$path = "/home/content/i/n/2/in2lin2l/html/print/docs/";
$dirHandler = opendir($path);

while( $currentDir = readdir( $dirHandler ) )
{
    if( in_array($currentDir, array('.', '..')) ) continue;//skip current and parent dir

    if( is_dir( $path . $currentDir))
    {
        echo '<a href="readDir.php?dir=' . $path . $currentDir . '"><div class="linkholder">' . $currentDir . '</div></a>';
        //do your process here
    }
}
echo "</center>";
closedir($dirHandler);
include 'footer.php'; 
?>