<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lý</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="../js/jquery-3.6.0.js"> -->
    <link rel='stylesheet' href="./css/nhapp.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <!-- <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>


</head>

<body>

    <script type="text/javascript" src="../asset/ckeditor/ckeditor.js"></script>

    <!-- check đăng nhập -->
    <?php
        session_start();
        if(!isset($_SESSION['dangnhap'])){
            header('Location: login.php');
        }
   
    // đăng xuất
    if(isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    }else{
        $dangxuat = '';
    }
    if($dangxuat=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location: login.php');
    }
    
?>
<style>
    .header{
        position:fixed;
        margin-top:-80px;
        width: 100%;
        
        z-index: 10;
    }
</style>


    <?php include('../db/connect.php'); ?>
    <div class="header" style="position:fixed;">
        <p></p>
        <a class='nav-link' href="?login=dangxuat">Đăng xuất</a>
    </div>
   