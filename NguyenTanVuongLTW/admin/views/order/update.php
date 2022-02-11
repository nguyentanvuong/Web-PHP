<?php
$order= loadModel('order');
$id=$_REQUEST["id"]; 
$row=$order->order_row(['id'=>$id]);

?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=order&cat=process&id=<?php echo $id;?>" method="post"
    enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Chi tiết đơn hàng</strong>
                    </h3>
                    <div class="card-tools">

                        <a href="index.php?option=order" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Mã đơn hàng</label>
                                <input type="text" value="<?php echo $row['code'];?>" class="form-control" readonly
                                    name="code">
                            </div>
                            <div class="form-group">
                                <label for="">Họ và tên khách hàng</label>
                                <input type="text" value="<?php echo $row['deliveryname'];?>" class="form-control"
                                    readonly name="deliveryname">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" value="<?php echo $row['deliveryaddress'];?>" class="form-control"
                                    readonly name="deliveryaddress">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <textarea class="form-control" readonly
                                    name="deliveryphone"><?php echo $row['deliveryphone'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <textarea class="form-control" readonly
                                    name="deliveryemail"><?php echo $row['deliveryemail'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <textarea class="form-control" readonly
                                    name="status"><?php echo $row['status'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<?php include('views/footer.php');?>