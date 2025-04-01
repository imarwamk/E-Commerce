<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon"  type="jpg" href="imag/icon.jpg">

    <style>
      .main {
            padding: 20px;
        }
        .add-product-form {
            margin-bottom: 40px;
        }
        .product-list {
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
        }
        .product-image {
            max-width: 100%;
            height: auto;
        }
        .product-actions {
            margin-top: 10px;
        }
        .product-actions a {
            text-decoration: none;
            color: black;
            margin: 0 10px;
            display: inline-flex;
            align-items: center;
        }
        .product-actions a:hover {
            color: #cf0000;
        }
        .product-actions i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<section id="header">
    <a href="#"><img src="imag/K.png" width="130px" class="logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="pag1.php">Home</a></li>
             <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
         <li><a href="#" class="active" ><i class="fa-solid fa-user" style="color: #535455;"></i></a></li>

        </ul>
    </div>
</section>
<div class="main">
    <div class="add-product-form">
        <h1>Add Product</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="name">Product Name:</label><br>
             <input type="text" name="name" id="name" required><br><br>
        <label for="price">Product Price:</label><br>
            <input type="text" name="price" id="price" required><br><br>
          <label for="quantity">Product Quantity:</label><br>
         <input type="text" name="quantity" id="quantity" required><br><br>
         <label for="category_id">Category ID:</label><br>
         <input type="text" name="category_id" id="category_id" required><br><br>
            <label for="image" class="pim">Product Image:</label><br>
          <input type="file" name="image" id="image" style="display: none;" required><br><br>
            <input type="submit" class="sub" value="Add Product">
        </form>
    </div>

    <div class="product-list">
        <h1>Product List</h1>
        <div class="product-grid">
            <?php
            include('db.php');
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            while ($product = mysqli_fetch_assoc($result)) {
                echo '<div class="product-card">';
             echo '<img src="imag/' . $product['image'] . '" alt="' . $product['name'] . '" class="product-image">';
             echo '<h2>' . $product['name'] . '</h2>';
                echo '<p>Price: SAR ' . $product['price'] . '</p>';
              echo '<p>Quantity: ' . $product['quantity'] . '</p>';
              echo '<p>Category ID: ' . $product['category_id'] . '</p><br>';
                 echo '<div class="product-actions">';
                echo '<a href="edit_product.php?id=' . $product['id'] . '" class="edit"><i class="fas fa-edit"></i>Edit</a>';
                  echo '<a href="delete_product.php?id=' . $product['id'] . '"class="delete"><i class="fas fa-trash"></i>Delete</a>';
                 echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
