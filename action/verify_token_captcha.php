<?php 
$secret = '6LfjTtgpAAAAAObWD0qHIQ6hZ6UmvPm_r39P7xYn'; 
$response = $_POST['response'];  
$remoteip = $_SERVER['REMOTE_ADDR'];  


$data = array(
    'secret' => $secret,
    'response' => $response,
    'remoteip' => $remoteip
);


$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
); 

// URL da API do reCAPTCHA
$url = 'https://www.google.com/recaptcha/api/siteverify';

// Faz a requisição para a API do reCAPTCHA
$response = file_get_contents($url, false, stream_context_create($options));

echo($response);
// Decodifica a resposta JSON

// $result = json_decode($response);

 
?>