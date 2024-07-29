<?php
$ID_No = $_POST['ID_No'];
$Medical_No = $_POST['Medical_No'];
$First_Name = $_POST['First_Name'];
$Username = $_POST['Username'];
$Passcord = $_POST['Passcord'];

//Database connection
    $conn = new mysqli("phpmyadmin", "root", "", "register");

    if ($conn->connect_error){
        die("Connection Failed : " . $conn->connect_error);
    }
else{
    $stmt = $conn->prepare("INSERT INTO registration(ID_No, Medical_No, First_Name, Username, Passcord)
       values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss",$ID_No, $Medical_No, $First_Name, $Username, $Passcord);
    $stmt->execute();
    echo "Registration successful...";
    $stmt->close();
    $conn->close();
}
else{
    echo "All fields are required";
    die();
}
?>