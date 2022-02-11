<?php 
$topic=loadModel('topic');
$id = $_REQUEST["id"];
$row=$topic->topic_row(['id'=>$id]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
    redirect("index.php?option=topic&cat=trash");  
}
 $topic->topic_delete($id);
 set_flash('message',['type'=>'success','msg' => 'Thành công']);
 redirect("index.php?option=topic&cat=trash");