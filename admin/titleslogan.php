<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
      
        <?php
            $qu="select * from tab_header where id=1";
              $resu=$db->select($qu);
            if(!empty($resu)){
              $header=  $resu->fetch_assoc(); 
            }
            ?>    
        <?php if($_SERVER['REQUEST_METHOD']=='POST'){
               $title=$_POST['title'];
               $slogan=$_POST['slogan'];
               $discription=$_POST['discription'];
               if($title==''||$slogan==''||$discription==''){
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
  
    
     $qur="update tab_header set  
     sg='$slogan',
     title='$title',
     wd='$discription',
     img='$unicName'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($tmp_name,$uploadfile);
        $delete= "upload/".$header['img'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } else{
        
        
        $qur="update tab_header set  
     sg='$slogan',
     title='$title',
     wd='$discription'
     where id=1
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
        
        
        
    }
    
    
    
    }
           }} ?>
		
            <div class="box round first grid">
                <h2>Update header</h2><?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block sloginblock">  
                
                               <?php
            $qu="select * from tab_header where id=1";
              $resu=$db->select($qu);
            if(!empty($resu)){
              $header=  $resu->fetch_assoc(); 
            }
            ?>             
                 <form method="post" enctype="multipart/form-data" action="">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input value="<?php echo $header['title'] ?>" type="text" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input value="<?php echo $header['sg'] ?>"  type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Website discription</label>
                            </td>
                            <td>
                                <input value="<?php echo $header['wd'] ?>"  type="text" placeholder="Enter Website discription..."  name="discription" class="medium" />
                            </td>
                        </tr>
						   <tr>
                            <td>
                                <label>logo upload</label>
                            </td>
                            <td>
                                <input  type="file"  name="image" class="medium" />
                            </td>
                        </tr>
						 <tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $header['img']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
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
       <?php include "inc/footer.php"; ?>