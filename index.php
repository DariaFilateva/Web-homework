<html>
<script src="https://yandex.st/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
    .hover {
        background-color: rgba(206, 241, 247, 0.18);
    }
</style>

<script>
    $(document).ready(function () { //Стартует по загрузке
        $('#students td').click(function () {// Запускаем по клику на ячейке.
            //Узнаем индекс строки + индекс ячейки таблицы
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());
            alert('Row: ' + row + ', Column: ' + col);
            alert('id '+ $('#students tr:eq(' + row + ') td:eq(' + 0 + ')').html());

        });
        $('#students tr').mouseover(function () {
            $(this).addClass('hover');
        });
        $('#students tr').mouseout(function () {

            $(this).removeClass('hover');

        });
        $('#students .id_student').each(function()
        {
            alert($(this).html());
        });

    });
</script>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Студенты</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="/js/hltable.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <script type="text/javascript">
        highlight_Table_Rows("color_table", "hover_Row", "clicked_Row");
    </script>
    <![endif]-->
</head>
<body>
<header class="intro-header" style="background-image: url('img/caralog10.jpg')">
    <div class="container overlay">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>Лабораторная работа</h1>
                    <hr class="small">
                    <span class="subheading">База данных Студенты</span>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        table th {
            background-color: aliceblue;
            text-align: center;
            border: 2px solid lightgray;
            padding: 5px;
        }

        table tr {
            text-align: center;

            padding: 30px;
        }

        td {
            border: 2px solid lightgray;
            padding: 5px;
            padding-right: 30px;
        }

        .hover_Row {
            background-color: yellow !important;

        }

        .clicked_Row {
            background-color: lightgreen !important;
        }
    </style>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Задача: </h1>
            <p>Создать базу данных, содержащую таблицу Студенты с полями: ФИО, дата рождения, оценка по математике,
                информатике и английскому. Вывести содержимое на веб-страницу. </p>

            <table class='st' id='students' cellpadding="5">
                <tr>
                    <th align="center">ФИО</th>
                    <th>Дата рождения</th>
                    <th>Оценка по математике</th>
                    <th>Оценка по информатике</th>
                    <th>Оценка по иностранному языку</th>
                </tr>

                <?php

                $mysqli = new mysqli("localhost", "root", "root", "students") or die("Ошибка " . mysqli($link));

                $getStudentsQuery = $mysqli->prepare('SELECT `FIO`,`birthday`,`math`,`inform`,`english`,`id_student` FROM `students`');
                $getStudentsQuery->bind_result($FIO, $birthday,
                    $math, $inform, $english, $id);

                $getStudentsQuery->execute();

                while ($getStudentsQuery->fetch()) {

                    echo "<tr>
            <td id='id_student' hidden='hidden'>$id</td>
			<td>$FIO</td>
			<td>" . date('d.m.Y', strtotime($birthday)) . "</td>
			<td>$math</td>
			<td>$inform</td>
			<td>$english</td>
			</tr>";
                }

                $getStudentsQuery->close();
                $mysqli->close();

                ?>
            </table>
            <br>

            <script>
                $('#color_table tr').each(function () {
                    $studentId = $(this).find(".id_student").html();
                });
            </script>
            <?php echo $studentId; ?>

            <form>
                <input type="button" value="Добавить студента" onClick='location.href="addStudent.php"'>
                <input type="button" value="Удалить студента" onClick='location.href="addStudent.php"'>
            </form>


        </div>

    </div>


</div>


<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="https://github.com/DariaFilateva">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="js/hightlightsTable.js">
    highlight_Table_Rows("color_table", "hover_Row", "clicked_Row");
</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/small-business.min.js"></script>

<!-- Smooth Scroll -->
<script src="js/SmoothScroll.js"></script>
</body>
</html>