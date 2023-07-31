<html lang="en">

</html>

<?php
$title = 'View Records';
require_once "./includes/header.php";
require "./DB/conn.php";


if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>please check out detauls and try again </h1>";
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . ' ' . $result["lastname"] ?>
            </h5>
            <p class="card-text">Specialty :<?php echo ' ' . $result['specialty_name']; ?></p>
            <p class="card-text">Date of birth :<?php echo ' ' . $result['birth'] ?></p>

        </div>
    </div>

<?php } ?>



<?php require_once './includes/footer.php' ?>