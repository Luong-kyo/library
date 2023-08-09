<?php 
include('../db/connect.php');
$giasach_id = $_GET['giasach_id'];

// echo $giasach_id;

$sql = "SELECT * FROM `vitri_sach` WHERE `giasach_id` = {$giasach_id} and sach_id is null";
$result = mysqli_query($connect, $sql);


$data[0] = [
    'id' => null,
    'name' => ''
];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'id' => $row['id'],
        'name'=> $row['vitri']
    ];
}
echo json_encode($data);
?>