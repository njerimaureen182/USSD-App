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

    $textExploded = explode('*', $text);
    $userInput = trim(end($textExploded));

    # check if session exists
    $sql1 = "SELECT * FROM `sessions` WHERE `session_id`='".$sessionId."'"; 

    $sessionQuery = $pdo->query($sql1);
    $sessionQueryArr = $sessionQuery->fetch(PDO::FETCH_ASSOC);

    if (empty($sessionQueryArr['session_id'])) {
        
        switch ($userInput) {

            case '': # *348*100# 

                $sql2 = "INSERT INTO `sessions`(`session_id`, `phone`,`command`) VALUES('".$sessionId."', '".$phoneNumber."', 'mainMenu')";

                $pdo->query($sql2);

                header('Content-type:text/plain');

                mainMenu();

                break;

            case '1': # *348*100*1# 

                $sql3 = "UPDATE `sessions` SET `session_id`='".$sessionId."', `command`='firstMenu' WHERE `phone`='".$phoneNumber."' ";

                $pdo->query($sql3);

                firstMenu();

                header('Content-type:text/plain');

                break;
            
            case '2': # *348*100*2# 
                
                $sql4 = "UPDATE `sessions` SET `session_id`='".$sessionId."', `command`='secondMenu' WHERE `phone`='".$phoneNumber."' ";

                $pdo->query($sql4);

                header('Content-type:text/plain');

                secondMenu();

                break;

            case '3': # *348*100*3# 

                $sql5 = "UPDATE `sessions` SET `session_id`='".$sessionId."', `command`='thirdMenu' WHERE `phone`='".$phoneNumber."' ";

                $pdo->query($sql5);

                header('Content-type:text/plain');

                thirdMenu();
                
                break;

            // default:
            
	    	//     $response = "CON You have to choose a service.\n";
	    	//     $response .= "Press 0 to go back.\n";
            
            // break;
            
        }
        
    }else {
        
        $command = $sessionQueryArr['command'];
        call_user_func($command, array());

    }
  
}

?>
