<?php
  require ("../Midturn/data.php");
    $product = getproduct();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
        table
        {
            margin: auto;
            margin-top: 100px;
            border: 1px solid skyblue;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>



<body>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
                    <p>Name</p>
                    <input type="text" name="name" class="form-control" value="" >
                    <p>Image</p>
                    <input type="text" name="image" id="input" class="form-control" value=""  >
                    <p>Price</p>
                    <input type="text" name="price" id="input" class="form-control" value=""  >
                    <p>Oldpice</p>
                    <input type="text" name="oldprice" id="input" class="form-control" value="" >
                    <div class="form-group">
                        <label for="my-select">Category</label>
                        <select id="my-select" class="custom-select" name="category">
                        <option value="Nam">Men</option>
                        <option value="Nu">Women</option>
                        </select>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="addPro" class="btn btn-success">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Dungx</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add
</button>
      </li>
      <li class="nav-item" style="margin-left: 20px;">
      <button class="btn btn-danger">Sort</button>

      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <div class="body">
        <?php
        if (!empty($_POST['addPro']))
        {
          $product['name'] = $_POST['name'];
          $product['image'] =$_POST['image'];
          $product['price'] = $_POST['price'];
          $product['oldprice']=$_POST['oldprice'];
          $product['category'] =$_POST['category'];
          addProduct($product['name'],$product['image'],$product['price'],$product['oldprice'], $product['category']);
          
        // header("Location:display.php");
          
        }
           

          
        ?>
        <h2>Men</h2>
    <table class="table-primary" border="1px">
           <tr>
               <th>ID</th>
               <th>Code</th>
               <th>Name</th>
               <th>Image</th>
               <th>Price</th>
               <th>Old price</th>
               <th>Discount</th>
               <th></th>
           </tr>
        <?php
            
           
            // var_dump($array['phone']);
                foreach($product as $k => $v1){
                  if($v1['category']=='Nam'){
                    echo "<tr>"; 
                    echo "<td>". $v1['id'];
                    echo "</td>";
                    echo "<td>". $v1['code'];
                    echo "</td>";
                    echo "<td>". $v1['name'];
                    echo "</td>";
                    echo "<td><img src='". $v1['image'] ."'>";
                    echo "</td>";
                    echo "<td>". $v1['price']. "đ";
                    echo "</td>";
                    echo "<td>". $v1['oldprice']. "đ";
                    echo "</td>";
                    echo "<td>". ($v1['price']*100)/$v1['oldprice'] ."%";
                    echo "</td>";
                    echo "<td><button class='btn btn-success'>Update</button><button class='btn btn-danger'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                  }
                    }
                    
                   
                
               
               
            
        ?>
       </table>
       <h2>Women</h2>
    <table class="table-primary" border="1px">
           <tr>
               <th>ID</th>
               <th>Code</th>
               <th>Name</th>
               <th>Image</th>
               <th>Price</th>
               <th>Old price</th>
               <th>Discount</th>
               <th></th>
           </tr>
        <?php
            
           
            // var_dump($array['phone']);
                foreach($product as $k => $v1){
                     if($v1['category']=='Nu'){
                    echo "<tr>"; 
                    echo "<td>". $v1['id'];
                    echo "</td>";
                    echo "<td>". $v1['code'];
                    echo "</td>";
                    echo "<td>". $v1['name'];
                    echo "</td>";
                    echo "<td><img src='". $v1['image'] ."'>";
                    echo "</td>";
                    echo "<td>". $v1['price']. "đ";
                    echo "</td>";
                    echo "<td>". $v1['oldprice']. "đ";
                    echo "</td>";
                    echo "<td>". ($v1['price']*100)/$v1['oldprice'] ."%";
                    echo "</td>";
                    echo "<td><button class='btn btn-success'>Update</button><button class='btn btn-danger'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                    }
 
                }   
        ?>
       </table>
    </div>
        </div>
</body>
</html>