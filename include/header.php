<?php 
    session_start();
    include_once('db/connect.php');
?>

    <?php
    // session_start();
    // đăng xuất
    if(isset($_GET['quanly'])){
        $dangxuat = $_GET['quanly'];
    }else{
        $dangxuat = '';
    }
    if($dangxuat=='logout'){
        unset($_SESSION['login']);
        header('Location: index.php');
    }
    
?>

<div class="header">
    
    <div class="header-bar">
        <a class="logo" href="?quanly=home" >LIBRARY</a>
        <ul class="hd-icon">
            
            <li><a href=""><i class="fa-solid fa-bell"></i></a></li>
            <li><a href=""><i class="fa-solid fa-heart"></i></a></li>
            <li class="user-icon more">
                <a><i class="fa-solid fa-user"></i></a>
                <ul class="hidden-list">
                    <?php 
                    if(!isset($_SESSION['login'])){                    
                    ?>
                    <li><a href="?quanly=login">Đăng nhập</a></li>
                    <li><a href="?quanly=signup">Đăng ký</a></li>
                    <?php }else{ ?>
                    <li><a href="setting.php">Quản lý tài khoản</a></li>
                    <li><a href="?quanly=muon">Mượn sách</a></li>
                    <li><a href="?quanly=logout">Đăng xuất</a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </div>

    <!-- danh sách menu -->
    <?php
        $sql_theloai = mysqli_query($connect,'SELECT * FROM theloai ORDER BY theloai_id ASC')
        ?>

    <div class="list-bar">
        
        <ul class="hd-list">
            
            <li><a href="?quanly=">Trang chủ</a></li>
            <li><a href="?quanly=news">Tin tức</a></li>
            <li class="more-book more">
                <a href="?quanly=books">Sách
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="hidden-list">
                    <?php
                        while($row_theloai = mysqli_fetch_array($sql_theloai)){
                    ?>
                        <li><a href="?quanly=books&idtheloai=<?php echo $row_theloai['theloai_id']?>">
                            <?php echo $row_theloai['theloai_ten'] ?>
                        </a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
            <li><a href="?quanly=muon">Đặt mượn sách</a></li>
            <li><a href="?quanly=author">Tác giả</a></li>
            <li><a href="?quanly=contact">Liên hệ</a></li>
        </ul>
    </div>
</div>