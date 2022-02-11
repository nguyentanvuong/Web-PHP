<?php

 $topic= loadModel('topic');
 $list = $topic->topic_list(['status'=>1]);

 $str_parentid="";
 $str_orders="";
 foreach($list as $item)
 {
     $str_parentid.="<option value='".$item['id']."'>".$item['name']."</option>";
     $str_orders.="<option value='".$item['orders']."'>Sau: ".$item['name']."</option>";
 }
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=topic&cat=process&cat=process" method="post">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Thêm chủ đề bài viết</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="THEM" class="btn btn-sm btn-success"><i
                                class="far fa-save"></i>Lưu</i></button>
                        <a href="index.php?option=topic" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên chủ đề</label>
                                <input type="text" class="form-control" required name="name" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" required name="metadesc" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <textarea class="form-control" required name="metakey" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Chủ đề cha</label>
                                <select class="form-control" name="parentid">
                                    <option value="0">Chủ đề cha</option>
                                    <?php echo $str_parentid;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp xếp</label>
                                <select class="form-control" required name="orders">
                                    <option value="0">None</option>
                                    <?php echo $str_orders;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
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