<?php global $post; ?>
<?php the_post(); ?>
<?php define('PPTEST', TRUE);?>
<?php
/** 
* Send a POST requst using cURL 
* @param string $url to request 
* @param array $pp_post values to send 
* @param array $options for cURL 
* @return string 
*/ 
function curl_post($url, array $pp_post = NULL, array $options = array()) 
{ 
    $defaults = array( 
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_FORBID_REUSE => 1, 
        CURLOPT_TIMEOUT => 20, 
        CURLOPT_POSTFIELDS => http_build_query($pp_post) ,
        CURLOPT_SSL_VERIFYHOST => 0            // don't verify ssl 
    ); 

    $ch = curl_init(); 
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch); 
    return $result; 
} 

if ( PPTEST ) {
	$url = 'pilot-payflowlink.paypal.com'; 
} else {
	$url = 'payflowlink.paypal.com'; 
}
$pp_post['PARTNER'] = 'PayPal';
$pp_post['VENDOR'] = 'Physics';
$pp_post['USER'] = 'idieswebmaster';
$pp_post['PWD'] = '*.stars14.*';
$pp_post['TRXTYPE'] = 'S';
$pp_post['AMT'] = 1;
$pp_post['CREATESECURETOKEN'] = 'Y';
$pp_post['SECURETOKENID'] = '6dx3eiki01ccm7wo11yhdnn0yemu1alu';
curl_post($url, $pp_post );

the_content(); 
//<iframe src='https://pilot-payflowlink.paypal.com?SECURETOKEN=.......&SECURETOKENID=........'
//width='490' height='565'border='0' frameborder='0' scrolling='no' allowtransparency='true'></iframe>
?>