<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['email']) && isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }
  // b6b25ed278d753e364cde0739626f90fb42f1a4485b474b585a827fce9c3447584a74ed644beff9e9986eaa17846b99bb79524d3ce516617f18f89b1d923c8ae
$headers = 'From: ' . $_POST["name"] . '<' . $_POST["email"] . '>' . "\r\n" .
    'Reply-To: ' . $_POST["email"] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  //
  mail( "kibetamos511@gmail.com", $_POST['subject'], $_POST['message'], $headers );
 
  //      ^
  //  Replace with your email 
}
?>