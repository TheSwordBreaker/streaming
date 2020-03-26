<?php 
   class files
   {
    
      public $name = "";
      public $root = "";
      public $path = "";
      public static $me = "https://localhost:8103/";

      public function __construct($root)
      {
          $this->root = $root;
          if($root == "admin"){
             $this->path = $root; 
          }else{
            $this->path = "admin/".$root; 
          }
         
          
         
          $this->name = $root; 

      }
      public function download(string $filename = null, string $path = null)
      {
        $targetFilePath = files::$me; 
        $a = $this->path.$path.$filename;
        if(file_exists($a)){

            $targetFilePath .= $a; 
            return json_encode(array("me"=>files::$me,"status"=>0,"msg"=>"All ok","uri"=>$targetFilePath,"a"=>$a));
        }
        

        return json_encode(array("status"=>1,"msg"=>"Sorry, file is not found "+$a,"uri"=>$a));

      }

      public function fileupload($path)
      {
          
        if(!empty($_FILES["customFile"]["name"])){ 
                 
            // File path config 
            $fileName = basename($_FILES["customFile"]["name"]); 
            $targetFilePath = $this->path.$path.$fileName; 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            
            // echo json_encode($targetFilePath);
            // Allow certain file formats 
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg','txt','gif','ppt'); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES["customFile"]["tmp_name"], $targetFilePath)){ 
                    return json_encode(array("status"=>0,"msg"=>"all ok","path"=>$targetFilePath,"extra"=>$this->path));
                }else{ 
                    return json_encode(array("status"=>1,"msg"=>"Sorry, there was an error uploading your file."));
                } 
            }else{ 
                return json_encode(array("status"=>1,"msg"=>"Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload."));
            } 
        } else{
            return json_encode(array("status"=>1,"msg"=>"Sorry, file is empty")); 
        }
      }

      public function del($p)
      { $fname = $this->path."/".$p;
        // echo $p;
        if(file_exists($fname)){
            if( unlink($fname)){
                return json_encode(array("status"=>0,"msg"=>"file deleted"));
            }else
            return json_encode(array("status"=>1,"msg"=>"server error"));
        }
        else
        return json_encode(array("status"=>1,"msg"=>"file not exists"));

      }

      public function rename_f($old,$new)
      {
        $old = $this->path."/".$old;
        $new = $this->path."/".$new;
        // echo $old ;
        // echo "<br>$new";
        if(file_exists($old)){
            if( rename($old,$new)){
                return json_encode(array("status"=>0,"msg"=>"rename done"));
            }else
            return json_encode(array("status"=>1,"msg"=>"server error"));
        }
        else
        return json_encode(array("status"=>1,"msg"=>"file not exists"));
      }

      public function view($a)
      {   

           if($a === 0){
            $path = $this->path ;
            // echo $path;
            return json_encode(scandir($path));
           }else{
            $path = $this->path . $a ;
                // echo $path;
            return json_encode(scandir($path));
      }
    }


      public function dir_create($p)
      {
        $dname = $this->path."/".$p;
        
        if(!is_dir($dname)){
            if( mkdir($dname)){
                return json_encode(array("status"=>0,"msg"=>"Done"));
            }else
            return json_encode(array("status"=>1,"msg"=>"server error"));
        }
        else
        return json_encode(array("status"=>4,"msg"=>"Alerdy exist"));

      }

      public function dir_remove($p)
      {
        $dname = $this->path."/".$p;
        
        if(is_dir($dname)){


            function rmrf($dir) {
                foreach (glob($dir) as $file) {
                    if (is_dir($file)) { 
                        rmrf("$file/*");
                        rmdir($file);
                    } else {
                        unlink($file);
                    }
                }
            }


            rmrf($dname);
            return json_encode(array("status"=>0,"msg"=>"dir deleted"));
           
        }
        else
            return json_encode(array("status"=>1,"msg"=>"dir is not exists"));
      }

      

     

      


      
      
   }

?>