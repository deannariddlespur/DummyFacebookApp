<html>
<body>
<?php
require 'facebook.php';

// replace “…” with appropriate values
$facebook = new Facebook(array(
 'appId' => '169764986370463',
 'secret' => '00d4339c20216e0a5dda98a5104de1de',
 'cookie' => true,
));

if (!$_GET['uid']) {
	echo 'Failure! You need to pass a uid (with a username or user id) to increment the counter for the Inspirations app.';
	exit;
}

$admintoken = '8665218278|63qRuQs2GceTWSzTjA3bid4mOZk.';
$facebook->api(array(
'method' => 'dashboard.decrementCount',
'uid' => $_GET['uid'],
'access_token' => $admintoken
));
?>
Success!
</body>
</html>
