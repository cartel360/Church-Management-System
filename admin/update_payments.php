<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['update_offering'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query($conn, "UPDATE offering SET stat='Yes' where offeringid='$id[$i]'");
    }
    header("location: offering.php");
}

if (isset($_POST['update_tithe'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query($conn, "UPDATE tithe SET stat='Yes' where titheid='$id[$i]'");
    }
    header("location: Tithes.php");
}

if (isset($_POST['update_giving'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query($conn, "UPDATE giving SET stat='Yes' where givingid='$id[$i]'");
    }
    header("location: giving.php");
}
