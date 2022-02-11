<!doctype html>
<html lang="en">
  <head>
    <title><?php if(isset($title))
    {
        echo $title;    
    }else
    {
        echo "Shop giày";
    } ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/layout.css">
    
  </head>
  <body>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" 
src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="4gyQO407"></script>
    <section class="clearfix header bg-white">
        <div class="container">
            <div class="row text-danger">
              <div class="col-md-8 ">
                <img class="img-fluid" src="public/images/logo12.jpg" 
                style="height:100px; width:300px;" alt="...">
              </div>
              <div class="col-md-2">
              <i class="far fa-alarm-clock"> 
              <div class=" mt-2">
                  <img src="https://img.icons8.com/material/24/000000/phone--v1.png"/>
                  <a href="tel:=0388229476"> 0388229476</a>
                  </div>
                <div class=" mt-2 ">
                    <img src="https://img.icons8.com/ios-glyphs/30/000000/--pocket-watch.png"/>
                      <a class="text-info"> 07:00-21:00</a>
                    </div>
                  <div class=" mt-2">
                  <?php 
                        $cart = loadClass('cart');
                        $sl = $cart->cart_qty();
                        ?>
                        <a href="index.php?option=cart" class="text-info" >
                    <img src="https://img.icons8.com/ios-glyphs/30/000000/shopping-cart.png"/>
                        
                        Giỏ hàng <?php echo $sl; ?>
                        </a>
                  </div>
              </i>
              </div>
              <div class="col-md-2 mt-3">
                <?php if(isset($_SESSION['fullname_customer'])): ?>
                  <div class="text-info"><i class="fas fa-user-circle text-info"></i>
                  <?php echo $_SESSION['fullname_customer']; ?></div>
                  <div class="btn btn-outline-danger my-2 my-sm-0">
                    <a href="index.php?option=customer&cat=logout"> Đăng Xuất </a></div>
                <?php else: ?>
                  <div class="btn btn-outline-success my-2 my-sm-0">
                  <a href="index.php?option=customer&cat=login"> Đăng nhập </a>
                  </div>
                  <div class="btn btn-outline-success my-2 my-sm-0  ">
                  <a href="index.php?option=customer&cat=register"> Đăng ký </a>
                  </div>
                <?php endif ;?>
              </div>
            </div>
        </div>
    </section>
    <section class=" bg-info ">
        <nav class="navbar navbar-expand-lg navbar-light bg-muted">
          <a class="navbar-brand" href="localhost/Demo/NguyenTanVuongLTW"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <?php require_once('views/mod-mainmenu.php'); ?>
            <form class="form-inline my-2 my-lg-0 ">
              <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tiềm kiếm</button>
            </form>
          </div>
        </nav>
    </section>