<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
		<?php  
            
                 $sid=session::get('userid');
            $qur="select * from tab_user where id=  $sid";
            $resu=$db->select($qur);
          if(!empty($resu)){
          $result=$resu->fetch_assoc();

    }
          
    if($_SERVER['REQUEST_METHOD']=='POST'){
               $name=$_POST['name'];
               $username=$_POST['username'];
               $email=$_POST['email'];
               if($name==''||$username==''||$email==''){
               $msg ="<span style='color:red; font-size:20px;'>filed must not be empty</span>";
               
               }else{
                   
    $permited= array('jpg','png','gif','jepng');
   $file_name=$_FILES['image']['name'];
   $file_size=$_FILES['image']['size'];
   $tmp_name=$_FILES['image']['tmp_name'];
   
    $file_explpd= explode('.',$file_name);
    $file_ext= strtolower(end($file_explpd));
    $unicName= substr(md5(time()),0,10).'.'.$file_ext;
     $uploadfile= "upload/".$unicName;
                   
    if(!empty($file_name)){
    if (empty($file_name)) {
     $msg= "<span style='color:red; font-size:20px;'>Please Select any Image !</span>";
    }elseif ($file_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
     $qur="update tab_user set  
     name='$name',
     username='$username',
     email='$email',
     pic='$unicName'
     where id=$sid
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($tmp_name,$uploadfile);
        $delete= "upload/".$result['pic'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } else{
        
        
        $qur="update tab_user set  
     name='$name',
     username='$username',
     email='$email'
     where id=$sid
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
        
        
        
    }
    
    
    
    }
           }}
            
 ?>
            <div class="box round first grid">
                <h2>Update profile</h2>
               <div class="block copyblock"> 
                 <form method="post" enctype="multipart/form-data">
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
                                <input value="<?php echo $result['name'] ?>" name= "name" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr><tr> <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input value="<?php echo $result['username'] ?>"  name= "username" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr><tr> <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input value="<?php echo $result['email'] ?>"  name= "email" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr> <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="image" type="file" />
                                
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
                         <td> <input readonly value="<?php if (session::get('role')==0){
    echo "admin";
}elseif(session::get('role')==1){
    echo"author";
}else{
    echo "editor";
} ?>" name= "cat" type="text" placeholder="Enter Category Name..." class="medium" /></td>
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
            <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
       <?php include "inc/footer.php"; ?>
   