<?php
    include('./header.php');

    // thêm 
    if(isset($_POST['themtacgia'])){
        $tentacgia=$_POST['tentacgia'];
        $thongtin=$_POST['thongtin'];
        
        $hinhanh=$_FILES['hinhanh']['name'];
        
        $path='../upload/tacgia/';
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        if($hinhanh==''){
            $hinhanh='businessman.png';
        }
        $sql_insert_tacgia= mysqli_query($connect,
            "INSERT INTO tacgia(tacgia_ten,tacgia_thongtin,tacgia_anh)
            value ('$tentacgia','$thongtin','$hinhanh')");
        move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    }
    // cập nhật
    elseif(isset($_POST['capnhat'])){
        $id_update=$_POST['id_update'];
        $tentacgia=$_POST['tentacgia'];
        $thongtin=$_POST['thongtin'];
        $hinhanh=$_FILES['hinhanh']['name'];
        $path='../upload/tacgia/';
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        if($hinhanh==''){
            $sql_update_anh = "UPDATE tacgia SET tacgia_ten='$tentacgia',tacgia_thongtin='$thongtin' WHERE tacgia_id='$id_update'";
        }
        else{
            move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
            $sql_update_anh = "UPDATE tacgia SET tacgia_ten='$tentacgia',tacgia_anh='$hinhanh',tacgia_thongtin='$thongtin' WHERE tacgia_id='$id_update' ";
        }
        mysqli_query($connect,$sql_update_anh);
        move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
        header('Location: tacgia.php');
    }
    elseif(isset($_POST['quaylai'])){
        header('Location: tacgia.php');
    }

    if(isset($_GET['xoa'])){
        $id= $_GET['xoa'];
        $sql_xoa = mysqli_query($connect,"DELETE FROM tacgia Where tacgia_id='$id'");
         mysqli_query($connect,"DELETE FROM tg_sach Where tacgia_id='$id'");
        header('Location: tacgia.php');
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
                <li class="focus">
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
                <li class="ad-li">
                    <a href="./tintuc.php">Tin tức</a>
                </li>
            </ul>
        </div>

        <div class="main">

        

        <?php
        // check cập nhật
        if(isset($_GET['quanly'])=='capnhat'){
            $id_capnhat = $_GET['id'];
            $sql_tacgia = mysqli_query($connect, "SELECT * FROM tacgia where tacgia_id='$id_capnhat' ");
            $row_tacgia = mysqli_fetch_array($sql_tacgia);
            
            

        ?>
        <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#menu1">Danh sách</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#menu2">Cập nhật</a>
            </li>
        </ul>

        

        <div class="tab-content">
            <div id="menu2" class="tab-pane active">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <input type="hidden" autocomplete="off" value="<?php echo $row_tacgia['tacgia_id'];?>" name="id_update" class="form-control">
                        
                        <div class="col">
                            <p>Tên tác giả</p>
                            <input type="text" class="form-control border" value="<?php echo $row_tacgia['tacgia_ten']; ?>" autocomplete="off" placeholder="Tác giả" name="tentacgia">
                        </div>
                        <div class="col">
                            <p>Ảnh</p>
                            <input type="file" id="anh" value="../upload/tacgia/<?php echo $row_tacgia['tacgia_anh']; ?>" class="form-control-file border" name="hinhanh">
                        </div>
                        
                    </div> <br>
                    <div >     
                        <h4>Thông tin tác giả:</h4>                   
                        <textarea name="thongtin" id="tomtat"><?php echo $row_tacgia['tacgia_thongtin']; ?></textarea><br><br>
                    </div> <br>
                    <input type="submit"  name="capnhat" value="Cập nhật" class="btn btn-success">
                    <input type="submit"  name="quaylai" value="Quay lại" class="btn btn-success">
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
            </ul>

        <div class="tab-content"><br>
            <div id="menu2" class="tab-pane fade">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        
                        <div class="col">
                            <p>Tên tác giả *</p>
                            <input type="text" class="form-control border" required placeholder="Tác giả" name="tentacgia">
                        </div>
                        <div class="col">
                            <p>Ảnh</p>
                            <input type="file" id="anh" class="form-control-file border" name="hinhanh">
                        </div>
                        
                    </div> <br>
                    <div >     
                        <h4>Thông tin tác giả:</h4>                   
                        <textarea name="thongtin" id="tomtat"></textarea><br><br>
                    </div> <br>
                    <input type="submit"  name="themtacgia" value="Thêm" class="btn btn-success">
                </form>     
            </div>

        
            <div id="menu1" class="tab-pane active">
            <?php } ?>

                        <!-- <form class="input-group mt-3 mb-3" method="POST" >
                            <select name="option" class="form-control" style="max-width: 100px !important;" id="">
                                <option value="0">Tác giả</option>
                                <option value="1">Sách</option>
                            </select>
                            <input class="form-control mr-sm-2" name="keyword" autocomplete="off" id="keyword" type="text" placeholder="Search" aria-label="Search" style="width:500px !important;">
                            
                            <input type="submit"  name="search" value="Search" class="btn btn-outline-success my-2 my-sm-0 search-btn">
                            
                        </form> -->

                    <!-- search -->
                    <?php
                    // if(isset($_POST['search'])){
                    //     $keyword=$_POST['keyword'];
                    //     $option = $_POST['option'];
                    //     if($option == 0){
                    //         $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia where tacgia_ten LIKE '%$keyword%' order by tacgia_id ASC ");
                    //     }elseif($option == 1){
                    //         $sql_tacgia = mysqli_query($connect,"SELECT * FROM sach,tacgia,tg_sach where sach.sach_id=tg_sach.sach_id and tg_sach.tacgia_id=tacgia.tacgia_id and sach.sach_ten LIKE '%$keyword%' ");
                    //     }
                    // }else{
                        $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia order by tacgia_id ASC ");
                    // }
                    
                    ?>
                    <!-- seaarch -->

                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr >
                        <th class="border border-dark">STT</th>
                        <th class="border border-dark">Tên tác giả</th>
                        <th class="border border-dark">Đầu sách</th>
                        <th class="border border-dark">Ảnh</th>
                        <th class="border border-dark">Giới thiệu</th>
                        <th class="border border-dark">Quản lý</th>
                        
                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php

                    // $sql_tacgia = mysqli_query($connect, "SELECT * FROM tacgia");
                    $j=0;
                    while($row_tacgia=mysqli_fetch_array($sql_tacgia)){
                        $i = $row_tacgia['tacgia_id'];
                        $j=$j+1;
                    ?>
                    <tr>
                        <td class="border border-dark"><?php echo $j; ?></td>
                        <td class="border border-dark"><?php echo $row_tacgia['tacgia_ten']; ?></td>
                        <td class="border border-dark">
                        <?php

                            $sql_dausach = mysqli_query($connect,"SELECT * FROM sach,tg_sach,tacgia where sach.sach_id = tg_sach.sach_id and tg_sach.tacgia_id = tacgia.tacgia_id and tacgia.tacgia_id = $i order by sach.sach_id ASC");
                            while($row_dausach=mysqli_fetch_array($sql_dausach)){
                                echo "-";
                                echo $row_dausach['sach_ten'];
                                echo ".<br>";
                            }?>
                        </td>
                        <td class="border border-dark"><img src="../upload/tacgia/<?php echo $row_tacgia['tacgia_anh']; ?>" class="mx-auto d-block" style="width:100px;"></td>
                        <td class="border border-dark"><textarea class="tomtat" cols="50" rows="6"><?php echo $row_tacgia['tacgia_thongtin']; ?></textarea></td>
                        <td class="border border-dark">
                            <a href="?quanly=capnhat&id=<?php echo $row_tacgia['tacgia_id'];?>">Sửa</a> |
                            <a href="?xoa=<?php echo $row_tacgia['tacgia_id'];?>"> Xóa</a>
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

        $('#myTable').DataTable({

            columnDefs: [{
                "targets": [ 2 , 3 , 4,  5 ],
                "orderable": false,
                "visible": true,
                "searchable": false
            }]
        })
    });
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
        
   
        CKEDITOR.replace('tomtat')

    </script>



</body>
</html>
