<?php
    if(isset($_GET['id'])){
        $id= $_GET['id'];
    }else{
        $id='';
    }
?>

<?php
$sql_news = mysqli_query($connect,"SELECT * FROM tintuc where tintuc_id='$id'");
$row_news = mysqli_fetch_array($sql_news)
?>
<div class="news-container container">
    <?php include('recommend-bar.php') ?>
    <div class="n-contents">
        <div class="news-content">
            <p class="tt-title"><?php echo $row_news['title']; ?></p>
            <p><?php echo $row_news['noidung']?></p>
        </div>
    </div>
</div>