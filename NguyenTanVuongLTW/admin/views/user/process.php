<?php
$user=loadModel('user');
$userid=(isset($_SESSION["userid"]))?$_SESSION["userid"]:1;
if(isset($_POST['THEM']))
{
    $slug = str_slug($_POST['username']);
    $data=array(
        'fullname'=>$_POST["fullname"],
        'username'=>$_POST["username"],
        'password'=>sha1($_POST["password"]),
        'email'=>$_POST["email"],
        'gender'=>$_POST["gender"],
        'phone'=>$_POST["phone"],
        'address'=>$_POST["address"],
        'created_at'=>date('Y-m-d H:i:s'),
        'created_by'=>$userid,
        'updated_at'=>date('Y-m-d H:i:s'),
        'updated_by'=>$userid,
        'status'=>$_POST["status"]
        );
        if(strlen($_FILES["img"]["name"])>0)
        {
            
            $path_upload='../public/images/user/';
            
            $target_file =  $path_upload . basename($_FILES["img"]["name"]);
            $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $file_name=$slug.".".$type_file;
            if(in_array($type_file,['jpg','png','gif']))
            {
                if(file_exists($path_upload.$row['img']))
                {
                    unlink($path_upload.$row['img']);
                }
                move_uploaded_file($_FILES["img"]["tmp_name"],$path_upload.$file_name);
                $data['img']=$file_name;
            }
        }
        $user->user_insert($data);
            set_flash('message',['type'=>'success','msg' => 'Thêm thành công']);
            redirect("index.php?option=user");
}
if(isset($_POST['CAPNHAT']))
{
    $id=$_REQUEST["id"];
    $row=$user->user_row(['id'=>$id]);
    if($row==null)
    {
        set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
        redirect("index.php?option=user");  
    }
    $slug = str_slug($_POST['username']);
    $data=array(
        'fullname'=>$_POST["fullname"],
        'username'=>$_POST["username"],
        'password'=>sha1($_POST["password"]),
        'email'=>$_POST["email"],
        'gender'=>$_POST["gender"],
        'phone'=>$_POST["phone"],
        'address'=>$_POST["address"],
        'created_at'=>date('Y-m-d H:i:s'),
        'created_by'=>$userid,
        'updated_at'=>date('Y-m-d H:i:s'),
        'updated_by'=>$userid,
        'status'=>$_POST["status"]
        );
        //upload file
        if(strlen($_FILES["img"]["name"])>0)
        {
            
            $path_upload='../public/images/user/';
            
            $target_file =  $path_upload . basename($_FILES["img"]["name"]);
            $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $file_name=$slug.".".$type_file;
            if(in_array($type_file,['jpg','png','gif']))
            {
                if(file_exists($path_upload.$row['img']))
                {
                    unlink($path_upload.$row['img']);
                }
                move_uploaded_file($_FILES["img"]["tmp_name"],$path_upload.$file_name);
                $data['img']=$file_name;
            }
        }
        $user->user_update($data, $id);
        set_flash('message',['type'=>'success','msg' => 'cập nhật thành công']);
        redirect("index.php?option=user");
}