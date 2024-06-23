<?php

require_once ('../header.php');

require_once ('../db_connect.php');
?>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color: #f4f4f4;
}

.thumbnail {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

a.btn {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    color: #f4f4f4;
    text-decoration: none;
    border-radius: 5px;
}

a.btn-view {
    background-color: #28a745;
    margin: 5px;
}

a.btn-edit {
    background-color: #ffc107;
    color: #333;
    margin: 5px;
}

a.btn-delete {
    background-color: #dc3545;
    margin: 5px;
}

a.btn:hover {
    opacity: 0.9;
}

img {
    height: 160px;
}

</style>

<div class="container">
    <div class="row mt-2"> 
        <h3 class="text-center">All Students</h3>
    </div>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Class</th>
                <th scope="col">Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <?php 
        
        $sql_student = "SELECT * FROM student WHERE deleted = 'no'";
        $result_student = mysqli_query($conn,$sql_student);

        $std = mysqli_fetch_assoc($result_student);

        $student_name = $std['name'];
        $email = $std['email'];
        $class_name = $std['class_name'];
        $address = $std['address'];
        $time = $std['time'];
        print_r($student_name);
        print_r($email);
        print_r($class_name);
        print_r($address);
        print_r($time);



        
        ?>


        <tbody>
            <tr>
                <th scope="row">2</th>
                <td><img src="https://i.pinimg.com/474x/dd/d1/8a/ddd18a24e555b6b976810ca407dbcc7b.jpg" alt="pincard"></td>
                <td>Buggati Kumari</td>
                <td>buggatiKri@123.com</td>
                <td>America</td>
                <td>Class B</td>
                <td>01:00 AM</td>
                <td>
                    <a href="" class="btn btn-view">View</a>
                    <a href="" class="btn btn-edit">Edit</a>
                    <a href="" class="btn btn-delete" onclick="return confirm('Are you sure want to dlt the photo');">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>