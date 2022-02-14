<?php

if(isset($_POST['export'])) {
    include '../classes/dbh.php';
    include '../classes/emailClass.php';
    include '../classes/emailController.php';

    $emailObject = new EmailController();

    $emailObject->exportCSV();

    // header("location: ../output.php?export=success");
}