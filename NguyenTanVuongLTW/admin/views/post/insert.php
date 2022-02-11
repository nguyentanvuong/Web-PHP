<?php
 $topic= loadModel('topic');
 $list_topic = $topic->topic_list(['status'=>'index']);
 $strtopid ="";
foreach($list_topic as $item)
{
    $strtopid .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
}
?>
<?php include('views/header.php');?>
<form name="form1"action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">Thêm mới bài viết</strong>
          </h3>
          <div class="card-tools">
          <button type="submit" name="THEM" class="btn btn-sm btn-success"><i class="far fa-save"></i>Lưu</i></button>
            <a href="index.php?option=post" class="btn btn-sm btn-danger"><i class="fas fa-times">Thoát</i></a>
          </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label for="">Tên bài viết</label>
                        <input type="text" class="form-control" required name="title" placeholder="Tên bài viết">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết bài viết</label>
                        <textarea class="form-control" required name="detail" rows="3"></textarea>
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
                        <label for="">Chủ đề bài viết</label>
                        <select class="form-control" name="topid"  >
                            <option value="0">Chủ đề bài viết</option>
                            <?php echo $strtopid; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Hình đại diện</label>
                       <input type="file" class="form-control" name="img">
                        
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