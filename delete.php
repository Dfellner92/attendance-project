<?php 
    require_once 'db/conn.php';
    if(!$_GET['id']){
        echo 'error';
    } else {
        $id = $_GET['id'];
    
        $result = $crud->deleteAttendee($id);

        if($result) {
            header("Location: viewrecords.php");
        } else {
            include 'includes/errormessage.php';
        }
    
    
    }

?>