<?php
$contact =loadModel('contact');
$list=$contact->contact_list(['status' => 'index']);
$id=$_REQUEST["id"]; 
$row=$contact->contact_row(['id'=>$id]);
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=contact&cat=process&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
<section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">Trả lời liên hệ</strong>
                </h3>
                <div class="card-tools">
                <button type="submit" name="TRALOI" class="btn btn-sm btn-success"><i class="fas fa-reply-all"></i>Trả lời</i></button>
                    
                    <a href="index.php?option=contact" class="btn btn-sm btn-danger"><i
                            class="fas fa-times">Thoát</i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="">Tiêu đề liên hệ</label>
                            <input type="text" class="form-control" name="" value="<?php echo $row['title'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung câu hỏi</label>
                            <textarea class="form-control" name="" rows="3" readonly><?php echo $row['detail'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung trả lời</label>
                            <textarea class="form-control" name="replaydetail" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Họ Tên</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo $row['fullname'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo $row['email'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Điện thoại</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo $row['phone'];?>">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</form>
    <?php include('views/footer.php');?>