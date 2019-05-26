<html>
<head>
    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">

    <meta charset="utf-8">
    <title>Вхід</title>
    <link rel="icon" type="image/png" href="image/book22px.png">
    <link rel="stylesheet" type="text/css" href="libs/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="libs/animate.min.css" type="text/css">
    <meta name="keywords" content="">
    <meta name="description" content="Introductory campaign">
    <meta name="viewport" content="width=device-width"/>
</head>

<body>
<section class="page5">
    <a name="form"></a>
    <div class="form-cont">
        <div class="form-cont-items">

            <div class="form-item" id="popupform">
                <h2 class="form-title wow bounce">Увійти в аккаунт</h2>
                <div class="contee wow flipInY" data-wow-delay="0.5s">

                    <?php //todo check dataValid flag ?>
                    <!--                    <c:if test="${param.dataInvalid == true}">-->
                    <!--                        <p style="color: orange">Некоректні дані. Перевірте їх та спробуйте ще раз.</p>-->
                    <!--                    </c:if>-->
                    <!--                    <c:if test="${param.userExist == false}">-->
                    <!--                        <p style="color: darkred">Такого користувача у базі не існує.</p>-->
                    <!--                    </c:if>-->


                    <form class="form" method="post" id="form-feedback" action="login-action">
                        <input  style="display: none" name="direction" value="login-action">

                        <input id="login" type="text" name="email" placeholder="ел. пошта" required/>

                        <input id="password" type="password" name="password" placeholder="пароль" required/>

                        <div class="form-btn-wrap"><input class="button" type="submit" value="Увійти"></div>

                        <p class="conf-p">Подаючи запит, ви погоджуєтеся з політикою конфіденційності та даєте згоду</p>
                    </form>
                    <div>
                        <a class="to-main" href="">На головну</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SCRIPTS -->
<script src="libs/jquery-1.11.2.min.js"></script>
<script type="/text/javascript" src="libs/jquery.mask.js"></script>
<script src="libs/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!-- SCRIPTS -->
</body>
</html>
