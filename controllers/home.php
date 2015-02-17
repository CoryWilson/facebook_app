<?
  session_start();
  include 'models/view.php';
  include 'models/users.php';
  include 'models/entries.php';
  include 'models/file.php';
  include 'models/fblogin.php';

  $viewmodel = new view();
  $usersmodel = new users();
  $fbloginmodel = new fblogin();
  $filemodel = new file();
  $entriesmodel = new entries();

  if(empty($_GET["action"])){

    $data = $usersmodel->getUsers();
    $viewmodel->getView("views/header.php");
    $viewmodel->getView("views/form.php"); //, $data);
    
  } else{


    if($_GET["action"]=="home"){

      $data = $usersmodel->getUsers();
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php", $data);
      
    } 
      //Facebook Login Happens Here
      else if($_GET["action"]=="loginForm"){

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/form.php");

   } //else if($_GET["action"]=="processLogin"){

    //   $returnedLogin = $loginmodel->checkuser($_POST);  

    //   if($returnedLogin){
    //     $_SESSION["username"] = $_POST["username"];
    //     $_SESSION["loggedin"] = true;
    //   } else{
    //     $_SESSION["username"] = "";
    //     $_SESSION["loggedin"] = false;
    //   }

    //   $data = $returnedLogin;
    //   $viewmodel->getView("views/header.php");
    //   $data = $_SESSION;
    //   $viewmodel->getView("views/profile.php",$data);


    // } 
      else if($_GET["action"]=="checkProfile"){
      $data = $_SESSION;
      $viewmodel->getView("views/loginCheck.php",$data);
      
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/profile.php",$data);
    }
    // } else if($_GET["action"]=="logOut"){

    //   session_destroy();
    //   header('Location: index.php?controller=home');
    //   $viewmodel->getView("views/header.php");
    //   $viewmodel->getView("views/body.php");

    // }
      else if($_GET["action"]=="add"){
      $data = $usersmodel->addUser($_POST["username"],$_POST["password"]);
      $data = $usersmodel->getUsers();
      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/body.php", $data);

    } else if($_GET["action"]=="addForm"){

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/addForm.php");
    } 

      else if($_GET["action"]=="entryForm"){

      $viewmodel->getView("views/header.php");
      $viewmodel->getView("views/form.php");

    } else if($_GET["action"]=="createEntry"){

      $image = $filemodel->upload($_FILES);
      $data = $entriesmodel->addEntries($_POST["title"], $image, $_POST["description"]);
      $data = $entriesmodel->getEntries();
      $viewmodel->getView("views/header.php", $data);
      //$viewmodel->getView("views/body.php", $data);

    }
  }

?>
