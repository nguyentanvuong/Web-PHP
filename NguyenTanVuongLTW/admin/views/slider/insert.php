<?php
$slider= loadModel('slider');
$listcat = $slider->slider_list(['status'=>1]);
$strcatid="";
foreach($listcat as $item)
{
    $strcatid.="<option value='".$item['id']."'>".$item['name']."</option>";
}
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">Thêm mới slider</strong>
                </h3>
                <div class="card-tools">
                    <button type="submit" name="THEM" class="btn btn-success btn-sm"><i class="far fa-save"></i> Lưu[Thêm]</a></button>
                    <a class="btn btn-danger btn-sm" href="index.php?option=slider" role="button">
                        <i class="fas fa-times"></i> Thoát</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tên slider</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên slider">
                        </div>
                        <div class="form-group">
                            <label for="">Liên kết</label>
                            <input type="url" class="form-control" name="link" placeholder="Liên kết">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control" name="img">
                        </div>
                        
                        <div class="form-group">
                                <label for="">Vị trí</label>
                                <select class="form-control" name="position">
                                <option>-- Chọn vị trí --</option>
                                    <option value="slideshow">Slideshow</option>
                                    <option value="quancaotrai">Quảng cáo trái</option>
                                    <option value="quancaophai">Quảng cáo phải</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select class="form-control" name="status" id="">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
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