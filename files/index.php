<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST, OPTIONS, PUT");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
require("main.php");





class ca
{
    public $user;
    public $op;
    public $path;
    public $extra;
    static $operation = ["upload","view","del","rename","dc","dr"];

    public function __construct($arr) {
        $this->user = $arr["user"];
        $this->op = $arr["op"];
        $this->path = $arr["path"];
        $this->extra = $arr["extra"];
        $this->token = $arr["token"];

    }
}


if($_REQUEST == $_POST){
    $k = new ca($_POST);
}else{
    $k = new ca($_GET);  
}

$auth = new files($k->user);

$check = json_decode(file_get_contents("http://auth/index.php?op=verify&token=".$k->token));


if ($check->status == 0) {
//  if(in_array($k->op,ca::$operation))

    switch ($k->op) {
        
        case 'upload':
            echo $auth->fileupload($k->path);
             
            // echo json_encode($_FILES["customFile"]["name"]);
            break;

        case 'view':

            echo $auth->view($k->path);
            break;

        case 'del':

            echo $auth->del($k->path);
            break;

        case 'rename':
            echo $auth->rename_f($k->path, $k->extra);
            break;

        case 'dc':
            echo $auth->dir_create($k->path);
            break;

        case 'dr':
            echo $auth->dir_remove($k->path);
            break;
        case 'download':
            echo $auth->download($k->extra,$k->path);
            break;


        default:
            # code...
            break;
    }
} else {
    echo json_encode("invalid");
}
