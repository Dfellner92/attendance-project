<?php
        $title = 'Index'; 
        require_once 'includes/header.php'; 
    ?>

    <h1>Hello, world!</h1>
    <form>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname"> 
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname"> 
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob"> 
        </div>
        <div class="form-group">
            <label for="specialty">Area of Expertise</label>
            <select class="form-control" id="specialty">
                <option>Database Administrator</option>
                <option>Software Developer</option>
                <option>Web Administrator</option>
                <option>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email"
            aria-describedby="emailHelp" >
            <small id="emailHelp" class="form-text text-muted">
                We'll never share your email with anyone
            </small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone"
            aria-describedby="phoneHelp" >
            <small id="phoneHelp" class="form-text text-muted">
                We'll never share your number with anyone
            </small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php require_once 'includes/footer.php'; ?>
    