<html>
<head>

    <!-- todo change path -->
    <base href="http://localhost/php_course_work_project/">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>"Показати зарахованих"</title>

    <link rel="icon" type="image/png" href="image/book22px.png">
    <link rel="stylesheet" type="text/css" href="libs/slick/slick.css"/>
    <!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->

    <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/sidebar.css"/>
    <link rel="stylesheet" type="text/css" href="css/enrolled-list.css"/>
    <link rel="stylesheet" type="text/css" href="libs/animate.min.css">

    <meta name="keywords" content="">
    <meta name="description" content="Introductory campaign">
    <meta name="viewport" content="width=device-width"/>
</head>
<body>

<?php include "navbar.php" ?>

<?php include "sidebar.php" ?>

<div class="personal-cabinet-wrapper">
    <div class="table-container">
        <table class="responstable" border="1" cellpadding="5" cellspacing="5">
            <tr>
                <th>ід. номер"</th>
                <th>ім'я</th>
                <th>прізвище</th>
                <th>ел. пошта</th>
                <th>рейтинг</th>
            </tr>

            <?php //todo foreach> ?>
            <tr>
                <td>${student.id}</td>
                <td>${student.firstName}</td>
                <td>${student.lastName}</td>
                <td>${student.email}</td>
                <td>${student.rating}</td>
            </tr>
        </table>



    </div>
</div>


<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>








