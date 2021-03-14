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
            try{
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function readAttendeeDetails($id){
            try{
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id =:id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);
                $statement->execute();
                return true;
            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function readSpecialties(){
            try{
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function updateAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "UPDATE `attendee` SET `attendee_id`=:id, `firstname`=:fname, `lastname`=:lname, `dateofbirth`=:dob,
                `emailaddress`=:email, `contactnumber`=:contact, `specialty_id`=:specialty WHERE attendee_id=:id";
                $statement = $this->db->prepare($sql);

                $statement->bindparam(':id', $id);
                $statement->bindparam(':fname', $fname);
                $statement->bindparam(':lname', $lname);
                $statement->bindparam(':dob', $dob);
                $statement->bindparam(':email', $email);
                $statement->bindparam(':contact', $contact);
                $statement->bindparam(':specialty', $specialty);

                $statement->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false; 
            }   
        }
    };
?>