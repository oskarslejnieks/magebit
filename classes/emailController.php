<?php

class EmailController extends Email
{

    private $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function call()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=invalidemail");
            exit();
        }
        if ($this->emptyCheckbox() == false) {
            header("location: ../index.php?error=emptycheckbox");
            exit();
        }
        if($this->invalidCoEmail() == false) {
            header("location: ../index.php?error=invalidcoemail");
            exit();
        } 

        $this->setData($this->email);

    }

   

    public function getData()
    {
        $stmt = $this->connect()->query("select * from emails");
        
        $this->emailLoop($stmt);
    }


    public function sortByName()
    {
        $stmt = $this->connect()->query('select * from emails order by email asc');

       $this->emailLoop($stmt);
    }


    public function searchEmails($term)
    {
        $stmt = $this->connect()->query("select * from emails where email like '%$term%';");

        $numOfRows = $stmt->rowCount();

        if ($numOfRows > 0) {
            $this->emailLoop($stmt);
            
        } else {
            echo '<p>No emails found</p>';
        }
    }

    public function searchYahoo() {
        $stmt = $this->connect()->query("select * from emails where email like '%yahoo%';");

        $this->emailLoop($stmt);
    }
    public function searchInbox() {
        $stmt = $this->connect()->query("select * from emails where email like '%inbox%'");

        $this->emailLoop($stmt);
    }
    public function searchGmail() {
        $stmt = $this->connect()->query("select * from emails where email like '%gmail%'");

        $this->emailLoop($stmt);
    }    
    public function searchHotmail() {
        $stmt = $this->connect()->query("select * from emails where email like '%hotmail%'");

        $this->emailLoop($stmt);
    }
    public function searchOutlook() {
        $stmt = $this->connect()->query("select * from emails where email like '%outlook%'");

        $this->emailLoop($stmt);
    }
    public function searchHubspot() {
        $stmt = $this->connect()->query("select * from emails where email like '%hubspot%'");

        $this->emailLoop($stmt);
    }

    public function exportCSV() {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");

        fputcsv($output, array('email'));

        $stmt = $this->connect()->query("select * from emails order by id desc");
        

        while($row = $stmt->fetch()) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function deleteEmails()
    {
        $numberOfCheckboxes = count($_POST['delete_id']);
        $i = 0;

        while ($i < $numberOfCheckboxes) {
            $deleteKey = $_POST['delete_id'][$i];
            $stmt = $this->connect()->query("delete from emails where id = '$deleteKey';");

            $i++;
        }
        return $stmt;
    }

    // public function emailButtons() {
    //     $stmt = $this->connect()->query("select * from emails where email like ");
    // }

    


    private function emptyInput()
    {
        $result = false;
        if (empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function emptyCheckbox()
    {
        $checkbox = $_POST['checkbox'];
        $result = false;
        if (empty($checkbox)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidCoEmail() {
        $result = false;
        if(preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+(co))$/", $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}
