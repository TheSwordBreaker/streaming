

<?php 

class ca
{
    public $user;
    public $msg;
    public $status;
    public $op;
    public $extra ;
    static $operation = ["ch","login","logout","signup","users","eu","ru"];
   

    public function __construct($arr) {
        $this->user = $arr["user"];
        $this->id = $arr["id"];
        $this->msg  = $arr["msg"];
        $this->status  = $arr["status"];
        $this->extra = $arr["extra"];
    }
}

$check = json_decode(file_get_contents("http://auth/index.php?op=login"));



include("home.php");
// if(!isset($_SESSION["username"])){
//     include("home.php");
//    echo " <script> alert('". $_SESSION['username'] ."');  </script>";
// }else{
//     echo " <script> alert('". $_SESSION['username'] ."');  </script>";
//     include("control.php");

// }


?>