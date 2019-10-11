<h3 style="margin-bottom: 50px;">اضافه کردن پست جدید:</h3>
<form action="" method="post" style="direction: rtl;" enctype="multipart/form-data">
    <div class="d-flex flex-column flex-sm-row">
        <div class="flex-column flex-grow-1 ml-sm-5">
            <div class="form-group">
                <label>عنوان :</label>
                <input type="text" class="form-control" name="title" required="required">
            </div>
            <div class="form-group">
                <label>متن :</label>
                <textarea cols="35" name="text" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <label>تگ های پست:</label>
                <input type="text" class="form-control" name="p_tags" required="required">
            </div>
            <div class="form-group">
                <label>کپشن:</label>
                <input type="text" class="form-control" name="p_cap" required="required">
            </div>
        </div>
        <div class="flex-column felx-shrink-1 w-25" id=debug_width>
            <div class="form-group">
                <label>دسته :</label>
                <select name="p_category" id="" class="form-control" required="required">
                <?php
                    global $connection;
                    $query = 'SELECT * FROM categories';
                    $categories = mysqli_query($connection,$query);
                    while($items = mysqli_fetch_assoc($categories)){
                    $each_id = $items['id'];
                    $each_title = $items['cat_title'];
                ?>
                <option value="<?php echo $each_id; ?>">
                <?php echo $each_id." ".$each_title ;?>
                </option>
                <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label>نویسنده :</label>
                <input type="text" class="form-control" name="author" required="required">
            </div>
            <div class="form-group">
                <label>وضعیت :</label>
                <select name="status" id="" class="form-control" required="required">
                    <option value="draft">پیشنویس</option>
                    <option value="published">انتشاریافته</option>
                </select>
            </div>
            <div class="form-group">
                <label>وضعیت پورتر:</label>
                <select name="porto_status" id="" class="form-control" required="required">
                    <option value="1">نمایش داده شود</option>
                    <option value="0">در پورتو نباشد</option>
                </select>
            </div>
            <div class="form-group">
                <label>تصویر:</label>
                <input type='file' name='image' class='form-control' required="required">
            </div>
            <div class="form-group d-flex flex-column">
                <input type="submit" class="btn btn-primary" name="add_post" value="اضافه">
                <a href="posts.php" class="btn btn-danger mt-3">انصراف</a>
            </div>
        </div>
    </div>
</form>