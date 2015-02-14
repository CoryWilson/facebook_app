<?

  class login{

    public function checkuser($fname,$lname){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "select firstname, lastname from users where
      			firstname = :first and lastname = :last"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(':first'=>$fname,
      					 ':last'=>$lname));

      return $st->fetchAll();

    }

  }

?>
