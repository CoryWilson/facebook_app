<?

  class login{

    public function checkuser($user){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "select id, firstname, lastname from users where
      			id = :id and firstname = :fname and lastname = :lname"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(':id'=>$user['id'], ':fname'=>$user['first_name'],
      					 ':lname'=>$user['last_name']));

      return $st->fetchAll();

    }

  }

?>
