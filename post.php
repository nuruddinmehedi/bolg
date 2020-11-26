<?php 
include("inc/header.php");

?>
<?php 
if(!isset($_GET['id']) || $_GET['id']==null){

    
 header("Location: 404.php");
} else{
    $id=$_GET['id'] ;
}
?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <?php 
            $qur="select * from tab_post where id=$id";

            $post= $db->select($qur);

            if(!empty($post)) {


                while($result= $post->fetch_assoc()){


            ?>
            
            
            <h2><?php echo $result['title']; ?></h2>
            <h4><?php echo $fm->date($result['date']); ?> </h4>
            <img src="admin/upload/<?php echo $result['img'] ?>">
            <?php echo $result['body'] ?>
            
            <div class="relatedpost clear">
                <h2>Related articles</h2>
                
                
                
               <?php
                $cat=$result['cat'];
                    $qforc="select * from tab_post where cat=$cat and id!=$id limit 6";
                     $catd= $db->select($qforc);

            if(!empty($catd)) {


                while($resultr= $catd->fetch_assoc()){
                
                ?>
                
                
                <a href="post.php?id=<?php echo $resultr['id']; ?>"><img src="admin/upload/<?php echo $resultr['img'] ?>"></a>
                  <?php } }else{

                echo "no related post abalable";

            } ?>
                
                
                <?php } }else{

                header("Location:404.php");

            } ?>

            </div>
        </div>

    </div>




    <?php 
    include("inc/sidebar.php");




    ?>





</div>
<?php 
include_once("inc/footer.php");
?>