<h2>Добавление студента</h2>
<form action="input.php" method="POST">
    <p>Введите фамилию, имя, отчество: <br>
        <input type="text" name="firstname"/></p>
    <p>Дата рождения: <br>
        <input type="date" name="db" value="<?php echo date('Y-m-d'); ?>"</p>
    <p>Оценка по математике: <br>
        <input type="text" name="math"/></p>
    <p>Оценка по информатике: <br>
        <input type="text" name="inform"/></p>
    <p>Оценка по английскому: <br>
        <input type="text" name="english"/></p>

    <input type="submit" value="Добавить">
</form>