<html>
<head>

    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Rate students</title>

    <link rel="icon" type="image/png" href="image/book22px.png">
    <link rel="stylesheet" type="text/css" href="libs/slick/slick.css"/>
    <!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->

    <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="libs/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css"/>
    <link rel="stylesheet" type="text/css" href="css/putmarks.css"/>


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
                <h2 class="form-title wow bounce">Rate certain student</h2>
                <div class="contee wow flipInY" data-wow-delay="0.5s">


                    <!--                    <c:if test="${param.dataInvalid == true}">-->
                    <!--                        <p style="color: orange">Некоректні дані. Перевірте їх та спробуйте ще раз.</p>-->
                    <!--                    </c:if>-->

                    <form class="put-marks-form" method="post"
                          action="put-rate-action">

                        <input  style="display: none" name="direction" value="put-rate-action">

                        <select class="soflow-color" name="idStudent" required>
                            <option value="">Choose student...</option>
                            <!--            start foreach-->
                            {{ [[ ($students as $student):
                            >>>
                            "
                            <option value='$student->id_student'>$student->first_name $student->last_name</option>
                            ";
                            ]] }}
                        </select>

                        <select class="soflow-color" name="idSubject" required>
                            <option value="">Choose exam...</option>
                            <!--            start foreach-->
                            {{ [[ ($exams as $exam):
                            >>>
                            "
                            <option value='$exam->id_subject'>$exam->name_subject</option>
                            ";
                            ]] }}
                            <!--            end foreach-->
                        </select>

                        <input type="text" name="examScore" placeholder="екзаменаційна оцінка"><br/>
                        <input class="button" type="submit" value="оцінити"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>