<?php
$data = $_POST['frm'];
//var_dump($data);

$dir="uploader/";
$files="image";

mkdir($dir.$data['name']);
$picname=$_FILES[$files]['name'];
$array= explode(".",$picname);
$ex=end($array);
$newname=rand().".".$ex;
$from=$_FILES[$files]['tmp_name'];
$to=$dir.$data['name']."/".$newname;
move_uploaded_file($from,$to);

$connection=mysqli_connect("localhost","root","","php_test");
$sql="INSERT INTO users_tbl(name,lastname, age, field, picture, comment) VALUES('$data[name]','$data[lastname]','$data[age]','$data[field]','$to','$data[comment]')";
mysqli_query($connection,$sql);

header("location: form.php");