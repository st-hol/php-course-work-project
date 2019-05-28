<section class="page1">
    <a name="top"></a>
    <div class="wraper">
        <div id="bgndVideo" class="player"
             data-property="{
				videoURL: 'https://www.youtube.com/watch?v=kkOhi5TCuoM',
				containment: '.page1',
				autoPlay:true,
				mute:true,
				startAt:0,
				opacity:1
			}"></div>


        <div class="logo-div">
            <p class="exc wow zoomInLeft">Introductory</p>
            <p class="wow zoomInRight">Campaign</p>
        </div>

    </div>
    <!--wtf refactor that-->
    <br><br><br><br><br><br><br><br><br><br><br><br>


    <h1 class="some-text wow bounceInDown" data-wow-delay="1s">
        Go through the exams and enter the desired university!
    </h1>
    <br>
<!--    <a href="view/guest/registration.php">-->
    <a href="reg-me">
        <button class="sign-up wow bounceInUp" data-wow-delay="1.5s">Sign up</button>
    </a>


</section>

<section class="page2">
    <a name="about"></a>
    <h2 class="about-title wow slideInDown">List of specialties</h2>
    <img src="image/line-gray.jpg" class="line-gray">



    <div class="about-cont">
        <div class="abouts">
            <div class="about-item wow slideInUp" data-wow-delay="0.5s">
                <ul>
                    <!--  start foreach-->
                    {{ [[ ($specialities as $speciality):
                    >>>
                    "
                    <li>$speciality->name_speciality</li>
                    ";
                    ]] }}
                    <!--   end foreach-->
                </ul>
            </div>
        </div>
    </div>


</section>

<section class="page3">
    <a name="best"></a>
    <hr>
    <h2 class="why-title wow slideInDown">Required to do</h2>
    <img src="image/line-gray.jpg" class="line-why">
    <br>
    <div class="why_container">
        <div class="whyes">
            <div class="why_item wow zoomInLeft" data-wow-delay="1s">
                <a href="#" class="container-img animated infinite pulse"><img class="why-images"
                                                                               src="image/why/44.png"
                                                                               alt=""/></a>
                <p class="svg-title">Registrate for exams</p>
            </div>

            <div class="why_item wow zoomInLeft" data-wow-delay="2s">
                <a href="#" class="container-img animated infinite pulse"><img class="why-images"
                                                                               src="image/why/33.png"
                                                                               alt=""/></a>
                <p class="svg-title">Choose speciality</p>
            </div>

            <div class="why_item wow zoomInRight" data-wow-delay="3s">
                <a href="#" class="container-img animated infinite pulse">
                    <img class="why-images"
                         src="image/why/66.png"
                         alt=""/></a>

                <p class="svg-title">Wait for result</p>
            </div>
        </div>
    </div>

</section>


<section class="page3-4">
    <a name="team"></a>
    <!-- <hr> -->
    <h2 class="person-title wow slideInDown">Service roles</h2>
    <img src="image/line-gray.jpg" class="line-why">
    <div class="person-cont">

        <div class="person-slider wow zoomIn" data-wow-delay="0.7s">

            <div class="person-item" data-wow-delay="0.5s">
                <img src="image/person/p3.png" class="person-item-img">
                <p class="person-item-p"><strong>ADMIN</strong> - puts grades for exams</p>
            </div>
            <div class="person-item" data-wow-delay="1.5s">
                <img src="image/person/p1.png" class="person-item-img">
                <p class="person-item-p"><strong>GUEST</strong> - not authorized user</p>
            </div>
            <div class="person-item" data-wow-delay="1.5s">
                <img src="image/person/p2.png" class="person-item-img">
                <p class="person-item-p"><strong>STUDENT</strong> - registers for exams</p>
            </div>

        </div>

    </div>

</section>


<hr>
<footer class="clearfix">
    <div class="footerBlock">
        <p class="footerSlogan">
            &#169; Introductory Campaign
           since 2019
        </p>
        <div class="share">
            <button class="shareBtn"><img class="shareIcon"
                                          src="image/icons/005-facebook.png"/>
            </button>
            <button class="shareBtn"><img class="shareIcon"
                                          src="image/icons/004-vk.png"/></button>
            <button class="shareBtn"><img class="shareIcon"
                                          src="image/icons/002-twitter.png"/>
            </button>
            <button class="shareBtn"><img class="shareIcon"
                                          src="image/icons/001-google-plus.png"/>
            </button>
            <button class="shareBtn"><img class="shareIcon"
                                          src="image/icons/003-youtube.png"/>
            </button>
        </div>
<!--        <div class="copyright">підпишись на нас!</div>-->
    </div>
</footer>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>


<!-- SCRIPTS -->
<script src="libs/jquery-1.11.2.min.js"></script>
<script src="libs/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script src="libs/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".player").mb_YTPlayer();
    });
</script>
<script src="js/menu.js"></script>

<script type="text/javascript" src="libs/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="libs/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="js/menu.js"></script>
<!-- SCRIPTS -->

