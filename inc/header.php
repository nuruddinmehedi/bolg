
<?php 
include_once"lib/database.php";
include_once"config/config.php";
include_once"helpers/formate.php";
include_once("inc/header.php");


$db= new Database;
$fm= new formate;
$qure="select * from tab_header";
$resultheader=$db->select($qure);
    if(!empty($resultheader)){
        $header=$resultheader->fetch_assoc();
    }
?>
<?php if(isset($_GET['pageid'])){
            $pageidtitle =$_GET['pageid'];
$qure="select * from tab_page where id=$pageidtitle";
$resulttitle=$db->select($qure);
    if(!empty($resulttitle)){
        $title=$resulttitle->fetch_assoc();
   
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title['name'].'-'.TITLE ;?></title>
	<?php  }}elseif(isset($_GET['id'])){
     $postidtitle =$_GET['id'];
$qure="select * from tab_post where id=$postidtitle";
$resulttitlepost=$db->select($qure);
    if(!empty($resulttitlepost)){
        $posttitle=$resulttitlepost->fetch_assoc();
    
}
    echo "<title>".$posttitle['title'].'->'.TITLE."</title>";
}


else{
    echo "<title>".$fm->title()."</title>";
}?>

	<meta name="language" content="English">
	<meta name="description" content="<?php if(!empty($posttitle))
{
    echo $fm->readmore($posttitle['body'],400);
}else{
    echo description;
} ?>">
	<meta name="keywords" content="<?php if(!empty($posttitle))
{
    echo $posttitle['tags'];
}else{
    echo keyword;
} ?>">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<img src="admin/upload/<?php echo $header['img'] ?>" alt="Logo"/>
				<h2><?php echo $header['sg'] ?></h2>
				<p><?php echo $header['wd'] ?></p>
			</div>
		</a>
			<?php
$qur="select * from tab_socialmedia where id=1";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();
}
?>
		<div class="social clear">
			<div class="icon clear">
				<a href="<?php echo $results['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $results['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $results['lnk']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $results['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a id="<?php if($fm->activ()=='home'){
    echo "active";
} ?>" href="index.php">Home</a></li>
		<?php
                                $quryforpageshow="select * from tab_page";
                                $resultforpageshow= $db->select($quryforpageshow);
                                if(isset($resultforpageshow)){
                                    while($resultshow=$resultforpageshow->fetch_assoc()){
                               
                                ?>
		<li><a id="<?php if($resultshow['id']== $pageidtitle){ echo "active";} ?>" href="about.php?pageid=<?php echo $resultshow['id']?>"><?php echo $resultshow['name']?></a></li>	
		<?php }}?>
		<li><a id="<?php if($fm->activ()=='contact'){
    echo "active";
} ?>" href="contact.php">Contact</a></li>
	</ul>
</div>
