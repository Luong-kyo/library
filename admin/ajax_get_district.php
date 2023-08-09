<?php 
include('../db/connect.php');
    
    
    $province_id = $_GET['province_id'];
    
    $sql = "SELECT * FROM `1district` WHERE `province_id` = {$province_id}";
    $result = mysqli_query($connect, $sql);

    $data[0] = [
        'id' => null,
        'name' => 'Chọn một Quận/huyện'
    ];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'id' => $row['district_id'],
            'name'=> $row['district_name']
        ];
    }
    echo json_encode($data);
?>
