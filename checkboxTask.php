<?php

$todoURL = 'to_do_list.json';
$todoJSON = file_get_contents($todoURL);
$todoJSON__arr = json_decode($todoJSON, true);

$title = $_POST['title'];

$todoJSON__arr[$title]["completed"] = !$todoJSON__arr[$title]["completed"];

file_put_contents($todoURL, json_encode($todoJSON__arr, JSON_PRETTY_PRINT));

header('Location: index.php');

?>