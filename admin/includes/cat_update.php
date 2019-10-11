<?php $tboxstatus = "disabled"; ?>
<?php $selcatedit = "(انتخاب کنید)"; ?>
<?php $edittextboxvalue = "(هیچ دسته ای انتخاب نشده!)"; ?>
<?php
	if(isset($_GET['edit'])){
		$tboxstatus = "";
		$selcatedit = $_GET['edit'];
		$query = "SELECT * FROM categories WHERE id = $selcatedit ";
		$readforedit = mysqli_query($connection,$query);
		while($editrow = mysqli_fetch_assoc($readforedit)){
			$edittextboxvalue = $editrow['cat_title'];
		}
		if(isset($_POST['subedit'])){
			$query = "UPDATE categories SET cat_title = '{$_POST['cat_title']}' WHERE id = {$_GET['edit']}";
			mysqli_query($connection,$query);
			header("Location: index.php?condition=updating_cat_okay");
		}
	}
?>
<form action="" method="post" style="direction: rtl; margin-top: 40px;">
	<label for="car_title">ویرایش دسته <?php echo $selcatedit; ?>:</label>
	<div class="form-group">
		<input type="text" class="form-control" placeholder="<?php echo $edittextboxvalue; ?>" name="cat_title" <?php echo $tboxstatus; ?> >
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-warning" name="subedit" value="ویرایش" <?php echo $tboxstatus; ?>>
	</div>
</form>