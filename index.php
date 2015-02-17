<?
  if(!empty($_GET["controller"])){
    if($_GET["controller"]=="home"){
      include 'controllers/home.php';
    } else{
      include 'controllers/home.php';
    }
  } else{
    include 'controllers/home.php';
  }

?>

