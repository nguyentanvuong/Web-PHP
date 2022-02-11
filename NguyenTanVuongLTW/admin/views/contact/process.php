<?php
$contact=loadModel('contact');
$userid=(isset($_SESSION["userid"]))?$_SESSION["userid"]:1;
if(isset($_POST['TRALOI']))
{ $id=$_REQUEST["id"];
    $row=$contact->contact_row(['id'=>$id]);
    if($row==null)
    {
        set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
        redirect("index.php?option=contact");  
    }
    $data=array(
        'replaydetail'=>$_POST["replaydetail"],
        'status'=>2
        );
        $contact->contact_update($data, $id);
        set_flash('message',['type'=>'success','msg' => 'Đã trả lời']);
        redirect("index.php?option=contact");
}

