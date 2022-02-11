<?php
$slider= loadModel('slider');
$id=$_REQUEST["id"]; 
$row=$slider->slider_row(['id'=>$id]);

?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=slider&cat=process&id=<?php echo $id;?>" method="post"
    enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Cập nhật sản phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success"><i
                                class="far fa-save"></i>Cập Nhật</i></button>
                        <a href="index.php?option=slider" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên slider</label>
                                <input type="text" value="<?php echo $row['name'];?>" class="form-control" required
                                    name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Liên kết</label>
                                <textarea class="form-control" required name="link"
                                    rows="3"><?php echo $row['link'];?></textarea>
                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Vị trí </label>
                                <select class="form-control" name="position">
                                    <option value="slideshow">slideshow</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                            </div>

                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php if($row['status']==1){echo"selected";}?>>Xuất bản</option>
                                    <option value="2" <?php if($row['status']==2){echo"selected";}?>>Chưa xuất bản
                                    </option>
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