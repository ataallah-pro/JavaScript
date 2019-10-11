<?php
function title_show(){
    global $connection;
    $query = "SELECT * FROM contents WHERE con_cat = 'title'";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo "not!";
    }else{
        while($row = mysqli_fetch_assoc($res)){
            echo $row['con_text'];
        }
    }
}
function name_show(){
    global $connection;
    $query = "SELECT * FROM contents WHERE con_cat = 'name'";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo "not!";
    }else{
        while($row = mysqli_fetch_assoc($res)){
            echo $row['con_text'];
        }
    }
}
function bio_show(){
    global $connection;
    $query = "SELECT * FROM contents WHERE con_cat = 'bio'";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo "not!";
    }else{
        while($row = mysqli_fetch_assoc($res)){
            echo $row['con_text'];
        }
    }
}
function categories_show($type){
    global $connection;
    $query = "SELECT * FROM categories";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo "not!";
    }else{
        while($row = mysqli_fetch_assoc($res)){
            if($type==='menu'){
                echo "<a href='posts.php?cat=".$row['id']."'><div class='d-flex'>".$row['cat_title']."</div></a>";
            }elseif($type==='side'){
                echo "<div>".$row['cat_title']."</div>";
            }
            
        }
    }
}
function contents_show(){
    global $connection;
    $query = "SELECT * FROM contents WHERE id > 3";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo "not!";
    }else{
        while($row = mysqli_fetch_assoc($res)){
            echo "<div>".$row['con_text']."</div>";
        }
    }
}
function porto_items_show(){
    global $connection;
    $query = "SELECT * FROM posts WHERE p_porto_status = '1'";
    $res = mysqli_query($connection,$query);
    if(!$res){
        echo "not!";
    }else{
        while($row = mysqli_fetch_assoc($res)){
            echo "<div><div>".$row['p_title']."</div><div>img/porto/".$row['p_img']."</div></div>";
        }
    }
}
function posts_show($type){
    global $connection;
    if($type==='posts'){
        if(isset($_GET['cat'])){
            $cat = $_GET['cat'];
            $query = "SELECT * FROM posts WHERE p_status = 'published' AND p_cat_id = {$cat}";
        }elseif(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM posts WHERE p_status = 'published' AND id = {$id}";
        }else{
            $query = "SELECT * FROM posts WHERE p_status = 'published' LIMIT 6";
        }

        $res = mysqli_query($connection,$query);
        if(!$res){
            echo "not!";
        }else{
        while($row = mysqli_fetch_assoc($res)){
                        
                echo "
                <div class='d-flex flex-column my-5' id='post'>
                    <div class='d-flex mt-4 mb-3'>
                        <a href='posts.php?id=".$row['id']."' class='mr-3'><h4 class='my-4'>".$row['p_title']."</h4></a>
                    </div>
                    <div class='d-flex'>
                        <img src='img/porto/".$row['p_img']."' class='post_img' alt=''>
                    </div>
                    <div class='d-flex'>
                        <p class='m-5'>
                        ".substr($row['p_text'],0,350)." 
                        </p>
                    </div>
                </div>
                
                ";
            }
            
        }
    }
    elseif($type==='side'){
        $query = "SELECT * FROM posts WHERE p_status = 'published' LIMIT 8";
        $res = mysqli_query($connection,$query);
        if(!$res){
            echo "not!";
        }else{
            while($row = mysqli_fetch_assoc($res)){
                echo "<a href='posts.php?id=".$row['id']."'><div class='d-flex'>".$row['p_title']."</div></a>";
            }
        }
    }elseif($type==='content'){
        $id = $_GET['id'];
        $query = "SELECT * FROM posts WHERE p_status = 'published' AND id = {$id}";
        $res = mysqli_query($connection,$query);
        if(!$res){
            echo "not!";
        }else{
        while($row = mysqli_fetch_assoc($res)){

                echo "
                <div class='d-flex flex-column my-5' id='post'>
                    <div class='d-flex mt-4 mb-3'>
                        <a href='posts.php?id=".$row['id']."' class='mr-3'><h4 class='my-4'>".$row['p_title']."</h4></a>
                    </div>
                    <div class='d-flex'>
                        <img src='img/porto/".$row['p_img']."' class='post_img' alt=''>
                    </div>
                    <div class='d-flex'>
                        <p class='m-5'>
                        ".$row['p_text']." 
                        </p>
                    </div>
                </div>

                ";
            }

        }
    }
    
    
}


















?>