<?php 
$category = loadModel('category');
$product = loadModel('product');
$pt = loadClass('Phantrang');
$slug = $_REQUEST['cat'];
$row_cat = $category->category_row(['slug' => $slug, 'status' => 1]);
$catid = $row_cat['id'];
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
  //Xử lý phân trang
  $limit = 9;//Số mẫu tin trên 1 trang
  $pageCurrent = $pt->pageCurrent();
  $offset = $pt->pageOffset($pageCurrent, $limit);
//
$args=array(
  'catid_in' => $arr_listcatid,
  'status' => 1,
  'sort' => ['orderby' => 'created_at', 'order' => 'DESC'],
  'offset' => $offset,
  'limit' => $limit
);
//Hiện liên kết trang
$total = $product->product_count($args);
$list = $product->product_list($args);
$title = $row_cat['name'];
?>
<?php require_once('views/header.php'); ?>
<section class="clearfix content">
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <?php require_once('views/mod-category.php')?>
            </div>
            <div class="col-md-9">
                <h1 class="text-center text-uppercase"><?php echo $title;?></h1>
                <div class="row ">
                <?php foreach ($list as $row): ?>
                <div class="col-md-4 col-md">
                <div class="card" style="width:100%;">
                <a href="index.php?option=product&id=<?php echo $row['slug']; ?> ">
                  <img src="public/images/<?php echo $row['img']; ?>" class="card-img-top" alt="<?php echo $row['img']; ?>">
                </a>    
                  <div class="card-body">
                        <h5 class="card-title">
                            <a href="index.php?option=product&id=<?php echo $row['slug']; ?> ">
                            <?php echo $row['name']; ?>
                            </a>
                        </h5>
                        <h3>Giá:<?php echo number_format($row['price']); ?><sup>đ</sup></h3>
                        <a href="index.php?option=cart&addcart=<?php echo $row['id']; ?>" class="btn btn-primary">Đặt mua</a>
                      </div>
                </div>
              </div>
            <?php endforeach; ?>
                </div>
                <?php echo $pt->pageLink($total, $pageCurrent, $limit,'index.php?option=product&cat=' . $slug); ?>
            </div>
            
        </div>
    </div>
</section>
<?php require_once('views/footer.php'); ?>