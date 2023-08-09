

<div class="rcmd-column  d-flex flex-column ">
    <div class="d-flex flex-column border border-dark rounded">
        <span class="text-center sachnb"> sách nổi bật</span>
        <ul class="new-book">
            <?php
            $sql_snb = mysqli_query($connect,"SELECT sach_id, COUNT(*) AS count
            FROM sach_the
            GROUP BY sach_id
            ORDER BY count DESC
            LIMIT 5;
            ");
            // $sql_sach = mysqli_query($connect,"SELECT * FROM sach order by sach_id DESC limit 5");
            while($snb = mysqli_fetch_array($sql_snb)){
                $id = $snb['sach_id'];
                // echo $id;
                $sql_s=mysqli_query($connect, "SELECT * FROM sach where sach_id = '$id' ");
                $sach = mysqli_fetch_array($sql_s);
                $sql_tg= mysqli_query($connect,"SELECT * FROM tacgia,tg_sach where tacgia.tacgia_id =tg_sach.tacgia_id and tg_sach.sach_id ='$id'");
                $anh = $sach['sach_img'];
                if(!$anh){
                    $anh = 'OIP.jpg';
                }
            ?>
            <li class="ml-4 mr-4 rounded">
                <a href="?quanly=chitietsach&id=<?php echo $sach['sach_id']; ?>"><img width="80px" height="120px" src="./upload/sach/<?php echo $anh; ?>" alt=""></a>
                <div class="inf-book"><br>
                    <a href="?quanly=chitietsach&id=<?php echo $sach['sach_id']; ?>" class="text-secondary"><?php echo $sach['sach_ten']; ?></a>
                    <span class="text-secondary">
                    <?php 
                        while($tg=mysqli_fetch_array($sql_tg)){
                            $tacgia = $tg['tacgia_ten'];
                            if(!$tacgia){
                                $tacgia = '';
                            }
                            echo $tacgia; 
                        }
                    ?>
                    </span>
                    <span></span><br><br><br>
                </div>
            </li>
        <?php
            }
        ?>
        </ul>
            
    </div>
    
    

    <div class="d-flex flex-column border border-dark rounded">
        <span class="text-center sachnb"> Tác giả nổi bật</span>
        <ul class="new-book">
        <?php
        
            $sql_tgnb = mysqli_query($connect,"SELECT tacgia_id, COUNT(*) AS count
            FROM tg_sach
            GROUP BY tacgia_id
            ORDER BY count DESC
            LIMIT 5;
            ");
            // $sql_tacgia = mysqli_query($connect,"SELECT * FROM tacgia order by tacgia_id DESC limit 5");
            while($tgnb = mysqli_fetch_array($sql_tgnb)){
                $id = $tgnb['tacgia_id'];
                // echo $id;
                $sql_tg=mysqli_query($connect, "SELECT * FROM tacgia where tacgia_id = '$id' ");
                $tacgia = mysqli_fetch_array($sql_tg);
                $sql_count = mysqli_query($connect, "SELECT * FROM tg_sach where tacgia_id = '$id' ");
                $count=mysqli_num_rows($sql_count);
                
        ?>
        
            <li class="ml-4 mr-4 rounded">
                <img width="80px" height="80px" src="./upload/tacgia/<?php echo $tacgia['tacgia_anh'];?>" alt="">
                <div class="inf-book">
                    <span class="text-secondary"><?php echo $tacgia['tacgia_ten']; ?></span>
                    <span class="text-secondary">số sách: <?php echo $count;?></span>
                </div>
            </li>
        <?php
            }
        ?>

        </ul>
    </div>
   
</div>