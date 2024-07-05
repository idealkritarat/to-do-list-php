<?php

$todoURL = 'to_do_list.json';
$todoJSON = file_get_contents($todoURL);
$todoJSON__arr = json_decode($todoJSON, true);

$title = $_POST['title'];
unset($todoJSON__arr[$title]);

file_put_contents($todoURL, json_encode($todoJSON__arr, JSON_PRETTY_PRINT));

header('Location: index.php');

?>