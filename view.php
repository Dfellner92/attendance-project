<?php
    $title = 'View Record'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
    } else {
        $id = $_GET['id'];
        $result = $crud->readAttendeeDetails($id);
    

?>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>    
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name']; ?>
        </h6>
        <p class="card-text">
            Date of Birth: <?php echo $result['dateofbirth']; ?>
        </p>
        <p class="card-text">
            Email: <?php echo $result['emailaddress']; ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $result['contactnumber']; ?>
        </p>
    </div>
</div>
<br/>
<a href="viewrecords.php" class="btn btn-info">Back</a>
<a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm('Confirm deletion')" href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Del</a>
       

<?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>