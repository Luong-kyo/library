<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mainnn.css">
    <link rel="stylesheet" href="./js/jquery-3.6.0.js">
    <link rel="stylesheet" href="./asset/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
    <title>Thư viện</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src='./js/app.js'></script>

    <?php
    include('include/header.php');
    

    if(isset($_GET['quanly'])){
        $page= $_GET['quanly'];
    }else{
        $page='';
    }

    if(isset($_POST['search'])){
        include('include/books.php');
    }

    if($page=='news'){
        include('include/slider.php');
        include('include/news.php');
    }elseif($page=='books'){
        include('include/books.php');
    }elseif($page=='muon'){
        include('include/muonsach.php');
    }elseif($page=='author'){
        include('include/author.php');
    }elseif($page=='contact'){
        include('include/contact.php');
    }elseif($page=='chitietsach'){
        include('include/chitiet_sach.php');
    }elseif($page=='chitiet_tintuc'){
        include('include/chitiet_tintuc.php');
    }elseif($page=='login'){
        header('Location: login.php');
    }elseif($page=='signup'){
        header('Location: signup.php');
    }
    elseif($page=='setting'){
        header('Location: setting.php');
    }
    elseif($page=='logout'){
        unset($_SESSION['login']);
        header('Location: index.php');
    }
    else{
        include('include/slider.php');
        include('include/home.php');
    }
    include('include/footer.php');
    ?>




    <script>
$(document).ready(function(){
  $('.slide-books').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      
      prevArrow:
          `<button type='button' class='slick-prev pull-left'><i class="fa-solid fa-chevron-left"></i></button>`,
      nextArrow:
          `<button type='button' class='slick-next pull-right'><i class="fa-solid fa-chevron-right"></i></button>`,
  });
  
  $('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
  });
});
    </script>


    <!-- ----------------------------------------------------- -->
    

</body>

</html>