<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./css/loginnn.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
    include('./db/connect.php');

    // đăng ký
        if(isset($_POST['dangky'])){
            $mssv=$_POST['mssv'];
            $hoten=$_POST['hoten'];
            $email=$_POST['email'];
            $sdt=$_POST['sdt'];
            $diachi=$_POST['diachi'];
            $ngaysinh=$_POST['ngaysinh'];
            $matkhau=$_POST['matkhau'];
            $re_matkhau=$_POST['re_matkhau'];
            $gioitinh = $_POST['gioitinh'];
            // check tài khoản tồn tại
            $sql_check_taikhoan=mysqli_query($connect,"SELECT * FROM docgia where docgia_id = '$mssv' ");
            $check_taikhoan = mysqli_num_rows($sql_check_taikhoan);
            $checkmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            $checksdt = preg_match('/^(0|\+84)\d{9,10}$/', $sdt);
            $checkmssv = preg_match('/^20\d{6}$/', $mssv);

            if($check_taikhoan>0){
                ?>
                <script>
                    alert('Sinh viên đã có tài khoản tại hệ thống');
                </script>
                <?php
            }elseif(!$checkmssv){
                echo "<script> alert('MSSV không hợp lệ'); </script>";
            }
            elseif (!$checksdt) {
                echo "<script> alert('SDT không hợp lệ'); </script>";
            }
            elseif (!$checkmail) {
                echo "<script> alert('Email không hợp lệ'); </script>";
            }
            elseif(strlen($matkhau)<5){
                echo "<script> alert('Mật khẩu quá ngắn'); </script>";

            // check nhập lại mk
            }elseif($matkhau!=$re_matkhau){
                echo "<script> alert('Mật khẩu không khớp'); </script>";

            }
            else{
                $sql_signup= mysqli_query($connect,
                    "INSERT INTO docgia(docgia_id,docgia_ten,docgia_sdt,docgia_gioitinh,docgia_mail,docgia_diachi,docgia_ngaysinh,docgia_mk)
                    value ('$mssv','$hoten','$sdt','$gioitinh','$email','$diachi','$ngaysinh','$matkhau')");
                echo "<script> alert('Đăng ký thành công'); 
                window.location.href = 'login.php';
                </script>";

                header('Location: login.php');
            }
        }
?>


<body>
    <div class="login-container">
        <form id="form-signup" method="POST" action="" class="bg-dark text-white shadow-lg">
            <div class="d-flex justify-content-between">
                <a href="index.php" class="text-white"><i class="fa fa-angle-left"></i> Trang chủ</a>
                <h1 class="">Đăng ký tài khoản</h1>
                <span></span>
            </div>
            <div class="sm-6">
                <div class="form-group">
                    <input type="text" autocomplete="off" required name="mssv" value="" class="form-control" placeholder="MSSV *">
                </div>
                <div class="form-group">
                    <input type="text" required name="hoten" value="" class="form-control " placeholder="Họ tên *">
                </div>
            </div>

            <div class="sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" required name="sdt" value="" class="form-control"
                            placeholder="Số điện thoại*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gioitinh" id="maleGender"
                            value="Nam" />
                        <label class="form-check-label" for="maleGender">Nam</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gioitinh" id="femaleGender"
                            value="Nữ" />
                        <label class="form-check-label" for="femaleGender">Nữ</label>
                    </div>

                    <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="gioitinh" id="otherGender"
                            value="Khác" />
                        <label class="form-check-label" for="otherGender">Khác</label>
                    </div>
                </div>
                

            </div>
            <div class="sm-6">
                <div class="form-group">
                    <input type="text" required name="email" autocomplete="off" value="" class="form-control" placeholder="Email *">
                </div>
                <div class="form-group d-flex ">
                    <label class="form-check-label " for="ngaysinh">Ngày sinh</label>
                    <input type="date" name="ngaysinh" value="" class="form-control" id="ngaysinh"
                        placeholder="Ngày sinh *">
                </div>
                
            </div>

            <div class="sm-12">
                <div class="form-group">
                    <input type="text" required name="diachi" value="" class="form-control"
                        placeholder="Địa chỉ *">
                </div>
                

                
                
                <div class="form-group">
                    <input type="password" required name="matkhau" value="" class="form-control"
                        placeholder="Mật khẩu *">
                </div>

                <div class="form-group">
                    <input type="password" required name="re_matkhau" value="" class="form-control"
                        placeholder="Xác nhận mật khẩu *">
                </div>

                <input type="submit" class="btn btn-outline-light btn-lg px-5"  name="dangky" value="Đăng ký">

                

                <p class="text-center">Đã có tài khoản? <b><a href="./login.php">Đăng nhập ngay!</a></b></p>
        </form>

        
    </div>

    <div class="bg"></div>
<div class="background">
    <img src="./asset/pic/bg1.jpeg" alt="">
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
        filter: blur(10px);
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