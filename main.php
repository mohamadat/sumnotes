<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "atwa132344";
$dbName = "sumnotes";
// Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbName);

// $conn = new mysqli($servername, $username, $password, $dbName);


// if ($_POST["course"]) {
// 	echo "hoi";
// 	echo $_POST['course'];
// $dbh = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);

// // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $stmt = $dbh->prepare("INSERT INTO `students`( `fname`, `lname`, `email`, `course`) VALUES (:fname, :lname,:email,:course)");

//                 $stmt->bindParam(':fname', $_POST['fname']);
//                 $stmt->bindParam(':lname', $_POST['lname']);
//                 $stmt->bindParam(':course', $_POST['course']);
//                 $stmt->bindParam(':email', $_POST['email']);
               

// if ($stmt->execute()) {
// 	echo "success";
// }
// else{

// }
// $dbh->close();
// }

if ($_POST["course"]) {

include("mail/testmail.php");

$dbh = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);


$stmt = $dbh->prepare("INSERT INTO `students`( `fname`, `lname`, `email`, `course`,`mobile`,`registerdate`) VALUES (:fname, :lname,:email,:course, :mobile, Now())");

                $stmt->bindParam(':fname', $_POST['fname']);
                $stmt->bindParam(':lname', $_POST['lname']);
                $stmt->bindParam(':course', $_POST['course']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':mobile', $_POST['mobile']);

               


if ($stmt->execute()) {
header("Location: ../index.html#Register");
}
else{
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Sorry, we are facing a problem now, try again later, thank you');
    window.location.href='http://www.atwa-ict.com';
    </script>");
}
$dbh->close();
}


if ($_POST["subscriber"]) {

include("mail/testmail.php");
$dbh = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);

$stmt = $dbh->prepare("INSERT INTO `subscribers` (`mail`) VALUES (:email)");

$stmt->bindParam(':email', $_POST['subscriber']);
               

if ($stmt->execute()) {
header("Location: ../index.html");
}
else{
echo "error";
}
$dbh->close();
}


 ?>