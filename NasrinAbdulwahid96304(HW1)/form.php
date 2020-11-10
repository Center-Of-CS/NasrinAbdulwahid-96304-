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
    <form action="process.php" method="post" enctype="multipart/form-data">
        <table class="main">
            <tr>
                <td class="lable">Name: </td>
                <td class="frmelement">
                    <input type="text" name="frm[name]">
                </td>
            </tr>
            <tr>
                <td class="lable">Lastname: </td>
                <td class="frmelement">
                    <input type="text" name="frm[lastname]">
                </td>
            </tr>
            <tr>
                <td class="lable">Age: </td>
                <td class="frmelement">
                    <input type="number" name="frm[age]">
                </td>
            </tr>
            <tr>
                <td class="lable">Field: </td>
                <td class="frmelement">
                    <select name="frm[field]">
                        <option value="group1">Group1</option>
                        <option value="group2">Group2</option>
                        <option value="group3">Group3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="lable">Picture: </td>
                <td class="frmelement">
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td class="lable">Comment: </td>
                <td class="frmelement">
                    <textarea name="frm[comment]"></textarea>
                </td>
            </tr>
            <tr>
                <td class="frmbtn" colspan="2">
                    <input type="submit" name="frm[btn]">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
