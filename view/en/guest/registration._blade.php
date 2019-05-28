<html>
<head>
    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">

    <meta charset="utf-8">
    <title>reg</title>
    <link rel="icon" type="image/png" href="image/book22px.png">
    <link rel="stylesheet" type="text/css" href="libs/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="libs/animate.min.css">
    <meta name="keywords" content="">
    <meta name="description" content="Introductory campaign">
    <meta name="viewport" content="width=device-width"/>
</head>
<body>


<section class="page5">
    <a name="form"></a>
    <div class="form-cont">


        <div class="form-item" id="popupform">
            <h2 class="form-title wow bounce">Sign up for free</h2>
            <div class="contee wow flipInY" data-wow-delay="0.5s">


                <?php //todo check ?>

                <form class="reg-form" method="post" action="registration-action">
                    <input  style="display: none" name="direction" value="registration-action">

                    <input id="login" type="text" name="email" placeholder="ел. пошта" required/>
                    <input id="password" type="password" name="password" placeholder="пароль" required/>

                    <select class="soflow-color" name="role" required>
                        <option value="">Choose role...</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="STUDENT">STUDENT</option>
                    </select>

                    <input type="text" name="firstName" placeholder="ім'я" required><br/>
                    <input type="text" name="lastName" placeholder="прізвище" required> <br/>


                    <div class="form-btn-wrap"><input class="button" type="submit" value="Зареєструватися"></div>


                    <p class="conf-p">By making a request, you agree to the privacy policy and give consent to the processing of personal data.</p>
                </form>


                <br/>
                <div>
                    <a class="to-main" href="">Go to main</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SCRIPTS -->
<script type="text/javascript" src="libs/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="libs/jquery.mask.js"></script>
<script type="text/javascript" src="libs/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!-- SCRIPTS -->


<style>

    .reg-form {
        width: auto;
        min-width: 100%;
    }

    select.soflow-color {
        outline: none;
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
        background-position: 97% center;
        background-repeat: no-repeat;
        border: 1px solid #AAA;
        color: #555;
        font-size: inherit;
        margin: 20px;
        overflow: hidden;
        padding: 5px 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 300px;
    }

    select.soflow-color {

        color: #fff;
        background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(orange, orange 30%, orange);
        background-color: orange;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        padding-left: 15px;
    }
</style>
</body>
</html>

