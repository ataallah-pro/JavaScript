<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php name_show(); ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
<style>
::-webkit-scrollbar-thumb {
 width: 10px;
 background-color: #B8B8B8;
 
}
::-webkit-scrollbar-track {
  overflow: hidden;
}
::-webkit-scrollbar {
    width: 5px;
    background-color: #FFFFFF;
}
</style>
<style>
.page{
	position: absolute;
	top: 0px;
	right: 0px;
	padding-bottom: 0.000001px;
	height: auto;
	width: 100%;
	background-color: #EFEFEF;
}
.cover{
	position: relative;
	margin-top: 0px;
	height: 300px;
	width: 100%;
	overflow: hidden;
	box-shadow: 0px 10px 45px #999;
	background-color: white;
}
.fill{
	position: absolute;
	top: 0px;
	right: 0px;
	height: 100%;
	width: 100%;
}
.logo{
	position: relative;
	top: -90px;
	left: 5%;
	height: 200px;
	width: 200px;
	border: solid 1px #C9C9C9;
	border-radius: 100px;
	overflow: hidden;
    box-shadow: 0px 40px 85px #999;
}
a{
	color: inherit;
}
a:hover{
	color: inherit;
	text-decoration: none;
}
#menu{
	margin-top: 90px !important; 
	border-top: 3px solid #eb232f;
	direction: rtl;
	border-bottom: 2px solid #E4E4E4;
	color: black;
}
#menu>div>a>div{
    transition: all 0.3s ease;
    padding: 20px;
	font-weight: 500;
}
#menu>div>a>div:hover{
	background-color: #eb232f;
	color: white;
}
form>input:first-child{
	border: none;
	height: 35px;
	border-radius: 17.5px;
	box-shadow: 0px 0px 3px #999;
	outline: none;
	padding-right: 15px;
	color:  #eb232f;
}
form>input:last-child{
	border: none;
	background-color:  #eb232f;
	height: 35px;
	width: 35px;
	border-radius: 17.5px;
	outline: none;
	color: aliceblue;
	font-weight: 600;
	box-shadow: 0px 0px 3px #999;
	cursor: pointer;
}
#fghj{
	position: relative;
	height: 70px;
	display: none !important;
}
#men_but{
	position: relative;
	height: 50px;
	width: 50px;
	background-color: aquamarine;
}
.post_img{
	width: 100%;
	height: 370px;
}
#post{
	background-color: white;border-bottom: 2px solid #e4e4e4;
}
	#post>div.d-flex:first-child{
		border-right: 3px solid rgba(140,140,140,1.00);
	}
    #post>div.d-flex:first-child:hover{
        border-right: 3px solid #eb232f;
    }
    #post>div.d-flex:first-child>a:hover{color: #eb232f;}
	#sidebar{
		direction: rtl;
		background-color: white;
		border-bottom: 2px solid #e4e4e4;
	}
	#sidebar>div.d-flex[data-file=first_block]{
		padding: 25px;
		border-bottom: 2px solid #eb232f;
		font-size: 21px;
		font-weight: 400;
	}
	#sidebar>a>div.d-flex{
		padding: 18px;
		border-bottom: 1px solid #e8e8e8;
		font-size: 18px;
		font-weight: 300;
		
	}
	#sidebar>a>div.d-flex:last-child{
		border-bottom: none;
	}
	#sidebar>a>div.d-flex:hover{
		background-color: #eb232f;
		color: white;
	}
</style>
<style media="only screen and (max-width:768px)">
	.me{
		height: 0px;
		overflow: hidden;
	}
	#fghj{
		display: block !important;
	}
	.logo{
		height: 150px;
		width: 150px;
		border-radius: 75px;
	}

</style>
</head>
<body>

    
<body>
<div class="page">
	<div class="container-fluid px-0">
		<div class="cover">
			<img src="img/pros1.jpg" alt="" class="fill" draggable="false" style="right: 20%; width: 60%; bottom: -30%; height: 140%; top: -10%;">
		</div>
		<div class="d-flex" style="max-height: 50px;">
			<div class="logo"><img src="img/logo.jpg" alt="" class="fill" draggable="false"></div>
		</div>
		<div id="menu" class="d-flex flex-column mt-5 mx-3 mx-md-5 bg-light" >
			<div class="d-flex flex-column flex-md-row w-100 me">
                <?php categories_show('menu'); ?>
				<div class="d-flex my-md-auto mx-auto mb-3 mr-md-auto ml-md-5">
					<form action="posts.php" method="get" class="d-none d-md-block">
						<input type="text" name="search" class="search_box">
						<input type="submit" name="submit" value="؟">
					</form>
				</div>
			</div>
			<div class="d-flex" id="fghj">
				<div class="d-flex flex-row" style="position: relative; height: 50px; top: 10px;">
					<div class="d-flex mr-2" id="men_but"></div>
					<div class="d-flex mr-auto ml-5 mt-1">
						<form action="posts.php" method="get" class="d-block d-md-none">
							<input type="text" name="search" class="search_box">
							<input type="submit" name="submit" value="?">
						</form>						
					</div>
				</div>	
			</div>

		</div>
		<div class="d-flex">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-md-4 order-1 order-md-0" style="direction: rtl;">
						<div class="d-flex flex-column mt-5" id="sidebar">
							<div class="d-flex" data-file="first_block">
								مطالب اخیر
							</div>
							
                            <?php posts_show('side'); ?>

						</div>
					</div>					
					<div class="col-md-7 order-0 order-md-1" style="direction: rtl;">
                        <?php 
                        if(isset($_GET['id'])){
                            posts_show('content');
                        }else{
                            posts_show('posts');
                        }
                        ?>
					</div>

				</div>
				<div class="row">

				</div>
			</div>
			</div>
			<div class="d-flex flex-column mt-5" style="background-color: #333; border-top:1px solid #555; box-shadow:  -5px 0px 8px #333;">
				<div class="d-flex m-5 ml-auto">
					<h6 class="text-white text-right" style="direction: rtl;">تمامی حقوق برای احدپلاست محفوظ است.</h6>
				</div>
			</div>		
	</div>
</div>

    
    
    
    
    
    
    
    
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
(function(){
	
	$('div#men_but').click(function(){
		if($('#menu').attr('data-file') === 'ai'){
			$('div.me').animate({height:"0px"}).parents('#menu').attr('data-file','');
		}else{
			$('div.me').animate({height:"300px"}).parents('#menu').attr('data-file','ai');
		}
		
		
	});
	
})();
</script>
</body>
</html>