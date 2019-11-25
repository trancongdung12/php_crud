<?php
// Nếu là delete thì thực hiện thao tác này
if (!empty($_POST['delete']))
{
    require ("../session/iphones.php");
    $iphone_id = isset($_POST['iphone_id']) ? $_POST['iphone_id'] : '';
    deleteIphone($iphone_id);
}
 
// Cuối cùng là chuyển hướng về trang danh sách
 header("Location:iphones_list.php");
?>