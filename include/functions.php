<?php

function mainMenu(){
    # serve menu
    $response = "CON Karibu. Please make your selection.\n";
    $response .= "1. Get today's notes.\n";
    $response .= "2. Upload my assignments.\n";
    $response .= "3. How to do my projects.\n";

    echo $response;
}

function firstMenu(){
            
    $link = "http://gearbox.co.ke/notes";
    $response = "CON Log onto " .$link. " to get today's lesson.\n";

    echo $response;
}


function secondMenu($response){

    # serve response to the 2nd menu option
    // $link2 = "docs.google.com/upload";
    // $response = "CON Please visit " .$link2. " to upload your projects";

    echo 'CON Please visit '.$response. ' to upload your projects';
}

call_user_func('secondMenu', 'docs.google.com/upload' );


function thirdMenu(){

    $link3 = "http://guide.com/guidelines";
    $response = "CON Log on to " .$link3. " to get the guidelines on how to do your projects.\n";

    echo $response;

}

?>