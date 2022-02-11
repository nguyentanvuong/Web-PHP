<?php
$id = $_REQUEST["id"];
$category = loadModel('category');
$row = $category->category_row(['id' => $id]);
if($row == null)
{
    set_flash('message',['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
    redirect("index.php?option=category");
}
$userid = (isset($_REQUEST["userid"]))? $_secsion["userid"] : 1;
$data = array(
    'status' => 0,
    'updated_by'=>$userid,
    'updated_at'=> date('y_m_d:i:s')                        
);
$category->category_update($data, $id);
set_flash('message',['type' => 'success', 'msg' => 'Thành công']);
redirect("index.php?option=category");