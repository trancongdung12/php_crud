<?php
require ("../session/iphones.php");
$iphones = getAllIphones();
//Thêm dữ liệu mẫu cho session
// $count = 1;
// if ($count ==1) {
//     $new_iphone1 = array(
//         'iphone_id' => '1',
//         'iphone_name' => 'iphone1',
//         'iphone_image' => 'https://clipart.info/images/ccovers/1505918647iphone-x-png.png'
//     );
// $iphones[] = $new_iphone1;
// $SESSION['iphones'] = $iphones;
// $count++;

// }

        // print_r($_SESSION);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Iphone</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    <style>
    .img{
        width:200px;
        height: 100px;
    }
    .container{
        margin-left:400px;
        margin-top: 50px;
    }
    .btn{
        margin-bottom:20px;
        width:90px;
    }
    </style>
</head>

<body>

<div class="container">
    <a class = "btn btn-danger" href="iphone_add.php">Add</a>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>ID</td>
            <td>Iphone name</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        <?php 
        foreach ($iphones as $item){ ?>
        <tr>
            <td><?php echo $item['iphone_id']; ?></td>
            <td>
                <a href="iphone_add.php?id=<?php echo $item['iphone_id']; ?>"><?php echo $item['iphone_name']; ?></a>
            </td>
            <td><img class = 'img' src='<?php echo $item['iphone_image']; ?>' alt=''></td>";
            <td>
                <form method="post" action="iphone_delete.php">
                    <input type="hidden" value="<?php echo $item['iphone_id']; ?>" name="iphone_id" />
                    <input class='btn btn-primary' onclick="return confirm('Ban co chac muon xoa hay khong?');" type="submit" value="Delete"
                        name="delete" />
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>

</html>