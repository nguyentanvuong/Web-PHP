<?php if(has_flash('message')): ?>
    <?php $arr = get_flash('message'); ?> 
    <div class="alert alert-<?php echo $arr['type']; ?> alert-dismissible fade show" role="alert">
        <?php echo $arr['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
<?php endif ; ?>