<?php

if(isset($_POST['username'], $_POST['password'])){

    $username   = $_POST['username'];
    $password   = $_POST['password'];
	//1) Hard coded user credentials
    if($username == 'user' && $password == 'user'){
		// 2) Generate session identifier and set as a cookie in the browser
		$sessionIdentifier = base64_encode(openssl_random_pseudo_bytes(32));
		setcookie("sessionID", $sessionIdentifier);
		// 2) Generate the CSRF token and set as a cookie in the browser
        $csrfToken = base64_encode(openssl_random_pseudo_bytes(32));
		setcookie("tokenID", $csrfToken);
        header('Location:form.php');
    } else {
        header('Location:index.php');
    }
}

?>