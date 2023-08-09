<div class="news-container container">
    
    <div class="n-container">
        <h1 class="hd">Tác giả</h1>
        
        <div class="author-list list">
            <?php
            $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia ");
            while($tacgia = mysqli_fetch_array($sql_tacgia)){
            ?>
            <div class="author-grid item">
                <img src="./upload/tacgia/<?php echo $tacgia['tacgia_anh'];?>" alt="">
                <span class="text-secondary text-center"><?php echo $tacgia['tacgia_ten'] ?></span>
                <?php
                $tacgia_id=$tacgia['tacgia_id'];
                $sql_count = mysqli_query($connect,"SELECT * FROM tg_sach WHERE tacgia_id='$tacgia_id'");
                $row_count = mysqli_num_rows($sql_count);
                ?>
                <span class="text-secondary text-center">Số sách: <?php echo $row_count ?></span>
            
            </div>
           <?php
            }
            ?>
        </div>

    </div>
    
</div>
