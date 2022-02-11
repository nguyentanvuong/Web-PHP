<?php
$menu = loadModel('menu');
$list = $menu->menu_list(['status' => 'trash','sort'=>['orderby'=>'created_at','order'=>'DESC']]);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class ="text-danger">THÙNG RÁC MENU</strong>
          </h3>
          <div class="card-tools">
            <a class="btn btn-sm btn-danger" href="index.php?option=menu"><i class="fas fa-times">Thoát</i></a>
          </div>
        </div>
        <div class="card-body">
          <?php require_once("views/message.php"); ?>
          <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th scope="col">Tên menu</th>
              <th style="width:150px;">Chức năng</th>
              <th style="width:10px;">ID</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($list as $row) : ?>
            <tr>
              <td><?php echo $row['name']; ?></td> 
              <td class="text-center">
                  <a class="btn btn-sm btn-info" href="index.php?option=menu&cat=retrash&id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=delete&id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
              </td>
              <td><?php echo $row['id']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
    </section>
</div>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
<?php require_once('views/footer.php'); ?>