<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="emailForm" action="includes/email.php" method="POST">
                    <div class="arrow-div">

                        <a href="#"><button onclick="validateForm();" type="submit" name="submit"><span id="arrowSpan">&#10230;</span></button></a>

                        <!-- <button type="submit" name="submit1">SUBMIT</button> -->
                        <input name="email" id="emailInput" type="text" placeholder="Type your email address here..." <?php if (isset($_GET['error'])) {
                                                                                                                            if ($_GET['error'] == 'emptyinput' || $_GET['error'] == 'invalidemail' || $_GET['error'] == 'emptycheckbox' || $_GET['error'] == 'invalidcoemail') {
                                                                                                                                echo 'style="border: 1px solid red; border-left: 4px solid red;"';
                                                                                                                            } else {
                                                                                                                                echo 'style="border: 1px solid #e3e3e4; border-left: 4px solid #4066a5;"';
                                                                                                                            }
                                                                                                                        } ?>>
                        <p id="errorOutput"></p>

                        <?php

                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == 'emptyinput') {
                                echo "<p id='errorOutput' style='color: red;'>Email address is required</p>";
                            }
                            if ($_GET['error'] == 'emptycheckbox') {
                                echo "<p id='errorOutput' style='color: red;'>You must accept the terms and conditions</p>";
                            }
                            if ($_GET['error'] == 'invalidemail') {
                                echo "<p id='errorOutput' style='color: red;'>Please, provide a valid email</p>";
                            }
                            if ($_GET['error'] == 'invalidcoemail') {
                                echo "<p id='errorOutput' style='color: red;''>We are not accepting subscriptions from Colombia emails</p>";
                            }
                        }

                        ?>
                    </div>
                    <div class="inner-checkbox" id="checkboxForm">
                        <input id="checkTerms" type="checkbox" name="checkbox">
                        <p class="checkBoxText">I agree to <u><strong><a href="#">terms of service</a></strong></u></p>
                    </div>

                </form>
</body>
</html>