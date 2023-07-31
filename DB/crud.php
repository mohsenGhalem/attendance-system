<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

</html>

<?php

class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insert($fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            $sql = "INSERT INTO attendant(firstname,lastname,birth,email,phone,specialty_id) VALUES(:fname,:lname,:dob,:email,:contact,:specialty)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
    
    public function getAttendee()
    {
        $sql = "SELECT * FROM `attendant` a inner join specialty s on a.specialty_id = s.specialty_id";
        $result = $this->db->query($sql);
        // a inner join tbl_specialty s on a.specialty_id  = s.specialty.id
        return $result;
    }

    public function getAttendeeDetails($id)
    {
        $sql =
            "select * from attendant a inner join specialty s on a.specialty_id = s.specialty_id where attende_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getSpecialties()
    {
        $sql = "SELECT * FROM `specialty`";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>