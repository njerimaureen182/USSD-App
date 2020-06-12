<?php

if (!empty($_POST)) {
    require_once("include/db.php");
    require_once("api/api.php");
    require_once("include/accountconfig.php");
    require_once("include/functions.php");

    # api parameters
    $sessionId = $_POST['sessionId'];
    $serviceCode = $_POST['serviceCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $text = $_POST['text'];

    $textExploded = explode('*', $text);

    # check for session_id
    $sql1 = "SELECT `session_id` FROM `sessions` WHERE `phone`='.$phoneNumber.'";

    $sessionQuery = $database->query($sql1);
    $sessionQueryArr = $sessionQuery->fetch_assoc();

    if ($sessionQueryArr['session_id']==NULL) {

        # serve main menu if session id is null and update the db query with the second command
        $response = mainMenu();

        $sql1="UPDATE `sessions` SET `command`='.firstMenu.', `session_id`='.$sessionId.' WHERE 
        phone='.$phoneNumber.'";

        $database->query($sql1);

    } elseif ($sessionQueryArr['session_id'] && $sessionQueryArr['command']=='firstMenu') {
        
        # serve first menu and update db query with second command
        $response = firstMenu();

        $sql2 = "UPDATE `sessions` SET `command`='.secondMenu.' WHERE `phone`='.$phoneNumber.'";

        $database->query($sql2);


    } elseif ($sessionQueryArr['session_id'] && $sessionQueryArr['command']=='secondMenu') {
        
        # serve second menu and update db query with third command
        $response = secondMenu();

        $sql3 = "UPDATE `sessions` SET `command`=.thirdMenu. WHERE `phone`='.$phoneNumber.'";

        $database->query($sql3);

    } elseif ($sessionQueryArr['session_id'] && $sessionQueryArr['command']=='thirdMenu') {
        
        # serve third menu and update db query with third command
        $response = thirdMenu();

    } else {
        
        # I'll try to clearly understand the essence of $response=&call_user_func('.$command.'). 
    }

    echo $response;






    // function menu(){

    //     $sql1 = "SELECT `session_id` FROM `sessions` WHERE `phone`='.$phoneNumber.'";

    //     $sessionQuery = $database->query($sql1);

    //     $sessionQueryArr = $sessionQuery->fetch_assoc();

    //     if ($sessionQueryArr['session_id']==NULL) {
            
    //         $sql2 = "INSERT INTO `sessions`(`phone`,`session_id`,`commands`) VALUES('.$phoneNumber.','.$sessionId.', 'get notes')";

    //         # serve menu
    //         $response = "CON Karibu. Please make your selection\n.";
    //         $response .= "1. Get today's notes.\n";
    //         $response .= "2. Upload my assignments.\n";
    //         $response .= "3. How to do my projects.\n";

    //         header('Content-type: text/plain');
    //         echo $response;
    //     }
    // }

    // function responseOne(){
    //     $sql2 = "SELECT * FROM `sessions` WHERE `command`='get notes'";

    //     $dbQueryTwo = $database->query($sql2);

    //     if ($dbQueryTwo['command']) {
            
    //         $link = "http://gearbox.co.ke/notes";
    //         $response = "END Log onto " .$link. " to get today's lesson.\n";

    //         header('Content-type: text/plain');
    //         echo $response;

    //     }else {
    //         $response = "END Something went wrong. Please try again later.\n";

    //         header('Content-type: text/plain');
    //         echo $response;
    //     }
    // }

    // function responseTwo(){
    //     $sql3 = "UPDATE `sessions` SET `command`='upload assignments'";

    //     $dbQueryThree = $database->query($sql3);

    //     if ($dbQueryThree['command']==true) {
            
    //         $link2 = "docs.google.com/upload";

    //         $response = "END Please visit " .$link2. " to upload your projects";

    //         header('Content-type: text/plain');
    //         echo $response;

    //     }else {

    //         $response = "END Something went wrong. Please try again later.\n";

    //         header('Content-type: text/plain');
    //         echo $response;
    //     }

    // }
 
    // function responseThree(){

    //     $sql4 = "UPDATE `sessions` SET `command`='project guide'";

    //     $dbQueryFour = $database->query($sql4);

    //     if ($dbQueryFour['command']==true) {
            
    //         $email = "maureen@mail.com";
    //         $response = "END Email " .$email. " to inquire how to do your projects.\n";

    //         header('Content-type: text/plain');
    //         echo $response;

    //     }else {
            
    //         $response = "END Something went wrong. Please try again later.\n";

    //         header('Content-type: text/plain');
    //         echo $response;

    //     }
    // }
    
}
?>
