<?php

function mainMenu(){
    # serve menu
    $response = "CON Karibu. Please make your selection.\n";
    $response .= "1. Get today's notes.\n";
    $response .= "2. Upload my assignments.\n";
    $response .= "3. How to do my projects.\n";

    return $response;
}

function firstMenu(){
            
    $link = "http://gearbox.co.ke/notes";
    $response = "END Log onto " .$link. " to get today's lesson.\n";
}


function secondMenu(){

    # serve response to the 2nd menu option
    $link2 = "docs.google.com/upload";
    $response = "END Please visit " .$link2. " to upload your projects";

    return $response;
}


function thirdMenu(){

    $link3 = "http://guide.com/guidelines";
    $response = "END Log on to " .$link3. " to get the guidelines on how to do your projects.\n";

    return $response;

}


?>