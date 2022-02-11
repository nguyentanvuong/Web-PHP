<?php
$topic =loadModel('topic');
$list=$topic->topic_list(['status' => 'index','sort'=>['orderby'=>'created_at','order'=>'DESC']]);
?>
<?php require_once('views/header.php');?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-danger">DANH SÁCH CHỦ ĐỀ</strong>
                </h3>

                <div class="card-tools">
                    <a href="index.php?option=topic&cat=insert" class="btn btn-sm btn-success"><i
                            class="fas fa-plus"></i>Thêm</i></a>
                    <a href="index.php?option=topic&cat=trash" class="btn btn-sm btn-danger"><i
                            class="far fa-trash-alt">Thùng rác</i></a>
                </div>
            </div>
            <div class="card-body">
                <?php require_once("views/message.php");?>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>

                            <th scope="col-7">Tên chủ đề</th>
                            <th scope="col-6">Chức năng</th>
                            <th scope="col-1" style=width:20px;>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row):?>
                        <tr>
                            <td><a href=""><?php echo $row['name'];?></a></td>
                            <td>
                                <?php if($row['status']==1):?>
                                <a href="index.php?option=topic&cat=status&id=<?php echo $row['id'];?>"
                                    class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i></a>
                                <?php else:?>
                                <a href="index.php?option=topic&cat=status&id=<?php echo $row['id'];?>"
                                    class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i></a>
                                <?php endif;?>
                                <a href="index.php?option=topic&cat=update&id=<?php echo $row['id'];?>"
                                    class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                                <a href="index.php?option=topic&cat=deltrash&id=<?php echo $row['id'];?>"
                                    class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
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
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<?php require_once('views/footer.php');?>