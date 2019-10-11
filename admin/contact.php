<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
<body data-page='<?php echo basename(__FILE__,'.php'); ?>'>
    <?php include "includes/navbar.php"; ?>
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex flex-column">
                    <div class="m-3 p-3 rects">
                        <form action="contact.php">
                            <div class="form-group text-right" style="direction: rtl;">
                                <label for="tell">تلفن:</label>
                                <input type="text" class="form-control" name="tell">
                                <label for="mobile">موبایل:</label>
                                <input type="text" class="form-control" name="mobile">
                                <label for="addr">آدرس:</label>
                                <input type="text" class="form-control" name="addr">
                                <label for="email">ایمیل:</label>
                                <input type="text" class="form-control" name="email">
                                <label for="insta">آدرس اینستاگرام:</label>
                                <input type="text" class="form-control" name="insta">
                                <label for="whatsapp">آدرس واتس اپ:</label>
                                <input type="text" class="form-control" name="whatsapp">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">اعمال</button>
                            </div>
                        </form>
                        <?php contact_changes(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>