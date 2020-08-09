<?php 


if ($_POST["newnote"]) {

// include("mail/testmail.php");
include("main.php");
$dbh = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);

$stmt = $dbh->prepare("INSERT INTO `notes`( `note`) VALUES (:note");

                $stmt->bindParam(':note', $_POST['note']);


               


if ($stmt->execute()) {
header("Location: success.html");
}
else{
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Sorry, we are facing a problem now, try again later, thank you');
    window.location.href='http://www.atwa-ict.com';
    </script>");
}
$dbh->close();
}


// if ($_POST["subscriber"]) {

// include("mail/testmail.php");
// $dbh = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);

// $stmt = $dbh->prepare("INSERT INTO `subscribers` (`mail`) VALUES (:email)");

// $stmt->bindParam(':email', $_POST['subscriber']);
               

// if ($stmt->execute()) {
// header("Location: ../index.html");
// }
// else{
// echo "error";
// }
// $dbh->close();
// }


 ?>