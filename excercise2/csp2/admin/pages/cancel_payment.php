<?php  
require '../../db/connection.php';
$rcode = $_GET['rcode'];

$select_reserve = "SELECT room_id, checkin,checkout,qty FROM reservationdetails WHERE reservationcode = '$rcode'";

$new_qty = 0;
$result2 = mysqli_query($conn,$select_reserve);
while ($row_reserve = mysqli_fetch_array($result2)) {
    $rid = $row_reserve['room_id'];
    $datein = $row_reserve['checkin'];
    $dateout = $row_reserve['checkout'];
    $qty = $row_reserve['qty'];//will be added

    $select_avail = "SELECT qty FROM availability WHERE room_id='$rid' AND checkin='$datein' AND checkout='$dateout' ";
    $result3 = mysqli_query($conn,$select_avail);
    $rowres = mysqli_fetch_assoc($result3);
    $q = $rowres['qty'];

    $new_qty = $qty + $q;
    $update_qty = "UPDATE availability SET qty = $new_qty WHERE room_id='$rid' AND checkin='$datein' AND checkout='$dateout' ";
    $result1 = mysqli_query($conn,$update_qty);

}

$update_status = "UPDATE reservation SET paymentstatus = 0 WHERE reservationcode = '$rcode'";
$result = mysqli_query($conn,$update_status);

$update_trans = "UPDATE transaction SET statuspay = 3 WHERE reserveCode = '$rcode'";
mysqli_query($conn,$update_trans);

header('location: index2.php');

?>