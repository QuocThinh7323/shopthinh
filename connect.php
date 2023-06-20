<?php
class Connect{
    public $server;
    public $user;
    public $password;
    public $dbName;

public function __construct()
{
    $this->server = "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $this->user = "r0otfi5axpg47hc9";
    $this->password = "jaduog30zmgwgtze";
    $this->dbName = "po8zgwlxtoti9j94";
}
//option1 : use mysqli
function connectToMySQl():mysqli{
    $conn_my = new mysqli($this->server,
    $this->user,$this->password,$this->dbName);
    if($conn_my->connect_error){
        die("Failed".$conn_my->connect_error);
    }
    else{
        // echo "Connect!!!!";
    }
    return $conn_my;
}

function connectToPDO():PDO{
    try{
        $conm_pdo = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->user,$this->password);
        $conm_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "ConnecttoPDO";
    }catch(PDOException $e){
        die("Failed $e");
    }
     return $conm_pdo;
 }
}
//test connect
$c = new Connect();
$c->connectToMySQl();

$c = new Connect();
$c->connectToPDO();
?>