<?php $edit = new Po(); ?>
<h3 style="margin-bottom: 50px;">ویرایش کردن پست:</h3>
<form action="" method="post" style="direction: rtl;" enctype="multipart/form-data">
    <div class="d-flex flex-column flex-sm-row">
        <div class="flex-column flex-grow-1 ml-sm-5">
            <div class="form-group">
                <label>عنوان :</label>
                <input type="text" class="form-control" name="title" value="<?php $edit->post_show('title'); ?>">
            </div>
            <div class="form-group">
                <label>متن :</label>
                <textarea cols="35" name="text" class="form-control"><?php $edit->post_show('text'); ?></textarea>
            </div>
            <div class="form-group">
                <label>تگ های پست:</label>
                <input type="text" class="form-control" name="p_tags" value="<?php $edit->post_show('tags'); ?>">
            </div>
            <div class="form-group">
                <label>کپشن:</label>
                <input type="text" class="form-control" name="p_cap" value="<?php $edit->post_show('cap'); ?>">
            </div>
        </div>
        <div class="flex-column felx-shrink-1 w-25" id=debug_width>
            <div class="form-group">
                <label>دسته :</label>
                <select name="p_category" id="" class="form-control" data-select>
                <?php
                    $cat = $edit->post_show('cat_id');
                    global $connection;
                    $query = 'SELECT * FROM categories';
                    $categories = mysqli_query($connection,$query);
                    while($items = mysqli_fetch_assoc($categories)){
                    $each_id = $items['id'];
                    $each_title = $items['cat_title'];
                ?>
                <option value="<?php echo $each_id; ?>" <?php if( $cat == $each_id ){ echo 'selected'; } ?>>
                <?php echo $each_id." ".$each_title ;?>
                </option>
                <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label>نویسنده :</label>
                <input type="text" class="form-control" name="author" value="<?php $edit->post_show('author'); ?>">
            </div>
            <div class="form-group">
                <label>وضعیت :</label>
                <select name="status" id="" class="form-control" data-select='<?php $sta = $edit->post_show('status'); ?>'>
                    <option value="draft" <?php if( $sta == 'draft' ){ echo 'selected'; } ?>>پیشنویس</option>
                    <option value="published" <?php if( $sta == 'published' ){ echo 'selected'; } ?>>انتشاریافته</option>
                </select>
            </div>
            <div class="form-group">
                <label>وضعیت پورتر:</label>
                <select name="porto_status" id="" class="form-control" required="required" data-select='<?php $por = $edit->post_show('porto_status'); ?>'>
                    <option value="1" <?php if( $por == 1 ){ echo 'selected'; } ?>>نمایش داده شود</option>
                    <option value="0" <?php if( $por == 0 ){ echo 'selected'; } ?>>در پورتو نباشد</option>
                </select>
            </div>
            <div class="form-group d-flex flex-column justify-content-center">
                <label>تصویر:</label>
                <input type='file' name='image' class='form-control'>
                <img width="100" src="../img/porto/<?php $edit->post_show('image'); ?>" alt="" class="mt-4 mx-auto">
            </div>
            <div class="form-group d-flex flex-column">
                <input type="submit" class="btn btn-primary" name="edit_post" value="ویرایش">
                <a href="posts.php" class="btn btn-danger mt-3">انصراف</a>
            </div>
        </div>
    </div>
</form>