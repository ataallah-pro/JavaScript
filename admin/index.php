<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
<body data-page='<?php echo basename(__FILE__,'.php'); ?>'>
    <?php include "includes/navbar.php"; ?>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="d-flex flex-column">
                    <div class="m-3 p-3 rects">
                        <h5>نام سایت:</h5>
                        <div class="mr-4 mt-4 mb-4"><?php desk_info('name'); ?></div>
                        <button class="btn btn-primary" data-type='changing'>تعویض</button>
                        <?php desk_changes('name'); ?>
                        <div class="m-3 p-2">
                            <form action="" method="post" class="form-inline" dir="rtl">
                              <div class="form-group">
                                <label for="exampleInputEmail1">نام جدید:</label>
                                <input type="text" class="form-control m-3" name="name" value="<?php desk_info('name'); ?>">
                              </div>
                              <button type="submit" class="btn btn-warning" name="change">تعویض</button>
                            </form>
                        </div>
                    </div>
                    <div class="m-3 p-3 rects">
                        <h5>عنوان در صفحه ی اصلی سایت:</h5>
                        <div class="mr-4 mt-4 mb-4"><?php desk_info('title'); ?></div>
                        <button class="btn btn-primary" data-type='changing'>تعویض</button>
                        <?php desk_changes('title'); ?>
                        <div class="m-3 p-2">
                            <form action="" method="post" class="form-inline" dir="rtl">
                              <div class="form-group">
                                <label for="exampleInputEmail1">عنوان جدید:</label>
                                <input type="text" class="form-control m-3" name="title" value="<?php desk_info('title'); ?>">
                              </div>
                              <button type="submit" class="btn btn-warning" name="change">تعویض</button>
                            </form>
                        </div>
                    </div>
                    <div class="m-3 p-3 rects">
                        <h5>بیو:</h5>
                        <div class="mr-4 mt-4 mb-4"><?php desk_info('bio'); ?></div>
                        <button class="btn btn-primary" data-type='changing'>تعویض</button>
                        <?php desk_changes('bio'); ?>
                        <div class="m-3 p-2">
                            <form action="" method="post" class=" d-flex flex-column" dir="rtl">
                              <div class="form-group flex-fill text-right">
                                <label for="exampleInputEmail1">بیو جدید:</label>
                                  <textarea class="form-control m-3 w-100"  rows="7" name="bio"><?php desk_info('bio'); ?></textarea>
                              </div>
                                <div>
                                <button type="submit" class="btn btn-warning" name="change">تعویض</button>
                                </div>
                              

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-column">
                    <div class="m-3 p-3 rects">
                        <h5>مدیریت مطالب بخش محصولات:</h5>
                        <button class="btn btn-success mt-5 mx-5 mb-3" id="product_change">ورود</button>
                        <?php
                        $ins = new Tala();
                        $ins->content_edit();
                        ?>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="m-3 p-3 rects">
                        <h4>مدیریت دسته های محصولات:</h4>
                        <form action="" method="post" style="display: flex" class="mt-4">
                              <div class="form-group">
                                  <h5>اضافه کردن دسته ی جدید</h5>
                                <label for="exampleInputEmail1">نام دسته جدید:</label>
                                <input type="text" class="form-control m-3" name="cat_name">
                              </div>
                            <div class="form-group align-self-end">
                            <button type="submit" class="btn btn-success mt-5 mx-5 mb-3" name="adding">اضافه</button>
                            </div>
                            <?php cat_add(); ?>
                            <?php cat_remove(); ?>
                        </form>
                        <h5 style="margin-top: 20px;">جدول دسته بندی ها</h5>
                        <table class="table table-bordered table-hover mt-3">
                        <thead class="bg-dark table-dark">
                        <tr>
                        <th>شماره</th>
                        <th>نام دسته بندی</th>
                        <th>حذف /ویرایش </th>
                        </tr>
                        <tbody>
                        <?php
                        $query = 'SELECT * FROM categories';
                        $categories = mysqli_query($connection,$query);
                        while($items = mysqli_fetch_assoc($categories)){
                        $each_id = $items['id'];
                        $each_title = $items['cat_title'];
                        ?>
                        <tr>
                        <td><?php echo $each_id; ?></td>
                        <td><?php echo $each_title; ?></td>
                        <td><?php echo "<a style='color:red !important;' href='?remove={$each_id}'>حذف</a>"."<br>"."<a style='color:green !important;' href='?edit={$each_id}'>ویرایش</a>"; ?></td>
                        </tr>
                        <?php } ?>

                        </tbody>
                        </thead>
                        </table>
                        <?php include "includes/cat_update.php"; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="pro_content overflow-auto">
   <nav class="navbar navbar-expand-md navbar-dark bg-dark d-flex flex-column align-content-start">
      <a class="navbar-brand mr-0" href="#" id="pro_content_exiter">دسته های محصولات</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-column text-right align-self-start flex-grow-1 w-100" id="navbarSupportedContent">
            <ul class="navbar-nav flex-column h-100 w-100" id="sidemenu">
                <?php cat_show(); ?>
                <li class="nav-item mt-auto mb-5 mx-auto"><a  class="btn bg-danger" href="#" id="back">بازگشت</a></li>
            </ul>
      </div>
    </nav>
    <?php 
        $instancert = new Tala();
        $instancert->ata0();
    ?>
</div>
<?php include "includes/footer.php"; ?>