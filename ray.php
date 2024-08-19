<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
 header('WWW-Authenticate: Basic realm="My Realm"');
 header('HTTP/1.0 401 Unauthorized');
 echo 'Text to send if user hits Cancel button';
 exit;
}
echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
$user = $_SERVER['PHP_AUTH_USER']; //Lets save the information
echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
$pass = $_SERVER['PHP_AUTH_PW']; //Save the password(optionally add encryption)!
function onLogin($user) {
 $user = $_SERVER['PHP_AUTH_USER']; 
 $cookie = $user . ':' ;
 $mac = hash_hmac('sha256', $cookie, SECRET_KEY);
 $cookie .= ':' . $mac;
 setcookie('rememberme', $cookie);

}
function rememberMe() {
 $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';
 if ($cookie) {
 list ($user,  $mac) = explode(':', $cookie);
 if (!hash_equals(hash_hmac('sha256', $user . ':' . $token, SECRET_KEY), $mac)) {
 return false;
 }
 $usertoken = fetchTokenByUserName($user);
 if (hash_equals($usertoken, $token)) {
 logUserIn($user);
 }
 }

}


?>
<?php
var_dump($_SERVER);

set_time_limit(0); // disable timeout
ob_implicit_flush(); // disable output caching
// Settings
$address = '::1';
$port = 80;
/*
 function socket_create ( int $domain , int $type , int $protocol )
 $domain can be AF_INET, AF_INET6 for IPV6 , AF_UNIX for Local communication protocol
 $protocol can be SOL_TCP, SOL_UDP (TCP/UDP)
 @returns true on success
*/
if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
 echo "Couldn't create socket".socket_strerror(socket_last_error())."\n";
}
/*
 socket_bind ( resource $socket , string $address [, int $port = 0 ] )
 Bind socket to listen to address and port
*/
if (socket_bind($socket, $address, $port) === false) {
 echo "Bind Error ".socket_strerror(socket_last_error($socket)) ."\n";
}
if (socket_listen($socket, 5) === false) {
 echo "Listen Failed ".socket_strerror(socket_last_error($socket)) . "\n";
}
do {
 if (($msgsock = socket_accept($socket)) === false) {
 echo "Error: socket_accept: " . socket_strerror(socket_last_error($socket)) . "\n";
 break;
 }
 /* Send Welcome message. */
 $msg = "\nPHP Websocket \n";
 // Listen to user input
 do {
 if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
 echo "socket read error: ".socket_strerror(socket_last_error($msgsock)) . "\n";

 break 2;
 }
 if (!$buf = trim($buf)) {
 continue;
 }
 // Reply to user with their message
 $talkback = "PHP: You said '$buf'.\n";
 socket_write($msgsock, $talkback, strlen($talkback));
 // Print message in terminal
 echo "$buf\n";

 } while (true);
 socket_close($msgsock);
} while (true);
socket_close($socket);


?>
please don't worry so muchx