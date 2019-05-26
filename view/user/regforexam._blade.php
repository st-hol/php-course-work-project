<html>
<head>
    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reg. for exam</title>

    <link rel="icon" type="image/png" href="image/book22px.png">
    <link rel="stylesheet" type="text/css" href="libs/slick/slick.css"/>

    <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="libs/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css"/>
    <link rel="stylesheet" type="text/css" href="css/regforexam.css"/>


    <meta name="keywords" content="">
    <meta name="description" content="Introductory campaign">
    <meta name="viewport" content="width=device-width"/>
</head>
<body>

{{ >>> $navbar;}}

{{ >>> $sidebar;}}


<div class="personal-cabinet-wrapper">
    <div class="form-cont">
        <div class="form-cont-items">
            <div class="form-item put-marks-item" id="popupform">
                <h2 class="form-title wow bounce">Зареєструватися на конкретний екзамен </h2>
                <div class="contee wow flipInY" data-wow-delay="0.5s">


                    <!--                    <c:if test="${param.alreadyExist == true}">-->
                    <!--                        <p style="color: orange">Такий запису уже існує у базі</p>-->
                    <!--                    </c:if>-->
                    <form class="put-marks-form" method="post" action="submit-reg-exam">
                        <input  style="display: none" name="direction" value="submit-reg-exam">

                        <select class="soflow-color" name="examId" required>
                            <option value="">Обрати екзамен...</option>
                            <!--            start foreach-->
                            {{ [[ ($exams as $exam):
                            >>>
                            "
                            <option value='$exam->id_subject'>$exam->name_subject</option>
                            ";
                            ]] }}
                            <!--            end foreach-->

                        </select>


                        <input class="button" type="submit" value="Зареєструватися на екзамен">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="libs/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="libs/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!-- SCRIPTS -->

</body>
</html>