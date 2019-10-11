<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
<body data-page='<?php echo basename(__FILE__,'.php'); ?>'>
    <?php include "includes/navbar.php"; ?>
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8">
                <?php $post = new Po(); $post->post_add(); $post->post_edit(); ?>
                <div class="d-flex flex-column px-sm-5" id='con'>
                    <?php page_indicate(); ?>
                    <?php posts_funcs(); ?>
                    <div class="m-3 p-3 rects">
                        <a class="btn btn-primary" href="posts.php?source=add_post">اضافه کردن پست جدید</a>
                    </div>
                    <div class="m-3 p-3 rects">
                        <table class="table table-bordered table-hover table-responsive" dir="rtl">
                            <thead class="table-dark bg-dark posts_table">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>دسته</th>
                                    <th>تصویر</th>
                                    <th>کپشن</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت پورتو</th>
                                    <th>ویرایش/حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php posts_show(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>