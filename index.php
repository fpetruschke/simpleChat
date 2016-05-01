<!DOCTYPE html>
<html>
    <head>
        <title>simpleChat</title>
        <link type="text/css" rel="stylesheet" href="web/css/style.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" id="home" class="navbar-brand">simpleChat</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="about"><a href="#about">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="aboutContent" style="margin-top: 100px">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6" style="background-color: #F3F2F1;"><h1>simpleChat</h1></div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6" style="background-color: white; padding-top: 10px; text-align: justify">
                    <p>
                        <strong>simpleChat</strong> is a tiny php/html/js web application.<br>
                        It is just meant for playing around with ajax-request and a simple session-login-functionality.<br>
                        It is ugly coding. Be aware of that. At least it works. ;-) <br>
                        All chat content will be saved into an html file.
                        It is not save for using it productive!
                    </p>
                    <p>Have fun with <strong>simpleChat</strong></p>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>

        <script>
            window.onload = $('#aboutContent').hide();

            $('#about').on('click', function() {
                $('#loginForm').hide();
                $('#wrap').hide();
                $('#aboutContent').show();
            })
            $('#home').on('click', function() {
                $('#aboutContent').hide();

                <?php
                    if($_POST['name'] != ""){
                ?>
                        $('#loginForm').show();
                <?php } else {
                ?>
                        $('#wrap').show();
                <?php } ?>
            })


        </script>

        <?php
            session_start();
            if(isset($_POST['enter'])){
                if($_POST['name'] != ""){
                    $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
                    //Simple welcome message
                    $fp = fopen("log/log.html", 'a');
                    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has entered the chat session.</i><br></div>");
                    fclose($fp);

                } else {
                    echo '<span class="error">Please type in a name</span>';
                }
            }

            function loginForm() {
                include "templates/login.html";
            }

            if(isset($_GET['logout'])){

                //Simple exit message
                $fp = fopen("log/log.html", 'a');
                fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
                fclose($fp);

                session_destroy();
                header("Location: index.php"); //Redirect the user
            }

            if(!isset($_SESSION['name'])) {
                loginForm();
            } else{
                include "templates/chat.html";
            }
        ?>
        <div class="mastfoot" style="margin-top: 1%;">
            <div class="inner">
                <p>© 2016 - F.Petruschke - <a href="http://github.com/fpetruschke" target="_blank"><img src="https://github.com/favicon.ico"></a></p>
            </div>
        </div>
    </body>
</html>
