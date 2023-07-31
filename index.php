<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<?php
$title = 'index';
require_once "./includes/header.php";
require "./DB/conn.php";
$resultt = $crud->getSpecialties();
?>

<form method="post" action="success.php">
    <br>
    <br><br><br><br>
    <div class=form-group>
        <h1>registration Form </h1>

        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="lastname">
    </div>

    <div class=form-group>
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname">
    </div>

    <div class=form-group>
        <label for="dob" class="form-label">Date of Birth </label>
        <input type="date" class="form-control" id="dob" name="dob">
    </div>

    <div class="form-group">
        <label for="specialty">Area of expertise</label>
        <select class="form-control" name="specialty" id="specialty">
            <?php while ($r = $resultt->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['specialty_name'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    </div>

    <div class="form-group">
        <label for="phone" class="form-label">Enter ur phone number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="enter ur phone number">
    </div>
    <br>

    <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-primary btn-block">submit</button>
    </div>


</form>

<?php require_once './includes/footer.php' ?>