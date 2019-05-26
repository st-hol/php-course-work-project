<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 26/05/19
 * Time: 10:51
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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/adminka.css"/>
</head>
<body>

<header>
    <hgroup>
        <h1>adminka</h1>
        <a href="#">&larr; visit website</a>
    </hgroup>
</header>

<nav>
    <ul>
        <li><a class="brick users" href="#"><span class='icon ion-person'></span>Users</a></li>
        <li><a class="brick dashboard" href="#"><span class='icon ion-document'></span>Specialities</a></li>
        <li><a class="brick pages" href="#"><span class='icon ion-document'></span>Exams</a></li>
    </ul>
</nav>

<div id="content" class="pages">

    <header>
<!--        <div class="brick identify">-->
<!--            <span class="icon ion-document"></span>-->
<!--        </div>-->

        <div class="brick title">
            <h2>User1</h2>
        </div>

        <div class="brick close">
            <span class="text">Delete</span>
            <span class="icon ion-close"></span>
        </div>


        <div class="brick save">
            <span class="text">Save</span>
            <span class="icon ion-checkmark"></span>
        </div>

    </header>



</div>

<footer>

</footer>

<script type="text/javascript" src="js/adminka.js"></script>

</body>
</html>
