<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
		<?php 
            
         
    if($_SERVER['REQUEST_METHOD']=='POST'){
               $name=$_POST['name'];
               $username=$_POST['username'];
               $email=$_POST['email'];
               $role=$_POST['role'];
               $pass=md5($_POST['pass']);
               if($name==''||$username==''||$email==''||$role==''||$pass==''){
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
                   
    if (empty($file_name)) {
     $msg= "<span style='color:red; font-size:20px;'>Please Select any Image !</span>";
    }elseif ($file_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
     $qur="insert into tab_user(name,username,email,pic,role,password) values('$name','$username','$email','$unicName','$role','$pass')";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully add user</span>";
          move_uploaded_file($tmp_name,$uploadfile);
       

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to add</span>";
    }
         } 
           }}
            
 ?>
            <div class="box round first grid">
                <h2>Add User</h2>
               <div class="block copyblock"> 
                 <form method="post" enctype="multipart/form-data">
                    <table class="form">
                      		<?php if(!empty($msg)){
    echo $msg;
} ?>		
                            <tr>
                                <td>
                                <label>name</label>
                            </td>
                            <td>
                                <input  name= "name" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr><tr> <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input   name= "username" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr><tr> <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input   name= "email" type="text" placeholder="Enter Category Name..." class="medium" />
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
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                           <option value="0">admin</option>
                           <option value="1">author</option>
                           <option value="2">editor</option>
                                
                                </select>
                             </td></tr>
                             <tr> <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input   name= "pass" type="password" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="create" />
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
   