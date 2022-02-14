<?php

include_once '../classes/dbh.php';
include_once '../classes/emailClass.php';
include_once '../classes/emailController.php';

if(isset($_POST['massDelete'])) {
    
    $catalog = new EmailController();
    $catalog->deleteEmails();

    header("location: ../output.php?delete=success");

    // if($numberOfCheckboxes = null) {
    //     header("location: ../index.php?nocheckboxesselected");
    // }
}