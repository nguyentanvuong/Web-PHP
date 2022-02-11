<?php
$user =loadModel('user');
$list=$user->user_list(['status' => 'index']);
?>
<?php require_once('views/header.php');?>
<div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">DANH SÁCH THÀNH VIÊN </strong>
          </h3>
          <div class="card-tools">
          <a href="index.php?option=user&cat=insert" class="btn btn-sm btn-success"><i class="fas fa-plus"></i>Thêm</i></a>
          <a href="index.php?option=user&cat=trash" class="btn btn-sm btn-danger"><i class="far fa-trash-alt">Thùng rác</i></a>
          </div>
         
        </div>
        <div class="card-body">
        <?php require_once("views/message.php");?>
             <table class="table table-bordered"id="myTable">
                <thead>
                    <tr>
                    <th scope="col" >Họ và tên</th>
                    <th scope="col">Tên đăng nhập</th>
                    <th scope="col">Email</th>
                    
                    <th scope="col">Chức năng</th>
                    <th scope="col" style=width:20px;>ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $row):?>
                    <tr>
                    <td><a href=""><?php echo $row['fullname'];?></a></td>
                    <td><a href=""><?php echo $row['username'];?></a></td>
                    <td><a href=""><?php echo $row['email'];?></a></td>
                    <td>
                      
                    <?php if($row['status']==1):?>
                      <a href="index.php?option=user&cat=status&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" ><i class="fas fa-toggle-on"></i></a>
                      <?php else:?>
                        <a href="index.php?option=user&cat=status&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" ><i class="fas fa-toggle-off"></i></a>
                      <?php endif;?>
                      <a href="index.php?option=user&cat=update&id=<?php echo $row['id'];?>" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                      <a href="index.php?option=user&cat=deltrash&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
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