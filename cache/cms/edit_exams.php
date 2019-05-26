<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 26/05/19
 * Time: 10:59
 */
?>

<html>
<head>
    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>адмінка</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

</head>
<body>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="home" class="navbar-brand">toHome</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="edit-users">Users</a></li>
                <li><a href="edit-exams">Exams</a></li>
                <li><a href="edit-specialities">Specialities</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">


            <!-- Заполнение полей существующих полей -->

            <div class="panel panel-warning">
                <div class="panel-heading">Додати або Змінити</div>
                <div style="background: rgba(350,200, 392, 0.5); color: red;">
                    Ви можете ввести існуючий ID, якщо хочете ЗМІНИТИ запис.
                    <br>
                    Ви можете залищити поле ID пустим(або внести новий ID) якщо хочете ДОДАТИ запис.
                </div>
                <div class="panel-body">

                    <form method="post" class="form-horizontal" action="submit-edit-exam">
                        <input  style="display: none" name="direction" value="submit-edit-exam">
                        <fieldset id="fieldList">
                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                <label for="idSubject" class="col-sm-3 control-label">id</label>
                                <div class="col-sm-9">
                                    <input name="idSubject" type="text" class="form-control" id="idSubject" placeholder="idSubject">
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                <label for="nameSubject" class="col-sm-3 control-label">nameSubject</label>
                                <div class="col-sm-9">
                                    <input name="nameSubject" type="text" class="form-control" id="nameSubject"
                                           placeholder="nameSubject">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning" id="addtotable">Додати запис до таблиці
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Таблица с отображение полей -->
            <div class="panel panel-success">
                <div class="panel-heading">Усі екзамени</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr id="tableHead">
                            <th>id_subject</th>
                            <th>name_subject</th>

                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody id="tableBody">
                        <!--            start foreach-->
                         <?php   foreach  ($exams as $exam):
                         echo 
                        "
                        <tr>
                            <td>$exam->id_subject</td>
                            <td>$exam->name_subject</td>

<!--                            <td><a href=''>&#x270E;</a></td>-->
                            <td><a href='delete-exam/$exam->id_subject'>&times;</a></td>
                        </tr>
                        ";
                         endforeach;   ?> 
                        <!--          end foreach-->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/adminka.js"></script>

</body>
</html>










<!--        <div class="col-md-12"><br/><br/><br/>-->
<!---->
<!--            <h1>Дії над аккаунтами</h1>-->
<!--            <!-- Добавление новых полей -->-->
<!--            <div class="panel panel-primary">-->
<!--                <div class="panel-heading">Видалити / Змінити</div>-->
<!--                <div class="panel-body">-->
<!--                    <div class="form-group">-->
<!---->
<!--                        <form method="post" action="delete-user">-->
<!--                            <div class="input-group">-->
<!--                                <span class="input-group-addon">- Видалити</span>-->
<!--                                <input type="text" class="form-control" id="idStudent" placeholder="id user to delete">-->
<!--                                <span class="input-group-btn">-->
<!--                                <button class="btn btn-primary" type="button" id="createField">Видалити</button>-->
<!--                            </span>-->
<!--                            </div>-->
<!--                        </form>-->
<!---->
<!--                        <form method="post" action="change-user">-->
<!--                            <div class="input-group">-->
<!--                                <span class="input-group-addon">* Змінити</span>-->
<!--                                <input type="text" class="form-control" id="idStudent" placeholder="id user to change">-->
<!--                                <span class="input-group-btn">-->
<!--                                <button class="btn btn-primary" type="button" id="createField">Змінити</button>-->
<!--                            </span>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
