<?php 


class auth
{
    public $r;
    /*
    user data       - hash key-userid
    user id array   - set userid
    login userid array  - set login userid
    logintokens hash - 
    userid -> usercount 
    */

    public $tokens = [];

    public function __construct()
    {
        $redis = new Redis();
        $redis->connect('redis', 6379);
        $redis->auth('password');
        $this->r = $redis;
    }

    public function createToken($id){

        $this->tokens = (array)json_decode($this->r->get("tokens"));
        
        $token = bin2hex(random_bytes(64));
        date_default_timezone_set('Asia/Kolkata');
        $expire = strtotime("+20 minutes",time());
        $this->tokens[$id] = array($token, "admin",$expire) ; 

        $this->r->set("tokens",json_encode($this->tokens));
      
        // echo json_encode($this->tokens);
        return $token;  
    }
    public function verifyToken($a){
        $this->tokens = (array)json_decode($this->r->get("tokens"));
        // echo json_encode($this->tokens);

        foreach($this->tokens as $i => $b){
            
           if($a == $b[0]){
               date_default_timezone_set('Asia/Kolkata');
                $time = time();
                
               
                if($b[2] > $time ){
                $com = ["status"=>0,
                        "msg"=>"valid token"];
                return $com;
                }
                else 
                {    
                        $this->removeToken($i);
                        $com = ["status"=>1,
                            "msg"=>"token exipre",
                            "a"=> $time,
                            "b"=> $b[2],
                        ];
                         return $com;
                }
           }

        }
        
        $com = ["status"=>1,"msg"=>"token invalid"
        ,"user"=> $this->tokens];
        return $com;
    }
    public function removeToken($id){
        $this->tokens = (array)json_decode($this->r->get("tokens"));
        unset($this->tokens[$id]);
        // echo json_encode($this->tokens);
        $this->r->set("tokens",json_encode($this->tokens));
    }
    

    public function s()
    {
        return  (array)json_decode($this->r->get("tokens"));
    }
    public function login($username,$password)
    {   
        $user = $this->r->smembers("user");
        foreach($user as $i){
            if($this->r->hget($i,"username") == $username){
                if($this->r->hget($i,"password") == $password){
                   
                    $this->r->set("online_count",0);
                    $this->r->incr("online_count");
                    $this->r->sadd("login",$i);
                    $token = $this->createToken($i);
                    $ex = $this->s();
                        $com = ["status"=>0,
                        "msg"=>"Login sucessfully",
                        "token" => $token,
                        "id" => $i,
                        "extra" => $ex ];

                        return $com;
                }else{
                    //message password incorrect
                    $com = ["status"=>1,
                    "msg"=>"password incorrect"
               ];
                    return $com;
                }
            }
        }
        //message Username not Found 
        $com = ["status"=>1,
                    "msg"=>"Username not Found "
                ];
                    return $com;
        
    }

    public function logout($id)
    {   
        // if($this->r)
        $this->r->srem("login",$id);
        $this->r->decr("online_count");
        $this->removeToken($id);

        $com = ["status"=>0,
                "msg"=>"Logout sucessfully",
            "id"=>$id];

        
        return $com;
    }
    public function signup($arr)
    {  
        
        
        // $id =  1;
        $this->r->incr("user_count");
        $id =  $this->r->get("user_count");


        $t =  $this->createToken(1);
        $request = json_decode(file_get_contents("http://files/index.php?op=dc&token=".$t."&username=admin&path=/".$arr["username"]));
        $this->removeToken(1);

        $this->r->sadd("user",$id);
            $this->r->hmset($id,$arr);

        if($request->status == 0 ){
            $this->r->sadd("user",$id);
            $this->r->hmset($id,$arr);
            $com = ["status"=>0,
                        "msg"=>"signup sucessfully",
                        "r"=>$request];
    
            return $com;

        }else if($request->status == 4 ){
            $com = ["status"=>1,
                    "msg"=>"username alredy exists",
                    "r"=>$request];
        // ];
            return $com;
        }
        $com = ["status"=>1,
                    "msg"=>"there was a sever error can't create a user account",
                    "r"=>$request];
        
            return $com;

    
    }
    public function users()
    {
        $user = $this->r->smembers("user");
        $data = [];
        foreach($user as $a){
            $data[$a] = $this->r->hgetall($a);
           
        }
        return $data;
    }
    public function edituser($id,$col,$val)
    {
        $this->r->hset($id,$col,$val);
        $com = ["status"=>0,
                "msg"=>"edituser sucessfully"];
        return $com;
        // print_r( $this->r->hgetall($id));
    }
    public function removeuser($id)
    { 
        // print_r( $this->r->hgetall($id));
        if($id != 1){
        $this->r->srem("user",$id);
        $arr = (array) $this->r->hgetall($id);
        $this->r->del($id);
        $arr2 = (array) $this->r->hgetall($id);
        $t =  $this->createToken(1);
        $request = json_decode(file_get_contents("http://files/index.php?op=dr&token=".$t."&username=admin&path=/".$arr["username"]));
        $this->removeToken(1);
        $com = ["status"=>0,
                "msg"=>"removeuser sucessfully",
                "res"=>$request,
                "arr"=>$arr,
                "arr2"=>$arr2,
                
                "t"=>$t,
                
            
        ];
        return $com;
    }
    $com = ["status"=>1,
                "msg"=>"admin can't be removed",
                
               
               
                
            
        ];
        return $com;
        
    }
    public function all()
    { $data = [];
        for ($i=0; $i < 10; $i++) { 
         $data[] =  $this->r->hgetall($i);
    }
    return $data;
       
    }
    public function cleanAll(){

        $user = $this->r->smembers("user");
        $deleted_id = [];
    //     for ($i=0; $i < 100; $i++) { 
    //         if($i != 1){
    //                     $this->r->del($i);
    //                     $this->removeToken($i);
    //                     $deleted_id[] = $i;
    //                 }
    //    }
    
        foreach($user as $a){
            if($a != 1){
                $this->removeuser($a);
                $deleted_id[] = $a;
            }
        }
        $this->r->del("user");
        $this->r->sadd("user",1);
        $this->r->set("online_count",1);
        $this->r->set("user_count",1);
        $dan = $this->r->hgetall("1");
    $useraa=$this->users();
        

        $com = ["status"=>0,
        "msg"=>"removeuser sucessfully",
                "id"=>$user,
                "ids"=>$this->r->smembers("user"),
                "user"=>$useraa,
                "users"=>$this->users(),
                "online_count"=>$this->r->get("online_count"),  
                "user_count"=>$this->r->get("user_count"),  
                "deleted_id"=>$deleted_id,
                "admin"=> $dan,
                "admin1"=>$this->r->hgetall(1),


                "tokens"=>$this->r->get("tokens"),        
    
];
return $com;
       
    }

}



?>