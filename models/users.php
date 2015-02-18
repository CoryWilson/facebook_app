<?

  class users{

    public function getUsers(){

      $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889','root','root');
    
      $sql = "select * from users"; 

      $st = $dbh->prepare($sql);

      $st->execute();
    
      return $st->fetchAll();

    }

    public function updateUser($username, $password, $userid){

      $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889','root','root');
    
      $sql = "update users set 
              username = :username,
              password = :password
              where id = :id"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(":username"=>$username, ":password"=>md5($password), ":id"=>$userid));

    }

    public function getUser($userid){

      $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889','root','root');
    
      $sql = "select * from users where id = :id"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(":id"=>$userid));

      return $st->fetchAll();

    }

    public function addUser($id,$fname,$lname){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "insert into users
              (id,firstname,lastname) values (:id,:fname,:lname)"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(":id"=>$id, ":fname"=>$fname, ":lname"=>$lname ));

    }

    public function deleteUser($userid){
      
      $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889','root','root');
    
      $sql = "delete from users where id = :id"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(":id"=>$userid));
    
    }

  }

?>
