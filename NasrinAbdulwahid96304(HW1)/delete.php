<?php
$Id = $_GET['id'];

$connection = mysqli_connect("localhost","root","","php_test");
//Before Deleting any data from DB, at the first we need to remove file then folder.
$sql1="SELECT * FROM users_tbl WHERE user_id='$Id'";
$result=mysqli_query($connection,$sql1);
$row=mysqli_fetch_assoc($result);

$folder="uploader/".$row['name'];
//echo $folder;
$file=$row['picture'];
//echo $file;
unlink($file);
rmdir($folder);

$sql="DELETE FROM users_tbl WHERE user_id='$Id'";
mysqli_query($connection,$sql);

header("location:user_list.php?Delete=OK");
