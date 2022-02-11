<?php
$contact =loadModel('contact');
$list=$contact->contact_list(['status' => 'index']);
?>
<?php require_once('views/header.php');?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-danger">Tất cả liên hệ</strong>
                </h3>
                <div class="card-tools">
                    <a href="index.php?option=contact&cat=trash" class="btn btn-sm btn-danger"><i
                            class="far fa-trash-alt">Thùng rác</i></a>
                </div>
            </div>
            <div class="card-body">
            <?php require_once("views/message.php");?>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chức năng</th>
                            <th scope="col" style=width:20px;>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $row):?>
                        <tr>
                            <td><a href=""><?php echo $row['fullname'];?></a></td>
                            <td><a href=""><?php echo $row['email'];?></a></td>
                            <td>
                                <a href="#"><?php echo $row['phone'];?></a>
                            </td>
                            <td>
                                <?php if($row['status']==1):?>
                                <a href="index.php?option=contact&cat=status&id=<?php echo $row['id'];?>"
                                    class="btn btn-sm btn-success">Chưa trả lời</a>
                                <?php else:?>
                                <a href="index.php?option=contact&cat=status&id=<?php echo $row['id'];?>"
                                    class="btn btn-sm btn-danger">Đã trả lời</a>
                                <?php endif;?>
                            </td>
                            <td>
                                <a href="index.php?option=contact&cat=reply&id=<?php echo $row['id'];?>" class="btn btn-sm btn-info"><i class="far fa-edit">Trả lời</i></a>
                                <a href="index.php?option=contact&cat=deltrash&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            <td class="text-center"><?php echo $row['id'];?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</div>

<?php require_once('views/footer.php');?>