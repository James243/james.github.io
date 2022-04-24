<?php
include ('DB_Connects.php');
$server_ip = gethostbyname(gethostname());

$stmt = $conn->prepare("SELECT * FROM  image_slide");
$stmt->execute();
$stmt->bind_result($id, $image_path);

$products = array();

while($stmt->fetch()){

    $donnees = array();

	$donnees['id'] = $id;
    $donnees['image_path'] = 'http://' . $server_ip .'/change_your_world/uploads/' . $image_path;

    array_push($products, $donnees);

}

echo json_encode($products);

?>