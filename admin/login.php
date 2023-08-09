<?php
    session_start();
    include('../db/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    
</head>
<body>
    
<?php

// đăng nhập
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $date = date('Y-m-d');
        mysqli_query($connect, "UPDATE themuon SET canhcao = '1' where ngayhen < '$date' and ngaytra is NULL and trangthai ='1'");
        $sql_thequahan = mysqli_query($connect,"SELECT * FROM themuon WHERE trangthai = 0 AND ngaymuon < CURDATE() ");
        while($thequahan = mysqli_fetch_array($sql_thequahan)){
            $themuon = $thequahan['themuon_id'];
            $sql_slsm = mysqli_query($connect,"SELECT * FROM sach_the where themuon_id = '$themuon' ");
            while($slsm= mysqli_fetch_array($sql_slsm)){
                $j=$slsm['soluong'];
                $i=$slsm['sach_id'];
                $row_sl = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sach where sach_id = '$i' "));
                $sl = $row_sl['sach_soluong']+$j;
                mysqli_query($connect,"UPDATE sach SET sach_soluong='$sl' where sach_id = '$i'");
            }
            mysqli_query($connect,"DELETE FROM sach_the Where themuon_id='$themuon'");
            mysqli_query($connect,"DELETE FROM themuon Where themuon_id='$themuon'");
        }
        
        if($taikhoan==''|| $matkhau==''){
            echo '<p>Xin nhập đủ</p>';
        }else{
            $sql_admin = mysqli_query($connect,"SELECT * FROM tthu WHERE tt_taikhoan='$taikhoan' and tt_matkhau='$matkhau' limit 1");
            $count = mysqli_num_rows($sql_admin);
            $row_dangnhap=mysqli_fetch_array($sql_admin);
            if($count>0){
                $_SESSION['dangnhap']=$row_dangnhap['tt_ten'];
                $_SESSION['tt_id']=$row_dangnhap['tt_id'];
                header('Location: sach.php');
            }else{
            ?>
            <div class="alert alert-danger alert-dismissible fade show thongbao">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="d-flex justify-content-center">
                <strong>Thông báo! </strong> Tài khoản hoặc mật khẩu không chính xác
                </div>
            </div>       
            <?php
            }
        }
    }

?>
        
<div class="login">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100 "><br><br>
            <div class="row d-flex justify-content-center align-items-center h-50 ">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6 hi">
                    <div class="card bg-dark text-white" style="border-radius: 2rem;">
                        <form class="card-body p-5 text-center" action="" method="POST">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Tài khoản:</label>
                                    <input type="text"  required id="taikhoan" name="taikhoan" placeholder="UserName *" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Mật khẩu:</label>
                                    <input type="password" required id="matkhau" name="matkhau" placeholder="Password *" class="form-control form-control-lg" />
                                </div><br>
                            <input type="submit" class="btn btn-outline-light btn-lg px-5" data-toggle="modal" data-target="#myModal" name="dangnhap" value="Đăng nhập">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="bg"></div>
<div class="background">
    <img src="../asset/pic/bg0.jpeg" alt="">
</div>
</div>

<style>
    .bg{
        position: fixed;
        top:0px;
        width: 100%;
        height:1000px;
        background-color: rgba(0,0,0,0.4);
        z-index: -1;
        
    }

    .background{
        position: fixed;
        width: 100%;
        top:0px;
        left:0px;
        z-index: -2;
        filter: blur(20px);
    }
    .thongbao{
        position: fixed;
        top:2px;
        width: 100%;
        z-index: 100;
    }


</style>

</body>
</html>