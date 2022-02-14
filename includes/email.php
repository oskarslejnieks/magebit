<?php

if(isset($_POST['submit'])) {
    $email = $_POST['email'];

    include '../classes/dbh.php';
    include '../classes/emailClass.php';
    include '../classes/emailController.php';

    $emailObject = new EmailController();
    $emailObject->setEmail($email);

    $emailObject->call();

    header("location: ../index.php?error=none");
}

