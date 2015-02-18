<?
session_start();
include 'models/view.php';
include 'models/login.php';
include 'models/entries.php';
include 'models/file.php';
include 'models/users.php';

$viewmodel = new view();
$loginmodel = new login();
$filemodel = new file();
$entriesmodel = new entries();
$usersmodel = new users();

require_once( 'lib/Facebook/FacebookSession.php');
require_once( 'lib/Facebook/FacebookRequest.php' );
require_once( 'lib/Facebook/FacebookResponse.php' );
require_once( 'lib/Facebook/FacebookSDKException.php' );
require_once( 'lib/Facebook/FacebookRequestException.php' );
require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
require_once( 'lib/Facebook/GraphObject.php' );
require_once( 'lib/Facebook/GraphUser.php' );
require_once( 'lib/Facebook/GraphSessionInfo.php' );
require_once( 'lib/Facebook/Entities/AccessToken.php');
require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookCurl;

$appId = "633874526740520";
$appSecret = "140368bb97022f6c745fae6cb40abb51";
$redirectUrl= "http://localhost:8888/facebook_app/";

FacebookSession::setDefaultApplication($appId,$appSecret);
$helper = new FacebookRedirectLoginHelper($redirectUrl);
$session = $helper->getSessionFromRedirect();
$link = $helper->getLoginUrl();

if(isset($session)){
	$request = new FacebookRequest($session, 'GET', '/me');
	$response = $request->execute();
	$graph = $response->getGraphObject(GraphUser::className());
	//var_dump($graph);
	
	$id = $graph->getId();
	$fname = $graph->getFirstName();
	$lname = $graph->getLastName();

	echo $id.$fname.$lname;

	$usersmodel->addUser($id,$fname,$lname);
	$loginmodel->checkuser($id,$fname,$lname);
}


if(empty($_GET["action"])){

	$viewmodel->getView("views/header.php",$link);
	$usersmodel->getUsers();
	$viewmodel->getView("views/form.php"); 
	echo "empty home";

}	else{

		if($_GET["action"]=="home"){

			$viewmodel->getView("views/header.php",$link);
			$usersmodel->getUsers();
			$viewmodel->getView("views/form.php");
			echo "action == home";


		} 	else if($_GET["action"]=="entryForm"){

			$viewmodel->getView("views/header.php");
			$viewmodel->getView("views/form.php");

		} 	else if($_GET["action"]=="createEntry"){

			$image = $filemodel->upload($_FILES);
			$data = $entriesmodel->addEntries($_POST["title"], $image, $_POST["description"]);
			$data = $entriesmodel->getEntries();

		}	else if($_GET["action"]=="displayEntry"){

			$viewmodel->getView("views/header.php");
			$viewmodel->getView("views/entry.php");

		}
}

?>
