<?php
$category= loadModel('category');
$product= loadModel('product');
$id=$_REQUEST["id"]; 
$row=$product->product_row(['id'=>$id]);
$listcat = $category->category_list(['status'=>1]);
$strcatid="";
foreach($listcat as $item)
{
    if($item['id']==$row['catid'])
    {
    $strcatid.="<option selected value='".$item['id']."'>".$item['name']."</option>";

    }else{
    $strcatid.="<option value='".$item['id']."'>".$item['name']."</option>";
    }
}
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=product&cat=process&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">Cập nhật sản phẩm</strong>
          </h3>
          <div class="card-tools">
          <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success"><i class="far fa-save"></i>Cập Nhật</i></button>
            <a href="index.php?option=product" class="btn btn-sm btn-danger"><i class="fas fa-times">Thoát</i></a>
          </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" value="<?php echo $row['name'];?>" class="form-control" required name="name" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết sản phẩm</label>
                        <textarea class="form-control" required name="detail" rows="3"><?php echo $row['detail'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea class="form-control" required name="metadesc" rows="3"><?php echo $row['metadesc'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Từ khóa</label>
                        <textarea class="form-control" required name="metakey" rows="3"><?php echo $row['metakey'];?></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Loại sản phẩm</label>
                        <select class="form-control" name="catid" required >
                            <option value="">Chọn loại sản phẩm</option>
                            <?php echo $strcatid;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" name="number" value="<?php echo $row['number'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá bán</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $row['price'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá khuyến mãi</label>
                        <input type="number" class="form-control" name="pricesale" value="<?php echo $row['pricesale'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Hình đại diện</label>
                        <input type="file" class="form-control" name="img" >
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select class="form-control" name="status" >
                            <option value="1" <?php if($row['status']==1){echo"selected";}?>>Xuất bản</option>
                            <option value="2" <?php if($row['status']==2){echo"selected";}?>>Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  </form>
<?php include('views/footer.php');?>