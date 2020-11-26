<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
		<?php if(isset($_GET['id'])){
          $catid=$_GET['id'];
    if(isset($_POST['cat'])){
       $cat =$_POST['cat'];
    $qur="update  tab_catagory  set
    
    name='$cat'
    where id= $catid;
      ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully updated catagory</span>";

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to insert</span>";
    }}
}else{

   $msg ="<span style='color:red; font-size:20px;'>filed must not be empty</span>";

} ?>
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form method="post">
                    <table class="form">
                      		<?php if(!empty($msg)){
    echo $msg;
} ?>		<?php
                   $query="select * from tab_catagory where id=$catid";     
                     $resu=$db->insert($query);
                        if(!empty($resu)){
                            $result=$resu->fetch_assoc();
                        }
                        ?>
                        <tr>
                            <td>
                                <input name= "cat" type="text" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
            <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
       <?php include "inc/footer.php"; ?>
   