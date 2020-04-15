<?php
session_start();
//$id_user=$_SESSION['user']['id'];
$id_user=1;
include "include.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
    
    
    <?php 
    include 'tete.php';
    ?>

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <?php
        include "entete.php";
        ?>
        <?PHP

        $events=Event_core::afficher_evenement();
        ?>

        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
           
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">
                             <?PHP echo "Events"; ?>
                                                </h2>
            </div>
        </div>

        <!-- Shop -->

        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <!-- Shop Sidebar -->
                        <div class="shop_sidebar">

                            <div class="sidebar_section">

                                <div class="sidebar_title"></div>
                            </div>
                            <div class="sidebar_section filter_by_section">
                                <div class="sidebar_title"></div>
                                <div class="sidebar_subtitle"></div>
                                <div class="filter_price">
                                    <div id="slider-range" class="slider_range"></div>
                                    <p> </p>
                                    <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div class="shop_bar clearfix">

                                <div class="shop_product_count"><span><?php echo $events->rowCount(); ?></span> Events found</div>

                                <div class="shop_sorting">
                                    <span>Search:</span>
                                    <input id="myInput" type="text" placeholder="Search..">
                                </div>
                            </div>

                            <div id="myDIV" class="product_grid">
                                <div class="product_grid_border"></div>

                                <!-- Product Item -->
                                <?php
                                foreach ($events as $event) {
                                    if(Event_core::isLiked($id_user,$event['id_ev']))
                                        $liked=0;
                                    else
                                        $liked=1;
                                    if(Event_core::isParticpated($id_user,$event['id_ev']))
                                    {
                                        $participated=0;
                                    }
                                    else
                                        $participated=1;

                                                ?>
                                                <div class="row">
                                <div id="haifa"  class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="#" tabindex="0"><img src="<?php echo $event['img']; ?>" alt=""></a></div>
                                    <div class="product_content">
                                        <div class="product_price"><a href="#" tabindex="0"><?php echo $event['nom_ev']; ?></a></div>
                                        <div class="product_name">
                                            <div><?php echo $event['description']; ?></div>
                                        </div>
                                    </div>
                                    <?php
                                        if($liked==1)
                                        {
                                          echo ("<a href= '../../core/like.php?iduser=".$id_user."&idevent=".$event['id_ev']."&liked=".$liked."' class='btn btn-primary'> Like </a>") ;
                                        }
                                        else
                                        {
                                           echo ("<a href= '../../core/like.php?iduser=".$id_user."&idevent=".$event['id_ev']."&liked=".$liked."' class='btn btn-danger'> Dislike </a>") ;
                                        }
                                        ?>
                                    <div class="add_cart">
                                        <?php
                                        if($participated==1)
                                        {
                                          echo ("<a href= '../../core/Participer.php?iduser=".$id_user."&idevent=".$event['id_ev']."&participated=".$participated."' class='btn btn-primary'> Participer </a>") ;
                                        }
                                        else
                                        {
                                           echo ("<a href= '../../core/Participer.php?iduser=".$id_user."&idevent=".$event['id_ev']."&participated=".$participated."' class='btn btn-danger'> Annuler Participation </a>") ;
                                        }
                                        ?>
                                    </div>

                                </div>
                                </div>
                                <?php

                            }
                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <!--footer-->
        <?php
        include "pied.php";
        ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/shop_custom.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV #haifa").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>

</html> 