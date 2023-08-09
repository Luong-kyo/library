<?php 
include('../db/connect.php');
    
    
    $phong_id = $_GET['phong_id'];
    
    $sql = "SELECT * FROM `giasach` WHERE `phong` = {$phong_id}";
    $result = mysqli_query($connect, $sql);

    $data[0] = [
        'id' => null,
        'name' => ''
    ];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'id' => $row['giasach_id'],
            'name'=> $row['giasach_ten']
        ];
    }
    echo json_encode($data);
?>
