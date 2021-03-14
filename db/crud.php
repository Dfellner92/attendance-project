<?php
    class crud {
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function createAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) VALUES (
                    :fname,
                    :lname,
                    :dob,
                    :email,
                    :contact,
                    :specialty
                )";
                $statement = $this->db->prepare($sql);

                $statement->bindparam(':fname', $fname);
                $statement->bindparam(':lname', $lname);
                $statement->bindparam(':dob', $dob);
                $statement->bindparam(':email', $email);
                $statement->bindparam(':contact', $contact);
                $statement->bindparam(':specialty', $specialty);

                $statement->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function readAttendees(){
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function readAttendeeDetails($id){
            $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':id', $id);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        }

        public function readSpecialties(){
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        }
    };
?>