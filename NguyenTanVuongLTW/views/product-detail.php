
<?php
    $product = loadModel('product');
    $category = loadModel('category');
    $slug=$_REQUEST['id'];
    $row = $product->product_row(['slug'=>$slug, 'status'=>1]);
    $catid = $row['catid'];
    $arr_listcatid = array();
    $arr_listcatid[] = $catid;
    $list_cat1 = $category->category_list(['status'=>1, 'parentid'=>$catid]);
    foreach ($list_cat1 as $cat1)
      {
        $arr_listcatid[] = $cat1['id'];
        $list_cat2 = $category->category_list(['status'=>1, 'parentid'=>$cat1['id']]);
        foreach ($list_cat2 as $cat2)
        {
          $arr_listcatid[] = $cat2['id'];
        }
      }
    $args=array(
      'cat_id' => $arr_listcatid,
      'status' => 1,
      'not_id' => $row['id'],    
      'catid' => $catid, 
      'sort' => ['orderby' => 'created_at', 'order' => 'DESC'],
      'limit' => 6
    );
    $list_other=$product->product_list($args);
    $title =$row['name'];; 
?>
<?php require_once('views/header.php'); ?>
<section class="clearfix content">
    <div class="container">
        <div class="row product-detail">
            <div class="col-md-5 mt-3">
                <img src="public/images/<?php echo $row['img'];?>"class="card-img-top" alt="public/images/<?php echo $row['img'];?>">
            </div>
            <div class="col-md-5">
                <h1><?php echo $row['name']; ?></h1>
                <h3><?php echo str_limit($row['metadesc'],250); ?></h3>
                <h2>Giá <?php echo number_format($row['price']); ?></h2>
                <form action="index.php?option=cart&addcart=<?php echo $row['id'];?>"   method="post">
                    <input type="number" value="" name="qty" min="1" max="20"/>
                    <button type="submit" name="DATMUA" class="btn btn-info">Đặt mua</button>
                </form>
            </div>
        </div>
        <h3>Chi tiết sản phẩm</h3>
        <div class="row product-detail">
            <div class="col-12">
                <?php echo $row['detail']; ?>
            </div>
        </div>
        <div class="fb-like" data-href="index.php?option=product&id=<?php echo $row['slug']; ?>" 
        data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
        <div class="binhluan">
        <div class="fb-comments" data-href="index.php?option=product&id=<?php echo $row['slug']; ?>" 
        data-numposts="5" data-width=""></div>
        </div>
        <h3>Sản phẩm khác</h3>
        <div class="row product-detail">
        <?php foreach ($list_other as $item): ?>
            <div class="col-12 col-md">
                <div class="card" style="width: 10rem;">
                <a href="index.php?option=product&id=<?php echo $item['slug']; ?> ">
                  <img src="public/images/<?php echo $item['img']; ?>" class="card-img-top" alt="<?php echo $item['img']; ?>">
                </a>    
                  <div class="card-body">
                        <h5 class="card-title">
                            <a href="index.php?option=product&id=<?php echo $item['slug']; ?> ">
                            <?php echo $item['name']; ?>
                            </a></h5>
                        <h3><?php echo number_format($item['price']); ?><sup>đ</sup></h3>
                        <a href="index.php?option=cart&addcart=<?php echo $item['id']; ?>" class="btn btn-primary">Đặt mua</a>
                      </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </div>
</section>
<?php require_once('views/footer.php'); ?>