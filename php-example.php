<html>
<body>
<h1>Inspirations</h1>
<div id="quote">
              <span id="facebook_stuff">
              <div id="profile_pic"><img src="https://graph.facebook.com/683545112/picture" border=”0” /></div>
              
<?php
require 'facebook.php';

// replace “…” with appropriate values
$facebook = new Facebook(array(
 'appId' => '169764986370463',
 'secret' => '00d4339c20216e0a5dda98a5104de1de',
 'cookie' => true,
));
$user = $facebook->api('/683545112');
?><div id="profile_name"><?php echo $user['name'] ?></div>
              </span>
              "When I examine myself and my methods of thought, I come to the conclusion that the gift of fantasy has meant more to me than any talent for abstract, positive thinking." –Albert Einstein
</div>
</body>
</html>
