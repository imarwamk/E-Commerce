<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category_id =$_POST['category_id'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insert record
            $sql = "INSERT INTO products (name, price, quantity,category_id, image) VALUES ('$name', '$price', '$quantity','$category_id', '$image')";
            if (mysqli_query($conn, $sql)) {
                echo "New product added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Invalid file extension.";
    }
}

mysqli_close($conn);
?>

<a href="admin.php">Go back to admin page</a>
