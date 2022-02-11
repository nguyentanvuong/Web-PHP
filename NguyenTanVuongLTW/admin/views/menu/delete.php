<?php
$menu = loadModel('menu');
$id = $_REQUEST["id"];
$row = $menu->menu_row(['id'=>$id]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại']);
    redirect("index.php?option=menu&cat=trash");
}

$menu->menu_delete($id);
set_flash('message',['type'=>'success','msg'=>'Thành công']);
redirect("index.php?option=menu&cat=trash");