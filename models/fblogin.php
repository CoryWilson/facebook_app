<?

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


	class fblogin {

		//echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';
		
		public function goToLogin(){

			$appId = "633874526740520";
		    $appSecret = "140368bb97022f6c745fae6cb40abb51";
		    $redirectUrl= "http://localhost:8888/facebook_app";

			FacebookSession::setDefaultApplication($appId,$appSecret);
			$helper = new FacebookRedirectLoginHelper($redirectUrl);
			$session = $helper->getSessionFromRedirect();

			if(isset($session)){

				header('Content-Type: application/json');
				//create request object,execute and capture response
				$request = new FacebookRequest($session, 'GET', '/me');
				// from response get graph object
				$response = $request->execute();
				$graph = $response->getGraphObject(GraphUser::className());
				// use graph object methods to get user details
				$name = $graph->getName();

				$returnedLogin = $loginmodel->checkuser($name);  

			}

		}

	}

?>
