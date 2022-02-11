
<?php
$category=loadModel('category');
$list_category1=$category->category_list(['parentid'=>0,'status'=>1]);
?>
<h3 class="text-primary"> DANH MỤC LOẠI SẢN PHẨM</h3>
<ul>

    <!-- Example split danger button -->
    <?php foreach($list_category1 as $row_cat1):?>
    <?php
        $list_category2=$category->category_list(['parentid'=>$row_cat1['id'],'status'=>1]);
    ?>
    <div class="btn-group dropright" style="width:200px">

        <?php if(count($list_category2)>0):?>
        <button type="button" class="btn btn-info" >
            <a href="index.php?option=product&cat=<?php echo $row_cat1['slug'];?>" class="text-white"><?php echo $row_cat1['name'];?></a>

        </button>
        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu ">
            <?php foreach($list_category2 as $row_cat2):?>
            <li class="btn btn-light" style="width:100%">
                <a
                    href="index.php?option=product&cat=<?php echo $row_cat2['slug'];?>"><?php echo $row_cat2['name'];?></a>
            </li>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
    <?php endforeach;?>


</ul>