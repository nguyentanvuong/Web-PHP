<?php
$id=$_REQUEST["id"];
 $topic= loadModel('topic');
 $row=$topic->topic_row(['id'=>$id]);
 $list = $topic->topic_list(['status'=>1]);
 $str_parentid="";
 $str_orders="";
 foreach($list as $item)
 {
     if($item['id']==$row['parentid'])
     {
        $str_parentid.="<option selected value='".$item['id']."'>".$item['name']."</option>";
     }else
     {
        $str_parentid.="<option value='".$item['id']."'>".$item['name']."</option>";
     }
     
     $str_orders.="<option value='".$item['orders']."'>Sau: ".$item['name']."</option>";
 }
?>
<?php include('views/header.php');?>
<form name="form1"action="index.php?option=topic&cat=process&id=<?php echo $id;?>" method="post">
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">Cập nhật chủ đề</strong>
          </h3>
          <div class="card-tools">
          <button type="submit" name="CAPNHAP" class="btn btn-sm btn-success"><i class="far fa-save"></i>Cập nhật</i></button>
            <a href="index.php?option=topic" class="btn btn-sm btn-danger"><i class="fas fa-times">Thoát</i></a>
          </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label for="">Tên chủ đề</label>
                        <input type="text" class="form-control" value="<?php echo $row['name'];?>" name="name" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea class="form-control"  name="metadesc" rows="3"><?php echo $row['metadesc'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Từ khóa</label>
                        <textarea class="form-control"  name="metakey" rows="3"><?php echo $row['metakey'];?></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Chủ đề cha</label>
                        <select class="form-control" name="parentid"  >
                            <option value="0">Chủ đề cha</option>
                            <?php echo $str_parentid;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sắp xếp</label>
                        <select class="form-control" name="orders"  >
                            <option value="0">None</option>
                            <?php echo $str_orders;?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select class="form-control" name="status" >
                            <option value="1"<?php if($row['status']==1){echo 'selected';} ?>>Xuất bản</option>
                            <option value="2"<?php if($row['status']==2){echo 'selected';} ?>>Chưa xuất bản</option>
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