<?php

include_once '../classes/dbh.php';
include_once '../classes/emailClass.php';
include_once '../classes/emailController.php';
$emailOutput = new EmailController();
if(isset($_POST['nameCheckbox'])) {
    $emailOutput->sortByName();
}
elseif(isset($_POST['dateCheckbox'])) {
    $emailOutput->getData();
}


