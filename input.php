<?php
$link = mysqli_connect('localhost', 'root', 'root', 'students', '88888');
if ($link == false) {
    die("ERROR" . mysqli_connect_error());
}
$name = htmlentities($_POST['firstname']);
$db = htmlentities($_POST['db']);
$math = htmlentities($_POST['math']);
$inform = htmlentities($_POST['inform']);
$english = htmlentities($_POST['english']);

$sql = "INSERT INTO `students` (`id_student`, `FIO`, `math`, `inform`, `english`, `birthday`) VALUES (NULL, '".$name."', '".$math."', '".$inform."', '".$english."', '".$db."')";
if (mysqli_query($link, $sql)) {
    echo "Студент успешно добавлен!";
} else {
    echo "Ошибка добавления студента:" . mysqli_error($link);
}
mysqli_close($link);

?>

