<?php include_once"../lib/database.php";
    include_once"../lib/session.php";
include_once"../config/config.php";
include_once"../helpers/formate.php";
 session::init();
session::loginusersession();
$db= new Database;
$fm= new formate; ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=formate::datavaliedation($_POST['username']);
    $pass=formate::datavaliedation(md5($_POST['password']));
    $qure="select * from tab_user where name= '$user' and password= '$pass'";
    $result=$db->select($qure);
        if(!empty($result)){
            $resultl= $result->fetch_assoc();
            session::init();
            session::set("login",true);
            session::set("username",$resultl['username']);
            session::set("userid", $resultl['id']) ;
            session::set("pic", $resultl['pic']) ;
            session::set("role", $resultl['role']) ;
            header("Location:index.php");
            
        }
        else{
            $echo= "email or password not correct";
        }
        
    }
    
    
    ?>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<span style="font-size:20px; color:red;"><?php if(!empty($echo)){
    echo $echo;
    
} ?></span>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>