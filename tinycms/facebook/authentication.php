<?php
$facebook = new Facebook(array(
  'appId'  => $APIappId,
  'secret' => $APIsecret,
  'cookie' => true
));

$session = $facebook->getSession();

$me = null;
// Session based API call.
if ($session) {
    try {
        $userid = $facebook->getUser();
        $me = $facebook->api('/me');
         } catch (FacebookApiException $e) {
        error_log($e);
    }
}

if ($me){
    $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array(
                'canvas' => 1,
                'fbconnect' => 0,
                'display' => 'page',
                'req_perms' => $req_param,
                'next' => 'http://linkdoo.com/tinycms/index.php?p=user_insert',
                'cancel_url'=> 'http://linkdoo.com/tinycms/index.php'
    ));
   echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
}
?>