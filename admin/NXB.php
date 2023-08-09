<?php
    include('./header.php');

    // thêm 
    if(isset($_POST['themnxb'])){
        $tennxb=$_POST['tennxb'];
        $diachinxb=$_POST['diachinxb'];
        $mailnxb=$_POST['mailnxb'];
        
        $sql_insert_nxb= mysqli_query($connect,
            "INSERT INTO nxb(nxb_ten,nxb_diachi,nxb_mail)
            value ('$tennxb','$diachinxb','$mailnxb')");
    }
    // cập nhật
        elseif(isset($_POST['capnhat'])){
        $id_update=$_POST['id_update'];
        $tennxb=$_POST['tennxb'];
        $diachinxb=$_POST['diachinxb'];
        $mailnxb=$_POST['mailnxb'];
        
        mysqli_query($connect,"UPDATE nxb SET nxb_ten='$tennxb',nxb_diachi='$diachinxb',nxb_mail='$mailnxb' WHERE nxb_id='$id_update'");

        header('Location: nxb.php');
    }
    elseif(isset($_POST['quaylai'])){
        header('Location: nxb.php');
    }

    if(isset($_GET['xoa'])){
        $id= $_GET['xoa'];
        $sql_xoa = mysqli_query($connect,"DELETE FROM nxb Where nxb_id='$id'");
        mysqli_query($connect,"UPDATE sach SET nxb_id='0' Where nxb_id='$id'");
        header('Location: nxb.php');
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
                <li class="focus">
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
            $sql_nxb = mysqli_query($connect, "SELECT * FROM nxb where nxb_id='$id_capnhat' ");
            $row_nxb = mysqli_fetch_array($sql_nxb);
            
            

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
                    <input type="hidden" autocomplete="off" value="<?php echo $row_nxb['nxb_id'];?>" name="id_update" class="form-control">

                    <div class="col">
                            <p>Tên NXB</p>
                            <input value="<?php echo $row_nxb['nxb_ten'];?>" type="text" class="form-control border" placeholder="Tên NXB" name="tennxb">
                        </div>
                        <div class="col">
                            <p>Địa chỉ</p>
                            <input value="<?php echo $row_nxb['nxb_diachi'];?>" type="text" class="form-control border" placeholder="Địa chỉ" name="diachinxb">
                        </div>
                        <div class="col">
                            <p>mail</p>
                            <input value="<?php echo $row_nxb['nxb_mail'];?>" type="text" class="form-control border" placeholder="Email" name="mailnxb">
                        </div>
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
            </ul><br>

        <div class="tab-content">
            <div id="menu2" class="tab-pane fade">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        
                        <div class="col">
                            <p>Tên NXB *</p>
                            <input type="text" class="form-control border" required autocomplete="off" placeholder="Tên NXB" name="tennxb">
                        </div>
                        <div class="col">
                            <p>Địa chỉ</p>
                            <input type="text" class="form-control border" autocomplete="off" placeholder="Địa chỉ" name="diachinxb">
                        </div>
                        <div class="col">
                            <p>mail</p>
                            <input type="text" class="form-control border" autocomplete="off" placeholder="Email" name="mailnxb">
                        </div>
                        
                    </div> <br>
                    
                    <input type="submit"  name="themnxb" value="Thêm" class="btn btn-success">
                </form>     
            </div>

        
            <div id="menu1" class="tab-pane active">
            <?php } ?>
            
            <!-- search -->
            <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."><br> -->


                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                        <th class="border border-dark">STT</th>
                        <th class="border border-dark">Tên NXB</th>
                        <th class="border border-dark">Đầu sách</th>
                        <th class="border border-dark">Mail</th>
                        <th class="border border-dark">Địa chỉ</th>
                        <th class="border border-dark">Quản lý</th>
                        
                        </tr>
                    </thead>
                   
                    <tbody id="myTable">
                    <?php

                    $sql_nxb = mysqli_query($connect, "SELECT * FROM nxb");
                    $j=0;
                    while($row_nxb=mysqli_fetch_array($sql_nxb)){
                        $i = $row_nxb['nxb_id'];
                        $j=$j+1;
                    ?>
                    <tr  >
                        <td class="border border-dark"><?php echo $j; ?></td>
                        <td class="border border-dark"><?php echo $row_nxb['nxb_ten']; ?></td>
                        
                        <td class="border border-dark" style="width:20%;">
                        <?php
                            $sql_sach=mysqli_query($connect, "SELECT * FROM sach,nxb where sach.nxb_id=nxb.nxb_id and sach.nxb_id='$i'");
                            while($row_sach=mysqli_fetch_array($sql_sach)){ 
                                echo $row_sach['sach_ten'];
                                echo '.<br>';
                            } 
                             ?>
                        </td>
                        
                        <td class="border border-dark"><?php echo $row_nxb['nxb_mail']; ?></td>
                        <td class="border border-dark"><?php echo $row_nxb['nxb_diachi']; ?></textarea></td>
                        <td class="border border-dark" style="width:100px !important;">
                            <a href="?quanly=capnhat&id=<?php echo $row_nxb['nxb_id'];?>">Sửa</a> |
                            <a href="?xoa=<?php echo $row_nxb['nxb_id'];?>"> Xóa</a>
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
                    "targets": [ 2,3,4,5 ],
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
        CKEDITOR.replace('tomtat');

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
