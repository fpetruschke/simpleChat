<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
    $fp = fopen("log/log.html", 'a');

    $dimension = 'width="25" height="25"';
    $emoticons = array(
        ':+1:'  =>  '<img src="web/img/emoticons/thumpup.gif"' . dimension .'>',
        ':-1:'  =>  '<img src="web/img/emoticons/thumdown.gif"' . dimension .'>',
        ':-)'  =>  '<img src="web/img/emoticons/smile.GIF"' . dimension .'>',
        ';-)'  =>  '<img src="web/img/emoticons/wink.GIF"' . dimension .'>',
        ':-D'  =>  '<img src="web/img/emoticons/laugh.GIF"' . dimension .'>',
        ':-*'  =>  '<img src="web/img/emoticons/kiss.GIF"' . dimension .'>',
        ':-('  =>  '<img src="web/img/emoticons/frown.GIF"' . dimension .'>',
        ':-/'  =>  '<img src="web/img/emoticons/unamused.GIF"' . dimension .'>',
        '8-)'  =>  '<img src="web/img/emoticons/shades.GIF"' . dimension .'>',
        'X-P'  =>  '<img src="web/img/emoticons/knockedout.gif"' . dimension .'>',
        ':-P'  =>  '<img src="web/img/emoticons/tongue.GIF"' . dimension .'>',
        'X-('  =>  '<img src="web/img/emoticons/angry.GIF"' . dimension .'>',
        ':-|'  =>  '<img src="web/img/emoticons/blank.GIF"' . dimension .'>',
        ':-A'  =>  '<img src="web/img/emoticons/veryangry.gif"' . dimension .'>',
    );

    $text = stripslashes(htmlspecialchars($text));

    if(strlen($text) > 245) {
        $text = chunk_split($text, 245, '<br>');
    }

    foreach ($emoticons as $key => $emoticon) {
        if(strpos($text, $key) !== false) {
            $text = str_replace($key,$emoticon,$text);
        }
    }

    //$text = preg_replace('#&lt;(/?(?:br|img))&gt;#', '<\1>', $text);
    //if(preg_match('/(<img[^>]+>)/i', $text, $matches) === 0){
        //$text = stripslashes(htmlspecialchars($text));
    //}

    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ". $text ."</div>" . PHP_EOL);
    fclose($fp);
}
