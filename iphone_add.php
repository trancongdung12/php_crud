<?php
require ("../session/iphones.php");

$data = array();
$errors = array();
 
// Biến kiểm tra có phải action edit hay không
$is_update_action = false;
 
if (!empty($_GET['id']))
{
    $data = getIphone($_GET['id']);
    $is_update_action  = true;
}
 
// Nếu người dùng click vào nút submit
if (!empty($_POST['add_iphone']))
{
     
    // Lấy thông tin
    $data['iphone_id'] = isset($_POST['id']) ? $_POST['id'] : '';
    $data['iphone_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['iphone_image'] = isset($_POST['image']) ? $_POST['image'] : '';
     
    // Validate
    if (empty($data['iphone_id'])){
        $errors['iphone_id'] = 'Ban chua nhap ID';
    }
     
    if (empty($data['iphone_name'])){
        $errors['iphone_name'] = 'Ban chua nhap name';
    }
     
    if (empty($data['iphone_image'])){
        $errors['iphone_image'] = 'Ban chua nhap link hinh anh';
    }
     
    if (empty($errors)){
        updateIphone($data['iphone_id'], $data['iphone_name'], $data['iphone_image']);
        header("Location:iphones_list.php");
    }
}
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Add</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
        <style>
        .container{
            margin-left:400px;
            margin-top:50px;
        }
        .btn{
        margin-bottom:20px;
        width:90px;
        }
        .form-group{
            width:500px;
        }
        </style>
    </head>
    <body>
    <div class = "container">
        <a  href="iphones_list.php">BACK</a>

        <form method="post">
        <div class="form-group">
            Id
                        <input type="text" class="form-control" name="id" value="<?php echo !empty($data['iphone_id']) ? $data['iphone_id'] : ''; ?>" />
                        <?php echo !empty($errors['iphone_id']) ? $errors['iphone_id'] : ''; ?>
                        </br> 
    
            Iphone Name
                        <input type="text" class="form-control" name="name" value="<?php echo !empty($data['iphone_name']) ? $data['iphone_name'] : ''; ?>" />
                        <?php echo !empty($errors['iphone_name']) ? $errors['iphone_name'] : ''; ?>
                        </br> 

            Image
                        <input type="text" class="form-control" name="image" value="<?php echo !empty($data['iphone_image']) ? $data['iphone_image'] : ''; ?>" />
                        <?php echo !empty($errors['iphone_image']) ? $errors['iphone_image'] : ''; ?>
                        </br> 
        
            <input type="submit" class = "btn btn-primary" name="add_iphone" value="<?php echo ($is_update_action) ? "Cap nhat" : "Them moi"; ?>" /></td>
    </div>    
        </form>


        
    </div>
    </body>
</html>