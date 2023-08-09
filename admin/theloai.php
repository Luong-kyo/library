<?php include('./header.php'); ?>

<?php
    
    // thêm danh mục
        if(isset($_POST['themtheloai'])){
            $theloai=$_POST['theloai'];
            $sql = mysqli_query($connect, "SELECT * FROM theloai where theloai_ten LIKE '$theloai' ");
            $count = mysqli_num_rows($sql);
            if($count >0){
                $check = 'myModal';
            }else{

                $check = '';
                $sql_insert = mysqli_query($connect,"INSERT INTO theloai(theloai_ten) value ('$theloai')");
            }
        }
    
    // xóa
        if(isset($_GET['xoa'])){
            $id= $_GET['xoa'];
            $sql_xoa = mysqli_query($connect,"DELETE FROM theloai Where theloai_id='$id'");
            mysqli_query($connect,"DELETE FROM tl_sach Where theloai_id='$id'");
            header('Location: theloai.php');
        }
    ?>
    <div class="modal" id="<?php echo $check ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                    Modal body..
                    </div>
                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>


<div class="ad-container">
        <div class="ad-nav">
            <h2>Quản lý</h2>

            <ul>
                <li class="ad-li">
                    <a href="./sach.php">Sách</a>
                </li>
                <li class="focus">
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
                <li class="ad-li">
                    <a href="./tintuc.php">Tin tức</a>
                </li>
            </ul>
        </div>

        <div class="main">

        <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #000;">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu1">Danh sách</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Thêm</a>
            </li>
                
                
        </ul><br>

        

        <div class="tab-content">
            <div id="menu1" class="tab-pane active"><br>
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                        <th class="border border-dark">STT</th>
                        <th class="border border-dark">Tên thể loại</th>
                        <th class="border border-dark">Đầu sách</th>
                        <th class="border border-dark">Quản lý</th>
                        
                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php

                    $sql_theloai = mysqli_query($connect, "SELECT * FROM theloai");
                    $j=0;
                    while($row_theloai=mysqli_fetch_array($sql_theloai)){
                        $i = $row_theloai['theloai_id'];
                        $j=$j+1;
                    ?>
                    <tr>
                        <td class="border border-dark"><?php echo $j; ?></td>
                        <td class="border border-dark"><?php echo $row_theloai['theloai_ten']; ?></td>
                        
                        <td class="border border-dark">
                        <?php

                            $sql_dausach = mysqli_query($connect,"SELECT * FROM sach,tl_sach,theloai where sach.sach_id = tl_sach.sach_id and tl_sach.theloai_id = theloai.theloai_id and theloai.theloai_id = $i order by sach.sach_id ASC");
                            while($row_dausach=mysqli_fetch_array($sql_dausach)){
                                echo "-";
                                echo $row_dausach['sach_ten'];
                                echo ".<br>";
                            }?>
                        </td>
                        <td class="border border-dark"><a href="?xoa=<?php echo $row_theloai['theloai_id'];?>"> Xóa</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    
                    </table>
            </div>

            
            <div id="menu2" class="tab-pane fade">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        
                        <div class="col">
                            <p>Tên thể loại</p>
                            <input type="text" class="form-control border" required placeholder="Thể loại" name="theloai">
                        </div>
                        
                    </div> <br>
                    <button type="submit"  name="themtheloai"  class="btn btn-success" data-toggle="modal" data-target="#myModal"> Thêm</button>
                </form>     
            </div>

        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function(){

        $('#myTable').DataTable({

            columnDefs: [{
                "targets": [ 3 , 2 ],
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
        
   
        CKEDITOR.replace('noidung')

    </script>



</body>
</html>
