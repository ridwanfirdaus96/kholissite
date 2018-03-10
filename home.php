<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$variablename = 'foo';
$foo = 'bar';
$data = ["response" => "Hello World"];
echo json_encode($data);
echo '<p>' . $foo . '</p>';
echo ${$variablename};
echo $$variablename;
?>
</body>
</html>

