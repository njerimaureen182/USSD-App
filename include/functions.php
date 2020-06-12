<?php

function mainMenu(){
    # serve menu
    $response = "CON Karibu. Please make your selection\n.";
    $response .= "1. Get today's notes.\n";
    $response .= "2. Upload my assignments.\n";
    $response .= "3. How to do my projects.\n";

    return $response;
}

// echo mainMenu();

function firstMenu(){
            
    // $commandOne = 'getNotes';

    # if session_id is found, update db accordingly and serve response to menu option 1
    // if ($sessionQueryArr['session_id']) {

        // $sql2 = "UPDATE `sessions` SET `session_id`='.$sessionId.', `command`='.$commandOne.' WHERE 
        // `phone`='.$phoneNumber.'";

        # query db
        // $database->query($sql2);

        $link = "http://gearbox.co.ke/notes";
        $response = "END Log onto " .$link. " to get today's lesson.\n";
        
    // }

        return $response;
}

// echo firstMenu();

function secondMenu(){

    // $commandTwo = "uploadProject";

    // if ($sessionQueryArr['session_id']) {
        
        // $sql3 = "UPDATE `sessions` SET `session_id`='.$sessionId.', `command`='.$commandTwo.' WHERE 
        // `phone`='.$phoneNumber.'";

        // $database->query($sql3);

        # serve response to the 2nd menu option
        $link2 = "docs.google.com/upload";
        $response = "END Please visit " .$link2. " to upload your projects";

    // }
    return $response;
}
// echo secondMenu();

function thirdMenu(){

    // $commandThree = 'guidelines';

    // if ($sessionQueryArr['session_id']) {
        
        // $sql4 = "UPDATE `sessions` SET `session_id`='.$sessionId.', `command`='.$commandThree.' WHERE 
        // `phone`='.$phoneNumber.'";

        // $database->query($sql4);


        $link3 = "http://guide.com/guidelines";
        $response = "END Log on to " .$link3. " to get the guidelines on how to do your projects.\n";

    // }

    return $response;

}
// echo thirdMenu();

?>