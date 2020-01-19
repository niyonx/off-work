<?php

function echos($var){ //output on another line
    echo "<br/> $var <br/>\n";
}
function pprint($var){ //print as raw
    echo '<pre>';
    print_r($var); 
    echo '</pre>';
}

function isnull($val){

    if (($val===null) || trim($val==='') || empty($val) || (!isset($val)) ){
        return true;
    }
    return false;

}

function random() { //for encryption
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function encrypt($pass){
    for ($i=0; $i < strlen($pass); $i++) { 
        $new_pass.= chr(((ord(substr($pass,$i,1))+($i*5))% 90)+33);
    }
    // foreach(range(33,126) as $i) { 
    //     $new_pass.=chr($i);
    // }
    return $new_pass;
}

function root_url(){ //return root url
    
    // $base_url = 'http://hrm.cybernaptics.xyz/LMS/';

    $base_url='http://'.$_SERVER['SERVER_NAME'].'/';

    return $base_url;

}

function activate_treeview($parent_menu){ //change to active in the sidebar mennu

    $current_url = $_SERVER['REQUEST_URI'];
    $url_contents = explode('/', $current_url); //$url_contents now has an array of elements of $current_url

    // if(in_array($parent_menu, $url_contents) ){

        if ($parent_menu =='LMS' && sizeof($url_contents)==2 ){ //only for dashboard
            return 'class="active"';
        }
        else{
            // return 'active';
            return '';    
        }
    // }
    // return '';
}

function activate_li($submenu){ // change to active in the sidebar menu
    $current_url = $_SERVER['REQUEST_URI'];
    $url_contents = explode('/', $current_url);


    if(in_array($submenu, $url_contents)){ //in_array(value,array)
        return ' class="active"';   
    }
    else{
        return ''; //function must always return a value
    }

}

function base_url()
{
    
    if (isset($_SERVER['HTTP_HOST']))
    {
        $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        $base_url .= '://'. $_SERVER['HTTP_HOST'];
        $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    }
    else
    {
        // $base_url = 'http://hrm.cybernaptics.xyz/';
        // $base_url = 'http://192.168.75.45/';
        $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/';
    }
    return $base_url;
}

function _sinon(&$param, $sinon = '') {
    if (isset($param) && $param)
        return $param;
    else
        return $sinon;
}


class DatabaseMySql
{
    protected $dbserver;
    protected $dbname;
    protected $dbuser;
    protected $dbpass;
    protected $conn;//this variable stores the connection to db
    
    public function __construct($dbserver='localhost', $dbname='LMS', $dbuser='root', $dbpass='password'){
       
        $this->set_config($dbserver
                         ,$dbname
                         ,$dbuser
                         ,$dbpass
                         );
    }
    
    protected function set_config($server,$db,$user,$pass)
    {
        $this->dbserver=$server;
        $this->dbname=$db;
        $this->dbuser=$user;
        $this->dbpass=$pass;
        
    }
    private function connect() //connection with PDO (PHP Data Objects)
    {
        try{
        
            $connStr = sprintf('mysql:host=%s;dbname=%s',$this->dbserver,$this->dbname);
            $this->conn = new PDO($connStr,$this->dbuser,$this->dbpass, array( PDO::ATTR_PERSISTENT => false));
            
        } catch (PDOException $e) {
            print "Error connection to database!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
    private function disconnect() //diconnection
    {
        //mysql_close($this->conn);
        $this->conn = null;
    }
    //Used to execute data manipulation operations like ‘INSERT’, ‘UPDATE’, ‘DELETE’ operations.
    function query($sql)
    {           
        
        try{
            $this->connect();
            $sth = $this->conn->prepare($sql);       
            $res = $sth->execute();
            $this->disconnect();
            return $res;
        }
        catch(PDOException $e){
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    function loadResult($sql) //send command to mysql
    {
        try{
            $this->connect();
            $stmt = $this->conn->prepare($sql); //parses once, executes many times
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); //returns an array indexed by column name as returned in your result set
            $this->disconnect();
            return $res;
        }
        catch(PDOException $e){
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
      
    }
    function loadSingleResult($sql)
    {
        try{
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ); //returns an anonymous object with property names that correspond to the column names returned in your result set
            $this->disconnect();
            return $res;
        }
        catch(PDOException $e){
            print "Error !: " . $e->getMessage() . "<br/>";
            die(); //print what is in () and exit
        }
    }

    /**
     * Quotes a string value for use in query
     * @param  string $str string to be quoted
     * @return string properly quoted string
     */
    public function quoteValue($str){
       
        if(is_int($str) || is_float($str)){
            return $str;
        }
        else{
            $this->connect();
            $value = $this->conn->quote($str);
            return $value;                
        }
    }
}


?>