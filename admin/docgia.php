   
<?php include('./header.php');?>
<?php
        $th = 'fade';
        $ds = 'active';
        $danhsach ='active';
        $them = '';
        if(isset($_POST['them'])){
            $docgia_id=$_POST['docgia_id'];
            $hoten=$_POST['hoten'];
            $ngaysinh=$_POST['ngaysinh'];
            $gioitinh=$_POST['gioitinh'];
            $sdt=$_POST['sdt'];
            $email=$_POST['email'];
            $matkhau=$_POST['matkhau'];

            $anh=$_FILES['anh']['name'];
            $path='../upload/user/';
            $anh_tmp=$_FILES['anh']['tmp_name'];
            if($anh==''){
                $anh='businessman.png';
            }

            $province=$_POST['province'];
            $district=$_POST['district'];
            $wards=$_POST['wards'];
            $diachi=$_POST['diachi'];

            $sql = mysqli_query($connect, "SELECT * FROM docgia where docgia_id LIKE '$docgia_id' ");
            $count = mysqli_num_rows($sql);
            if($count!=0){
                $th ='active';
                $ds = 'fade';
                $them = 'active';
                $danhsach = '';
                $body = 'Đã tồn tại tài khoản của MSSV' . ' ' . $docgia_id;
                $footer = '<button type="button" class="btn btn-danger" data-dismiss="alert">Close</button> ';
            }else{
                $sql_diachi = mysqli_query($connect, "INSERT INTO diachi_docgia(docgia_id,provice_id,district_id,wards_id,diachi) VALUE ('$docgia_id','$province','$district','$wards','$diachi')");
                $sql_insert=mysqli_query($connect,
                "INSERT INTO docgia(docgia_id, docgia_ten, docgia_sdt, docgia_gioitinh, docgia_ngaysinh, docgia_mail, docgia_mk, docgia_anh)
                value ('$docgia_id', '$hoten', '$sdt', '$gioitinh', '$ngaysinh', '$email', '$matkhau', '$anh')");
                $body = 'Đăng ký tài khoản thành công.';
                $footer = '<button type="button" class="btn btn-danger" data-dismiss="alert">Close</button>';
                move_uploaded_file($anh_tmp,$path.$anh);
            }
            include './thongbao.php';

        }
?>



<div class="ad-container">

    <script src="../js/app.js"></script>
        <div class="ad-nav">
            <h2>Quản lý</h2>

            <ul>
                <li class="ad-li">
                    <a href="./sach.php">Sách</a>
                </li>
                <li class="ad-li">
                    <a href="./theloai.php">Thể loại</a>
                </li>
                <li class="ad-li">
                    <a href="./tacgia.php">Tác giả</a>
                </li>
                <li class="ad-li">
                    <a href="./NXB.php">NXB</a>
                </li>
                <li class="ad-li">
                    <a href="./themuon.php">Thẻ mượn</a>
                </li>
                <li class="focus">
                    <a href="./docgia.php">Hội viên</a>
                </li>
                <li class="ad-li">
                    <a href="./tintuc.php">Tin tức</a>
                </li>
            </ul>
        </div>

        <div class="main">
        
        <?php if(isset($_POST['loc'])){
            $ten = $_POST['ten'];
            $khoa = $_POST['khoa'];
            $namsinh = $_POST['namsinh'];
            $province = $_POST['province'];
            $gioitinh = $_POST['gioitinh'];
            $trangthai = $_POST['trangthai'];

            if($province!=''){
            $sql_docgia = mysqli_query($connect, 
                "SELECT * FROM docgia
                where docgia_ten Like '%$ten%'
                and docgia_id like '%$khoa%'
                and docgia_id in (select docgia_id from diachi_docgia where province_id Like '%$province%')
                and docgia_gioitinh like '%$gioitinh%'
                and year(docgia_ngaysinh) like '%$namsinh%'
                and docgia_trangthai like '%$trangthai%' order by docgia_trangthai asc
                ");
            }else{
                $sql_docgia = mysqli_query($connect, 
                "SELECT * FROM docgia
                where docgia_ten Like '%$ten%'
                and docgia_id like '%$khoa%'
                and year(docgia_ngaysinh) like '%$namsinh%'
                and docgia_gioitinh like '%$gioitinh%'
                and docgia_trangthai like '%$trangthai%' order by docgia_trangthai asc
                ");
            }
                    // echo $ten;
                    // echo $khoa;
                    // echo $namsinh;
                    // echo $province;
                    // echo $gioitinh;
                    // echo $trangthai;
        }else{
            $sql_docgia = mysqli_query($connect, "SELECT * FROM docgia order by docgia_trangthai asc");

        };

        ?>
                

                <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $danhsach ?>" data-toggle="tab" id="danhsach" href="#menu1">Danh sách</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $them ?>" id="quanly" data-toggle="tab" href="#menu2">Thêm</a>
                    </li>
                </ul>
            

            <div class="tab-content">
                <div id="menu1" class="tab-pane <?php echo $ds ?>"><br>

                    <?php
                        $sql = "SELECT * FROM 1province ";
                        $result = mysqli_query($connect, $sql);
                    ?>

                     <!-- search -->
                    <!-- <form class="input-group mt-3 mb-3" method="POST" >
                        <select name="option" class="form-control" style="max-width: 100px !important;" id="">
                            <option value="0">Tên</option>
                            <option value="1">MSSV</option>
                            <option value="1">Tỉnh</option>
                        </select>
                        <input class="form-control mr-sm-2" name="keyword" autocomplete="off" id="keyword" type="text" placeholder="Search" aria-label="Search" style="width:500px !important;">
                        
                        <input type="submit"  name="search" value="Search" class="btn btn-outline-success my-2 my-sm-0 search-btn">
                    </form> -->

                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
                    <button style="font-size:18px" class=" btn btn-outline" data-toggle="modal" data-target="#myModal"><i class="fa fa-filter"></i>Lọc</button>

                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr >
                                    <th class="border border-dark">Họ Tên<br>MSSV</th>
                                    <th class="border border-dark">SĐT</th>
                                    <th class="border border-dark">Email</th>
                                    <th class="border border-dark">Ngày sinh</th>
                                    <th class="border border-dark">Địa chỉ</th>
                                    <th class="border border-dark">Quản lý</th>                                
                                </tr>
                            </thead>
                            <?php 
                                while($row_docgia = mysqli_fetch_array($sql_docgia)){
                                    $i = $row_docgia['docgia_id'];
                                    $trangthai = $row_docgia['docgia_trangthai'];
                            ?>
                            <tbody>
                                <tr class="<?php 
                                    switch($trangthai){
                                        case "0": 
                                            echo "";
                                            break;
                                        case "1": 
                                            echo "table-warning";
                                            break;
                                        case "2": 
                                            echo "table-danger";
                                            break;
                                    }
                                ?>">
                                    <td class="border border-dark"><?php echo $row_docgia['docgia_ten']; ?><br><?php echo $row_docgia['docgia_id']; ?></td>
                                    <td class="border border-dark"><?php echo $row_docgia['docgia_sdt']; ?></td>
                                    <td class="border border-dark"><?php echo $row_docgia['docgia_mail']; ?></td>
                                    <td class="border border-dark"><?php echo $row_docgia['docgia_ngaysinh']; ?></td>
                                    <?php 
                                    // $row_diachi = mysqli_query($connect,"SELECT * FROM diachi_docgia where docgia_id = '$i' ");
                                    $sql_diachi = mysqli_query($connect,"SELECT * FROM 1province,1district,1wards,diachi_docgia
                                                 where 1province.province_id = diachi_docgia.province_id
                                                 and 1district.district_id = diachi_docgia.district_id
                                                 and 1wards.wards_id = diachi_docgia.wards_id
                                                 and diachi_docgia.docgia_id = '$i' ");
                                    
                                     
                                    
                                    ?>
                                    <td class="border border-dark"><?php
                                    while($diachi = mysqli_fetch_array($sql_diachi)){
                                        echo $diachi['diachi'] .''. ', ' ;
                                        echo $diachi['wards_name'] .''. ', ';
                                        echo $diachi['district_name'] .''. ', ';
                                        echo $diachi['province_name'];
                                    }; ?>
                                    </td>
                                    <td class="border border-dark"><a href="" class="" id="sua">Mượn sách</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>            
                    
                </div>


                <!-- <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
                  </div> -->


                <div id="menu2" class="tab-pane <?php echo $th ?>"><br>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <p>MSSV*</p>
                                <input type="text" class="form-control" id="docgia_id" autocomplete="off" minlength="8" maxlength="8" required name="docgia_id">
                            </div>
                            <div class="col">
                                <p>Email*</p>
                                <input type="text" class="form-control" id="email" required autocomplete="off" name="email">
                            </div>
                            
                            <div class="col">
                                <p>Tỉnh/Thành phố*</p>
                                <select name="province " class="form-control diachi "  required id="province" style="width: 100% !important;">
                                    <option value="">Chọn một tỉnh</option>
                                    <?php 
                                    
                                    while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>

                                    <?php } ?>
                               </select>
                            </div>
                        </div> <br>
                        
                        <div class="row">
                            <div class="col">
                                <p>Họ tên*</p>
                                <input type="text" class="form-control" id="hoten" required autocomplete="off" name="hoten">
                            </div>

                            
                            <div class="col">
                                <p>Mật khẩu*</p>
                                <input type="text" class="form-control" id="matkhau" required name="matkhau">
                            </div>

                            <div class="col">
                                <p>Quận/ Huyện*</p>
                                <select id="district" name="district"  required class="form-control">
                                    <option value="">Chọn một Quận/huyện</option>
                                </select>
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <p>SĐT*</p>
                                <input type="text" class="form-control" id="sdt" required name="sdt">
                            </div>
                            <div class="col">
                                <p>Chọn ảnh</p>
                                <input type="file" id="anh" class="form-control-file border" name="anh" accept="image/png, image/gif, image/jpeg">
                            </div>
                            
                            <div class="col">
                                <p>Xã/Phường*</p>

                                <select class="form-control" id="wards"  name="wards" required style="width: 100% !important;">
                                    <option value="">Chọn một xã/phường</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row">
                        <div class="col">
                                <p>Ngày sinh</p>
                                <input type="date" class="form-control" id="ngaysinh" autocomplete="off" name="ngaysinh">
                            </div>
                            
                            <div class="col">
                                <p>Giới tính</p>

                                <select class="form-control" id="gioitinh" name="gioitinh"  style="width: 100% !important;">
                                    <option value="Khác">giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <!-- <option value="Khác">Khác</option> -->
                                </select>
                            </div>
                            
                            <div class="col">
                                <p>Địa chỉ</p>
                                <input type="text" class="form-control " id="diachi"  autocomplete="off"  name="diachi">
                            </div>
                        </div><br>
                        

                        <input type="submit"  name="them" value="Thêm" class="btn btn-success">
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                   
                </div>
              </div>
            
        </div>
    </div>


<!-- lọc -->
    <div class="modal" id="myModal"><br><br><br>
        <div class="modal-dialog modal-lg">
            <form class="input-group mt-3 mb-3" method="POST" >
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div><br>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Tên</p>
                                <input type="text" class="form-control" id="ten" autocomplete="off" name="ten">
                            </div>
                            <div class="col">
                                <p>Khóa</p>
                                <select id="khoa" name="khoa" class="form-control">
                                    <option value="">Tất cả</option>
                                    <?php for($k=60;$k<70;$k++){ 
                                    ?>
                                    <option value="<?php echo $k+1955 ?>">K<?php echo $k ?></option>
                                    <?php } ?>
                                </select> 
                            </div>

                            <div class="col">
                                <p>Năm sinh</p>
                                <input type="number" name="namsinh"  class="form-control" min="1900" max="2023" step="1" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Tỉnh</p>
                                <select name="province" class="form-control"  style="width: 100% !important;">
                                    <option value="">Chọn một tỉnh</option>
                                    <?php 
                                    $sql = "SELECT * FROM 1province ";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_array($result)) { ?>

                                    <option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <p>Giới tính</p>
                                <select  name="gioitinh" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>                                            
                            </div>

                            <div class="col">
                                <p>Trạng thái</p>
                                <select name="trangthai" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="0">Tài khoản bình thường</option>
                                    <option value="1">Tài khoản bị cấm mượn</option>
                                    <option value="2">Tài khoản bị khóa</option>
                                </select> 
                            </div>
                        </div>
                    </div><br><br>

                    <div class="modal-footer">
                        <!-- <input type="submit"  name="loc" value="Thêm" class="btn btn-success"> -->

                        <input type="submit" class="btn btn-success" name="loc"  value="Lọc">
                    </div>

                </div>
            </form>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function(){
        $(".mul-select").select2({
                // placeholder: "Chọn sách", //placeholder
                tags: true,
                tokenSeparators: ['/',',',','," "]
            });
       
            $(".single-select").select2({
                maximumSelectionLength: 1
            });
        })
        $(".diachi").select2({
            tags: true;
        });


    </script>




</body>
</html>
