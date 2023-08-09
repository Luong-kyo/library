<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="./css/loginnn.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <?php
        include('./db/connect.php');

        include_once('mail/sendmail.php');
        $mail = new Mailer();
        
        if(isset($_POST['submit'])){
            $error = array();
            $email = $_POST['email'];
            $docgia_id = $_POST['mssv'];
            $sql = mysqli_query($connect,"SELECT * FROM docgia where docgia_id = '$docgia_id' ");
            $result = mysqli_num_rows($sql);
            echo $result;
            $row = mysqli_fetch_array($sql);

            if(!$email || !$docgia_id){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin'); </script>";

            }elseif($result<1){
                echo "<script> alert('Bạn chưa có tài khoản trong hệ thống'); </script>";

            }elseif($email != $row['docgia_mail']){
                echo "<script> alert('Email và mssv không khớp'); </script>";
            }
            else{

                $matkhau_moi = substr(rand(0,999999),0,6);
                $title = 'Quên mật khẩu Library';
                $content = "Mật khẩu mới của bạn là:<p style='color:red;'>".$matkhau_moi."</p>";
                $mail -> sendMail($title,$content,$email);
                $_SESSION['mail'] = $email;
                // $_SESSION['code'] = $code;

                mysqli_query($connect,"UPDATE docgia SET docgia_mk = '$matkhau_moi' where docgia_mail='$email' and docgia_id='$docgia_id' ");
            

                // echo "<script> alert('Thành công! Mật khẩu mới đã được gửi vào email của bạn.'); 
                // window.location.href = 'login.php';
                // </script>";
            }
        }
    ?>

<div class="login">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100 "><br><br>
            <div class="row d-flex justify-content-center align-items-center h-50 ">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6 hi ">
                    <div class="card bg-dark text-white shadow-lg " style="border-radius: 2rem;">
                        <form class="card-body p-5 text-center" action="" method="POST">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Quên mật khẩu</h2>
                                <p class="text-white-50 mb-5"></p>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="text"  required id="taikhoan" name="email" placeholder="Email *" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">MSSV:</label>
                                    <input type="text" required id="matkhau" name="mssv" placeholder="MSSV *" class="form-control form-control-lg" />
                                    <div class="d-flex justify-content-between">
                                    <span><a href="login.php" class="text-white my-2">Quay lại</a></span>
                                </div>
                                </div>
                                
                            <input type="submit" class="btn btn-outline-light btn-lg px-5"  name="submit" value="Đồng ý">
                            </div>
                            <a href="index.php" class="text-white"> Trang chủ</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="bg"></div>
<div class="background">
    <img src="./asset/pic/bg1.jpeg" alt="">
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