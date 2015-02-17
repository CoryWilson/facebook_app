<?

  class file{

    public function upload($up){

    	$uploaddir = './uploads/';
    	$uploadfile = $uploaddir . basename($up['image']['name']);
      $imgUrl = move_uploaded_file($up['image']['tmp_name'], $uploadfile);

      return $imgUrl;
    	
    }

  }

?>
