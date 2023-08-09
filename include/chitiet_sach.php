<?php
    if(isset($_GET['id'])){
        $sach_id= $_GET['id'];
    }else{
        $sach_id='';
    }
?>
<h1  class="hd">CHI TIẾT SÁCH</h1>
<div class="news-container container">
    
        <?php

            include('recommend-bar.php');

            $sql_sachh = mysqli_query($connect,"SELECT * FROM sach where sach_id ='$sach_id' and sach_soluong ");

                    $sachh = mysqli_fetch_array($sql_sachh);
                    
                    $anhh = $sachh['sach_img'];
                    if(!$anhh){
                        $anhh = 'OIP.jpg';
                    }
                    $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia, tg_sach where tacgia.tacgia_id = tg_sach.tacgia_id and tg_sach.sach_id ='$sach_id'");
                    $nxb = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM nxb,sach where nxb.nxb_id = sach.nxb_id and sach.sach_id ='$sach_id'"));
        ?>
        <div class="chitiet">
            
            <div class="tensach">
                <div class="anh-sach">
                    <img src="./upload/sach/<?php echo $anhh ?>" alt="">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                        Yêu thích
                    </a>
                </div>
                <div class="tai-sach">
                    <div>
                        <h1><?php echo $sachh['sach_ten'];?></h1>
                        <span>
                        <?php 
                        while($tacgia = mysqli_fetch_array($sql_tacgia)){
                            $tentg = $tacgia['tacgia_ten'];
                            if(!$tentg){
                                $tentg = 'Tác giả';
                            }
                            echo $tentg;
                        }
                        ?>
                        </span><br>
                        <span><?php echo $nxb['nxb_ten'];?></span>
                    </div><br><br><br><br>
                    <div>
                        <p>Download Sách:</p>
                        <button><a href="<?php echo $sachh['sach_link'];?>">DOWNLOAD <i class="fa-solid fa-download"></i></a></button>
                    </div>
                    
                </div>
            </div>

            <div class="thongtin">
                <h1>Thông tin sách</h1>
                <div class="d-flex flex-column"><?php echo $sachh['sach_tomtat'] ?></div>
            </div>

            <div class="thongtin">
                <?php
                    // $sql_select_author_id = mysqli_query($connect,"SELECT author_id FROM tbl_sach WHERE sach_id='$id'");
                    // $select_author_id = mysqli_fetch_array($sql_select_author_id);
                    // $author_id = $select_author_id['author_id'];
                    // // $sql_sach = mysqli_query($connect,"SELECT * FROM tbl_sach WHERE sach_id='$id'");

                    // $sql_count= mysqli_query($connect,"SELECT * FROM tbl_sach WHERE author_id='$author_id'");
                    // $row_count = mysqli_num_rows($sql_count);
                ?>
                <h1>Tác giả</h1>
                <?php 
                    $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia, tg_sach where tacgia.tacgia_id = tg_sach.tacgia_id and tg_sach.sach_id ='$sach_id'");

                while($tacgia = mysqli_fetch_array($sql_tacgia)){
                    $tentg = $tacgia['tacgia_ten'];
                    if(!$tentg){
                        $tentg = 'Tác giả';
                    }
                    $sql_countt = mysqli_query($connect, "SELECT * FROM tg_sach,tacgia where tg_sach.tacgia_id = tacgia.tacgia_id and tg_sach.sach_id = '$sach_id' ");
                    $countt=mysqli_num_rows($sql_countt);
                
                ?>
                <div>
                    <div class="tacgia">
                        <img src="./upload/tacgia/<?php echo $tacgia['tacgia_anh'];?> " alt="">
                        <span class="text-center"><?php echo $tacgia['tacgia_ten'];?></span>
                    </div>

                    <div class="d-flex flex-column"><?php echo $tacgia['tacgia_thongtin'];?></div>

                </div>
                <?php } ?>
            </div>

            <div class="binhluan">
                <div class="viet-bl">
                    <input type="text" name="button" id="bl-input" placeholder="Viết bình luận...">
                    <button type="button" name="button" id="bl-comment">Gửi</button>
                </div>

                <div class="bl-container">
                    <div class="bl-box">
                        <img src="./upload/tacgia/businessman.png" alt="">
                        <div class="bl-content">
                            <div>
                                <a href="">Sái Văn Lượng</a>
                                <time>24/6/2023</time>
                            </div>
                            <div class="noidung">comment</div>
                            <div class="like"><i class="fa-solid fa-heart"></i> 1</div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#bl-comment').click(function(){
                        var input = $('#bl-input').val();
                        $('.noidung').append( input + '<br>');
                        $('#input').val('');
                    });
                });
            </script>
        </div>
        <?php
            
        ?>    
    </div>