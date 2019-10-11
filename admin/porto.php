<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
<body data-page='<?php echo basename(__FILE__,'.php'); ?>'>
    <?php include "includes/navbar.php"; ?>
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex flex-column">
                    <div class="m-3 rects p-0"  style="box-shadow: unset; background-color: transparent;">
                        <form action="" method="post" class="d-flex justify-content-center flex-wrap py-4">
                            <?php $port = new Porto(); $port->show(); $port->set();?>
                            <div class="w-100 d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-success mx-auto" name="porto_submit">اعمال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>