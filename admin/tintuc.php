<?php
    include('./header.php');

    // thêm 
    if(isset($_POST['dang'])){
        $title=$_POST['title'];
        $time=date('Y-m-d');
        $noidung=$_POST['noidung'];
        $anh=$_FILES['anh']['name'];
        $path='../upload/tintuc/';
        $anh_tmp=$_FILES['anh']['tmp_name'];
        
        mysqli_query($connect,
            "INSERT INTO tintuc(title,time,noidung,img)
            value ('$title','$time','$noidung','$anh')");
        move_uploaded_file($anh_tmp,$path.$anh);
        header('Location: tintuc.php');

    }
    // cập nhật
    elseif(isset($_POST['capnhat'])){
        $tintuc_id = $_POST['tintuc_id'];
        $title=$_POST['title'];
        $time=date('Y-m-d');
        $noidung=$_POST['noidung'];
        $anh=$_FILES['anh']['name'];
        $path='../upload/tintuc/';
        $anh_tmp=$_FILES['anh']['tmp_name'];
        if($anh==''){
            $sql_update_img = "UPDATE tintuc SET title='$title',noidung='$noidung' WHERE tintuc_id='$tintuc_id'";
        }else{
            move_uploaded_file($anh_tmp,$path.$anh);
            $sql_update_img = "UPDATE tintuc SET title='$title',noidung='$noidung',img='$anh' WHERE tintuc_id='$tintuc_id'";
        }
        
        mysqli_query($connect,$sql_update_img);

        header('Location: tintuc.php');
    }
    elseif(isset($_POST['quaylai'])){
        header('Location: tintuc.php');
    }

    if(isset($_GET['xoa'])){
        $id= $_GET['xoa'];
        $sql_xoa = mysqli_query($connect,"DELETE FROM tintuc Where tintuc_id='$id'");
        header('Location: tintuc.php');
    }

?>


<div class="ad-container">
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
                <li class="ad-li">
                    <a href="./docgia.php">Hội viên</a>
                </li>
                <li class="ad-li focus">
                    <a href="./tintuc.php">Tin tức</a>
                </li>
            </ul>
        </div>

        <div class="main">

        

        <?php
        // check cập nhật
        if(isset($_GET['quanly'])=='capnhat'){
            $id_capnhat = $_GET['id'];
            $sql_tintuc = mysqli_query($connect, "SELECT * FROM tintuc where tintuc_id='$id_capnhat' ");
            $row_tintuc = mysqli_fetch_array($sql_tintuc);
            
            

        ?>
        <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#menu1">Danh sách</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#menu2">Cập nhật</a>
            </li>
        </ul><br>

        

        <div class="tab-content">
            <div id="menu2" class="tab-pane active">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                    <input type="hidden" autocomplete="off" value="<?php echo $row_tintuc['tintuc_id'];?>" name="tintuc_id" class="form-control">

                    <div class="col">
                            <p>Title</p>
                            <input value="<?php echo $row_tintuc['title'];?>" type="text" class="form-control border"  name="title">
                        </div>
                        <div class="col">
                            <p>Ảnh</p>
                            <input type="file" name="img" src="">
                        </div>
                        
                    </div> <br>
                        <div>
                            <p>Tóm tắt</p>
                            <textarea name="noidung" id="noidung" cols="100"><?php echo $row_tintuc['noidung'];?></textarea><br><br>
                            <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
                        </div>
                    <input type="submit"  name="capnhat" value="Cập nhật" class="btn btn-success">
                    <button class="btn btn-success"><a href="?quaylai" style="text-decoration:none; color:white;">Quay lại</a></button>
                </form>     
            </div>

            
            <div id="menu1" class="tab-pane fade">

            <?php 
                }else{
            ?>
            <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#menu1">Danh sách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Thêm</a>
                </li>
            </ul><br>

        <div class="tab-content">
        <div id="menu2" class="tab-pane fade">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                    <input type="hidden" autocomplete="off" value="<?php echo $row_tintuc['tintuc_id'];?>" name="id_update" class="form-control">

                    <div class="col">
                            <p>Title</p>
                            <input value="" required type="text" class="form-control border"  name="title">
                        </div>
                        <div class="col">
                            <p>Ảnh</p>
                            <input type="file" class="" placeholder="Địa chỉ" name="anh">
                        </div>
                        
                    </div> <br>
                        <div>
                            <p>Nội dung</p>
                            <textarea name="noidung" required id="noidung"></textarea><br><br>
                        </div>
                    <input type="submit"  name="dang" value="Đăng" class="btn btn-success">
                </form>     
            </div>

        
            <div id="menu1" class="tab-pane active">
            <?php } ?>
            
            <!-- search -->
            <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>


                <table class="table table-bordered table-striped">
                    <thead>
                        <tr >
                        <th class="border border-dark">STT</th>
                        <th class="border border-dark">Title</th>
                        <th class="border border-dark">Ngày đăng</th>
                        <th class="border border-dark">Quản lý</th>
                        
                        </tr>
                    </thead>
                   
                    <tbody id="myTable">
                    <?php

                    $sqltintuc = mysqli_query($connect, "SELECT * FROM tintuc order by time desc");
                    $j=0;
                    while($tintuc=mysqli_fetch_array($sqltintuc)){
                        $i = $tintuc['tintuc_id'];
                        $j=$j+1;
                    ?>
                    <tr  >
                        <td class="border border-dark"><?php echo $j; ?></td>
                        <td class="border border-dark"><?php echo $tintuc['title']; ?></td>
                        
                        <!-- <td class="border border-dark" style="width:20%;"> -->
                        <td class="border border-dark"><?php echo $tintuc['time']; ?></td>
                        <td class="border border-dark" style="width:100px !important;">
                            <a href="?quanly=capnhat&id=<?php echo $tintuc['tintuc_id'];?>">Sửa</a> |
                            <a href="?xoa=<?php echo $tintuc['tintuc_id'];?>"> Xóa</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    
                    </table>
            </div>

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
        CKEDITOR.replace('noidung');

        // search 
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        
    </script>

</body>
</html>
