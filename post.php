<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
    $fp = fopen("log/log.html", 'a');



    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ". $text /*stripslashes(htmlspecialchars($text))*/."<br></div>");
    fclose($fp);
}
