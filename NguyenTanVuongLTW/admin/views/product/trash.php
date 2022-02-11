<?php 
$product = loadModel('product');
$list = $product->product_list(['status' => 'trash']);
?>

<?php require_once("views/header.php");?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class=text-danger>Danh sách thùng rác sản phẩm</strong>
                </h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-danger " href="index.php?option=product"><i
                            class="fas fa-times "></i>
                        Thoát</a>
                </div>
            </div>
            <div class="card-body">
                <?php require_once("views/message.php"); ?>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:100px;">Hình</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th style="width:150px;">Chức năng</th>
                            <th style="width:20px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $row):?>
                        <tr>
                            <td>
                                <img class="img-fluid" src="../public/images/product/<?php echo $row['img'] ?>">
                            </td>
                            <td class=text-dark><?php echo $row['name']; ?></td>
                            <td class=text-dark><?php echo $row['catid']; ?></td>
                            <td>
                                </a>
                                <a class="btn btn-sm btn-info " href="index.php?option=product&cat=retrash&id=<?php echo $row['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger " href="index.php?option=product&cat=delete&id=<?php echo $row['id']; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>

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
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
< ? php require_once("views/footer.php"); ?>