<?php
$conn = mysqli_connect("localhost:3307", "root", "");
mysqli_select_db($conn, "college");
$name = trim($_POST['paperid']);
$email = trim($_POST['title']);
$pswd = md5(trim($_POST['author']));
$contact = (int)trim($_POST['phone']);

$qryl = "select * from student_details where emailid='$email'";
$raw = mysqli_query($conn, $qryl);
$count = mysqli_num_rows($raw);
if ($count > 0) {
    $response = "exist";
} else {
    $qry2 = "INSERT INTO `student_details` (`name`, `emailid`, `password`, `contact`)
             VALUES ('$name', '$email', '$pswd', '$contact');";
    $res = mysqli_query($conn, $qry2);
    if ($res == true)
        $response = "inserted";
    else
        $response = "failed";
}

echo $response;
?>
