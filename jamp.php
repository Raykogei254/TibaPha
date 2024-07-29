<?php
$ID_No = $_POST['ID_No'];
$Medical_No = $_POST['Medical_No'];
$Full_Name = $_POST['Full_Name'];
$Username = $_POST['Username'];
$Passcord = $_POST['Passcord'];
$Confirm_Passcord = $_POST['Confirm_Passcord'];

if (!empty($ID_No) || !empty($Medical_No) || !empty($Full_Name) || !empty($Username) || !empty($Passcord) || !empty($Confirm_Passcord)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPasscord = "";
    $dbname = "register";

    $conn = new mysqli($host, $dbUsername, $dbPasscord, $dbname);

if (mysqli_connect_error()){
    die('Connection Failed(' . mysqli_connect_error() . ')' . mysqli_connect_error());
}
else{
    $stmt = $conn->prepare("INSERT INTO registration(ID_No, Medical_No, Full_Name, Username, Passcord, Confirm_Passcord)
       values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss",$ID_No, $Medical_No, $Full_Name, $Username, $Passcord, $Confirm_Passcord);
    $stmt->execute();
    echo "Registration successful...";
    $stmt->close();
    $conn->close();
}
}else{
    echo "All fields are required";
    die();
}
?>