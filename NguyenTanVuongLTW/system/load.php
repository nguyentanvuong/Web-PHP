<?php
function loadPage($trang = 'site')
{
    $tentrang = 'views/';
    if($trang == 'site')
    {
        if(isset($_REQUEST['option']))
        {
            $tentrang .= $_REQUEST['option'];
            if(isset($_REQUEST['id']))
            {
                $tentrang .= '-detail.php';
            }
            else
            {
                if(isset($_REQUEST['cat']))
                {
                    $tentrang .= '-category.php';
                }
                else
                {
                    $tentrang .='.php';
                }
            }
        }
        else
        {
            $tentrang .= 'home.php';
        }
    }
    else
    {
        if(isset($_REQUEST['option']))
        {
            $tentrang .= $_REQUEST['option'] . "/";
            if(isset($_REQUEST['cat']))
            {
                $tentrang .= $_REQUEST['cat'] .'.php';
            }
            else
            {
                $tentrang .= 'index.php';
            }
        }
        else
        {
            $tentrang .='dashboard/index.php';
        }
    }
     //$tentrang;
    require_once ($tentrang);
}
function loadModel($name)
{
    //B1 xử lý đẹp file
    $name=ucfirst(strtolower($name));
    //B2thiết lập đường dẫn
    $pathModel="models/".$name.'.php';
    //B3 gọi
    if(!file_exists($pathModel))
    {
        $pathModel="../models/".$name.'.php';
    }
    require_once($pathModel);
    return new $name; 
}
function loadClass($name)
{
    //B1 xử lý đẹp file
    $name=ucfirst(strtolower($name));
    //B2thiết lập đường dẫn
    $pathClass="system/".$name.'.php';
    //B3 gọi
    if(!file_exists($pathClass))
    {
        $pathModel="../system/".$name.'.php';
    }
    require_once($pathClass);
    
    return new $name; 
}