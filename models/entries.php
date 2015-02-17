<?

  class entries{

    public function getEntries(){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "select * from info"; 

      $st = $dbh->prepare($sql);

      $st->execute();
    
      return $st->fetchAll();

    }

    public function getEntry($entryId){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "select * from users where id = :id"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(":id"=>$entryId));

      return $st->fetchAll();

    }

    public function addEntries($title, $image, $description){

      $dbh = new PDO('mysql:host=localhost;dbname=facebook;port=8889','root','root');
    
      $sql = "insert into info
              (title, image, description) values (:title, :image, :description)"; 

      $st = $dbh->prepare($sql);

      $st->execute(array(":title"=>$title, ":image"=>$image, ":description"=>$description));

    }

  }

?>
