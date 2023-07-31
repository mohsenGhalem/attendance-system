<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<?php
$title = 'Edit ';
require_once "./includes/header.php";
require "./DB/conn.php";
$resultt = $crud->getSpecialties();
$id = $_GET['id'];

if (!isset($id)) {
    echo "error";
} else {
    $id = $_GET["id"];
    $attende = $crud->getAttendeeDetails($id);
?>

    <form method="post" action="success.php">

        <br>
        <br>
        <div class=form-group>
            <h1>Edit registration Form </h1>

            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attende['firstname'] ?>" id="firstname" name="firstname" placeholder="lastname">
        </div>

        <div class=form-group>
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attende['lastname'] ?>" id="lastname" name="lastname" placeholder="lastname">
        </div>

        <div class=form-group>
            <label for="dob" class="form-label">Date of Birth </label>
            <input type="date" class="form-control" value="<?php echo $attende['dob'] ?>" id="dob" name="dob">
        </div>

        <div class="form-group">
            <label for="specialty">Area of expertise</label>
            <select class="form-control" name="specialty" id="specialty">
                <?php while ($r = $resultt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <?php if ($r['specialty_id'] === $attende['specialty_id']) { ?>
                        <option selected value="<?php echo $r['specialty_id'] ?>"><?php echo $r['specialty_name'] ?></option>
                <?php }
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attende['email'] ?>" id="email" name="email" placeholder="name@example.com">
        </div>


        <div class="form-group">
            <label for="phone" class="form-label">Enter ur phone number</label>
            <input type="text" class="form-control" value="<?php echo $attende['phone'] ?>" name="phone" placeholder="enter ur phone number">
        </div>
        <br>


        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
        </div>


    </form>
<?php } ?>

<?php require_once './includes/footer.php' ?>