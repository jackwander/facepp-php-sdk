<!DOCTYPE html>
<html>
<head></head>
<body>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit">
  </form>
</body>
</html>

<?php
include_once 'FppClient.php';

use Fpp\FppClient;

$host = 'https://api-en.faceplusplus.com';
$apiKey = 'bti83moKkhfIh9u2SFhS42CDfU04d4s2';
$apiSecret = 'UiiDRs214YAjk0sWkiSbATOQTTwfdgwH';

$client = new FppClient($apiKey, $apiSecret, $host);


if(isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $data = array(
        'image_file' => $_FILES['image']['tmp_name'],
        'return_landmark' => '1',
        'return_attributes' => 'age,gender'
    );

    $resp = $client->detectFace($data);
    var_dump($resp);
}
?>
