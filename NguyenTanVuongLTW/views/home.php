<?php
  $title="Trang chủ";
  $category = loadModel('category');
  $product = loadModel('product');
  $list_category=$category->category_list(['parentid' => 0, 'status' => 1]);
?>
<?php require_once('views/header.php'); ?>
<?php require_once('views/mod-slideshow.php'); ?>
    <section class="bg-white">
      <div class="container">
        <?php foreach ($list_category as $row_cat): ?>
          <h1 class=" text-uppercase text-success "><?php echo $row_cat['name']; ?></h1>
          <div class="row">
          <?php
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
            $args=array(
              'cat_id' => $arr_listcatid,
              'status' => 1,
              'catid' => $catid, 
              'sort' => ['orderby' => 'created_at', 'order' => 'DESC'],
              'limit' => 8
            );
            $list=$product->product_list($args);
          ?>
            <?php foreach ($list as $row): ?>
            <div class="col-md-3 col-md ">
                <div class="card" style="width: 100%;">
                <a href="index.php?option=product&id=<?php echo $row['slug']; ?> ">
                  <img src="public/images/<?php echo $row['img']; ?>" class="card-img-top" alt="<?php echo $row['img']; ?>">
                </a>    
                  <div class="card-body">
                        <h5 class="card-title ">
                            <a href="index.php?option=product&id=<?php echo $row['slug']; ?> ">
                            <?php echo $row['name']; ?>
                            </a></h5>
                        <h3><?php echo number_format($row['price']); ?><sup>đ</sup></h3>
                        <a href="index.php?option=cart&addcart=<?php echo $row['id']; ?>" class="btn btn-primary">Đặt mua</a>
                      </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach;?>
      </div>
     </section>
<?php require_once('views/footer.php'); ?>