<?php
$connection=mysqli_connect("localhost","root","","php_test");
$sql="SELECT * FROM users_tbl";
$result=mysqli_query($connection,$sql);
//$row = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <table class="maintbl">
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Field</th>
            <th>Picture</th>
            <th>Comment</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
//            var_dump($row);

            ?>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['lastname']?></td>
                <td><?php echo $row['age']?></td>
                <td><?php echo $row['field']?></td>
                <td><img src="<?php echo $row['picture']?>" height="30"></td>
                <td><?php echo $row['comment']?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['user_id']?>">
                    <img src="delete.png" width="30">
                    </a>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $row['user_id']?>">
                        <img src="edit.png" width="30">
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
        <?php if(isset($_GET['Delete'])){ ?>
            <div class="alert">
                <h1>Delete was successfully</h1>
            </div>
        <?php } ?>
</body>
</html>
