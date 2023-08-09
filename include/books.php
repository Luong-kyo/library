<?php 
if(isset($_GET['idtheloai'])){
    $theloai_id= $_GET['idtheloai'];
    $tl = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM theloai where theloai_id ='$theloai_id'"));
    $sql_sach = mysqli_query($connect,"SELECT * FROM sach, tl_sach where sach.sach_id = tl_sach.sach_id and tl_sach.theloai_id = '$theloai_id'  ");
echo '<h1 class="hd">' .$tl['theloai_ten'].'</h1>';
}else{
    $theloai_id='';
    $sql_sach = mysqli_query($connect,"SELECT * FROM sach ");
    echo '<h1 class="hd">SÁCH</h1>';
}
?>
<input class="form-control w-25 float-right mr-5 pr-5" id="myInput" type="text" placeholder="Search.."><br>
<div class="news-container container">
    <?php
        include('recommend-bar.php');
    ?>

    <div class="n-container">
        <div class="box-content list" id="list">

            <!-- search -->
            <?php
            // if(isset($_POST['search'])){
            //     $keyword=$_POST['keyword'];
            //     $sql_sach = mysqli_query($connect,"SELECT * FROM tbl_sach,tbl_tacgia where tbl_sach.tacgia_id = tbl_tacgia.tacgia_id and tbl_sach.sach_ten Like '%$keyword%' ");
            // }else{
            //     $sql_sach = mysqli_query($connect,"SELECT * FROM tbl_sach,tbl_tacgia where tbl_sach.tacgia_id = tbl_tacgia.tacgia_id ");
            // }
            ?>
            
            <?php
                

                while($sach = mysqli_fetch_array($sql_sach)){
                    $id = $sach['sach_id'];
                    $anh = $sach['sach_img'];
                    if(!$anh){
                        $anh = 'OIP.jpg';
                    }
                    $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia, tg_sach where tacgia.tacgia_id = tg_sach.tacgia_id and tg_sach.sach_id ='$id'");
                    
                    

            ?>
            <div class="book-grid border rounded p-2 item" >
                <a href="?quanly=chitietsach&id=<?php echo $id; ?>" class=""><img src="./upload/sach/<?php echo $anh;?>" class="d-flex align-center" alt=""></a><br>
                <section style="height:40px;" class="border border-right-0 border-left-0 border-bottom-0 mb-5">
                <a href="?quanly=chitietsach&id=<?php echo $id; ?>"><?php echo $sach['sach_ten'] ?></a><br>
                <span class="text-secondary">
                    <?php 
                    while($tacgia = mysqli_fetch_array($sql_tacgia)){
                        $tentg = $tacgia['tacgia_ten'];
                        if(!$tentg){
                            $tentg = 'Tác giả';
                        }
                        echo $tentg.'<br> ';
                    }
                     ?>
                </span>
                </section><br>
                <textarena class="tt"><?php echo $sach['sach_tomtat'] ?></textarena>
                
            </div>
            <?php
            }
            ?> 
        
        </div>

        <ul class="listPage">

        </ul>

        <!-- <div class="pagination">
           
            <a href="">&laquo;</a>
            <a href="#">1</a>
            <a class="active" href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div> -->
    </div>
</div>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#list div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

    let thisPage = 1;
    let limit = 9;
    let list = document.querySelectorAll('.list .item');


</script>
<script src="./js/phantrang.js"></script>

<style>

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