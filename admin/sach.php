<?php include('./header.php'); ?>


<?php
    // thêm sách
        
        if(isset($_POST['themsach'])){
            $sachid=$_POST['sachid'];
            $tensach=$_POST['tensach'];
            $theloai=$_POST['theloai'];
            $linktai=$_POST['linktai'];
            $nxb=$_POST['nxb'];
            $soluong=$_POST['soluong'];
            // $phong=$_POST['phong'];
            $giamuon=$_POST['giamuon'];
            $vitri=$_POST['vitri'];
            $tacgia=$_POST['tacgia'];
            $tomtat=$_POST['tomtat'];
            $anh=$_FILES['anh']['name'];
            $path='../upload/sach/';
            $anh_tmp=$_FILES['anh']['tmp_name'];

            // Chạy vòng lặp để thêm nhiều thể loại, tác giả một lúc
            foreach($theloai as $i){
                $tl_sach=mysqli_query($connect,"INSERT INTO tl_sach(sach_id,theloai_id) value ('$sachid','$i') ");
            }
            foreach($tacgia as $j){
                $tg_sach=mysqli_query($connect,"INSERT INTO tg_sach(sach_id,tacgia_id) value ('$sachid','$j') ");
                // echo "<script type='text/javascript'>alert('Thành công');</script>";
            }

            // 
            $sql_themsach= mysqli_query($connect,
                "INSERT INTO sach(sach_id,sach_ten,sach_link,nxb_id,sach_img,sach_soluong,sach_tomtat,giamuon)
                value ('$sachid','$tensach','$linktai','$nxb','$anh','$soluong','$tomtat','$giamuon')");

            mysqli_query($connect, "UPDATE vitri_sach SET sach_id = '$sachid' where id = '$vitri' ");
            // mysqli_query($connect, "UPDATE vitri_sach SET sach_id = '$sachid' where vitri_id = '$vitri' ");
            // Di chuyển ảnh vào folder tài nguyên
            move_uploaded_file($anh_tmp,$path.$anh);
        }

        // cập nhật
        elseif(isset($_POST['capnhat'])){
            $sachid=$_POST['sachid'];
            $tensach=$_POST['tensach'];
            $theloai=$_POST['theloai'];
            $linktai=$_POST['linktai'];
            $nxb=$_POST['nxb'];
            $soluong=$_POST['soluong'];
            $vitri=$_POST['vitri'];
            $giamuon=$_POST['giamuon'];
            $tacgia=$_POST['tacgia'];
            $tomtat=$_POST['tomtat'];
            $anh=$_FILES['anh']['name'];
            $path='../upload/sach/';
            $anh_tmp=$_FILES['anh']['tmp_name'];

            $sql_check_tl = mysqli_query($connect, "SELECT theloai_id FROM tl_sach where sach_id='$sachid'");

            if($vitri!='-1'){
                mysqli_query($connect, "UPDATE vitri_sach SET sach_id = NULL where sach_id = '$sachid' ");
                mysqli_query($connect, "UPDATE vitri_sach SET sach_id = '$sachid' where id = '$vitri' ");
            }
            

            // Check xem giá trị ô thể loại thay đổi không
            while($row_check_tl = mysqli_fetch_array($sql_check_tl)){
                if($theloai!==$row_check_tl){
                    $sql_delete_tl = mysqli_query($connect, "DELETE FROM tl_sach where sach_id='$sachid'");
                    foreach($theloai as $i){
                        mysqli_query($connect,"INSERT INTO tl_sach(sach_id,theloai_id) value ('$sachid','$i') ");
                    }
                }
            }
            // Check xem giá trị ô tác giả thay đổi không
            $sql_check_tg = mysqli_query($connect, "SELECT tacgia_id FROM tg_sach where sach_id='$sachid'");
            while($row_check_tg = mysqli_fetch_array($sql_check_tg)){
                
                if($tacgia!==$row_check_tg){
                    $sql_delete_tg = mysqli_query($connect, "DELETE FROM tg_sach where sach_id='$sachid'");
                    foreach($tacgia as $i){
                        mysqli_query($connect,"INSERT INTO tg_sach(sach_id,tacgia_id) value ('$sachid','$i') ");
                    }
                }
            }

            // check giá trị ô ảnh
            if($anh==''){
                $sql_update_img = "UPDATE sach SET sach_ten='$tensach',sach_link='$linktai',nxb_id='$nxb',sach_soluong='$soluong',sach_tomtat='$tomtat',giamuon='$giamuon' WHERE sach_id='$sachid'";
            }else{
                move_uploaded_file($anh_tmp,$path.$anh);
                $sql_update_img = "UPDATE sach SET sach_ten='$tensach',sach_link='$linktai',nxb_id='$nxb',sach_soluong='$soluong',sach_tomtat='$tomtat',giamuon='$giamuon',sach_img='$anh' WHERE sach_id='$sachid'";
            }
            mysqli_query($connect,$sql_update_img);
            move_uploaded_file($anh_tmp,$path.$anh);
            header('Location: sach.php');
        }
        // quay lại
        if(isset($_GET['quaylai'])){
            header('Location: sach.php');
        }
        // xóa
        if(isset($_GET['xoa'])){
            $id= $_GET['xoa'];
            mysqli_query($connect,"DELETE FROM sach Where sach_id='$id'");
            mysqli_query($connect,"DELETE FROM tl_sach Where sach_id='$id'");
            mysqli_query($connect,"DELETE FROM tg_sach Where sach_id='$id'");
            mysqli_query($connect, "UPDATE vitri_sach SET sach_id = NULL where sach_id = '$id' ");
            header('Location: sach.php');
        }
    ?>



<div class="ad-container">
<script src="../js/chonvitri.js"></script>

        <div class="ad-nav">
            <h2>Quản lý</h2>

            <ul>
                <li class="focus">
                    <a href="./sach.php" >Sách</a>
                </li>
                <li class="ad-li">
                    <a href="./theloai.php">Thể loại</a>
                </li>
                <li class="ad-li">
                    <a href="./tacgia.php">Tác giả</a>
                </li>
                <li class="ad-li">
                    <a href="./nxb.php">NXB</a>
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
                $sql_capnhat_sach = mysqli_query($connect, "SELECT * FROM sach where sach_id='$id_capnhat' ");
                $sql_capnhat_theloai = mysqli_query($connect, "SELECT * FROM sach,theloai,tl_sach WHERE sach.sach_id = tl_sach.sach_id and tl_sach.theloai_id = theloai.theloai_id and sach.sach_id='$id_capnhat' ");
                $sql_capnhat_tacgia = mysqli_query($connect, "SELECT * FROM sach,tacgia,tg_sach WHERE sach.sach_id = tg_sach.sach_id and tg_sach.tacgia_id = tacgia.tacgia_id and sach.sach_id='$id_capnhat' ");
                $sql_capnhat_nxb = mysqli_query($connect, "SELECT * FROM nxb,sach where sach.nxb_id = nxb.nxb_id and sach.sach_id='$id_capnhat'");
                
                $row_capnhat_nxb = mysqli_fetch_array($sql_capnhat_nxb);
                $row_capnhat_sach = mysqli_fetch_array($sql_capnhat_sach);
                $row_capnhat_theloai = mysqli_fetch_array($sql_capnhat_theloai);
                $row_capnhat_tacgia = mysqli_fetch_array($sql_capnhat_tacgia);
                $idtacgia = $row_capnhat_tacgia['tacgia_id'];
                $idtheloai = $row_capnhat_theloai['theloai_id'];

            ?>

            <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
                <li class="nav-item">
                    <a class="nav-link " id="danhsach" data-toggle="tab" href="#menu1">Danh sách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="quanly" data-toggle="tab" href="#menu2">Cập nhật</a>
                </li>                                
            </ul>

          
            
            <div class="tab-content">

            

                <div id="menu2" class="tab-pane active"><br>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            
                            <div class="col">
                                <p>tên sách*</p>
                                <input type="text" class="form-control" value="<?php echo $row_capnhat_sach['sach_ten']; ?>" required autocomplete="off" name="tensach">
                            </div>
                            
                            <div class="col">
                                <!-- tác giả -->
                                <p>Tác giả*</p>
                                <select class="mul-select form-control"  required multiple name="tacgia[]" style="width:100% !important;">
                                <?php
                                    $sql_capnhat = mysqli_query($connect, "SELECT * FROM sach,tacgia,tg_sach WHERE sach.sach_id = tg_sach.sach_id and tg_sach.tacgia_id = tacgia.tacgia_id and tg_sach.sach_id='$id_capnhat' ");
                                    while($row_capnhat_tacgia = mysqli_fetch_array($sql_capnhat)){

                                ?>
                                    <option selected value="<?php echo $row_capnhat_tacgia['tacgia_id']; ?>"><?php echo $row_capnhat_tacgia['tacgia_ten']; ?></option>
                                <?php 
                                    }
                                $sql_tacgia = mysqli_query($connect, "SELECT * FROM tacgia where not tacgia_id = '$idtacgia' ");
                                while($row_tacgia = mysqli_fetch_array($sql_tacgia)){
                                ?>    
                                    <option value="<?php echo $row_tacgia['tacgia_id'] ?>"><?php echo $row_tacgia['tacgia_ten'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col">
                                <p>Chọn ảnh</p>
                                <input type="file" id="anh" accept="image/*" class="form-control-file border" name="anh">
                            </div>
                        </div> <br>
                        
                        <div class="row">
                            <div class="col">
                                <p>Giá mượn</p>
                                <input type="hidden" value="<?php echo $id_capnhat ?>"  class="form-control" name="sachid">
                                <input type="number" value="<?php echo $row_capnhat_sach['giamuon'] ?>"  class="form-control" name="giamuon">
                            </div>
                            
                            <div class="col">
                                <p>NXB*</p>
                                <select class="single-select form-control" id="nxb" style="width:100% !important;" required multiple name="nxb" >
                                    <option selected value="<?php echo $row_capnhat_nxb['nxb_id']; ?>"><?php echo $row_capnhat_nxb['nxb_ten']; ?></option>
                                <?php 
                                $sql_nxb = mysqli_query($connect, "SELECT * FROM nxb  ");
                                while($row_nxb = mysqli_fetch_array($sql_nxb)){

                                ?>    
                                    <option value="<?php echo $row_nxb['nxb_id'] ?>"><?php echo $row_nxb['nxb_ten'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <p>Số lượng*</p>
                                <input type="number" value="<?php echo $row_capnhat_sach['sach_soluong']; ?>" class="form-control" id="soluong" required autocomplete="off" name="soluong">
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <p>Link tải</p>
                                <input type="text" class="form-control" value="<?php echo $row_capnhat_sach['sach_link']; ?>"  autocomplete="off" name="linktai">
                            </div>
                            <div class="col">
                                <p>Thể loại*</p>

                                    <select class="mul-select form-control" id="theloai" required name="theloai[]" multiple="true" style="width:100% !important;">
                                    <?php
                                    $sql_capnhat_tl = mysqli_query($connect, "SELECT * FROM sach,theloai,tl_sach WHERE sach.sach_id = tl_sach.sach_id and tl_sach.theloai_id = theloai.theloai_id and sach.sach_id='$id_capnhat' ");
                                    while($row_capnhat_tl = mysqli_fetch_array($sql_capnhat_tl)){

                                ?>
                                    <option selected value="<?php echo $row_capnhat_tl['theloai_id']; ?>"><?php echo $row_capnhat_tl['theloai_ten']; ?></option>
                                <?php 
                                    }
                                $sql_theloai = mysqli_query($connect, "SELECT * FROM theloai where not theloai_id = '$idtheloai' ");
                                while($row_theloai = mysqli_fetch_array($sql_theloai)){

                                ?>    
                                    <option value="<?php echo $row_theloai['theloai_id'] ?>"><?php echo $row_theloai['theloai_ten'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                               
                                <!-- <input type="text" class="form-control" id="email" autocomplete="off" name="email"> -->
                            </div>
                            <div class="col">
                            <div class="row">
                                    <div class="col-sm-4">
                                        <p>Phòng*</p>
                                        <select class="form-control" id="phong" required name="phong_id"  style="width: 100%;">
                                        <!-- <option value=""></option> -->
                                        <?php
                                            $sql_capnhat_phong = mysqli_query($connect, "SELECT DISTINCT phong FROM vitri_sach where sach_id = '$id_capnhat' ");
                                            $row_capnhat_phong = mysqli_fetch_array($sql_capnhat_phong)

                                        ?>
                                            <option value="-1"><?php echo $row_capnhat_phong['phong'] ?></option>

                                        <?php 
                                        $sql_phong = mysqli_query($connect, "SELECT DISTINCT phong FROM vitri_sach order by phong ASC");
                                        while($row_phong = mysqli_fetch_array($sql_phong)){

                                        ?>
                                            <option value="<?php echo $row_phong['phong'] ?>"><?php echo $row_phong['phong'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <p>Giá sách*</p>
                                        <select class="form-control" style="width: 100%;" id="giasach" required name="giasach">
                                            <!-- <option value=""></option> -->
                                            <?php
                                            $sql_capnhat_giasach = mysqli_query($connect, "SELECT * FROM vitri_sach,giasach where giasach.giasach_id = vitri_sach.giasach_id and sach_id = '$id_capnhat' ");
                                            $row_capnhat_giasach = mysqli_fetch_array($sql_capnhat_giasach)

                                        ?>
                                            <option value="-1"><?php echo $row_capnhat_giasach['giasach_ten'] ?></option>
                                        </select>

                                    </div>

                                    <div class="col-sm-4">
                                        <p>Vị trí*</p>
                                        <select class="form-control"  id="vitri" required name="vitri" style="width: 100% !important; ">
                                            <option value="-1"><?php echo $row_capnhat_giasach['vitri'] ?></option>

                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div> <br><br>

                        <div>
                            <p>Tóm tắt</p>
                            <textarea name="tomtat" id="tomtat"><?php echo $row_capnhat_sach['sach_tomtat']; ?></textarea><br><br>
                        </div>

                        <input type="submit"  name="capnhat" value="Cập nhật" class="btn btn-success">
                        <a href="?quaylai" class="btn btn-success">Quay lại</a><br><br><br>

                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
                <div id="menu1" class="tab-pane fade" ><br>


                <?php }else{ ?>

                <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
                    <li class="nav-item">
                        <a class="nav-link active" id="danhsach" data-toggle="tab" href="#menu1" onmouseover="mouseOver()" onmouseout="mouseOut()">Danh sách</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="quanly" data-toggle="tab" href="#menu2">Thêm sách</a>
                    </li>                                
                </ul>

          
            
            <div class="tab-content">
                    <div id="menu2" class="tab-pane fade"><br>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <?php
                                
                            ?>
                            <div class="col">
                                <p>tên sách*</p>
                                <input type="text" class="form-control" id="tensach" required autocomplete="off" name="tensach">
                            </div>
                            
                            
                            <div class="col" >
                                <p>Tác giả*</p>
                                <select  class="mul-select form-control"   required multiple name="tacgia[]" style="width: 100% !important;">
                                <?php 
                                
                                $sql_tacgia = mysqli_query($connect, "SELECT * FROM tacgia order by tacgia_id ASC");
                                while($row_tacgia = mysqli_fetch_array($sql_tacgia)){

                                ?>    
                                    <option value="<?php echo $row_tacgia['tacgia_id'] ?>"><?php echo $row_tacgia['tacgia_ten'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col">
                                <p>Chọn ảnh</p>
                                <input type="file" id="anh" accept="image/*" class="form-control-file border" name="anh">
                            </div>
                        </div> <br>
                        
                        <div class="row">
                        <div class="col">
                                
                                <p>Giá mượn*</p>
                                    <?php
                                        $sql_idsach = mysqli_query($connect, "SELECT sach_id FROM sach order by sach_id DESC limit 1 ");
                                        while($row_idsach = mysqli_fetch_array($sql_idsach)){;
                                            $sach_id = $row_idsach['sach_id'] +1;
                                    ?>
                                    <input type="number" required value="" name="giamuon" class="form-control">
                                    <input type="hidden" name="sachid" value="<?php echo $row_idsach['sach_id'] +1; ?>" class="form-control">
                                    
                                    <?php } ?>

                                    
                            </div>
                            <div class="col">
                                <p>NXB*</p>
                                <select class="single-select form-control" id="nxb" style="width:100% !important;" required multiple name="nxb" >
                                <?php 
                                
                                $sql_nxb = mysqli_query($connect, "SELECT * FROM nxb order by nxb_id ASC");
                                while($row_nxb = mysqli_fetch_array($sql_nxb)){

                                ?>    
                                    <option value="<?php echo $row_nxb['nxb_id'] ?>"><?php echo $row_nxb['nxb_ten'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <p>Số lượng*</p>
                                <input type="number" class="form-control" id="soluong" required autocomplete="off" name="soluong">
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <p>Link tải</p>
                                <input type="text" class="form-control" id="linktai"  autocomplete="off" name="linktai">
                            </div>
                            <div class="col">
                                <p>Thể loại*</p>

                                    <select class="mul-select form-control" id="theloai" required name="theloai[]" multiple="true" style="width: 100% !important;">

                                    <?php 
                                
                                $sql_theloai = mysqli_query($connect, "SELECT * FROM theloai order by theloai_id ASC");
                                while($row_theloai = mysqli_fetch_array($sql_theloai)){

                                ?>    
                                    <option value="<?php echo $row_theloai['theloai_id'] ?>"><?php echo $row_theloai['theloai_ten'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                               
                                <!-- <input type="text" class="form-control" id="email" autocomplete="off" name="email"> -->
                            </div>
                            <div class="col">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Phòng*</p>
                                        <select class="form-control" id="phong" required name="phong_id"  style="width: 100%;">
                                            <option value=""></option>
                                        <?php 
                                        $sql_phong = mysqli_query($connect, "SELECT DISTINCT phong FROM vitri_sach order by phong ASC");
                                        while($row_phong = mysqli_fetch_array($sql_phong)){
                                        ?>
                                            <option value="<?php echo $row_phong['phong'] ?>"><?php echo $row_phong['phong'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <p>Giá sách*</p>
                                        <select class="form-control" style="width: 100%;" id="giasach" required name="giasach">
                                            <!-- <option value=""></option> -->
                                            
                                        </select>

                                    </div>

                                    <div class="col-sm-4">
                                        <p>Vị trí*</p>
                                        <select class="form-control"  id="vitri" required name="vitri" style="width: 100% !important; ">

                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div> <br><br>

                        <div>
                            <p>Tóm tắt</p>
                            <textarea name="tomtat" id="tomtat"></textarea><br><br>
                        </div>

                        <input type="submit"  name="themsach" value="Thêm" class="btn btn-success">
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
                <div id="menu1" class="tab-pane active" >

                <?php }?>




                    
                    <!-- search --><br>
                        <!-- <form class="input-group mt-3 mb-3" method="POST" >
                            <select name="option" class="form-control" style="max-width: 100px !important;" id="">
                                <option value="0">Sách</option>
                                <option value="1">Tác giả</option>
                            </select>
                            <input class="form-control mr-sm-2" name="keyword" autocomplete="off" id="keyword" type="text" placeholder="Search" aria-label="Search" style="width:500px !important;">
                            
                            <input type="submit"  name="search" value="Search" class="btn btn-outline-success my-2 my-sm-0 search-btn">
                            
                        </form> -->
                        <!-- <input class="form-control mr-sm-2" name="keyword" autocomplete="off" id="keyword" type="text" placeholder="Search" aria-label="Search"><br> -->

                    <!-- search -->
                    <?php
                    // if(isset($_POST['search'])){
                    //     $keyword=$_POST['keyword'];
                    //     $option = $_POST['option'];
                    //     if($option == 0){
                    //         $sql_sach = mysqli_query($connect,
                    //         "SELECT * FROM sach where  sach_ten LIKE '%$keyword%' order by sach_id ASC ");
                    //     }elseif($option == 1){
                    //         $sql_sach = mysqli_query($connect,
                    //         "SELECT * FROM sach,tacgia,tg_sach 
                    //         where sach.sach_id=tg_sach.sach_id 
                    //         and tg_sach.tacgia_id=tacgia.tacgia_id 
                    //         and tacgia.tacgia_ten LIKE '%$keyword%' ");
                    //     }
                    // }else{
                        $sql_sach = mysqli_query($connect,"SELECT * FROM sach order by sach_id ASC ");
                    // }
                    ?>
                    <!-- seaarch -->


                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr >
                            <th class="border border-dark">Mã sách</th>
                            <th class="border border-dark">Tên sách <br> (số lượng)</th>
                            <th class="border border-dark">tác giả</th>
                            <th class="border border-dark">Vị trí</th>
                            <th class="border border-dark">Thể loại</th>
                            <th class="border border-dark">Ảnh</th>
                            <th class="border border-dark" style="min-width: 300px;">Tóm tắt</th>
                            <th class="border border-dark" style="min-width: 80px;">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody id="hi">

                            <?php 
                            // $sql_sach = mysqli_query($connect,"SELECT * FROM sach order by sach_id ASC");
                            while($row_sach = mysqli_fetch_array($sql_sach)){
                                $i = $row_sach['sach_id'];
                                $j = 0;
                               
                            ?> 
                            <tr>
                                <td  class="border border-dark"><?php echo $row_sach['sach_id'] ?></td>
                                <td class="border border-dark"><?php echo $row_sach['sach_ten']?><br><br>(<?php echo $row_sach['sach_soluong']?>)</td>
                                <?php  ?>
                                <td class="border border-dark">
                                    <?php
                                    $sql_tacgia = mysqli_query($connect,"SELECT * FROM sach,tg_sach,tacgia where sach.sach_id = tg_sach.sach_id and tg_sach.tacgia_id = tacgia.tacgia_id and sach.sach_id = $i order by tacgia.tacgia_id ASC");
                                    while($row_tacgia = mysqli_fetch_array($sql_tacgia)){
                                        $j = $j+1;
                                        // echo $j ;
                                        echo"- ";
                                        echo $row_tacgia['tacgia_ten'];
                                        echo "<br><br>";
                                    }
                                    ?>
                                </td>
                                
                                <td class="border border-dark">
                                    <?php 
                                    $sql_vitri = mysqli_query($connect,"SELECT * FROM vitri_sach where sach_id = '$i' order by id ASC");
                                    // $phong = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM vitri_sach where sach_id = '$i' order by id ASC"));
                                    
                                    $row_vitri=(mysqli_fetch_array($sql_vitri));
                                    
                                    // while($row_vitri=(mysqli_fetch_array($sql_vitri))){  
                                        $gs = $row_vitri['giasach_id'];
                                        $giasach = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM giasach where giasach_id = '$gs'"));

                                        echo 'Phòng '.$row_vitri['phong'].', ';
                                        echo 'giá '.$giasach['giasach_ten'].', vị trí ';                                     
                                        echo $row_vitri['vitri'].'<br>';

                                    // }
                                    
                                    
                                  

                                    ?>    
                                </td>
                                <td class="border border-dark">
                                    <?php 
                                    $sql_theloai = mysqli_query($connect,"SELECT * FROM sach,tl_sach,theloai where sach.sach_id = tl_sach.sach_id and tl_sach.theloai_id = theloai.theloai_id and sach.sach_id = $i order by theloai.theloai_id ASC");
                                    $j = 0;
                                    while($row_theloai = mysqli_fetch_array($sql_theloai)){
                                        $j = $j+1;
                                        echo $j ;
                                        echo". ";
                                        echo $row_theloai['theloai_ten'];
                                        echo "<br><br>";
                                    }
                                    ?>
                                </td>
                                <td class="border border-dark"><img src="../upload/sach/<?php echo $row_sach['sach_img'] ?>" class="anhsach" alt=""></td>
                                <td class="border border-dark">
                                    <textarea name="" id="" class="tomtat" cols="30" disabled rows="6"><?php echo $row_sach['sach_tomtat'] ?></textarea>
                                </td>
                                <td class="border border-dark ">
                                    <a href="?quanly=capnhat&id=<?php echo $row_sach['sach_id'];?>" id="sua" class="text-black ">Cập nhật</a> .
                                    <a href="?xoa=<?php echo $row_sach['sach_id'];?>" class="text-black d-flex justify-content-center"> Xóa</a> 
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                        </table>
                    
                </div>
              </div>
            
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        CKEDITOR.replace('tomtat');
        // new DataTable('#myTable');
        $(document).ready(function(){

            $('#myTable').DataTable({

                columnDefs: [{
                    "targets": [ 3 , 5 , 6 , 7 ],
                    "orderable": false,
                    "visible": true,
                    "searchable": false
                }]
            })
        });
        $(document).ready(function(){
            $(".mul-select").select2({
                tags: true,
                tokenSeparators: ['/',',',','," "],
                closeOnSelect: false
            });
        
            $(".single-select").select2({
                maximumSelectionLength: 1
            });
            $('.vitri').select2({

            });
            
            

        });
        
        var doiphong = document.getElementById('phong');
        var doigiasach = document.getElementById('giasach');

        doiphong.addEventListener('change', function() {
            $('#vitri').val(null).trigger('change');
        });
        doigiasach.addEventListener('change', function() {
            $('#vitri').val(null).trigger('change');
        });
        
    </script>
    <style>
    .tomtat{
        background-color: rgba(0,0,0,0);
        border: none;
        width: 100%;
    }
    .vitri{
        width: 100% !important;
    }
    </style>


</body>
</html>
