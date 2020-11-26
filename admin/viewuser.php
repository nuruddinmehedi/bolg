<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
		<?php  
            if(isset($_GET['userid'])){
                $sid=$_GET['userid'];
  
            $qur="select * from tab_user where id=  $sid";
            $resu=$db->select($qur);
          if(!empty($resu)){
          $result=$resu->fetch_assoc();

    }}
    
            
 ?>
            <div class="box round first grid">
                <h2>Update profile</h2>
               <div class="block copyblock"> 
                 <form action="userlist.php" >
                    <table class="form">
                      		<?php if(!empty($msg)){
    echo $msg;
} ?>		
                        <tr>
                               <?php 
                            $qur="select * from tab_user where id=  $sid";
                                  $resu=$db->select($qur);
    if(!empty($resu)){
          $result=$resu->fetch_assoc();

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to update</span>";
    }
                            
                            ?>
                                
                                  <td>
                                <label>name</label>
                            </td>
                            <td>
                                <input readonly value="<?php echo $result['name'] ?>" name= "name" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr><tr> <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input readonly  value="<?php echo $result['username'] ?>"  name= "username" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr><tr> <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly  value="<?php echo $result['email'] ?>"  name= "email" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                           <tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $result['pic']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
                           </tr>
                        <tr>
                            <td>
                                <label>Role</label>
                            </td>
                         <td> <input readonly value="<?php if ($result['role']==0){
    echo "admin";
}elseif($result['role']==1){
    echo"author";
}else{
    echo "editor";
} ?>" name= "cat" type="text" placeholder="Enter Category Name..." class="medium" /></td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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
   