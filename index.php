<?php

    include 'models/login.php';
    $loginmodel = new login();


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

/* USE NAMESPACES */
    
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

/*PROCESS*/
    
    //1.Stat Session
    session_start();
    //2.Use app id,secret and redirect url
    $appId = "633874526740520";
    $appSecret = "140368bb97022f6c745fae6cb40abb51";
    $redirectUrl='http://localhost:8888/fblogin';
     
     //3.Initialize application, create helper object and get fb sess
     FacebookSession::setDefaultApplication($appId,$appSecret);
     $helper = new FacebookRedirectLoginHelper($redirectUrl);
     $session = $helper->getSessionFromRedirect();

    //4. if fb sess exists echo name 
        if(isset($session)){
        header('Content-Type: application/json');
            //create request object,execute and capture response
        $request = new FacebookRequest($session, 'GET', '/me');
        // from response get graph object
        $response = $request->execute();
        $graph = $response->getGraphObject(GraphUser::className());
        // use graph object methods to get user details
        $name = $graph->getName();
        $fname = $graph->getFirstName();
        $lname = $graph->getLastName();

        $returnedLogin = $loginmodel->checkuser($fname,$lname);  

        var_dump($_SESSION);

        if($returnedLogin){
            $_SESSION["fname"] = $fname;
            $_SESSION["loggedin"] = true;
        } else{
            $_SESSION["fname"] = $fname;
            $_SESSION["loggedin"] = false;
        }

        //var_dump($graph);

    }else{
        //else echo login
        echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';
    }


?>