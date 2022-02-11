<?php
$user= loadModel('user');
$id=$_REQUEST["id"]; 
$row=$user->user_row(['id'=>$id]);
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=user&cat=process&id=<?php echo $id;?>" method="post"
    enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Cập nhật thông tin khách hàng</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success"><i
                                class="far fa-save"></i>Cập Nhật</i></button>
                        <a href="index.php?option=user" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" value="<?php echo $row['fullname'];?>" class="form-control" required
                                    name="fullname" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Tên đăng nhập</label>
                                <textarea class="form-control" required name="username"
                                    rows="3"><?php echo $row['username'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <textarea class="form-control" required name="email"
                                    rows="3"><?php echo $row['email'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <textarea class="form-control" required name="phone"
                                    rows="3"><?php echo $row['phone'];?></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Giới tính</label>
                                <select class="form-control" name="gender">
                                    <option value="1" <?php if($row['gender']==1){echo"selected";}?>>Nam</option>
                                    <option value="2" <?php if($row['gender']==2){echo"selected";}?>>Nữ
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <textarea class="form-control" required name="address"
                                    rows="3"><?php echo $row['address'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hình đại diện</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php if($row['status']==1){echo"selected";}?>>Hoạt động </option>
                                    <option value="2" <?php if($row['status']==2){echo"selected";}?>>Ngừng hoạt động
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