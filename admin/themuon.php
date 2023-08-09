<?php include('./header.php'); ?>

<?php 
if(isset($_POST['them'])){
    $themuon=$_POST['themuon_id'];
    $docgia_id = $_POST['docgia_id'];
    $ngaymuon = date('Y-m-d');
    $nm =  new DateTime($ngaymuon);
    $ngayhen = $_POST['ngayhen'];
    $nh = new DateTime($ngayhen);
    $songaymuon = $nm->diff($nh);
    $snm = $songaymuon->days;
    if($snm <1){
        $snm =1;
    }
    $tong = 0;
    $sach_id = $_POST['sach_id'];
    $dongia = $_POST['dongia'];
    $soluong= $_POST['soluong'];
    foreach ($dongia as $i) {
        $tong += $i;
    }
    $thanhtien = $tong*$snm;

    foreach($sach_id as $k => $i){
        
        if (isset($soluong[$k])) {
            $j = $soluong[$k];
            $sql_sach = mysqli_query($connect, "INSERT INTO sach_the(themuon_id, sach_id, soluong) VALUES ('$themuon', '$i', '$j')");
            $row_sl = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sach where sach_id = '$i' "));
            $sl = $row_sl['sach_soluong']-$j;
            mysqli_query($connect,"UPDATE sach SET sach_soluong='$sl' where sach_id = '$i'");
        }
    }

    mysqli_query($connect, "INSERT INTO themuon(themuon_id, docgia_id, ngaymuon, ngayhen, giatien, trangthai) VALUES ('$themuon', '$docgia_id', '$ngaymuon', '$ngayhen', '$thanhtien','1')");
    
    
}
if(isset($_POST['tra'])){
    $themuon=$_POST['matm'];
    $ghichu = $_POST['ghichu'];
    $ngaytra = date('Y-m-d');
    $sql_sach = mysqli_query($connect,"SELECT * FROM sach_the where themuon_id = '$themuon' ");
    while($row_sach=mysqli_fetch_array($sql_sach)){
        $sach_id = $row_sach['sach_id'];
        $soluong = $row_sach['soluong'];
        $row_sl = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sach where sach_id = '$sach_id' "));
        $sl = $row_sl['sach_soluong']+$soluong;
        mysqli_query($connect,"UPDATE sach SET sach_soluong='$sl' where sach_id = '$sach_id'");

    }

    
    mysqli_query($connect,"UPDATE themuon SET ghichu = '$ghichu', ngaytra = '$ngaytra' where themuon_id = '$themuon'");
}
if(isset($_POST['capnhat'])){
    $themuon=$_POST['themuon_id'];
    $docgia_id = $_POST['docgia_id'];
    $ngaymuon = date('Y-m-d');
    $ngayhen = $_POST['ngayhen'];
    // $sachdat_id = $_POST['sachdat_id'];
    $soluong= $_POST['soluong'];
    $thanhtien = $_POST['tt'];
    
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



    $sach_id = $_POST['sach_id'];
    foreach($sach_id as $k => $i){
        if (isset($soluong[$k])) {
            $j = $soluong[$k];
            $row_sl = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sach where sach_id = '$i' "));
            $sql_sach = mysqli_query($connect, "INSERT INTO sach_the(themuon_id, sach_id, soluong) VALUES ('$themuon', '$i', '$j')");
            $sl = $row_sl['sach_soluong']-$j;
            mysqli_query($connect,"UPDATE sach SET sach_soluong='$sl' where sach_id = '$i'");
        }
    }

    mysqli_query($connect, "INSERT INTO themuon(themuon_id, docgia_id, ngaymuon, ngayhen, giatien, trangthai) VALUES ('$themuon', '$docgia_id', '$ngaymuon', '$ngayhen', '$thanhtien','1')");
    header('Location: themuon.php');

}




$sql_sach = mysqli_query($connect, "SELECT * FROM sach ORDER BY CASE WHEN sach_soluong > 1 THEN 0 WHEN sach_soluong = 0 THEN 2 ELSE 1 END");
$sql_mathe = mysqli_query($connect, "SELECT * FROM themuon order by themuon_id DESC limit 1");
$mathe = mysqli_fetch_array($sql_mathe);
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
                <li class="focus">
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
            
            <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
                <li class="nav-item">
                    <a class="nav-link active" id="quanly" data-toggle="tab" href="#menu1">Thêm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" id="danhsach" href="#menu21">Danh sách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" id="danhsach" href="#menu20">Đặt trước</a>
                </li>
                
                
            </ul>

            <div class="tab-content">

                <div id="menu1" class="tab-pane active"><br>
                <?php
                    if(isset($_GET['quanly'])=='capnhat'){
                        $id_capnhat = $_GET['id'];
                        $sql_laysach = mysqli_query($connect, "SELECT * FROM sach,sach_the where sach.sach_id = sach_the.sach_id and  sach_the.themuon_id='$id_capnhat' ");
                        // $laysach = mysqli_fetch_array($sql_laysach);
                        $dg = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM themuon,docgia where themuon.docgia_id = docgia.docgia_id and  themuon.themuon_id='$id_capnhat' "));

                ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <?php
                                    
                                    ?>
                                    <input type="hidden" name="themuon_id" class="form-check-input" value="<?php echo $id_capnhat ?>" >
                                    <div class="col">
                                        <p>Người mượn</p>
                                        <input type="text" class="form-control" autocomplete="off" disabled value="<?php echo $dg['docgia_ten']; ?>">
                                        <input type="hidden" class="form-control" autocomplete="off" name="docgia_id" value="<?php echo $dg['docgia_id']; ?>">
                                    </div>
                                    <div class="col">
                                        <p>Ngày hẹn trả</p>
                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="datetime" required autocomplete="off" name="ngayhen">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p></p><br>
                                <button type="button" value="Thêm" class="btn btn-success" data-toggle="modal" data-target="#myModal">Chọn sách</button>
                                
                            </div>
                            
                            
                        </div><br><br>


                        <?php 
                            $k = 0;
                            while($laysach = mysqli_fetch_array($sql_laysach)){
                                $sach_id = $laysach['sach_id'];
                                $k =$k +1;
                            

           
                        ?>
                        
                        <div class="row border p-3" id="<?php echo $sach_id ?>" style="margin-bottom: 24px;">
                            <div class="col-sm-1 d-flex flex-column justify-content-center">
                            <?php echo $k ?>
                            </div>
                            
                            <div class="col-sm-1 d-flex flex-column justify-content-center">
                                <img src="../upload/sach/<?php echo $laysach['sach_img'] ?>" style="width: 70px;" alt="">
                            </div>
                            <div class="col-sm-4 ">
                                <h4 class=""><?php echo $laysach['sach_ten']; ?></h4>
                                
                                    <div class="text-secondary">Tác giả:
                                    <?php 
                                        $row_tacgia = mysqli_query($connect, "SELECT * FROM tg_sach,tacgia where tg_sach.tacgia_id = tacgia.tacgia_id and tg_sach.sach_id = '$sach_id' "); 
                                            while($tacgia=mysqli_fetch_array($row_tacgia)){
                                            echo $tacgia['tacgia_ten'];
                                            echo ', ';
                                        } 
                                    ?>
                                </div>
                                <div class="text-secondary d-flex">Còn lại: <p id="<?php echo $k ?>"><?php echo $laysach['sach_soluong'] ?></p></div>
                                <!-- <p id="max">15</p> -->
                                <input type="hidden" name="sach_id[]" class="form-check-input" value="<?php echo $laysach['sach_id'] ?>" >

                            </div>
                            <div class="col-sm-3">
                                <p> Giá:</p>
                                <input type="text" name="dongia[]" id="gia<?php echo $laysach['sach_id'] ?>" readonly class="gia"  value="<?php echo $laysach['giamuon'];?>" >
                                <br><br><br>
                            </div>
                            <div class="col-sm-2 d-flex flex-column justify-content-center">
                                <div class="wrapper border box">
                                    <span class="giam" >-</span>
                                    <input type="text" readonly name="soluong[]" value="<?php echo $laysach['soluong']; ?>"  class=" form-control" style="background-color: var(--mint-color) !important; text-align:center;">
                                    <span class="tang" >+</span>

                                    <input type="hidden" value="<?php echo $laysach['sach_soluong'] ?>">
                                    <input type="hidden" value="<?php echo $laysach['giamuon'];?>" >
                                    <input type="hidden" value="<?php echo $laysach['sach_id'];?>" >
                                </div>
                            </div>
                            
                                <!-- <input type="hidden" name="m" class="form-check-input" value="<?php echo $laysach['sach_id'] ?>" > -->
                            
                            <div class="col-sm-1 d-flex flex-column justify-content-center">
                                <input type="hidden" name="sach[]" class="form-check-input" value="<?php echo $laysach['sach_id'] ?>" >
                                
                                <span class="xoa" style="text-decoration: none; color: black; cursor: pointer;">Xóa</span>
                            </div>
                        </div>

                        

                        <?php
                               
                        } 
                        
                        ?>

                        <?php 
                            
                            
                            if(isset($_POST['chon'])){
                                
                                $sach_id = $_POST['book'];
                                // $m ='';
                                if(isset($_POST['xoa'])){
                                    $m = $_POST['m'];
                                }
                                if(count($sach_id)<2){
                                    echo ' chọn';
                                }else{
                                    // $k = 0;
    
                                    foreach($sach_id as $i){
                                        if ($i == 0) {
                                            continue;
                                        }
                                    $k=$k+1;
                                    $result = mysqli_query($connect, "SELECT * FROM sach where sach_id = '$i'");
                                    $row = mysqli_fetch_array($result);
               
                            ?>
                            
                            <div class="row border p-3" id="<?php echo $i ?>" style="margin-bottom: 24px;">
                                <div class="col-sm-1 d-flex flex-column justify-content-center">
                                <?php echo $k ?>
                                </div>
                                
                                <div class="col-sm-1 d-flex flex-column justify-content-center">
                                    <img src="../upload/sach/<?php echo $row['sach_img'] ?>" style="width: 70px;" alt="">
                                </div>
                                <div class="col-sm-4 ">
                                    <h4 class=""><?php echo $row['sach_ten']; ?></h4>
                                    
                                        <div class="text-secondary">Tác giả:
                                        <?php 
                                            $row_tacgia = mysqli_query($connect, "SELECT * FROM tg_sach,tacgia where tg_sach.tacgia_id = tacgia.tacgia_id and tg_sach.sach_id = '$i' "); 
                                                while($tacgia=mysqli_fetch_array($row_tacgia)){
                                                echo $tacgia['tacgia_ten'];
                                                echo ', ';
                                            } 
                                        ?>
                                    </div>
                                    <div class="text-secondary d-flex">Còn lại: <p id="<?php echo $k ?>"><?php echo $row['sach_soluong'] ?></p></div>
                                    <!-- <p id="max">15</p> -->
                                    <input type="hidden" name="sach_id[]" class="form-check-input" value="<?php echo $row['sach_id'] ?>" >
    
                                </div>
                                <div class="col-sm-3">
                                    <p> Giá:</p>
                                    <input type="text" name="dongia[]" id="gia<?php echo $row['sach_id'] ?>" readonly class="gia"  value="<?php echo $row['giamuon'];?>" >
                                    <br><br><br>
                                </div>
                                <div class="col-sm-2 d-flex flex-column justify-content-center">
                                    <div class="wrapper border box">
                                        <span class="giam" >-</span>
                                        <input type="text" readonly name="soluong[]" value="1"  class=" form-control" style="background-color: var(--mint-color) !important; text-align:center;">
                                        <span class="tang" >+</span>
    
                                        <input type="hidden" value="<?php echo $row['sach_soluong'] ?>">
                                        <input type="hidden" value="<?php echo $row['giamuon'];?>" >
                                        <input type="hidden" value="<?php echo $row['sach_id'];?>" >
                                    </div>
                                </div>
                                
                                    <!-- <input type="hidden" name="m" class="form-check-input" value="<?php echo $row['sach_id'] ?>" > -->
                                
                                <div class="col-sm-1 d-flex flex-column justify-content-center">
                                    <input type="hidden" name="sach[]" class="form-check-input" value="<?php echo $row['sach_id'] ?>" >
                                    
                                    <span class="xoa" style="text-decoration: none; color: black; cursor: pointer;">Xóa</span>
                                </div>
                            </div>
    
                            <?php
                                   }
                                }
                           
                            }
    
                            ?>

                        <div class="float-end mr-3 h4" id="thanhtien">Thành tiền: <p></p></div><br><br>
                        <input type="hidden"  name="tt" id="tt" value="" class="btn btn-success" >
                        <input type="submit"  name="capnhat" value="Đồng ý" class="btn btn-success" >
                        <?php
                        

                        ?>

                    </form>
                    <?php
                    }else{
                        ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <?php
                                    
                                    ?>
                                    <input type="hidden" name="themuon_id" class="form-check-input" value="<?php echo $mathe['themuon_id']+1; ?>" >
                                    <div class="col">
                                        <p>Người mượn</p>
                                        <select class=" form-control chon" style="width: 100% !important;"  required name="docgia_id" >
                                            <option value="" class="text-center text-muted" ></option>
                                            <?php
                                            $sql_docgia = mysqli_query($connect, "SELECT * FROM docgia ");
                                            while($docgia = mysqli_fetch_array($sql_docgia)){
                                            ?>
                                            <option value="<?php echo $docgia['docgia_id'] ?>"><?php echo $docgia['docgia_ten'] ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p>Ngày hẹn trả</p>
                                        <input type="date" class="form-control" value="" id="datetime" required autocomplete="off" name="ngayhen">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <p></p><br>
                                <button type="button" value="Thêm" class="btn btn-success" data-toggle="modal" data-target="#myModal">Chọn sách</button>
                                
                            </div>
                        </div><br><br>


                        <?php 
                            
                            
                        if(isset($_POST['chon'])){
                            
                            $sach_id = $_POST['book'];
                            // $m ='';
                            if(isset($_POST['xoa'])){
                                $m = $_POST['m'];
                            }
                            if(count($sach_id)<2){
                                echo ' chọn';
                            }else{
                                $k = 0;

                                foreach($sach_id as $i){
                                    if ($i == 0) {
                                        continue;
                                    }
                                $k=$k+1;
                                $result = mysqli_query($connect, "SELECT * FROM sach where sach_id = '$i'");
                                $row = mysqli_fetch_array($result);
           
                        ?>
                        
                        <div class="row border p-3" id="<?php echo $i ?>" style="margin-bottom: 24px;">
                            <div class="col-sm-1 d-flex flex-column justify-content-center">
                            <?php echo $k ?>
                            </div>
                            
                            <div class="col-sm-1 d-flex flex-column justify-content-center">
                                <img src="../upload/sach/<?php echo $row['sach_img'] ?>" style="width: 70px;" alt="">
                            </div>
                            <div class="col-sm-4 ">
                                <h4 class=""><?php echo $row['sach_ten']; ?></h4>
                                
                                    <div class="text-secondary">Tác giả:
                                    <?php 
                                        $row_tacgia = mysqli_query($connect, "SELECT * FROM tg_sach,tacgia where tg_sach.tacgia_id = tacgia.tacgia_id and tg_sach.sach_id = '$i' "); 
                                            while($tacgia=mysqli_fetch_array($row_tacgia)){
                                            echo $tacgia['tacgia_ten'];
                                            echo ', ';
                                        } 
                                    ?>
                                </div>
                                <div class="text-secondary d-flex">Còn lại: <p id="<?php echo $k ?>"><?php echo $row['sach_soluong'] ?></p></div>
                                <!-- <p id="max">15</p> -->
                                <input type="hidden" name="sach_id[]" class="form-check-input" value="<?php echo $row['sach_id'] ?>" >

                            </div>
                            <div class="col-sm-3">
                                <p> Giá:</p>
                                <input type="text" name="dongia[]" id="gia<?php echo $row['sach_id'] ?>" readonly class="gia"  value="<?php echo $row['giamuon'];?>" >
                                <br><br><br>
                            </div>
                            <div class="col-sm-2 d-flex flex-column justify-content-center">
                                <div class="wrapper border box">
                                    <span class="giam" >-</span>
                                    <input type="text" readonly name="soluong[]" value="1"  class=" form-control" style="background-color: var(--mint-color) !important; text-align:center;">
                                    <span class="tang" >+</span>

                                    <input type="hidden" value="<?php echo $row['sach_soluong'] ?>">
                                    <input type="hidden" value="<?php echo $row['giamuon'];?>" >
                                    <input type="hidden" value="<?php echo $row['sach_id'];?>" >
                                </div>
                            </div>
                            
                                <!-- <input type="hidden" name="m" class="form-check-input" value="<?php echo $row['sach_id'] ?>" > -->
                            
                            <div class="col-sm-1 d-flex flex-column justify-content-center">
                                <input type="hidden" name="sach[]" class="form-check-input" value="<?php echo $row['sach_id'] ?>" >
                                
                                <span class="xoa" style="text-decoration: none; color: black; cursor: pointer;">Xóa</span>
                            </div>
                        </div>

                        <?php
                               }
                            }
                            ?>
                        <div class="float-end mr-3 h4" id="thanhtien">Thành tiền:</div><br><br>
                        <input type="hidden"  name="tt" id="tt" value="" class="btn btn-success" >
                        <input type="submit"  name="them" value="Thêm" class="btn btn-success" >
                        <?php
                        }

                        ?>
                    </form>
                    <?php
                    }
                    ?>

                </div>


                <?php for($pg=1;$pg>=0;$pg--){  ?>
                <div id="menu2<?php echo $pg;  ?>" class="tab-pane fade"><br>
                    <table id="myTable" class="table table-bordered myTable">
                        <thead>
                            <tr >
                                <th class="border border-dark">Họ tên - MSSV</th>
                                <th class="border border-dark">Sách mượn</th>
                                <th class="border border-dark">Ngày mượn</th>
                                <th class="border border-dark">Ngày hẹn trả</th>
                                <th class="border border-dark">Ngày trả</th>
                                <th class="border border-dark">Thành tiền</th>
                                <th class="border border-dark">Ghi chú</th>
                                <th class="border border-dark">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql_themuon = mysqli_query($connect, "SELECT * FROM themuon where trangthai = '$pg'  order by ngaytra asc ,ngayhen asc  ");
                            while($themuon = mysqli_fetch_array($sql_themuon)){
                                $id = $themuon['docgia_id'];
                                $themuon_id = $themuon['themuon_id'];
                                $ngaytra = $themuon['ngaytra'];
                                $ngayhen = $themuon['ngayhen'];
                                $canhcao = $themuon['canhcao'];
                                // $trangthai = $themuon['trangthai'];
                                $j = date('Y-m-d');
                                $docgia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM docgia where docgia_id = '$id'"));
                                $sql_sachmuon=mysqli_query($connect, "SELECT * FROM sach,sach_the where sach.sach_id = sach_the.sach_id and sach_the.themuon_id='$themuon_id' ");
                                
                            ?>
                            <tr class="
                                <?php
                                
                                if($ngaytra){
                                    if($canhcao == 1){
                                        echo 'table-warning';
                                    }else{
                                        echo 'table-primary';

                                    }
                                }
                                elseif(!$ngaytra){
                                    if($canhcao == 1){
                                        echo 'table-danger';
                                    }
                                }
                                ?>
                            ">
                                <td class="border border-dark">
                                    <?php 
                                            echo $docgia['docgia_ten'] .' - '. $docgia['docgia_id']; 
                                    ?>
                                </td>
                                <td class="border border-dark" style="min-width: 12rem;"><?php 
                                    while($sachmuon = mysqli_fetch_array($sql_sachmuon)){
                                        echo '- '. $sachmuon['soluong'] .' '. $sachmuon['sach_ten'].'<br>';
                                    } ?></td>
                                <td class="border border-dark"><?php echo $themuon['ngaymuon']; ?></td>
                                <td class="border border-dark"><?php echo $themuon['ngayhen'];  ?></td>
                                <td class="border border-dark"><?php echo $themuon['ngaytra'];  ?></td>
                                <td class="border border-dark"><?php echo $themuon['giatien'];  ?></td>
                                <td class="border border-dark"><?php echo $themuon['ghichu'];  ?></td>

                                    <?php 
                                    if($pg==1){

                                    
                                        if(!$ngaytra){
                                        ?>
                                        <td class="border border-dark">
                                            <span data-toggle="modal" data-target="#ts" class="text-center text-black trasach" id="trasach" style="cursor:pointer;">Trả</span>
                                            <input type="hidden" id="tra<?php echo $themuon_id; ?>" value="<?php echo $themuon_id; ?>">
                                        </td>
                                        <?php }else{ 
                                            echo '<td class="border border-dark"></td>';
                                        }
                                    }elseif($pg == 0){
                                        ?>
                                        <td class="border border-dark">
                                            <a href="?quanly=capnhat&id=<?php echo $themuon['themuon_id'];?>" class="text-black ">Đồng ý</a>
                                        </td>

                                        <?php

                                    }
                                        
                                        ?>
                                
                                
                            </tr>
                            
                            <?php } ?>
                           
                        </tbody>
                    </table>                   
                    
                </div>
                <?php } ?>


            </div>
        </div>
    </div>


    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg"><br><br><br><br><br>
            <form class="input-group mt-3 mb-3" method="POST" >
                <div class="modal-content" style="min-height: 400px">

                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align:center;">Chọn sách</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                

                    <div id="" class="modal-body">
                        <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>

                        <div class="row list" id="mydiv" style="margin-left:12px" >

                            <?php 
                            while($sach=mysqli_fetch_array($sql_sach)){
                                $num = $sach['sach_soluong'];
                                if($num != 0){
                            ?>
                            <div class="col-6 item">
                                <input type="checkbox" name="book[]" class="form-check-input"  value="<?php echo $sach['sach_id'] ?>" >
                                <?php echo $sach['sach_ten'] ?>
                            </div>
                                                
                            <?php
                                }else{
                            ?>
                            <div class="col-6 item text-danger">
                                <!-- <input type="hidden" value=""> -->
                                <input type="checkbox" name="book[]" disabled class="form-check-input" disabled value="<?php echo $sach['sach_id'] ?>" >
                                <?php echo $sach['sach_ten'] ?>
                            </div>
                            <?php
                                }
                            }
                            ?>
                            
                            <input type="hidden" class="btn btn-success" name="book[]"  value="0">


                        </div>
                    </div><br>

                    <div class="modal-footer d-flex justify-content-between">
                        <ul class="listPage">

                        </ul>
                        <input type="submit" class="btn btn-success" name="chon" onclick="chon()" value="Chọn">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="ts">
        <div class="modal-dialog modal-lg"><br><br><br><br><br>
            <form class="input-group mt-3 mb-3" method="POST" >
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align:center;">Ghi chú</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    

                    <div class="modal-body">
                        <input  class="form-control" name="matm" id="matm" type="hidden" ><br>

                        <div class="row" id="" style="margin-left:12px" >

                            <textarea name="ghichu" class="ghichu" id="" cols="20" autofocus rows="10"></textarea>


                        </div>
                    </div><br>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="tra" onclick="chon()" value="Trả">
                    </div>
                </div>
            </form>
        </div>
        </div>
    
      

    



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // new DataTable('#myTable');
    
    // tăng giảm
    var tang = document.getElementsByClassName('tang');
    var giam = document.getElementsByClassName('giam');
    var gia = document.getElementsByClassName('gia');
    var thanhtien = document.getElementById('thanhtien');
    var tt = document.getElementById('tt');
    var selectedDateInput = document.getElementById('datetime');
    var daysDiff =1;

    function tinhtien(){

        let tonggia = 0;
        for (var i = 0; i < gia.length; i++) {
            // let dg = parseInt(gia[i].value);

            tonggia += parseInt(gia[i].value) ;
        }
        console.log(tonggia);
        if(thanhtien){
            thanhtien.textContent = 'Thành tiền: ' + tonggia + ' x '+daysDiff+' = '  + tonggia*daysDiff +'';
            tt.value = tonggia*daysDiff;

            

        }
    }
    tinhtien();

    // bấm nút tăng
    for (var i = 0; i < tang.length; i++) {
        var button = tang[i];
            
        button.addEventListener('click',function(event){
    
            
            var buttonClicked = event.target;
            // console.log(buttonClicked);
            var input = buttonClicked.parentElement.children[1];
            
            // console.log(input);
            var inputValue = input.value;
            // console.log(inputValue);
            max = parseInt(buttonClicked.parentElement.children[3].value);
            var divId = 'gia'+ buttonClicked.parentElement.children[5].value;
            // console.log(divId);
            var giatien = document.getElementById(divId);
            var giagoc = buttonClicked.parentElement.children[4].value;
            

            if(inputValue < max){
                var newValue = parseInt(inputValue) +1;
                input.value = newValue;
                var giaMoi = parseInt(giagoc) * parseInt(newValue) ;
                // console.log(giaMoi);
                giatien.value = giaMoi;

            }
    tinhtien();

        })   
    }
    // bấm nút giảm

    for (var i = 0; i < giam.length; i++) {
        var button = giam[i];
        button.addEventListener('click',function(event){
            
            var buttonClicked = event.target;
            // console.log(buttonClicked);
            var input = buttonClicked.parentElement.children[1];
            // console.log(input);
            var inputValue = input.value;

            var divId = 'gia'+ buttonClicked.parentElement.children[5].value;
            // console.log(divId);
            var gia = document.getElementsByClassName('gia');
            var giatien = document.getElementById(divId);
            var giagoc = buttonClicked.parentElement.children[4].value;

            if(inputValue > 1 ){
                var newValue = parseInt(inputValue) -1;
                input.value = newValue;
                var giaMoi = parseInt(giagoc) * parseInt(newValue) ;
                giatien.value = giaMoi;
            }
    tinhtien();
            
        })   
    }


    // xóa 
    var xoa = document.getElementsByClassName('xoa');
    for (var i = 0; i < xoa.length; i++) {
        var button = xoa[i];
        button.addEventListener('click',function(event){
            var buttonClicked = event.target;
            // console.log(buttonClicked);

            var id = buttonClicked.parentElement.children[0].value;
            var element = document.getElementById(id);
            // console.log(element);
            element.remove();
            // if(!element){
            //     alert 'hic';
            // }
            tinhtien();

        })

    }

    // đổi ngày
    selectedDateInput.addEventListener('change', function() {

        var selectedDate = new Date(selectedDateInput.value);
        var today = new Date();

        if (selectedDate) {
            var timeDiff = Math.abs(selectedDate.getTime() - today.getTime());
            daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
            console.log(daysDiff);
        }
        tinhtien();


    });



var trasach = document.getElementsByClassName('trasach');
for (var i = 0; i < trasach.length; i++) {
    var button = trasach[i];
    button.addEventListener('click',function(event){
        var buttonClicked = event.target;
        var id = buttonClicked.parentElement.children[1].value;
        console.log(id);
        var matm = document.getElementById('matm');

        matm.value = id;
        

    });
}




    // multiple select
    $(document).ready(function(){
        $(".mul-select").select2({
            // placeholder: "Chọn sách", //placeholder
            tags: true,
            tokenSeparators: ['/',',',','," "]
        });
        
        $(".single-select").select2({
            maximumSelectionLength: 1
        });
        $('.chon').select2({

            placeholder: 'Chọn 1',
            allowClear: true
        });
    })

        


        // search 
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mydiv div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
    });


    // Lấy ngày và giờ hiện tại
    var today = new Date().toISOString().split("T")[0];
    
    // Đặt giá trị tối thiểu cho trường datetime
    document.getElementById("datetime").setAttribute("min", today);

    $(document).ready(function(){

        $('.myTable').DataTable({
            order: false,
            columnDefs: [{
                "targets": [ 0,1,2, 3 ,4, 5 , 6 , 7 ],
                "orderable": false,
                // "visible": true,
                // "searchable": false
            },
            {
                "targets":  [ 1,2, 3 ,4, 5 , 6 , 7 ],
                "visible": true,
                "searchable": false

            }]
            // columnDefs: [{
            //     "targets": [ 0,1 ],
            //     "visible": true,
            //     "searchable": true
            // }]
        })
    });

    let thisPage = 1;
    let limit = 10;
    let list = document.querySelectorAll('.list .item');


    </script>
    <script src="../js/phantrang.js"></script>



<style>
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button{
    -webkit-appearance: none;
}
.tang, .giam{
    min-width: 36px;
    text-align:center;
    cursor: pointer;
}
.box{
    min-width: 120px;
}
.amount,.gia{
    background-color: var(--mint-color) !important;
}
.gia{
    max-width: 60px;
    color: black;
    border:none;
    text-align: center;
}
.ghichu{
    resize: none;
    /* border: none; */
    
}
.listPage{
    padding:10px;
    text-align: center;
    list-style: none;
}
.listPage li{
    background-color: #ffffffBD;
    padding:20px;
    display: inline-block;
    margin:0 10px;
    cursor: pointer;
}
.listPage .active{
    background-color: #B192EF;
    color:#fff;
}

</style>

</body>
</html>
