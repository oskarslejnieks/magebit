<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <a class="backButton" href="index.php">Back</a>
    <table>
        <tr>
            <th>Emails</th>
            <th><button id="delete-product-btn" name="massDelete" form="delete-form">Delete</button></th>
            <form action="#" method="POST">
                <th>
                    <label for="">Sort by name</label>
                    <input type="checkbox" name="nameCheckbox" value="name"><br>
                    <label for="">Sort by date</label>
                    <input type="checkbox" name="dateCheckbox" value="date"><br>
                    <a href="output.php?sort=email"><button name="sortButton">Sort</button></a>
                </th>
            </form>
            <th>
                <form action="output.php" method="POST">
                    <button type="submit" name="searchButton">Search</button>
                    <input type="text" name="searchInput" placeholder="Search for emails...">
                </form>

            </th>
            <th>
                <form action="includes/export.php" method="POST">
                    <input type="submit" name="export" value="CSV Export">
                </form>
            </th>
        </tr>
        <?php
        include_once 'classes/dbh.php';
        include_once 'classes/emailClass.php';
        include_once 'classes/emailController.php';
        include_once 'classes/dhb-test.php';


        $emailObject = new EmailController();
        if (isset($_POST['searchButton'])) {
            $emailObject->searchEmails($_POST['searchInput']);
            // header("location: output.php?search=ok");
            unset($emailObject);
        } elseif (isset($_POST['nameCheckbox'])) {
            $emailObject->sortByName();
        } elseif (isset($_POST['dateCheckbox'])) {
            $emailObject->getData();
        } elseif (isset($_GET['filterBy'])) {
            if ($_GET['filterBy'] == 'yahoo') {
                $emailObject->searchYahoo();
            }
            if ($_GET['filterBy'] == 'inbox') {
                $emailObject->searchInbox();
            }
            if ($_GET['filterBy'] == 'gmail') {
                $emailObject->searchGmail();
            }
            if ($_GET['filterBy'] == 'hotmail') {
                $emailObject->searchHotmail();
            }
            if ($_GET['filterBy'] == 'hubspot') {
                $emailObject->searchHubspot();
            }
            if ($_GET['filterBy'] == 'outlook') {
                $emailObject->searchOutlook();
            }
        } else {
            $emailObject->getData();
        }




        unset($emailObject);

        ?>
    </table>
</body>

</html>