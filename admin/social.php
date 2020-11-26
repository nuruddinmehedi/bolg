<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
        
         <?php
            $qu="select * from tab_socialmedia where id=1";
              $resu=$db->select($qu);
            if(!empty($resu)){
              $results=  $resu->fetch_assoc(); 
            }
            ?>    
        <?php if($_SERVER['REQUEST_METHOD']=='POST'){
               $facebook=$_POST['facebook'];
               $twitter=$_POST['twitter'];
               $linkedin=$_POST['linkedin'];
               $googleplus=$_POST['googleplus'];
               if($facebook==''||$twitter==''||$linkedin==''||$googleplus==''){
               $msg ="<span style='color:red; font-size:20px;'>filed must not be empty</span>";
               
               }else{  
    $permited= array('jpg','png','gif','jepng');
   $facebooklfile_name=$_FILES['facebookl']['name'];
   $facebooklfile_size=$_FILES['facebookl']['size'];
   $facebookltmp_name=$_FILES['facebookl']['tmp_name'];
                   
      $twitterlfile_name=$_FILES['twitterl']['name'];
   $twitterlfile_size=$_FILES['twitterl']['size'];
   $twitterltmp_name=$_FILES['twitterl']['tmp_name'];
                   
      $linkedinlfile_name=$_FILES['linkedinl']['name'];
   $linkedinlfile_size=$_FILES['linkedinl']['size'];
   $linkedinltmp_name=$_FILES['linkedinl']['tmp_name'];
                   
      $googlepluslfile_name=$_FILES['googleplusl']['name'];
   $googlepluslfile_size=$_FILES['googleplusl']['size'];
   $googleplusltmp_name=$_FILES['googleplusl']['tmp_name'];
   
    $facebooklfile_explpd= explode('.',$facebooklfile_name);
    $twitterlfile_explpd= explode('.',$twitterlfile_name);
    $linkedinlfile_explpd= explode('.',$linkedinlfile_name);
   $googlepluslfile_explpd= explode('.',$googlepluslfile_name);
                   
    $facebooklfile_ext= strtolower(end($facebooklfile_explpd));
   $twitterlfile_ext= strtolower(end($twitterlfile_explpd));
   $linkedinlfile_ext= strtolower(end($linkedinlfile_explpd));
   $googlepluslfile_ext= strtolower(end($googlepluslfile_explpd));
                   
    $facebooklfileunicName= substr(md5(time()),0,5).'.'.$facebooklfile_ext;
    $twitterlfileunicName= substr(md5(time()),5,10).'.'.$twitterlfile_ext;
    $linkedinlfileunicName= substr(md5(time()),10,15).'.'.$linkedinlfile_ext;
$googlepluslfileunicName=substr(md5(time()),15,20).'.'.$googlepluslfile_ext;
                   
     $facebooklfileuploadfile= "upload/".$facebooklfileunicName;
     $twitterlfileuploadfile= "upload/".$twitterlfileunicName;
     $linkedinlfileuploadfile= "upload/".$linkedinlfileunicName;
     $googlepluslfileuploadfile= "upload/".$googlepluslfileunicName;
       
                   
           /*facebook logo*/              
                   
    if(!empty($facebooklfile_name)){
    if ($facebooklfile_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'> fb Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($facebooklfile_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
    
     $qur="update tab_socialmedia set  
     fb='$facebook',
     tw='$twitter',
     lnk='$linkedin',
     fbimg='$facebooklfileunicName',
     gp='$googleplus'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($facebookltmp_name,$facebooklfileuploadfile);
        $delete= "upload/".$results['fbimg'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } else{
        
        
        $qur="update tab_socialmedia set  
     fb='$facebook',
     tw='$twitter',
     lnk='$linkedin',
     gp='$googleplus'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>"; }
    
    }   
                   
                   
                    /*twitter logo*/               
                   
                   
    if(!empty($twitterlfile_name)){
    if ($twitterlfile_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'> fb Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($twitterlfile_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
    
     $qur="update tab_socialmedia set  
     twimg='$twitterlfileunicName'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($twitterltmp_name,$twitterlfileuploadfile);
        $delete= "upload/".$results['twimg'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } 
                   
                     /*linkedin logo*/                
                   
                   
                   
    if(!empty($linkedinlfile_name)){
    if ($linkedinlfile_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'> fb Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($linkedinlfile_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
    
     $qur="update tab_socialmedia set  
     lnkimg='$linkedinlfileunicName'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($linkedinltmp_name,$linkedinlfileuploadfile);
        $delete= "upload/".$results['lnkimg'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } 
                   
                   
                    /*googlepluse logo*/                  
                   
                   
    if(!empty($googlepluslfile_name)){
    if ($googlepluslfile_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'> fb Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($googlepluslfile_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
    
     $qur="update tab_socialmedia set  
     
     gpimg='$googlepluslfileunicName'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($googleplusltmp_name,$googlepluslfileuploadfile);
        $delete= "upload/".$results['gpimg'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } 
           }} ?>
		
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>  <?php if(!empty($msg)){
    echo $msg;
} ?>                	<?php
$qur="select * from tab_socialmedia where id=1";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();
}
?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
   
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook URL</label>
                            </td>
                            <td>
                                <input value="<?php echo $results['fb']; ?>" type="text" name="facebook"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Facebook Logo</label>
                            </td>
                            <td>
                                <input type="file" name="facebookl"  class="medium" />
                            </td>
                        </tr><tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $results['fbimg']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
                           </tr>
						 <tr>
                            <td>
                                <label>Twitter URL</label>
                            </td>
                            <td>
                                <input value="<?php echo $results['tw']; ?>" type="text" name="twitter"  class="medium" />
                            </td>
                        </tr>  <tr>
                            <td>
                                <label>twitter Logo</label>
                            </td>
                            <td>
                                <input type="file" name="twitterl"  class="medium" />
                            </td>
                        </tr>
						<tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $results['twimg']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
                           </tr>
						 <tr>
                            <td>
                                <label>LinkedIn URL</label>
                            </td>
                            <td>
                                <input value="<?php echo $results['lnk']; ?>" type="text" name="linkedin"  class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>LinkedIn Logo</label>
                            </td>
                            <td>
                                <input type="file" name="linkedinl"  class="medium" />
                            </td>
                        </tr><tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $results['lnkimg']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
                           </tr>
						 <tr>
                            <td>
                                <label>Google Plus URL</label>
                            </td>
                            <td>
                                <input value="<?php echo $results['gp']; ?>" type="text" name="googleplus" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Google Plus Logo</label>
                            </td>
                            <td>
                                <input type="file" name="googleplusl" class="medium" />
                            </td>
                        </tr><tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $results['gpimg']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
                           </tr>
						 <tr>
                            <td></td>
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