<?php

function cat_show(){
global $connection;
    $query = "SELECT * FROM categories";
    $res = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($res)){
        echo "<li class='nav-item mr-0'><a class='nav-link' href='#' data-rank='{$row[0]}'>{$row[1]}</a></li>";
    }
}
function cat_add(){
    global $connection;
    if(isset($_POST['adding'])){
        if(empty($_POST['cat_name'])){
            echo "نامی برای دسته انتخاب کنید!";
        }else{
            $name = $_POST['cat_name'];
            $q = "INSERT INTO categories (cat_title) VALUE ('{$name}')";
            $res = mysqli_query($connection,$q);
            if(!$res){
                echo "not";
            }else{
                $num = mysqli_insert_id($connection);
                $q2 = "INSERT INTO contents (con_cat,con_text) VALUE ('{$num}','متن نمونه')";
                $res2 = mysqli_query($connection,$q2);
                if(!$res2){
                    echo "not added to contents!";
                }else{
                    header("Location: index.php?condition=adding_cat_okay");
                }
            }
        }

    }
    if(isset($_GET['condition'])){
        if($_GET['condition'] === "adding_cat_okay"){
            echo "<div class='d-flex pb-2'><div class='alert alert-success align-self-end'>دسته جدید با موفقیت اضافه شد!</div></div>";
        }        
    }

   
}
function cat_remove(){
    global $connection;
    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $q = "DELETE FROM categories WHERE id = '{$id}'";
        $res = mysqli_query($connection,$q);
        if(!$res){
            echo "not!";
        }else{
            echo "<div class='d-flex pb-2'><div class='alert alert-warning align-self-end'>دسته با موفقیت حذف شد!</div></div>";
        }
    }
}

function cat_count(){
    global $connection;
    $q = "SELECT * FROM categories";
    $res = mysqli_query($connection,$q);
    return mysqli_num_rows($res);
}


function desk_info($type){
    global $connection;
    switch($type){
        case "bio":
        $condition = "bio";
        break;
        case "name":
        $condition = "name";
        break;
        case "title":
        $condition = "title";
        break;
    }
    $q = "SELECT * FROM contents WHERE con_cat = '{$condition}'";
    $res = mysqli_query($connection,$q);
    while($ro = mysqli_fetch_array($res)){
        echo $ro[2];
    }

}
function desk_changes($type){
    global $connection;
    
    if(isset($_POST['change'])){
        if(isset($_POST['name'])){
            $condition = 'name';
        }elseif(isset($_POST['title'])){
            $condition = 'title';
        }elseif(isset($_POST['bio'])){
            $condition = 'bio';
        }
        $q = "UPDATE contents SET con_text = '{$_POST[$condition]}' WHERE con_cat = '{$condition}'";
        $res = mysqli_query($connection,$q);
        if(!$res){
            echo "not";
        }else{
            header("Location: index.php?changing_successful={$condition}");
        }
        
    }
    if(isset($_GET['changing_successful'])){
        if($_GET['changing_successful'] === $type ){
            echo "<div class='alert alert-success mx-auto mt-3'>تغییرات با موفقیت اعمال شد!</div>";
        }
    }
    
}
class Tala{
    function ata0(){
        global $connection;
        $q = "SELECT * FROM categories";
        $res = mysqli_query($connection,$q);
        global $rows;
        $rows = array();
        if(!$res){
            echo "not";
        }else{
            while($row = mysqli_fetch_assoc($res)){
                $rows[] = $row;
            }
        }
        $this->ata(); 
    }
    function ata(){
        global $connection;
        global $rows;
        $num = count($rows);
        for($i = 0; $i <= $num - 1; ++$i){
            $row = $rows[$i];
            $q = "SELECT * FROM contents WHERE con_cat = {$row['id']} ";
            $res = mysqli_query($connection,$q);
            if(!$res){
                echo "not";
            }else{
                $this->ata2($res,$row['id'],$row['cat_title']);
            }
        }
    }
    function ata2($r,$r2,$r3){
        while($row = mysqli_fetch_array($r)){
            ?>
            <div class="flex-gorw d-flex flex-column flex-grow-1 p-3 overflow-auto form_container" data-rank='<?php echo $r2 ?>'>
                <form action="" method="post" class='d-flex flex-column h-100' id="form_dir">
                    <div class="form-group d-flex flex-column flex-grow-1">
                        <h6 class="mt-4 mr-2 text-center">:ویرایش مطالب بخش 
                            <?php echo "<div class='mt-3 alert alert-primary flex-shrink-1'>".$r3."</div>"; ?>
                        </h6>
                        <textarea name="<?php echo $r2; ?>" class='form-control h-100 w-auto mx-4 mt-1'><?php
                            echo $row[2];
                            ?></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-warning mt-4" type="submit" name="edit_content" value="<?php echo $r2; ?>">ویرایش</button>
                    </div>
                </form>
            </div>
        
        <?php
        }
    }
    function content_edit(){
    global $connection;
    if(isset($_POST['edit_content'])){
        $num = $_POST['edit_content'];
        $q = "UPDATE contents SET con_text = '{$_POST[$num]}' WHERE con_cat = '{$num}'";
        $res = mysqli_query($connection,$q);
        if(!$res){
            echo "not";
        }else{
            echo "<div>تغییرات با موفقیت اعمال شد!</div>";
        }
    }
    }
}
function c_t_s($num){
    global $connection;
    $q = "SELECT * FROM categories WHERE id = '{$num}'";
    $re = mysqli_query($connection,$q);
    if(!$re){
        echo "not";
    }else{
        while($row = mysqli_fetch_assoc($re)){
            echo $row['cat_title'];
        }
    }
}
function posts_show(){
    global $connection;
    $q = "SELECT * FROM posts";
    $res = mysqli_query($connection,$q);
    if(!$res){
        echo 'not';
    }else{
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <th><?php echo $row['p_title']; ?></th>
                <th><?php c_t_s($row['p_cat_id']); ?></th>
                <th ><img src="../img/porto/<?php echo $row['p_img']; ?>" alt="post" draggable="false"></th>
                <th><?php echo $row['p_caption']; ?></th>
                <th><?php echo $row['p_status']; ?></th>
                <th><?php echo $row['p_porto_status']; ?></th>
                <th>
                    <a style="color: red;" href="posts.php?delete=<?php echo $row['id']; ?>">Delete</a>/
					<a style="color: green;" href="posts.php?edit=<?php echo $row['id']; ?>&source=edit_post">Edit</a>/
                    <a style="color: green;" href="posts.php?publish=<?php echo $row['id']; ?>">Publish</a>/
					<a style="color: orange;" href="posts.php?draft=<?php echo $row['id']; ?>">Draft</a>
                </th>
            </tr>
<?php
        }
    }
}

class Po{
function post_add(){
global $connection;
if(isset($_POST['add_post'])){
	$p_category = $_POST['p_category'];
	$p_title = $_POST['title'];
	$p_author = $_POST['author'];
	$p_content = $_POST['text'];
	$p_tags = $_POST['p_tags'];
	$p_capt = $_POST['p_cap'];
	$p_status = $_POST['status'];
	$p_porto_status = $_POST['porto_status'];
    $p_image = $_FILES['image']['name'];
    $p_image_temp = $_FILES['image']['tmp_name'];
    $_1 = move_uploaded_file($p_image_temp,"../img/porto/$p_image");
	$query = "INSERT INTO posts(p_title, p_cat_id, p_img, p_text, p_caption, p_author, p_tags, p_status, p_porto_status)";
	$query .= " VALUE ('$p_title',$p_category,'$p_image','$p_content','$p_capt','$p_author','$p_tags','$p_status','$p_porto_status')";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo"not";
        echo mysqli_error($connection);
    }else{
        $post_id_l = mysqli_insert_id($connection);
        header("Location: posts.php?source=edit_post&add_post_success={$post_id_l}");
    }

}
    if(isset($_GET['add_post_success'])){
    $num = $_GET['add_post_success'];
        $q = "SELECT * FROM posts WHERE id = '{$num}'";
        $re = mysqli_query($connection,$q);
        if(!$re){
            echo "not";
        }else{
            while($row2 = mysqli_fetch_assoc($re)){
            echo "<div class='alert alert-success'>پست اضافه شد: <a href='../post.php?post_id={$num}' style='color:green;'>{$row2['p_title']}</a></div>";
            }
        }
        }


}
var $ed_num = 0;
function post_show($type){
global $connection;
if(isset($_GET['add_post_success'])){
    $p_id = $_GET['add_post_success'];
}else{
    $p_id = $_GET['edit'];
}
$query = "SELECT * FROM posts WHERE id = '$p_id'";
$selected_things = mysqli_query($connection,$query);
    if(!$selected_things){
        echo "not";
        echo mysqli_error($connection);
    }else{
while($row = mysqli_fetch_assoc($selected_things)){
    switch($type){
        case "cat_id":
            return $row['p_cat_id'];
            break;
        case "title":
            echo $row['p_title'];
            break;
        case "author":
            echo $row['p_author'];
            break;
        case "image":
            echo $row['p_img'];
            break;
        case "text":
            echo $row['p_text'];
            break;
        case "tags":
            echo $row['p_tags'];
            break;
        case "cap":
            echo $row['p_caption'];
            break;
        case "status":
            return $row['p_status'];
            break;
        case "porto_status":
            return $row['p_porto_status'];
            break;
        case "image2":
            return $row['p_img'];
            break;
    }

}
        }
}
function post_edit(){
global $connection;
if(isset($_GET['add_post_success'])){
    $p_id = $_GET['add_post_success'];
}elseif(isset($_GET['edit'])){
    $p_id = $_GET['edit'];
}
if(isset($_POST['edit_post'])){
    $number = $p_id;
	$p_category = $_POST['p_category'];
	$p_title = $_POST['title'];
	$p_author = $_POST['author'];
	$p_image = $_FILES['image']['name'];
	$p_image_temp = $_FILES['image']['tmp_name'];
	$p_content = $_POST['text'];
	$p_tags = $_POST['p_tags'];
	$p_cap = $_POST['p_cap'];
	$p_status = $_POST['status'];
	$p_porto_status = $_POST['porto_status'];
    if(empty($p_image)){
        $p_image = $this->post_show('image2');
    }else{
        move_uploaded_file($p_image_temp,"../img/porto/$p_image");
    }
	$query = "UPDATE posts SET p_title = '$p_title' ,p_cat_id = '$p_category', p_img = '$p_image', p_text = '$p_content', p_caption = '$p_cap', p_author = '$p_author', p_tags = '$p_tags', p_status = '$p_status' , p_porto_status = '$p_porto_status' WHERE id = '{$number}'";
	$res = mysqli_query($connection,$query);
    if(!$res){
        echo "not happend!";
        echo mysqli_error($connection);
    }else{
        header("Location: posts.php?edit_post_success");
    }
}
if(isset($_GET['edit_post_success'])){
            echo "<div class='alert alert-success'>پست با موفقیت ویرایش شد.</div>";
            
        }
}
    
}
function posts_funcs(){
    global $connection;
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE id = '{$id}'";
        $res = mysqli_query($connection,$query);
        if(!$res){
            echo "Not!";
        }else{
            header("Location: posts.php?removed");
        }
    }
    if(isset($_GET['publish'])){
        $id = $_GET['publish'];
        $query = "UPDATE posts SET p_status = 'published' WHERE id = '{$id}'";
        $res = mysqli_query($connection,$query);
        if(!$res){
            echo "Not!";
        }else{
            header("Location: posts.php?published");
        }
    }

    if(isset($_GET['draft'])){
        $id = $_GET['draft'];
        $query = "UPDATE posts SET p_status = 'draft' WHERE id = '{$id}'";
        $res = mysqli_query($connection,$query);
        if(!$res){
            echo "Not!";
        }else{
            header("Location: posts.php?drafted");
        }
    }

}

function page_indicate(){
    if(isset($_GET['source'])){
        $con = $_GET['source'];
        switch($con){
            case 'add_post':
                echo "<div id='remove_divs'></div>";
                include "includes/add_post.php";
                break;
            case 'edit_post':
                echo "<div id='remove_divs'></div>";
                include "includes/edit_post.php";
                break;
        }
    }
    if(isset($_GET['removed'])){
        echo "<div class='alert alert-danger'>پست با موفقیت حذف شد!</div>";
    }
    if(isset($_GET['published'])){
        echo "<div class='alert alert-success'>پست با موفقیت منتشر شد!</div>";
    }
    if(isset($_GET['drafted'])){
        echo "<div class='alert alert-warning'>پست با موفقیت پیش نویس شد!</div>";
    }
}

class Porto{
    function show(){
        global $connection;
        $q = "SELECT * FROM posts";
        $res = mysqli_query($connection,$q);
        if(!$res){
            echo "not!";
        }else{
            while($row = mysqli_fetch_assoc($res)){
                ?>
                <div class="por_item mr-4 mt-4">
                    <img src="../img/porto/<?php echo $row['p_img']; ?>" alt="" draggable="false">
                    <h6>
                        <?php echo $row['p_title']; ?>
                    </h6>                                
                    <input name="portsArray[]" type="checkbox" value="<?php echo $row['id']; ?>" <?php if($row['p_porto_status'] == 1){echo 'checked';} ?>>
                </div>
    <?php
            }
        }
    }
    function set(){
        global $connection;
        if(isset($_POST['porto_submit'])){
            $arr = array();
            $res = mysqli_query($connection,"SELECT id FROM posts");
            if(!$res){
                echo "not";
            }else{
                while($ids = mysqli_fetch_array($res)){
                    $arr[] = $ids[0];
                }
            }
            foreach($arr as $label => $val){
                $res = mysqli_query($connection,"UPDATE posts SET p_porto_status = 0 WHERE id = '{$val}'");
                if(!$res){
                    echo "not";
                }
            }
            if(isset($_POST['portsArray'])){
                foreach($_POST['portsArray'] as $label => $val){
                $res = mysqli_query($connection,"UPDATE posts SET p_porto_status = 1 WHERE id = '{$val}'");
                if(!$res){
                    echo "not";
                }else{
                    header("Location: porto.php");
                }
                }
            }
        }
    }
}

function contact_changes(){
    
    
}






























?>