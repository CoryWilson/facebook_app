<?
session_start();
include 'models/view.php';
//include 'models/fblogin.php';
include 'models/entries.php';
include 'models/file.php';

$viewmodel = new view();
//$fbloginmodel = new fblogin();
$filemodel = new file();
$entriesmodel = new entries();

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

if(isset($session)){
	header('Content-Type: application/json');
	$request = new FacebookRequest($session, 'GET', '/me');
	$response = $request->execute();
	$graph = $response->getGraphObject(GraphUser::className());

	//var_dump($graph);

}	else{

	$link = $helper->getLoginUrl();

	//var_dump($link);

}

if(empty($_GET["action"])){

	//$data = $helper->getLoginUrl();
	$viewmodel->getView("views/header.php",$link);
	$viewmodel->getView("views/form.php"); //, $data);

}	else{

		if($_GET["action"]=="home"){

			//$data = $helper->getLoginUrl();
			$viewmodel->getView("views/header.php",$link);
			$viewmodel->getView("views/body.php");

		} 	//Facebook Login Happens Here
			else if($_GET["action"]=="fbLogin"){

			//$fbloginmodel->goToLogin($appId,$appSecret,$redirectUrl);
			$viewmodel->getView("views/header.php", $data);
			//$viewmodel->getView("views/form.php");

		}	else if($_GET["action"]=="entryForm"){

			$viewmodel->getView("views/header.php");
			$viewmodel->getView("views/form.php");

		} 	else if($_GET["action"]=="createEntry"){

			$image = $filemodel->upload($_FILES);
			$data = $entriesmodel->addEntries($_POST["title"], $image, $_POST["description"]);
			$data = $entriesmodel->getEntries();
			$viewmodel->getView("views/header.php", $data);
			//$viewmodel->getView("views/body.php", $data);

		}	else if($_GET["action"]=="displayEntry"){

			

		}
}

?>
