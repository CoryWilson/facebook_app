<?
	if(isset($_SESSION["loggedin"])){
		if($_SESSION["loggedin"] == false){
			header('Location: index.php?controller=home&action=loginForm');
		}
	} else{
		header('Location: index.php?controller=home&action=loginForm');
	}
?>

