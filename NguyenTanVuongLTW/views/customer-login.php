<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <style>
        .swapper{
            max-width: 400px;
            min-height: 300px;
            box-shadow: 1px 1px 4px 5px #ccc ;
            margin-left: auto;
            margin-right: auto;
            border-radius: 7px;
            padding: 20px;

        }
    </style>
    <title>Đăng nhập hệ thống</title>
</head>
<body>
<?php
$title = 'Đăng nhập';
$error = "";
if(isset($_POST['DANGNHAP']))
{
    $user = loadModel('user');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $args=array();
    $args['access']=0;
    $args['status']=1;
    //Kiểm tra tài khoảng -Email hoặc tên đăng nhập
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $args['email']=$username;
        
      } else {
        $args['username']=$username;
        
      }
      $count_username=$user->user_count($args);
      if($count_username==1)
      {
        $args['password']=sha1($password);
        $row_user=$user->user_row($args);
        if($row_user!=null)
        {
            $_SESSION['user_customer'] = $row_user['username'];
            $_SESSION['fullname_customer'] = $row_user['fullname'];
            $_SESSION['userid_customer'] = $row_user['id'];
            redirect('index.php');
        }
        else
        {
            echo $error="mật khẩu không đúng";
        }
      }
      else
      {
          $error="Tài khoảng không tồn tại";
      }
}
require_once('views/header.php');
?>
<form action="index.php?option=customer&cat=login" method="post" name="form1">
<section class="bg-white">
    
      <div class="swapper mt-md-5">
      <h1 class="text-center text-success">ĐĂNG NHẬP</h1>
            <div class="form-group">
                <label class="text-success">Tên đăng nhập</label>
                <input class="form-control"  type="text" name="username" placeholder="Tên đăng nhập hoặc email">
            </div>
            <div class="form-group">
                <label class="text-success">Mật khẩu</label>
                <input class="form-control"  type="password" name="password" placeholder="mật khẩu">
            </div>
            <div class="form-group">
                <?php echo"<span class='text-danger'>".$error."</span>"; ?>
            </div>
            <div class="form-group text-center">
                <button  type="submit" name="DANGNHAP" class="btn btn-success">ĐĂNG NHẬP</button>
            </div>
      </div>
</section>
</form>

<?php
require_once('views/footer.php');
?>
</body>
</html>