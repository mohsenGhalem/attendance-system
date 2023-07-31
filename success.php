<?php
$title = 'Success';
require_once "./includes/header.php";
require "./DB/conn.php";

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];
    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);
    if ($isSuccess) {
        echo '<h1 class="text-success text-center">U Have been Registred</h1>';
    } else {
        echo '<h1 class="text-danger text-center">There is an Error.</h1>';
    }
}
?>

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"> <?php echo $_POST['firstname'] . ' ' . $_POST["lastname"] ?></h5>
        <p class="card-text">Date of birth :<?php echo ' ' . $_POST['dob'] ?></p>
        <p class="card-text">phone :<?php echo ' ' . $_POST['phone']; ?></p>
        <p class="card-text">Specialty :<?php echo ' ' . $_POST['specialty']; ?></p>
        <p class="card-text"></p>

        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>



<br>
<br>
<br>
<br>
<br>
<br>
<?php require_once './includes/footer.php' ?>