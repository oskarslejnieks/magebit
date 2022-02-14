<?php 

class Email extends Dbh {
    public function setData($email) {
        $stmt = $this->connect()->prepare('insert into emails (email) values (?);');

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function emailLoop($stmt) {
        while ($row = $stmt->fetch()) {
            echo '
            <link rel="stylesheet" href="style.css" type="text/css" />
            <tr>
              <td>' . $row['email'] . '</td>
              <td>
                <form method="POST" id="delete-form" action="includes/delete.php">
                        <input class="delete-checkbox" type="checkbox" value=' . $row['id'] . ' form="delete-form" name="delete_id[]">
                        
                 </form>
              </td>
            </tr>
            
           ';
        
            $email = $row['email'];
            $parts = explode("@",$email); 
            $domain = $parts[1];

            if(str_contains($email, '@inbox') !== false) {
                echo '<a href="?filterBy=inbox"><button name="buttonFilter">'.$domain.'</button></a>';
                // header("location: output.php?filterBy=inbox");
            } 
            elseif(str_contains($email, '@gmail') !== false) {
                echo '<a href="?filterBy=gmail"><button>'.$domain.'</button></a>';
                // header("location: output.php?filterBy=gmail");
            }
            elseif(str_contains($email, '@hotmail') !== false) {
                echo '<a href="?filterBy=hotmail"><button>'.$domain.'</button></a>';
                // header("location: output.php?filterBy=hotmail");
            }
            elseif(str_contains($email, '@yahoo') !== false) {
                echo '<a href="?filterBy=yahoo"><button>'.$domain.'</button></a>';
                // header("location: output.php?filterBy=yahoo");
            }
            elseif(str_contains($email, '@outlook') !== false) {
                echo '<a href="?filterBy=outlook"><button>'.$domain.'</button></a>';
                // header("location: output.php?filterBy=outlook");
            }
            elseif(str_contains($email, '@hubspot') !== false) {
                echo '<a href="?filterBy=hubspot"><button>'.$domain.'</button></a>';
                // header("location: output.php?filterBy=hubspot");
            }
        }
    }
}