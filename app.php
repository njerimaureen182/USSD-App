<?php

if (!empty($_POST)) {
    require_once("include/db.php");
    require_once("api/api.php");
    require_once("include/accountconfig.php");

    # api parameters
    $sessionId = $_POST['sessionId'];
    $serviceCode = $_POST['serviceCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $text = $_POST['text'];

    $textExploded = explode('*', $text);

    function menu(){

        $sql1 = "SELECT `session_id` FROM `sessions` WHERE `phone`='.$phoneNumber.'";

        $sessionQuery = $database->query($sql1);

        $sessionQueryArr = $sessionQuery->fetch_assoc();

        if ($sessionQueryArr['session_id']==NULL) {
            
            $sql2 = "INSERT INTO `sessions`(`phone`,`session_id`,`commands`) VALUES('.$phoneNumber.','.$sessionId.', 'get notes')";

            # serve menu
            $response = "CON Karibu. Please make your selection\n.";
            $response .= "1. Get today's notes.\n";
            $response .= "2. Upload my assignments.\n";
            $response .= "3. How to do my projects.\n";

            header('Content-type: text/plain');
            echo $response;
        }
    }

    function responseOne(){
        $sql2 = "SELECT * FROM `sessions` WHERE `command`='get notes'";

        $dbQueryTwo = $database->query($sql2);

        if ($dbQueryTwo['command']) {
            
            $link = "http://gearbox.co.ke/notes";
            $response = "END Log onto " .$link. " to get today's lesson.\n";

            header('Content-type: text/plain');
            echo $response;

        }else {
            $response = "END Something went wrong. Please try again later.\n";

            header('Content-type: text/plain');
            echo $response;
        }
    }

    function responseTwo(){
        $sql3 = "UPDATE `sessions` SET `command`='upload assignments'";

        $dbQueryThree = $database->query($sql3);

        if ($dbQueryThree['command']==true) {
            
            $link2 = "docs.google.com/upload";

            $response = "END Please visit " .$link2. " to upload your projects";

            header('Content-type: text/plain');
            echo $response;

        }else {

            $response = "END Something went wrong. Please try again later.\n";

            header('Content-type: text/plain');
            echo $response;
        }

    }
 
    function responseThree(){

        $sql4 = "UPDATE `sessions` SET `command`='project guide'";

        $dbQueryFour = $database->query($sql4);

        if ($dbQueryFour['command']==true) {
            
            $email = "maureen@mail.com";
            $response = "END Email " .$email. " to inquire how to do your projects.\n";

            header('Content-type: text/plain');
            echo $response;

        }else {
            
            $response = "END Something went wrong. Please try again later.\n";

            header('Content-type: text/plain');
            echo $response;

        }
    }
    
}
?>