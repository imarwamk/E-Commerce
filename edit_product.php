<?php
include('db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Product not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

       
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
           
            $sql = "UPDATE products SET name='$name', price='$price', quantity='$quantity', image='$image' WHERE id=$product_id";
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
     
        $sql = "UPDATE products SET name='$name', price='$price', quantity='$quantity' WHERE id=$product_id";
    }

    if (mysqli_query($conn, $sql)) {
        header('Location: admin.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon"  type="jpg" href="imag/icon.jpg">

</head>
<body>
<section id="header">
    <a href="#"><img src="imag/K.png" width="130px" class="logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="pag1.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#"><i class="fa-solid fa-user" style="color: #535455;"></i></a></li>
        </ul>
    </div>
</section>
<div class="main">
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" id="name" value="<?php echo $product['name']; ?>" required><br><br>
        <label for="price">Product Price:</label><br>
        <input type="text" name="price" id="price" value="<?php echo $product['price']; ?>" required><br><br>
        <label for="quantity">Product Quantity:</label><br>
        <input type="text" name="quantity" id="quantity" value="<?php echo $product['quantity']; ?>" required><br><br>
        <label for="image" class="pim">Product Image:</label><br>
        <input type="file" name="image" id="image" style="display: none;"><br><br>
        <input type="submit" class="sub" value="Update Product">
    </form>
</div>
</body>
</html>
