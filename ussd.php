<?php

if (!empty($_POST)) {
    require_once("include/db.php");
    require_once("api/api.php");
    require_once("include/accountconfig.php");
    require_once("include/functions.php");

    # api parameters
    $sessionId=$_POST['sessionId'];
    $serviceCode=$_POST['serviceCode'];
    $phoneNumber=$_POST['phoneNumber'];
    $text=$_POST['text'];

    $textExploded=explode('*', $text);

    $userInput=trim(end($textExploded));

    $level= 0;

    # check user level from database. retain default level if none is found
    $sql="SELECT `level` FROM `sessions` WHERE `session_id`='".$sessionId."'";
    
    # query above sql stmt
    $levelQuery=$pdo->query($sql);

    if ($result=$levelQuery->fetch(PDO::FETCH_ASSOC)) {
        
        $level=$result['level'];
    }

    if ($result) {
        
        $level=$result['level'];
    }

    # check if there's an ongoing session
    $sql1="SELECT * FROM `sessions` WHERE `session_id`='".$sessionId."'";

    # query the above sql stmt
    $sessionQuery=$pdo->query($sql1);

    $sessionQueryArr=$sessionQuery->fetch(PDO::FETCH_ASSOC);


    if(empty($sessionQueryArr['session_id'])) {
        
        switch ($userInput) {
            case '': # *384*48529#

                if ($level==0) {

                    $sql2="INSERT INTO `sessions`(`session_id`,`phone`,`level`) VALUES('".$sessionId."', 
                    '".$phoneNumber."',1)";

                    $pdo->query($sql2);
            

                    #serve main menu
                    // $response = mainMenu();

                    header('Content-type:text/plain');

                    echo mainMenu();
                }
                break;
        }

    }else {

        if ($level==1) {
            
            switch ($userInput) {

                case '1': # *384*48529*1#
                
                    // if ($level==1) {

                        #serve response to option 1
                        echo firstMenu();

                        header('Content-type:text/plain');

                    // }

                    break;
            
                case '2': # *384*48529*2#
                    
                    // if ($level==1) {
                        # serve response to option 2
                        echo secondMenu();

                        header('Content-type:text/plain');
   
                    // }
                    break;

                case '3': # *384*48529*3#
                    
                    // if ($level==1) {
                        # serve response to option 3
                        echo thirdMenu();

                        header('Content-type:text/plain');

                    // }
                    break;

                default:

                    if ($userInput=='') {

                        # if a user does not choose a service, demote level and take them back to the main menu
                        $response = "CON You have to make a selection.\n";
                        $response .= "To go back, press 0";

                        $sql3 = "UPDATE `sessions` SET `level`=0 WHERE `session_id`='".$sessionId."'";

                        $pdo->query($sql3);

                        echo $response; 

                        header('Content-type:text/plain');
                    }
                    break;
            }

        }

    }
            
                
                
        
    













    # check for session_id"
    // $sql = "SELECT `session_id` FROM `sessions` WHERE `phone` LIKE '%".$phoneNumber."%'";
    // $sql = "SELECT * FROM `sessions` WHERE `session_id`='".$sessionId."' AND `phone` LIKE'%".$phoneNumber."%'"; 

    // print_r($sql1);

    // $sessionQuery = $dbh->query($sql);
    // $sessionQueryArr = $sessionQuery->fetch(PDO::FETCH_ASSOC);
   

    // if ($sessionQueryArr['session_id']==NULL) {

    //     # serve main menu if session id is null and update the db query with the second command
    //     $response = mainMenu();

    //     // echo $response;

    //     // $sql1="UPDATE `sessions` SET `command`='firstMenu', `session_id`=$sessionId WHERE phone=$phoneNumber";
    //     // $sql1="UPDATE `sessions` SET `text`=1, `session_id`='.$sessionId.' WHERE phone='.$phoneNumber.'";

    //     $sql1="INSERT INTO `sessions`(`session_id`, `phone`, `level`) VALUES('".$sessionId."', '".$phoneNumber."', 1)";
    //     // print_r($sql1);

    //     $dbh->query($sql1);

    // } elseif ($sessionQueryArr['session_id'] && $sessionQueryArr['level']==1) {
        
    //     # serve first menu and update db query with second command
    //     $response = firstMenu();
    //     echo $response;


    //     $sql2 = "UPDATE `sessions` SET `session_id`='".$sessionId."', `level`=2 WHERE `phone` LIKE '%".$phoneNumber."%'";

    //     $dbh->query($sql2);


    // } elseif ($sessionQueryArr['session_id'] && $sessionQueryArr['level']==2) {
        
    //     # serve second menu and update db query with third command
    //     $response = secondMenu();
    //     echo $response;


    //     $sql3 = "UPDATE `sessions` SET `session_id`='".$sessionId."', `level`=3 WHERE `phone` LIKE '%".$phoneNumber."%'";

    //     $dbh->query($sql3);

    // } elseif ($sessionQueryArr['session_id'] && $sessionQueryArr['level']==3) {
        
    //     # serve third menu and update db query with third command
    //     $response = thirdMenu();

    //     echo $response;

    //     header('Content-type:text/plain');

    // } 
    // else {
        
    //     # I'll try to clearly understand the essence of $response=&call_user_func('.$command.'). 
    // }
    
}
?>
