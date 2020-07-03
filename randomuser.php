<?php
require 'vendor/autoload.php';
include_once('./dbconfig.php');

$client = new \GuzzleHttp\Client();


$response = $client->request('GET', 'https://randomuser.me/api/');
$body = $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
$user = json_decode($body);
dump($user);

die();

$stmt = $pdo->prepare(' insert into user set 
    user_id= :user_id,
    pass= :pass,
    nick= :nick,
    mail= :mail
');

try {

    for ($i=0; $i < 100; $i++) { 
        $response = $client->request('GET', 'https://randomuser.me/api/');
        $body = $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        $user = json_decode($body,true);

        $stmt->bindParam(':user_id',$user['results'][0]['login']['username']);
        $stmt->bindParam(':pass',$user['results'][0]['login']['password']);
        $stmt->bindParam(':nick',$user['results'][0]['login']['salt']);
        $stmt->bindParam(':mail',$user['results'][0]['email']);

        $res = $stmt->execute();
    }

    



    
} catch (\Throwable $e) {
    echo $e->getMessage().'<br>';
    echo $e->getCode().'<br>';
} 

$res  = $pdo->query(' select * from user ')->fetchAll();
dump($res);


?>