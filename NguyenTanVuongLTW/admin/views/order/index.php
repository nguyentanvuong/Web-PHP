<?php
$order =loadModel('order');
$list=$order->order_list(['status' => 'index']);
?>
<?php require_once('views/header.php');?>
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">Tất cả đơn hàng</strong>
          </h3>
          <div class="card-tools">
             
            <a href="index.php?option=order&cat=trash" class="btn btn-sm btn-danger"><i class="far fa-trash-alt">Thùng rác</i></a>
          </div>
         
        </div>
        <div class="card-body">
        <?php require_once("views/message.php");?>
             <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                    <th scope="col" >Mã đơn hàng</th>
                    <th scope="col">Họ tên khách hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chức năng</th>
                    <th scope="col" style=width:20px;>ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $row):?>
                    <tr>
                    <td><a href=""><?php echo $row['code'];?></a></td>
                    <td><a href=""><?php echo $row['deliveryname'];?></a></td>
                    <td>
                         
                         <?php if($row['status']==1):?>
                      <a href="index.php?option=order&cat=status&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" ><i class="far ">Mới đặt hàng</i></i></a>
                      <?php else:?>
                        <a href="index.php?option=order&cat=status&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" ><i class="far ">Đã hủy</i></a>
                      <?php endif;?>
                    </td>
                    <td>
                      
                    <a href="index.php?option=order&cat=update&id=<?php echo $row['id'];?>" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                      <a href="index.php?option=order&cat=deltrash&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                    <td class="text-center"><?php echo $row['id'];?> </td>
                   </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
      </div>
    </section>
  </div>
  <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
  <?php require_once('views/footer.php');?>