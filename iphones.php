<?php
session_start();

//Lay danh sach iphone trong session_abort
function getAllIphones()
{
    return isset($_SESSION['iphones']) ? $_SESSION['iphones'] : array();
}

// Lấy chi tiết một iphone dua vao id
function getIphone($iphone_id)
{
    // Lấy danh sách iphone de tim
    $iphones = getAllIphones();
     
    // Duyệt qua từng phần tử, nếu xuất hiện ID giống nhau thì tức là đã tìm thấy iphone
    foreach ($iphones as $item)
    {
        if ($item['iphone_id'] == $iphone_id){
            return $item;
        }
    }
     
    return array();
}
 

// Xóa 
function deleteIphone($iphone_id)
{
    $iphones = getAllIphones();
     
    foreach ($iphones as $key => $item)
    {
        // Đã tìm thấy thì dùng hàm unset để xóa
        if ($item['iphone_id'] == $iphone_id){
            unset($iphones[$key]);
        }
    }
     
    // Cập nhật lại Session
    $_SESSION['iphones'] = $iphones;
     
    return $iphones;
}

// Hàm thêm và sửa 
function updateIphone($iphone_id, $iphone_name, $iphone_image)
{
    // Lấy danh sách 
    $iphones = getAllIphones();
     
    // Khai báo cấu trúc lưu trữ 
    $new_iphone = array(
        'iphone_id' => $iphone_id,
        'iphone_name' => $iphone_name,
        'iphone_image' => $iphone_image
    );
     
    // Trường hợp update
    $is_update_action = false;
    foreach ($iphones as $key => $item)
    {
        if ($item['$iphone_id'] == $iphone_id){
            $iphones[$key] = $new_iphone;
            $is_update_action = true; // khai báo đây là action update
        break;
        }
    }
     
    // Trường hợp add, tứ là $is_update_action = false
    if (!$is_update_action){
        $iphones[] = $new_iphone;
    }
     
    // Cập nhật dữ liệu trong Session
    $_SESSION['iphones'] = $iphones;
     
    return $iphones;
}

// function data(){
//     // Lấy danh sách 
//     $iphones = getAllIphones();
     
//     // Khai báo cấu trúc lưu trữ 
//     $new_iphone1 = array(
//         'iphone_id' => '1',
//         'iphone_name' => 'iphone1',
//         'iphone_image' => 'https://clipart.info/images/ccovers/1505918647iphone-x-png.png'
//     );
//     $iphones[] = $new_iphone1;

//     // $new_iphone2 = array(
//     //     'iphone_id' => "2",
//     //     'iphone_name' => "iphone2",
//     //     'iphone_image' => "https://clipart.info/images/ccovers/1505918647iphone-x-png.png"
//     // );
//     // $iphones[] = $new_iphone2;

//     //Cập nhật dữ liệu trong session
//     $SESSION['iphones'] = $iphones;
//     print_r($_SESSION);

// }


?>