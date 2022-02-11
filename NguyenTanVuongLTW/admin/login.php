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
        session_start();
        require_once('../system/core.php');
        if(isset($_SESSION["useradmin"]))
            {
                redirect('index.php');
            }
            if(isset($_POST['DANGNHAP']))
            {
                $username = $_POST['username'];
                $data = array();
                $data['status']=1;
                
                if (filter_var($username, FILTER_VALIDATE_EMAIL))
                {
                    $data['email']= $username;
                }else
                {
                    $data['username']=$username;
                }
                $password = sha1($_POST['password']);
                
                require_once('../system/load.php');
                require_once('../Config.php');
                require_once('../system/Database.php');
                $user = loadModel('user');
                $row_username = $user->user_row($data);
                if($row_username != null)
                {
                    $data['password']=$password;
                    $row_account=$user->user_row($data);
                    if($row_account != null)
                    {
                        $_SESSION["useradmin"]= $row_account['username'];
                        $_SESSION['userid']=$row_account['id'];
                        $_SESSION['fullname']=$row_account['fullname'];
                        $_SESSION['img']=$row_account['img'];
                        redirect("index.php");
                    }else
                    {
                        $error = "Mậu khẩu không đúng";
                    }
                }else
                {
                    $error = "Tài khoản không tồn tại ";
                }
            }
        ?>
        <form action="login.php" method="post" name="form1">
        <div class="swapper mt-md-5">
            <h3 class="text-center text-success">ĐĂNG NHẬP</h3>
            <div class="form-group">
                <label class="text-success">Tên đăng nhập</label>
                <input class="form-control" required type="text" name="username" placeholder="Tên đăng nhập hoặc email">
            </div>
            <div class="form-group">
                <label class="text-success">Mật khẩu</label>
                <input class="form-control" required type="password" name="password" placeholder="mật khẩu">
            </div>
            <div class="form-group">
                <?php if(isset($error)):?>
                     <div class="text-danger"><?php echo $error; ?></div>
                 <?php endif ;?>
            </div>
            <div class="form-group text-center">
                <button  type="submit" name="DANGNHAP" class="btn btn-success">ĐĂNG NHẬP</button>
            </div>
            
           <div class="form-group text-center">
            <button  type="submit" name="DANGNHAP" class="btn btn-primary form-control">FaceBook</button>
            </div>
            <div class="form-group text-center">
            <button  type="submit" name="DANGNHAP" class="btn btn-warning form-control">Google</button>
            </div>   
        </div>
        </form>
</body>
</html>