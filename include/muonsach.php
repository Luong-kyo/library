<?php
    if(!isset($_SESSION['login'])){
        header('Location: login.php');

    }
    $docgia_id = $_SESSION['docgia_id'];
    $docgia = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM docgia where docgia_id = '$docgia_id'"));
    $anh = $docgia['docgia_anh'];
    if(!$anh){
        $anh = 'businessman.png';
    }
    ?>

<?php

if(isset($_POST['dangky'])){
    $themuon=$_POST['themuon_id'];

    $sach_id = $_POST['sach_id'];
    $soluong= $_POST['soluong'];
    $ngaymuon=$_POST['ngaymuon'];
   

    foreach($sach_id as $k => $i){
        
        if (isset($soluong[$k])) {
            $j = $soluong[$k];
            $sql_sach = mysqli_query($connect, "INSERT INTO sach_the(themuon_id, sach_id, soluong) VALUES ('$themuon', '$i', '$j')");
            $row_sl = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sach where sach_id = '$i' "));
            $sl = $row_sl['sach_soluong']-$j;
            mysqli_query($connect,"UPDATE sach SET sach_soluong='$sl' where sach_id = '$i'");
        }
    }

    mysqli_query($connect, "INSERT INTO themuon(themuon_id, docgia_id, ngaymuon, trangthai) VALUES ('$themuon', '$docgia_id', '$ngaymuon','0')");
    
    echo "<script>alert 'Thành công';</script>";
}
$sql_mathe = mysqli_query($connect, "SELECT * FROM themuon order by themuon_id DESC limit 1");
$mathe = mysqli_fetch_array($sql_mathe);
?>

<div class=" container" style="min-height: 300px">
    
    <div id="" class=""><br>
        <form action="" method="POST" enctype="multipart/form-data" style="width:100%">
            <div class="row">
                        
                        <input type="hidden" name="themuon_id" class="form-check-input" value="<?php echo $mathe['themuon_id']+1; ?>" >
                        <div class="col">
                            <p>Người mượn:</p>
                            <input type="text" class="form-control" autocomplete="off" disabled value="<?php echo $docgia['docgia_ten']; ?>">
                            <input type="hidden" class="form-control" autocomplete="off" value="<?php echo $docgia['docgia_id']; ?>">
                        </div>
                        <div class="col">
                            <span>Ngày hẹn lấy:</span>
                            <input type="date" class="form-control datetime"  id="ngaymuon" onchange="setNgayHenMin()" required autocomplete="off" name="ngaymuon">
                            
                        </div><br>


                    <button type="button" value="Thêm" class="btn btn-success mx-5" style="max-height: 38px;" data-toggle="modal" data-target="#myModal">Chọn sách</button>
                    
                <!-- </div> -->
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
                    <img src="./upload/sach/<?php echo $row['sach_img'] ?>" style="width: 70px;" alt="">
                </div>
                <div class="col-sm-4 d-flex flex-column">
                    <h4 class=""><?php echo $row['sach_ten']; ?></h4>
                    
                        
                    <div class="text-secondary d-flex">Còn lại: <p id="<?php echo $k ?>"><?php echo $row['sach_soluong'] ?></p></div>
                    <!-- <p id="max">15</p> -->
                    <input type="hidden" name="sach_id[]" class="form-check-input" value="<?php echo $row['sach_id'] ?>" >

                </div>
                <div class="col-sm-3 ">
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
                        <!-- <div class="float-end mr-3 h4" id="thanhtien">Thành tiền:</div><br><br> -->

            <input type="submit"  name="dangky" value="Đăng ký" class="btn btn-success" >
            <?php
            }

            ?>
            


        </form>
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

            

                <div id="myTable" class="modal-body">
                    <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>

                    <div class="row list" id="mydiv" style="margin-left:12px" >

                        <?php 
                        $sql_sach = mysqli_query($connect, "SELECT * FROM sach ");

                        while($sach=mysqli_fetch_array($sql_sach)){
                        ?>
                        <div class="col-6 item">
                            <input type="checkbox" name="book[]" class="form-check-input" value="<?php echo $sach['sach_id'] ?>" >
                            <?php echo $sach['sach_ten'] ?>
                        </div>
                                            
                        <?php
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

<script>
    var tang = document.getElementsByClassName('tang');
    var giam = document.getElementsByClassName('giam');
    var gia = document.getElementsByClassName('gia');
    var thanhtien = document.getElementById('thanhtien');
    // var selectedDateInput = document.getElementById('datetime');
    var daysDiff =1;

    // Lấy ngày và giờ hiện tại
    var today = new Date().toISOString().split("T")[0];

    var ngaymuonInput = document.getElementById("ngaymuon");
    var today = new Date();
    var formattedToday = today.toISOString().split('T')[0];
    ngaymuonInput.setAttribute("min", formattedToday);




    function tinhtien(){

        let tonggia = 0;
        for (var i = 0; i < gia.length; i++) {
            // let dg = parseInt(gia[i].value);

            tonggia += parseInt(gia[i].value) ;
        }
        console.log(tonggia);
        if(thanhtien){
            thanhtien.textContent = 'Thành tiền: ' + tonggia + ' x '+daysDiff+' = '  + tonggia*daysDiff +'';

        }
    }
    tinhtien();


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
            // console.log(id);
            var element = document.getElementById(id);
            element.remove();
            // if(!element){
            //     alert 'hic';
            // }
            tinhtien();

        })

    }

    // selectedDateInput.addEventListener('change', function() {

    //     var selectedDate = new Date(selectedDateInput.value);
    //     var today = new Date();

    //     if (selectedDate) {
    //         var timeDiff = Math.abs(selectedDate.getTime() - today.getTime());
    //         daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
    //         console.log(daysDiff);

    //     }
    //     // tinhtien();


    // });



       // search 
       $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mydiv div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
    });


    let thisPage = 1;
    let limit = 10;
    let list = document.querySelectorAll('.list .item');


    </script>
    <script src="./js/phantrang.js"></script>

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