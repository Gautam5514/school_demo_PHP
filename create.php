<?php
    require_once('./header.php');

?>


<?php
    include 'db_connect.php';

    if(isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $time = $_POST['time'];
        $class_name = $_POST['class_name'];

        $iamge = $_FILES['image']['name'];
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($iamge);


        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO student (name, email, time, class_name, image) VALUES(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $email, $time, $class_name, $iamge);

            if($stmt->execute()) {
                echo "New student insert successfully";
        } else {
            echo "Error: ". $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading Image.";
    }
    $conn->close();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Student</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: auto;
    overflow: hidden;
    padding: 20px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="datetime-local"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button.btn-submit {
    padding: 10px 15px;
    border: none;
    background-color: #28a745;
    color: #fff;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}

button.btn-submit:hover {
    opacity: 0.9;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Insert New Student</h1>
        <form action="insert_student.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="class_name">Class Name:</label>
                <input type="text" id="class_name" name="class_name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
