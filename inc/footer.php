
	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php
$qur="select * from tab_footer where id=1";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();
}
?>
	  <p>&copy; <?php echo date('Y') .$results['text'] ?> </p>
	</div>
	
	<?php
$qur="select * from tab_socialmedia where id=1";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();
}
?>
	<div class="fixedicon clear">
		<a target="_blank" href="<?php echo $results['fb']; ?>"><img src="admin/upload/<?php echo $results['fbimg']; ?>" alt="Facebook"/></a>
		<a href="<?php echo $results['tw']; ?>"><img src="admin/upload/<?php echo $results['twimg']; ?>" alt="Twitter"/></a>
		<a href="<?php echo $results['lnk']; ?>"><img src="admin/upload/<?php echo $results['lnkimg']; ?>" alt="LinkedIn"/></a>
		<a href="<?php echo $results['gp']; ?>"><img src="admin/upload/<?php echo $results['gpimg']; ?>" alt="GooglePlus"/></a>
	</div>   <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>