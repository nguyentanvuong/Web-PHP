<?php 
$id = $_REQUEST["id"];
$order=loadModel('order');
$row=$order->order_row(['id'=>$id,'status'=>0]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
    redirect("index.php?option=order&cat=trash");  
}
 $order->order_delete($id);
 set_flash('message',['type'=>'success','msg' => 'Thành công']);
 redirect("index.php?option=order&cat=trash");