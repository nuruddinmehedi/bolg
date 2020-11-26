


<?php 
include_once"../lib/database.php";
    include_once"../lib/session.php";
include_once"../config/config.php";
include_once"../helpers/formate.php";?>
<?php

  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
 header("Expires: Sat, 26 Jul 2013 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
 header("Cache-Control: max-age=200000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
 <?php

session::init();
session::checksession();
$db= new Database;
$fm= new formate;

if(isset($_GET['action'])&& $_GET['action']== 'logout'){ 
    session::destory();
    
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Category List | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
		#tinymce{font-size:15px !important;}
    </style>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                 <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Training with live project</h1>
					<p>www.trainingwithliveproject.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img width="30px" height="30px" src="upload/<?php echo session::get('pic')/*.'?id='.rand(10,100)*/?>" alt="Profile Pic" />
					</div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><?php echo session::get('username'); ?></li>
                            <li><a href="#">Config</a></li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
             <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href="userupdate.php"><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox<?php
                     $qur= "select * from tab_contact where status='0'";
            
           $dmsg= $db->select($qur);
                    if($dmsg){
                        $total=mysqli_num_rows($dmsg);
                        echo '('.$total.')';
                    }
            
                    ?></span></a></li>
                <li class="ic-charts"><a href="http://localhost/blog/"><span>Visit Website</span></a></li>
                 <?php if(session::get('role')==0){ ?>
                            
                            
                       <li class="ic-prifile"><a href="adduser.php"><span>Add User</span></a></li><?php }?>
               
                <li class="ic-prifile"><a href="userlist.php"><span>User List</span></a></li>
            </ul>
        </div>