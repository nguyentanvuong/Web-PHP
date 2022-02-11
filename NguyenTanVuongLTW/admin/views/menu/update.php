<?php
$id = $_REQUEST["id"];
$menu = loadModel('menu');
$row = $menu->menu_row(['id' => $id]);
$list = $menu->menu_list(['status' => 'index']);
$str_parentid = "";
$str_orders = "";
foreach ($list as $items) {
    if ($items['id'] == $row['parentid']) {
        $str_parentid .= "<option selected value='" . $items['id'] . "'>" . $items['name'] . "</option>";
    } else {
        $str_parentid .= "<option value='" . $items['id'] . "'>" . $items['name'] . "</option>";
    }
    $str_orders .= "<option value='" . $items['orders'] . "'>sau:" . $items['name'] . "</option>";
}
?>

<?php require_once('views/header.php'); ?>

<form name="insert_menu" action="index.php?option=menu&cat=process&id=<?php echo $id ?>" method="post">
    <div class="content-wrapper my-2">  
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Cập nhật Menu</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"><i class="far fa-save"></i> Lưu[Cập Nhật]</button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=menu" role="button">
                            <i class="fas fa-times"></i> Thoát</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên menu</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?> " placeholder="Tên loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">link</label><br />
                                <input type="text" class="form-control" name="link" value="<?php echo $row['link'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Vị trí</label>
                                <select class="form-control" name="position">
                                    <option value="mainmenu" <?php if ($row['position'] == 'mainmenu') echo 'selected'; ?>>-- main menu --</option>
                                    <option value="bottommenu" <?php if ($row['position'] == 'bottommenu') echo 'selected'; ?>>-- bottom menu --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Mã cấp cha</label>
                                <select class="form-control" name="parentid">
                                    <option value="0">-- Cấp Cha --</option>
                                    <?php echo $str_parentid; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp Xếp</label>
                                <select class="form-control" name="orders">
                                    <option value="0">-- none --</option>
                                    <?php echo $str_orders; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status" id="">
                                    <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>Xuất bản</option>
                                    <option value="2" <?php if ($row['status'] == 2) echo 'selected'; ?>>Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<?php require_once('views/footer.php'); ?>