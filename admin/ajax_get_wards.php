<?php 
include('../db/connect.php');
$district_id = $_GET['district_id'];

// echo $district_id;

$sql = "SELECT * FROM `1wards` WHERE `district_id` = {$district_id}";
$result = mysqli_query($connect, $sql);


$data[0] = [
    'id' => null,
    'name' => 'Chọn một xã/phường'
];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'id' => $row['wards_id'],
        'name'=> $row['wards_name']
    ];
}
echo json_encode($data);
?>