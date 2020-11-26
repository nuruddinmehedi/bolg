<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
    <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $copyright=$_POST['copyright'];
                $qur="update tab_footer set
                text='$copyright'
                where id=1";
$result= $db->update($qur);
if(!empty($result)){
 $msg ="<span style='color:green; font-size:20px;'>sucessfully updated</span>";   
}
            }
            
            ?>
		<?php
$qur="select * from tab_footer where id=1";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();
}
?>
            <div class="box round first grid">
                <h2>Update Copyright Text</h2><?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block copyblock"> 
                 <form method="post" action="">
                    <table class="form">					
                        <tr>
                            <td>
                                <input value="<?php echo $results['text']; ?>" type="text" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
     <?php include "inc/footer.php"; ?>