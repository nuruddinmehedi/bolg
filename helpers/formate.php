<?php
//formate class.......

class formate {
    
   
    
    public function date($date){
        
        return date("F j, Y, g:i A",strtotime($date));
    } 
    
    public function readmore($text, $limit=400){
        $text= $text. " ";
        $text= substr($text,0,$limit);
        $text= substr($text,0,strrpos($text," "));
         $text= $text. "...";
           return  $text;
    }
    
    
    public static function datavaliedation($data){
        $data= trim($data);
        $data= stripcslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
    public function title(){
        $path= $_SERVER['SCRIPT_FILENAME'];
        $title= basename($path,'.php');
        if($title=='index'){
            $title='home -'.TITLE;
        }elseif($title=='contact'){
             $title='contact-'.TITLE;
        }
            return ucwords($title);
        
    }  public function activ(){
        $path= $_SERVER['SCRIPT_FILENAME'];
        $title= basename($path,'.php');
        if($title=='index'){
            $title='home';
        }elseif($title=='contact'){
             $title='contact';
        }
            return $title;
        
    }
    public function passcheck($userid,$pass){
         $qure="select * from tab_user where id= '$userid' and password= '$pass'";
         $db= new Database;
    $result= $db->select($qure);
      
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }
}
?>