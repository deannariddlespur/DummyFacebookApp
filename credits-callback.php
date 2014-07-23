<?php
error_log('running credits-callback.php...');
$app_id = '170669746307500';
$secret = 'c92a1697e73014e11130ef5260649a00';

include_once 'facebook.php';

$facebook = new Facebook(array(
	'appId'		=> $app_id,
	'secret'	=> $secret,
));

$data = array('content' => array());
$request = $facebook->getSignedRequest();

if ($request == null) {
  // handle an unauthenticated request here
}

error_log(var_export($request,true));
error_log('_request: '.var_export($_REQUEST,true));

$payload = $request['credits'];

// retrieve all params passed in
$func = $_REQUEST['method'];
// this is Facebook's id for the order
$order_id = $payload['order_id'];

if ($func == 'payments_status_update') {
	// When the user clicks "Buy Something", this block runs
  	if ($payload['status'] == 'placed') {
    		$data['content']['status'] = 'settled';
  	}
  	$data['content']['order_id'] = $order_id;
} else if ($func == 'payments_get_items') {
	// When the user clicks your link, "Order something..." this block runs
	
	// remove escape characters  
  	$order_info = stripcslashes($payload['order_info']);
  	$item = json_decode($order_info, true);

	// do some database look up here on the id that was just passed in order_info
	// run something like SELECT * FROM table WHERE product_id='$item';
	// now assume we have the data from the database.
	$item = array();
	$item['price'] = 2;
	$item['product_url'] = 'http://facebook.com/dummies';
	$item['image_url'] = 'http://platform.ak.fbcdn.net/www/app_full_proxy.php?app=4949752878&v=1&size=o&cksum=e2e790b093bc8716dfa3702d900dea87&src=http%3A%2F%2Fecx.images-amazon.com%2Fimages%2FI%2F51nymRpKBqL._SL500_AA300_.jpg';
	$item['title'] = 'Something';
	$item['description'] = 'This something is worth everything to everybody!';
  	$data['content'] = array($item);
}

// this just tells Facebook to what method we were just responding
$data['method'] = $func;

error_log('data: '.var_export($data,true));
// send data back to Facebook
echo json_encode($data);
