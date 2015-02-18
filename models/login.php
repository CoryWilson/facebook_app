<?

  class login{

    public function checkuser($id,$fname,$lname){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "select id, firstname, lastname from users where
      			id = :id and firstname = :fname and lastname = :lname"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(':id'=>$id, ':fname'=>$fname,
      					 ':lname'=>$lname));

      return $st->fetchAll();

    }

  }

?>
