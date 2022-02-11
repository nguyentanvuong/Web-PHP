<?php
$order =loadModel('order');
$list=$order->order_list(['status' => 'trash']);
?>
<?php require_once('views/header.php');?>
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">Danh sách thùng rác</strong>
          </h3>

          <div class="card-tools">
            <a href="index.php?option=order" class="btn btn-sm btn-danger"><i class="fas fa-times">Thoát</i></a>
          </div>
        </div>
        <div class="card-body">
        <?php require_once("views/message.php");?>
             <table class="table table-bordered"id="myTable">
                <thead>
                    <tr>
                    <th scope="col" style=width:120px;>Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Chức năng</th>
                    <th scope="col" style=width:20px;>ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list as $row):?>
                    <tr>
                    <td><a href=""><?php echo $row['code'];?></a></td>
                    <td><a href=""><?php echo $row['deliveryname'];?></a></td>
                    <td>
                      <a href="index.php?option=order&cat=retrash&id=<?php echo $row['id'];?>" class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                      <a href="index.php?option=order&cat=delete&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                    <td class="text-center"><?php echo $row['id'];?></td>
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