<?php
$id=$_GET['id'];
//echo $id;
$connection= mysqli_connect("localhost","root","","php_test");
$sql = "SELECT * FROM users_tbl WHERE user_id='$id'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
//var_dump($row);


if(isset($_POST['btn'])){
    $data=$_POST['frm'];
//    var_dump($data);
    $age=1399-$data['age'];
//    echo $age;die();

    if($_FILES['image']['name']){
//        die(sssssssssssss);
        $dir="uploader/";
        $files="image";

        if($data['name']!=$row['name']){
            mkdir($dir.$data['name']);
        }

        $picname=$_FILES[$files]['name'];
        $array= explode(".",$picname);
        $ex=end($array);
        $newname=rand().".".$ex;
        $from=$_FILES[$files]['tmp_name'];
        if($data['name']==$row['name']){
            $to=$dir.$row['name']."/".$newname;
        }
        else{
            $to=$dir.$data['name']."/".$newname;
        }
        move_uploaded_file($from,$to);
    }
    else{
        $to=$row['picture'];
    }

    $sql2="UPDATE users_tbl SET name='$data[name]', lastname='$data[lastname]',age='$age', field='$data[field]', picture='$to', comment='$data[comment]' WHERE user_id=$id";
    mysqli_query($connection,$sql2);
    header("location:edit.php?id=$id");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <table class="main">
        <tr>
            <td class="lable">Name: </td>
            <td class="frmelement">
                <input type="text" name="frm[name]" value="<?php echo $row['name']; ?>">
            </td>
        </tr>
        <tr>
            <td class="lable">Lastname: </td>
            <td class="frmelement">
                <input type="text" name="frm[lastname]" value="<?php echo $row['lastname']; ?>">
            </td>
        </tr>
        <tr>
            <td class="lable">Birthday: </td>
            <td class="frmelement">
                <input type="number" name="frm[age]" value="<?php $row1=1399-$row['age']; echo $row1; ?>">
            </td>
        </tr>
        <tr>
            <td class="lable">Field: </td>
            <td class="frmelement">
                <select name="frm[field]">
                    <option value="group1" <?php if($row['field']=='group1'){echo 'selected';} ?>>Group1</option>
                    <option value="group2" <?php if($row['field']=='group2'){echo 'selected';} ?>>Group2</option>
                    <option value="group3" <?php if($row['field']=='group3'){echo 'selected';} ?>>Group3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable">Picture: </td>
            <td class="frmelement">
                <input type="file" name="image">
                <img src="<?php echo $row['picture'] ?>" width="30" align="left">
            </td>
        </tr>
        <tr>
            <td class="lable">Comment: </td>
            <td class="frmelement">
                <textarea name="frm[comment]"><?php echo $row['comment']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="frmbtn" colspan="2">
                <input type="submit" name="btn" value="Update">
            </td>
        </tr>
    </table>
</form>
</body>
</html>

