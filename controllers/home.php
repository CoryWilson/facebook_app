<?
  session_start();
  include 'models/view.php';
  include 'models/users.php';
  include 'models/login.php';

  $viewmodel = new view();
  $usersmodel = new users();
  $loginmodel = new login();

  if(empty($_GET["action"])){

    $data = $usersmodel->getUsers();
    $viewmodel->getView("views/header.php");
    $viewmodel->getView("views/body.php", $data);
    
  } else{


    if($_GET["action"]=="home"){

      $data = $usersmodel->getUsers();
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php", $data);
      
    } 
      //Login Functionality
      else if($_GET["action"]=="loginForm"){

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/form.php");

    } else if($_GET["action"]=="processLogin"){

      $returnedLogin = $loginmodel->checkuser($_POST);  

      if($returnedLogin){
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["loggedin"] = true;
      } else{
        $_SESSION["username"] = "";
        $_SESSION["loggedin"] = false;
      }

      $data = $returnedLogin;
      $viewmodel->getView("views/header.php");
      $data = $_SESSION;
      $viewmodel->getView("views/profile.php",$data);


    } else if($_GET["action"]=="checkProfile"){
      $data = $_SESSION;
      $viewmodel->getView("views/loginCheck.php",$data);
      
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/profile.php",$data);

    } else if($_GET["action"]=="logOut"){

      session_destroy();
      header('Location: index.php?controller=home');
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php");

    }
      /* CRUD */
      //Create
      else if($_GET["action"]=="add"){
      $data = $usersmodel->addUser($_POST["username"],$_POST["password"]);
      $data = $usersmodel->getUsers();
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php", $data);

    } else if($_GET["action"]=="addForm"){

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/addForm.php");

    } 
      //Update
      else if($_GET["action"]=="update"){
      $data = $usersmodel->updateUser($_POST["username"],$_POST["password"],$_GET["id"]);
      $data = $usersmodel->getUsers();
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php", $data);

    } else if($_GET["action"]=="updateForm"){

      $data = $usersmodel->getUser($_GET["id"]);
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/updateForm.php", $data);

    }
      //Delete
      else if($_GET["action"]=="delete"){
      $usersmodel->deleteUser($_GET["id"]);
      $data = $usersmodel->getUsers();
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php", $data);

    } else if($_GET["action"]=="outJSON"){
      
      header("Content-Type: application/json");
      $data = $usersmodel->getUsers();
      echo json_encode($data);

    } else if($_GET["action"]=="weatherForm"){

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/weatherForm.php");

    } else if($_GET["action"]=="weatherProcess"){

      $api_key = "9223f36975c7d646";
      $city = str_replace(' ', '_', $_POST["city"]);
      $state = $_POST["state"];
      $data = file_get_contents("http://api.wunderground.com/api/".$api_key."/geolookup/conditions/q/".$state."/".$city.".json");
      $JSONarr = json_decode($data);

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/checkAPI.php",$JSONarr);

    } 
  }

?>
