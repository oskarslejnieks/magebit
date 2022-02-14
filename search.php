<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
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
                    <button name="sortButton">Sort</button>
                </th>
            </form>
            <th>
                <form action="search.php" method="POST">
                    <button type="submit" name="searchButton">Search</button>
                    <input type="text" name="searchInput" placeholder="Search for emails...">
                </form>

            </th>
        </tr>
        <?php
        include_once 'classes/dbh.php';
        include_once 'classes/emailClass.php';
        include_once 'classes/emailController.php';
        $emailObject = new EmailController();
        if (isset($_POST['searchButton'])) {
            $emailObject->searchEmails($_POST['searchInput']);

            // header("location: output.php?search=ok");
        }

        if (isset($_POST['nameCheckbox'])) {
            $emailObject->sortByName();
        } elseif (isset($_POST['dateCheckbox'])) {
            $emailObject->getData();
        } else {
            $emailObject->getData();
        }
        ?>
    </table>
</body>

</html>