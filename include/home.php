<div class="container">
    <div class="recommend">
        <h1  class="hd">Sách nổi bật</h1>
        <div class="recommend-books">
            <?php 
                $sql_snb = mysqli_query($connect,"SELECT sach_id, COUNT(*) AS count
                FROM sach_the
                GROUP BY sach_id
                ORDER BY count DESC
                LIMIT 3;
                ");
                while($snb=mysqli_fetch_array($sql_snb)){
                    $id = $snb['sach_id'];
                    // echo $id;
                    
                    $sql_s=mysqli_query($connect, "SELECT * FROM sach where sach_id = '$id' ");
                    $sach = mysqli_fetch_array($sql_s);
                    if(!$sach){
                        continue;
                    }

                    $anh = $sach['sach_img'];
                    if(!$anh){
                        $anh = 'OIP.jpg';
                    }
                    
            ?>
            <div class="recommend-book">
                <img src="./upload/sach/<?php echo $anh; ?>" width="250px" height="400px" alt="">
                <h3><?php echo $sach['sach_ten']; ?></h3>
                <?php 
                    $sql_tg= mysqli_query($connect,"SELECT * FROM tacgia,tg_sach where tacgia.tacgia_id =tg_sach.tacgia_id and tg_sach.sach_id ='$id'");
                    while($tg=mysqli_fetch_array($sql_tg)){
                    $tacgia = $tg['tacgia_ten'];
                    if(!$tacgia){
                        $tacgia = '';
                    }
                    
                ?>
                <a href="?quanly=author&id=<?php echo $tg['tacgia_id']?>" class="text-secondary">
                    <?php echo $tacgia; ?>
                           
                </a>
                <?php } ?>
            </div>

            <?php } ?>
        </div>
    </div>


    <?php
            $sql_cate_home = mysqli_query($connect,'SELECT * FROM theloai ORDER BY theloai_id ASC');
            while($row_cate_home = mysqli_fetch_array($sql_cate_home)){
                $id_theloai = $row_cate_home['theloai_id'];
        ?>
    <div class="books">
        <h1  class="hd"><?php echo $row_cate_home['theloai_ten'];?> </h1>

        <div class="slide-books">
            <?php
                $sql_sach = mysqli_query($connect,"SELECT * FROM sach,tl_sach where sach.sach_id = tl_sach.sach_id and tl_sach.theloai_id = '$id_theloai' ");
                while($row_sach = mysqli_fetch_array($sql_sach)){
                    $sach_id = $row_sach['sach_id'];
                    $anh = $row_sach['sach_img'];
                    if(!$anh){
                        $anh = 'OIP.jpg';
                    }
                    $sql_theloai = mysqli_query($connect,"SELECT * FROM theloai, tl_sach where theloai.theloai_id = tl_sach.theloai_id and tl_sach.sach_id ='$sach_id'");
                    $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia, tg_sach where tacgia.tacgia_id = tg_sach.tacgia_id and tg_sach.sach_id ='$sach_id'");
                // } 
                ?>
            <div class="slide-book">
                <div class="sach-img">
                    <img width="200px" height="300px" src="./upload/sach/<?php echo $anh?>" alt="">
                </div>
                <a href="?quanly=chitietsach&id=<?php echo $row_sach['sach_id']?>">
                    <h5><?php echo $row_sach['sach_ten'] ?></h5>
                </a>
                <?php 
                    while($tacgia = mysqli_fetch_array($sql_tacgia)){
                ?>
                <span class="text-secondary">
                    <?php echo $tacgia['tacgia_ten']. '<br>'; ?>
                           
                    </span>
                <?php } ?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php
            }
    ?>
</div>