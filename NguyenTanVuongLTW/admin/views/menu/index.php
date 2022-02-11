<?php
$Menu = loadModel('Menu');
$category = loadModel('category');
$topic = loadModel('topic');
$post = loadModel('post');
$list_menu = $Menu->menu_list(['status' => 'index']);
$list_category = $category->category_list(['status' => 'index']);
$list_topic = $topic->topic_list(['status' => 'index']);
$list_page = $post->post_list(['status' => 'index','type'=>'page']);
?>
<form action="index.php?option=menu&cat=process" method="post" name="form1">
<?php require_once('views/header.php'); ?>
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">
                    <strong class ="text-uppercase text-danger">DANH SÁCH MENU</strong>
                </h3>
                <div class="card-tools">
                <a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=trash" role="button"><i class="fas fa-trash"></i>Thùng rác</a>
                </div>
                </div>
                <div class="card-body">
                <?php require_once("views/message.php"); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-body">
                                    <label for="">Vị trí menu</label>
                                    <select name="position" class="form-control">
                                        <option value="mainmenu">Mainmenu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingMenu">
                                    <span>Loại sản phẩm</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapseCategory" class="p-2 m-2 collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    <?php foreach($list_category as $row_category) :?>
                                        <fieldset class="form-group">
                                            <input name="nameCategory[]" value="<?php echo $row_category['id'];?>" id="category<?php echo $row_category['id'];?>" type="checkbox">
                                            <label for="category<?php echo $row_category['id'];?>"><?php echo $row_category['name'];?></label>
                                        </fieldset>
                                    <?php endforeach;?>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMCATEGORY" value="Thêm" class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <span>Chủ đề bài viết</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="True" aria-controls="collapseTopic">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapseTopic" class="p-2 m-2 collapse"0 aria-labelledby="headingTopic" data-parent="#accordionExample">
                                    <?php foreach($list_topic as $row_topic) :?>
                                        <fieldset class="form-group">
                                            <input name="nameTopic[]" value="<?php echo $row_topic['id'];?>" id="topic<?php echo $row_topic['id'];?>" type="checkbox">
                                            <label for="topic<?php echo $row_topic['id'];?>"><?php echo $row_topic['name'];?></label>
                                        </fieldset>
                                    <?php endforeach;?>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMTOPIC" value="Thêm" class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <span>Trang đơn</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapsePage" aria-expanded="True" aria-controls="collapsePage">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapsePage" class="p-2 m-2 collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                                    <?php foreach($list_page as $row_page) :?>
                                        <fieldset class="form-group">
                                            <input name="namePage[]" value="<?php echo $row_page['id'];?>" id="page<?php echo $row_page['id'];?>" type="checkbox">
                                            <label for="page<?php echo $row_page['id'];?>"><?php echo $row_page['title'];?></label>
                                        </fieldset>
                                    <?php endforeach;?>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMPAGE" value="Thêm" class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <span>Tùy chỉnh</span>
                                    <span class="float-right btn btn-sm btn-info collapsed" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="True" aria-controls="collapseTopic">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapseCustom" class="p-2 m-2 collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                                    <fieldset class="form-group">
                                        <label>Tên menu</label>
                                        <input name="name" class="form-control" id=checkid" type="text">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Liên kết</label>
                                        <input name="link" class="form-control" type="text">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMCUSTOM" value="Thêm" class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Tên menu</th>
                                <th>Liên kết</th>
                                <th style="width:160px;" class="text-center">Chức năng</th>
                                <th style="width:30px;" class="text-center">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list_menu as $row_menu) : ?>
                                <tr>
                                    <td><a href="#"><?php echo $row_menu['name']; ?></a></td>
                                    <td><a href="#"><?php echo $row_menu['link']; ?></a></td> 
                                    <td class="text-center">
                                        <?php if ($row_menu['status'] == 1) : ?>
                                            <a class="btn btn-sm btn-success" href="index.php?option=menu&cat=status&id=<?php echo $row_menu['id']; ?>" role="button"><i class="fas fa-toggle-on"></i></a>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=status&id=<?php echo $row_menu['id']; ?>" role="button"><i class="fas fa-toggle-off"></i></a>
                                        <?php endif; ?>
                                            <a class="btn btn-sm btn-info" href="index.php?option=menu&cat=update&id=<?php echo $row_menu['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=deltrash&id=<?php echo $row_menu['id']; ?>" role="button"><i class="fas fa-trash"></i></a>
                                    </td>
                                    <td class="text-center"><?php echo $row_menu['id']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
</form>
<?php require_once('views/footer.php'); ?>