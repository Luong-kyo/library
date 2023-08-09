

<h1  class="hd">Tin Tức</h1>

<div class="news-container container">
    <?php include('recommend-bar.php') ?>
    <div class="n-contents">
        <div class="news-content list ">
            <?php
                $sql_news = mysqli_query($connect,"SELECT * FROM tintuc order by time DESC");
                while($row_news = mysqli_fetch_array($sql_news)){
                ?>
            <div class="tin-tuc item">
                <img src="./upload/tintuc/<?php echo $row_news['img']?>" class="rounded-sm" alt="">
                <div class="tt-content">
                    <a href="?quanly=chitiet_tintuc&id=<?php echo $row_news['tintuc_id'] ?>"><?php echo $row_news['title']?></a>
                    <span><time><?php echo $row_news['time']?></time></span>
                    <textarena class="tt"><?php echo $row_news['noidung'] ?></textarena>

                    <!-- <div class="tt-noidung">
                        <p class="tt-hi"><?php //echo $row_news['noidung']?></p>
                    </div> -->
                    <a class="read-more" href="?quanly=chitiet_tintuc&id=<?php echo $row_news['tintuc_id'] ?>">xem thêm</a>
                </div>
            </div>
            <?php
                }
            ?>
            

            <!-- <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div> -->
        </div>
        <ul class="listPage ">

            </ul>
    </div>
</div>
<script>
        let thisPage = 1;
    let limit = 5;
    let list = document.querySelectorAll('.list .item');

    function loadItem(){
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    list.forEach((item, key)=>{
        if(key >= beginGet && key <= endGet){
            item.style.display = 'flex';
        }else{
            item.style.display = 'none';
        }
    })
    listPage();
}
loadItem();
function listPage(){
    let count = Math.ceil(list.length / limit);
    document.querySelector('.listPage').innerHTML = '';

    if(thisPage != 1){
        let prev = document.createElement('li');
        prev.innerText = 'PREV';
        prev.setAttribute('onclick', "changePage(" + (thisPage - 1) + ")");
        document.querySelector('.listPage').appendChild(prev);
    }

    for(i = 1; i <= count; i++){
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i == thisPage){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage(" + i + ")");
        document.querySelector('.listPage').appendChild(newPage);
    }

    if(thisPage != count){
        let next = document.createElement('li');
        next.innerText = 'NEXT';
        next.setAttribute('onclick', "changePage(" + (thisPage + 1) + ")");
        document.querySelector('.listPage').appendChild(next);
    }
}
function changePage(i){
    thisPage = i;
    loadItem();
}
</script>
<!-- <script src="./js/phantrang.js"></script> -->

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
