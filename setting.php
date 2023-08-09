<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Setting</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
</head>
<body>
<div class="header">
    
    <div class="header-bar">
        <a class="logo" href="index.php" >LIBRARY</a>
        
    </div>
	<section class="py-5 my-5">
		<div class="container">
			<?php
				include('./db/connect.php');
				session_start();
				if(!isset($_SESSION['login'])){
					header('Location: login.php');
				}
				$docgia_id = $_SESSION['docgia_id'];
				$docgia = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM docgia where docgia_id = '$docgia_id'"));
				$anh = $docgia['docgia_anh'];
				if(!$anh){
					$anh = 'businessman.png';
				}

				if(isset($_POST['update'])){
					// $email=$_POST['email'];
					$matkhaucu=$_POST['matkhaucu'];
					$matkhaumoi=$_POST['matkhaumoi'];
					$nhaplai=$_POST['nhaplai'];

					if($matkhaucu != $docgia['docgia_mk']){
						echo "<script> alert('Mật khẩu cũ không đúng '); </script>";
					}elseif(strlen($matkhaumoi) < 6 ){
						echo "<script> alert('Mật khẩu mới quá ngắn ');</script> ";
					}elseif($matkhaumoi != $nhaplai){
						echo "<script> alert('Nhập lại mật khẩu không khớp'); </script>";
					}elseif($matkhaucu == $matkhaumoi){
						echo "<script> alert('Mật khẩu mới phải khác mật khẩu cũ!'); </script>";
					}
					
					else{
						$sql = mysqli_query($connect,"UPDATE docgia SET docgia_mk = '$matkhaumoi' where docgia_id = '$docgia_id' ");
						echo "<script> alert('Đổi mật khẩu thành công'); 
						</script>";
					}
				}

				// echo $docgia_id;
			?>
			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3 upload">
							<img src="./upload/user/<?php echo $anh; ?>" alt="Image" id="anhdaidien" class="shadow">
							<div class="round">
								<input type="file" name="image" id = "chonanh" accept=".jpg, .jpeg, .png" onchange="choseFile(this)">
							</div>
							<i class="fa fa-camera icon"></i>

							
						</div>
						<h4 class="text-center"><?php echo $docgia['docgia_ten']; ?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Thông tin cá nhân
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Tài khoản & mật khẩu
						</a>
						
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i> 
							Xác thực 2 yếu tố
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Thông tin cá nhân</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Họ và tên</label>
								  	<input type="text" class="form-control" autocomplete="off" value="<?php echo $docgia['docgia_ten']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Số điện thoại</label>
								  	<input type="text" class="form-control" autocomplete="off" value="<?php echo $docgia['docgia_sdt']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" autocomplete="off" disabled value="<?php echo $docgia['docgia_mail']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Giới tính</label>
								  	<input type="text" class="form-control" autocomplete="off" value="<?php echo $docgia['docgia_gioitinh']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Ngày sinh</label>
								  	<input type="text" class="form-control" autocomplete="off" value="<?php echo $docgia['docgia_ngaysinh']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Địa chỉ</label>
								  	<input type="text" class="form-control" autocomplete="off" value="<?php echo $docgia['docgia_diachi']; ?>">
								</div>
							</div>
							
							
						</div>
						<div>
							<!-- <button class="btn btn-primary">Update</button> -->
							<button class="btn btn-primary"><a style="color:white; text-decoration: none;" href="index.php">Quay lại</a></button>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<form action="" method="POST" enctype="multipart/form-data">

							<h3 class="mb-4">Tài khoản & mật khẩu</h3>
							<div class="row">
								
							
								<div class="col-md-8">
									<div class="form-group">
										<label>Email:</label>
										<input type="text" value="<?php echo $docgia['docgia_mail']; ?>" disabled class="form-control">
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-8">
									<div class="form-group">
										<label>Mật khẩu hiện tại</label>
										<input type="password" name="matkhaucu" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-4">
									<div class="form-group">
										<label>Mật khẩu mới</label>
										<input type="password" name="matkhaumoi" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Nhập lại mật khẩu mới</label>
										<input type="password" name="nhaplai" class="form-control">
									</div>
								</div>
							</div>
							<div>
								<input type="submit" name="update" class="btn btn-primary" value="Đồng ý">
								<button class="btn btn-primary"><a style="color:white; text-decoration: none;" href="index.php">Quay lại</a></button>
							</div>
						</form>

					</div>

					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Xác thực 2 yếu tố</h3>
						
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-primary"><a style="color:white; text-decoration: none;" href="index.php">Quay lại</a></button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


	<script>
		function choseFile(fileInput){
			if(fileInput.files && fileInput.file[0]){
				var reader = new fileReader();
				reader.onload = function(e){
					$('#anhdaidien').attr('src',e.target.result);

				}
				reader.readAsDataURL(fileInput.file[0]);
			}
		}

	</script>




<div>
	<style>
		@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
	body {
		background: #f9f9f9;
		font-family: "Roboto", sans-serif;
	}

	.shadow {
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
	}

	.profile-tab-nav {
		min-width: 250px;
	}

	.tab-content {
		flex: 1;
	}

	.form-group {
		margin-bottom: 1.5rem;
	}

	.nav-pills a.nav-link {
		padding: 15px 20px;
		border-bottom: 1px solid #ddd;
		border-radius: 0;
		color: #333;
	}
	.nav-pills a.nav-link i {
		width: 20px;
	}

	.img-circle img {
		height: 100px;
		width: 100px;
		border-radius: 100%;
		border: 5px solid #fff;
	}
	.upload{
	width: 125px;
	position: relative;
	margin: auto;
	}
	.icon{
		position: absolute;
		bottom: 0;
		right: 0;
		/* background: #00B4FF; */
		width: 32px;
		height: 32px;
		line-height: 33px;
		text-align: center;
		border-radius: 50%;
	}
	.upload .round{
		position: absolute;
		bottom: 4px;
		right:4px;
		/* background: #00B4FF; */
		width: 24px;
		z-index: 2;
		height: 24px;
		line-height: 33px;
		text-align: center;
		border-radius: 50%;
		overflow: hidden;
	}

	.upload .round input[type = "file"]{
		margin-left: 24px;
	position: position: relative;;
	bottom: 0;
	right: 10px;
	transform: scale(2);
	opacity: 0;
	}

	input[type=file]::-webkit-file-upload-button{
		cursor: pointer;
	}
	.header-bar{
		margin-top: -48px;
		height: 80px;
		width: 100%;
		background-color: var(--main-color);
		display: flex;
		justify-content: space-between;
		position: fixed;
		box-shadow: var(--shadow);
		z-index: 100;
	}

	.logo{ 
		margin: auto 46px;
		font-size: 28px;
		cursor: pointer;
		font-weight: bold;
		text-decoration: none;
		color: #000;
		transition: 0.2s;
	}
	.logo:hover{ 
		margin: auto 46px;
		scale: 1.03;
		text-decoration: none;
		color: #000;
	}


	.hd-icon{
		display: flex;
		position: relative;
		margin: auto 12px;
	}
	.hd-icon li{
		line-height: 50px;
		margin: 0 24px;
		list-style: none;
	}
	.hd-icon li a{
		list-style: none;
		color: #000;
	}
	.hd-icon input{
		width: 300px;
		height: 36px;
		margin-right: 6px;
		font-size: 16px;
		padding: 6px;
		border-radius: 6px;
		border: 1px solid #ccc;
	}
	.hd-icon> li:hover i{
		transform: scale(1.2);
	}
	.user-icon .hidden-list{
		position: absolute;
		right: 8px;
		display: none;
	}
	.user-icon:hover .hidden-list{
		display: block;
	}
	:root{
		--main-color: #167D7F;
		--main-color-alpha:  rgba(22,125,127,0.6);
		--shadow:  0 0 5px rgba(0, 0, 0, 0.5);
	}
	</style>
</div>


</body>
</html>