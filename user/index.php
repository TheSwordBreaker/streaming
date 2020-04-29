<?php

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: GET , POST, OPTIONS, PUT");
// header("Access-Control-Allow-Credentials: true");
// header('Content-Type: application/json');

include_once('main.php');
$auth = new auth();

// $auth->removeToken(2);
// $auth->createToken(3);


// $de = $auth->verifyToken("7e74b38444aa726d8e0f419885a86ace64adeafb6df8ba9c8258898cd32ca3aca9a7fc563da0bcc8bc5c1f1a05f9f89a48740d58182ccb0548829f5929463326");

// echo json_encode($de);

class ca
{
    public $user;
    public $password;
    public $email;
    public $op;
    static $operation = ["verify","login","logout","signup","users","eu","ru"];
   

    public function __construct($arr) {
        $this->user = $arr["user"];
        $this->op = $arr["op"];
        $this->email = $arr["email"];
        $this->password = $arr["password"];
        $this->extra = $arr["extra"];
        $this->id = $arr["id"];
        $this->token = $arr["token"];
        
        
    }
}


if($_REQUEST == $_POST){
$k = new ca($_POST);
}else{
$k = new ca($_GET);  
}
// $k = new ca(["op"=>"ch"]);
// $k = new ca(["user"=>"admin","op"=>"ch","password"=>"","email"=>"","extra"=>""]);

    switch ($k->op) {

        case 's':
            echo json_encode($auth->s());
            break;
        case 'verify':
            // print_r($auth->check());
            echo json_encode($auth->verifyToken($k->token));
            break;

        case 'login':
            echo json_encode($auth->login($k->user,$k->password));
            break;

        case 'logout':

            echo json_encode($auth->logout($k->id));
            break;

        case 'signup':
            echo json_encode($auth->signup(["username"=>$k->user,"password"=>$k->password,"email"=>$k->email]));
            break;

        case 'users':
            echo json_encode($auth->users());
            break;

        case 'eu':
            echo json_encode($auth->edituser(1,"password","raja"));
            break;
            
        case 'ru':
            echo json_encode($auth->removeuser($k->id));
            break;
        case 'clean':
            echo json_encode($auth->cleanAll($k->id));
            break;
        case 'all':
            echo json_encode($auth->all());
            break;
        

        default:
        
    break;
    }



?>