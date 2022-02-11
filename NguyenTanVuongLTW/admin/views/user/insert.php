<?php
$user= loadModel('user');
$listuser = $user->user_list(['status'=>1]);
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Thêm tài khoản</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="THEM" class="btn btn-sm btn-success"><i
                                class="far fa-save"></i>Lưu</i></button>
                        <a href="index.php?option=user" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" required name="fullname"
                                    placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <label for="">Tên đăng nhập</label>
                                <textarea  class="form-control" required name="username"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input class="form-control" type="password" required name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <textarea class="form-control" required name="email"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <textarea class="form-control" required name="phone"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Giới tính</label>
                                <select class="form-control" name="gender">
                                    <option>--Chọn giới tính--</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <textarea class="form-control" required name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hình đại diện</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Ngừng hoạt động</option>
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