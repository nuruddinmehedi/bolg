<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
		<?php 
            if($_SERVER['REQUEST_METHOD']=='POST'){
      $oldpass=formate::datavaliedation(md5($_POST['oldpass']));
                  if($oldpass==''){
                     $msg ="<span style='color:red; font-size:20px;'>old password must not be empty</span>";   
                    }else{
            $id= session::get('userid');
            $result=$fm->passcheck($id,$oldpass);
                if($result==true){
            $newpass=formate::datavaliedation(md5($_POST['newpass']));
                    if($newpass==''){
                     $msg ="<span style='color:red; font-size:20px;'>password not be empty</span>";   
                    } else{
                    $qur="update tab_user set password='$newpass' where id='$id'";
                    $resultpc= $db->update($qur);
                        if(!empty($resultpc)){
                             $msg ="<span style='color:green; font-size:20px;'>password save in database</span>";
                        }else{
                            $msg ="<span style='color:red; font-size:20px;'>password not save  in database</span>";
                        }
                
}
            }else{
                          $msg ="<span style='color:red; font-size:20px;'>old password not correct</span>";
                    }}}
            ?>
            <div class="box round first grid">
                <h2>Change Password <?php if(!empty($msg)){
    echo $msg;
} ?>
                </h2>
                <div class="block">               
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="oldpass" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
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
<?php include "inc/footer.php"; ?>