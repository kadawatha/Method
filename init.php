


<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','gallery_db');



class Database{

    public $connection;

    function __construct() {
        $this->open_db_connection();
    }





    public function open_db_connection(){

        $this->connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if($this->connection->connect_errno) {

            die("Database filed boy try again". mysqli_error());

        }

    }


    public function query($sql){

        $result = mysqli_query($this->connection,$sql);

        return $result;

    }

    private function confirm_query($result){

        if (!result) {
            # code...
            die("query connection die");
        }

    }




// escape variables for security
    public function escape_string($string){


        $escaped_string = mysqli_real_escape_string($this->connection,$string);
        return $escaped_string;


    }


    public function the_insert_id(){
        return mysqli_insert_id($this->connection);
    }





}

$database = new Database();








class db_object

{




    public static function find_all() {
        return static::find_by_query( "SELECT * FROM ".static::$db_table. " ");
    }

    public static function find_by_id($id) {
        global $database;
        $the_result_array = static::find_by_query( "select * from " .static::$db_table. " where id = $id LIMIT 1" );

        return !empty($the_result_array)? array_shift($the_result_array): false;


    }




    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array=array();

        while ($row=mysqli_fetch_array($result_set)){


            $the_object_array[]=static::instantation($row);

        }

        return $the_object_array;
    }






    public static function instantation($the_record) {

        $calling_class=get_called_class();

        $the_object=new  $calling_class;



        foreach ($the_record as $the_attribute => $value){

            if ($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute=$value;
            }

        }
        return $the_object;
    }




    private function has_the_attribute($the_attribute){

        $object_properties= get_object_vars($this);

        return   array_key_exists($the_attribute,$object_properties);


    }



    protected function properties(){


        $properties=array();


        foreach (static::$db_table_fields as $db_field){

            if (property_exists($this,$db_field)){

                $properties[$db_field]=$this->$db_field;

            }

        }
        return $properties;

    }





    protected function clean_properties(){

        global $database;

        $clean_properties=array();

        foreach ($this->properties() as $key => $value){

            $clean_properties[$key]=$database->escape_string($value);

        }

        return $clean_properties;

    }



    public function save(){

        return isset($this->id)? $this->update():$this->create();


    }







    public function create(){

        global $database;

        $properties=$this->clean_properties();

        $sql="INSERT INTO ".static::$db_table."(". implode(",",array_keys($properties)). ")";
        $sql.="VALUES ('".implode("','",array_values($properties))."')";



        if ($database->query($sql)){

            $this->id =$database->the_insert_id();

            return true;

        }else{

            return false;

        }

    }//create method



    public function update(){

        global $database;


        $properties=$this->clean_properties();

        $properties_pairs=array();

        foreach ($properties as $key=> $value){

            $properties_pairs[]="{$key}='{$value}'";

        }


        $sql="UPDATE ".static::$db_table." SET ";
        $sql.=implode(",",$properties_pairs);
        $sql.= " WHERE id= ".$database->escape_string($this->id);

        $database->query($sql);

        return(mysqli_affected_rows($database->connection)==1)? true:false;



    }




    public function delete(){

        global $database;

        $sql="DELETE FROM ".static::$db_table."  ";
        $sql.="WHERE id=" .$database->escape_string($this->id);
        $sql.=" LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection)==1)?true: false;


    }










}










class User extends db_object {

    protected static $db_table="users";
    protected static $db_table_fields=array('username','password','first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;





    public static function varify_user($username,$password){

        global $database;

        $username=$database->escape_string($username);
        $password=$database->escape_string($password);

        $sql="select * from ".self::$db_table." where ";
        $sql .="username='{$username}' ";
        $sql .="AND password='{$password}' ";
        $sql .="LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array)? array_shift($the_result_array): false;



    }

}










class photo extends db_object
{


    protected static $db_table="photos";
    protected static $db_table_fields=array('id','title','caption','description','filename','alternate_text','type','size');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;


    public $tmp_path;
    public $upload_directory="upload";
    public $errors=array();
    public $upload_errors_array=array(
        UPLOAD_ERR_OK=>"ONE",
    );




    public function set_file($file){

        if (empty($file)|| !$file || !is_array($file)){
            $this->errors[]="there was no file uploaded here";
            return false;
        }elseif ($file['error'] !=0){
            $this->errors[]=$this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->filename=basename($file['name']);
            $this->tmp_path=$file['tmp_name'];
            $this->type=$file['type'];
            $this->size=$file['size'];
        }


    }




    public function save()
    {

        if ($this->id){
            $this->update();
        }else{

            if (!empty($this->errors)){
                return false;
            }

            if (empty($this->filename)||empty($this->tmp_path)){
                $this->errors[]="the file was not avaiable";
                return false;
            }

            $target_path='upload/'.$this->filename;

            if (file_exists($target_path)){

                $this->errors[]="";
                return false;
            }


            if (move_uploaded_file($this->tmp_path,$target_path)){
                if ($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }

            $this->create();
        }

    }


    public function delete_photo(){

        if ($this->delete()){

            $target_path='upload/'.$this->filename;

            return unlink($target_path)?true:false;

        }else{

            return false;

        }



    }










}



//
//$user=User::find_by_id(1);
//$user->last_name="williamsss";
//$user->update();
//


//
//$user=Photo::find_by_id(11);
//$user->caption="helloworld";
//$user->update();
//



//
//$user=new User();
//$user->username="crazzyartist";
//$user->save();
//


//
//$user=User::find_by_id(29);
//$user->delete();
//




//
//$users=User::find_all();
//foreach ($users as $user){
//    echo "<br>".$user->password;
//    echo "<br>".$user->username;
//}
//

?>








