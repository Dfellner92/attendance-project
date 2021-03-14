<?php
        $title = 'Edit Record'; 
        require_once 'includes/header.php'; 
        require_once 'db/conn.php';

        $results = $crud->readSpecialties();

        if(!isset($_GET['id']))
        {
            echo 'error';
        } else {
            $id = $_GET['id'];
            $attendee = $crud->readAttendeeDetails($id);
        
?>

<h1 class="text-center">Edit Record</h1>
<form method="post" action="editpost.php">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname']; ?>" id="firstname" name="firstname"> 
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname']; ?>" id="firstname"  id="lastname" name="lastname"> 
    </div>
    <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']; ?>" id="firstname"  id="dob" name="dob"> 
    </div>
    <div class="form-group">
        <label for="specialty">Area of Expertise</label>
        <select class="form-control" id="specialty" name="specialty">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>><?php echo $r['name']; ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']; ?>" id="firstname" id="email" name="email"
        aria-describedby="emailHelp" >
        <small id="emailHelp" class="form-text text-muted">
            We'll never share your email with anyone
        </small>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control"  value="<?php echo $attendee['contactnumber']; ?>"id="firstname" id="phone" name="phone"
        aria-describedby="phoneHelp" >
        <small id="phoneHelp" class="form-text text-muted">
            We'll never share your number with anyone
        </small>
    </div>
    <button type="submit" name="submit" 
    class="btn btn-success btn-block">
        Save Changes
    </button>
</form>
<?php } ?>

<?php require_once 'includes/footer.php'; ?>
    