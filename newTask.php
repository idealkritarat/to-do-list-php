<?php
echo '<pre>';

$title = $_POST['title'] ?? false;
$title = trim($title);
$todoURL = 'to_do_list.json';

if($title){
    if(file_exists($todoURL)){
        $todoJSON = file_get_contents($todoURL);
        $todoJSON__arr = json_decode($todoJSON,true);
    } else {
        $todoJSON__arr= [];
    }
    $todoJSON__arr[$title] = ['completed' => false];
    file_put_contents($todoURL, json_encode($todoJSON__arr, JSON_PRETTY_PRINT));
}

header('Location: index.php');
echo '/<pre>';
?>