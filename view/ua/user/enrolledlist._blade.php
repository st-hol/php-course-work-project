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

{{ >>> $navbar;}}

{{ >>> $sidebar;}}

<div class="personal-cabinet-wrapper">
    <div class="table-container">
        <table class="responstable" border="1" cellpadding="5" cellspacing="5">
            <tr>
                <th>ід. номер</th>
                <th>ім'я</th>
                <th>прізвище</th>
                <th>ел. пошта</th>
                <th>рейтинг</th>
            </tr>
            <!--            start foreach-->
            {{ [[ ($students as $student):
            >>>
            "
            <tr>
                <td>$student->id_student</td>
                <td>$student->first_name</td>
                <td>$student->last_name</td>
                <td>$student->email</td>
                <td>$student->rating</td>
            </tr>
            ";
            ]] }}
            <!--            end foreach-->
        </table>

    </div>
</div>


<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>


<!--<nav>-->
<!--    <ul class="pagination">-->
<!---->
<!--        <c:if test="${currentPage != 1}">-->
<!--            <li class="page-item">-->
<!--                <a class="in-table-link"-->
<!--                   href="list-of-enrolled?page=${currentPage - 1}">-->
<!--                    попер.-->
<!--                </a>-->
<!--            </li>-->
<!--        </c:if>-->
<!---->
<!---->
<!--        <c:forEach begin="1" end="${noOfPages}" var="i">-->
<!--            <c:choose>-->
<!--                <c:when test="${currentPage eq i}">-->
<!--                    <li class="page-item active">-->
<!--                        <a class="in-table-link"-->
<!--                           href="#"> ${i} </a>-->
<!--                    </li>-->
<!--                </c:when>-->
<!--                <c:otherwise>-->
<!--                    <li class="page-item">-->
<!--                        <a class="in-table-link"-->
<!--                           href="list-of-enrolled?page=${i}">${i}</a>-->
<!--                    </li>-->
<!--                </c:otherwise>-->
<!--            </c:choose>-->
<!--        </c:forEach>-->
<!---->
<!---->
<!--        <c:if test="${currentPage lt noOfPages}">-->
<!--            <li class="page-item"><a class="in-table-link"-->
<!--                                     href="list-of-enrolled?page=${currentPage + 1}">-->
<!--                    попер.-->
<!--                </a>-->
<!--            </li>-->
<!--        </c:if>-->
<!--    </ul>-->
<!--</nav>-->

