<html>
<head>
    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Подати заяви</title>

    <link rel="icon" type="image/png" href="image/book22px.png">
    <link rel="stylesheet" type="text/css" href="libs/slick/slick.css"/>

    <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="libs/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css"/>
    <link rel="stylesheet" type="text/css" href="css/applyforadmission.css"/>


    <meta name="keywords" content="">
    <meta name="description" content="Introductory campaign">
    <meta name="viewport" content="width=device-width"/>
</head>
<body>

 <?php   echo  $navbar; ?> 

 <?php   echo  $sidebar; ?> 

<div class="personal-cabinet-wrapper">
    <div class="form-cont">
        <div class="form-cont-items">
            <div class="form-item put-marks-item" id="popupform">
                <h2 class="form-title wow bounce">Подання заяви на вступ</h2>
                <div class="contee wow flipInY" data-wow-delay="0.5s">

<!--                    <c:if test="${param.alreadyExist == true}">-->
<!--                        <p style="color: orange">Ви вже подали заяву і не можете її змінити.</p>-->
<!--                    </c:if>-->
                    <form class="put-marks-form" method="post"
                          action="submit-apply-admission">
                        <input  style="display: none" name="direction" value="submit-apply-admission">

                        <select class="soflow-color" name="idSpeciality" required>
                            <option value="">Обрати спеціальність</option>
                            <!--            start foreach-->
                             <?php   foreach  ($specialities as $speciality):
                             echo 
                            "
                            <option value='$speciality->id_speciality'>$speciality->name_speciality</option>
                            ";
                             endforeach;   ?> 
                            <!--            end foreach-->
                        </select>
                        <input class="button" type="submit" value="Подати заяви"/>
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