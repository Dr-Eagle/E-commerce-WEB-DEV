<?php
session_start();
    include "include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
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
        <!-- header-->

        <!--body-->
        <div class="formulaire_connexion">
            <div class="container">
			<?php
			foreach($client as $clt){
			if($clt['id_client']==$_GET['id_clt']){
			?>
                <form method="post" action="recuperation/modifier_client.php?id_clt=<?php echo $clt['id_client']; ?>" name="formulaire_inscription">
                    <div class="label pp">
                        <p><img alt="photo de profil" src="<?php echo $clt['image_profil']; ?>" id="image_inscription" /></p>
                        <div class="select_image">
                            <a href="#"><input type="file" name="image_profil" id="url_photo"> Modifier photo</a>
                        </div>

                    </div>
                    <div class="label">
                        <label>Genre</label>
                        <ul class="list-inline">
						<?php 
						if($clt['sexe']=="Masculin"){
						?>
                            <li class="list-inline-item">M <input type="radio" name="sexe" value="Masculin" id="genre_masculin_inscriptioin" onclick="select_mas(); " checked></li>
							<li class="list-inline-item">F <input type="radio" name="sexe" value="Feminin" id="genre_feminin_inscriptioin" onclick="select_fem();"></li>
						<?php
						}
						if($clt['sexe']=="Feminin"){
						?>
                            <li class="list-inline-item">M <input type="radio" name="sexe" value="Masculin" id="genre_masculin_inscriptioin" onclick="select_mas(); " ></li>
							<li class="list-inline-item">F <input type="radio" name="sexe" value="Feminin" id="genre_feminin_inscriptioin" onclick="select_fem();" checked></li>
						<?php
						}
						?>
                        </ul>
                        <div class="clear"></div>
                        <div class=" obligatoire">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <div class="label">
                        <label>Nom</label>
                        <input type="text" name="nom" id="nom_inscription" value="<?php echo $clt['nom']; ?>">
                        <div class="clear"></div>
                        <div class="mot_pass_connexion obligatoire" id="nom_inscription1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <div class="label">
                        <label>Prenom</label>
                        <input type="text" name="prenom" id="prenom_inscription" value="<?php echo $clt['prenom']; ?>">
                        <div class="clear"></div>
                        <div class="mot_pass_connexion obligatoire" id="prenom_inscription1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <div class="label">
                        <label>Email</label>
                        <input type="text" name="email" id="email_inscription" value="<?php echo $clt['email']; ?>">
                        <div class="clear"></div>
                        <div class="mot_pass_connexion obligatoire" id="email_inscription1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <div class="label">
                        <label>Mot de passe</label>
                        <div class="mot-pass-cont">
                            <input type="password" id="mot_pass_inscription" name="mot_de_passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo $clt['mot_de_passe']; ?>">
                            <img id="showOrhide" src="SBS image/icon-eye.png" width="20" />
                            <div class="clear"></div>
                            <div class="mot_pass_connexion obligatoire" id="mot_pass_inscription1">
                                <p>veuillez remplir ce champ</p>
                            </div>
                        </div>

                        <script type="text/javascript">
                            var btn = document.getElementById('showOrhide');
                            btn.onmousedown = showPassword;
                            btn.onmouseup = hidePassword;
                            var mot_pass_inscription = document.getElementById('mot_pass_inscription');


                            function showPassword() {
                                mot_pass_inscription.setAttribute("type", "text");

                                btn.style.opacity = 1;
                            }

                            function hidePassword() {
                                mot_pass_inscription.setAttribute("type", "password");

                                btn.style.opacity = 0.5;
                            }
                        </script>


                    </div>

                    <div class="mot_passe_checker">
                        <div class="mot_checker">
                            <p class="mot_pass_titre"> Votre mot de passe doit remplir ces 4 conditions:</p>
                            <div id="carte">

                                <ul class="mot_pass_checker_liste">
                                    <li id="longeur" class="mot_passe_checker_condi">

                                        Au moins 8 caractères
                                        &nbsp;
                                    </li>
                                    <li id="majuscule" class="mot_passe_checker_condi">

                                        Au moins une majuscule
                                        &nbsp;
                                    </li>
                                    <li id="letter" class="mot_passe_checker_condi">

                                        Au moins une miniscule
                                        &nbsp;
                                    </li>
                                    <li id="nombre" class="mot_passe_checker_condi">

                                        Au moins un chiffre
                                        &nbsp;
                                    </li>

                                </ul>
                                <script type="text/javascript">
                                    var myInput = document.getElementById("mot_pass_inscription");
                                    var letter = document.getElementById("letter");
                                    var majuscu = document.getElementById("majuscule");
                                    var num = document.getElementById("nombre");
                                    var length = document.getElementById("longeur");
                                    myInput.onkeyup = function() {
                                        // Validate lowercase letters
                                        var miniscule = /[a-z]/g;
                                        if (myInput.value.match(miniscule)) {
                                            letter.classList.remove("mot_passe_checker_condi");
                                            letter.classList.add("valid");
                                        } else {
                                            letter.classList.remove("valid");
                                            letter.classList.add("mot_passe_checker_condi");
                                        }
                                        var majus = /[A-Z]/g;
                                        if (myInput.value.match(majus)) {
                                            majuscu.classList.remove("mot_passe_checker_condi");
                                            majuscu.classList.add("valid");
                                        } else {
                                            majuscu.classList.remove("valid");
                                            majuscu.classList.add("mot_passe_checker_condi");
                                        }
                                        var numbers = /[0-9]/g;
                                        if (myInput.value.match(numbers)) {
                                            num.classList.remove("mot_passe_checker_condi");
                                            num.classList.add("valid");
                                        } else {
                                            num.classList.remove("valid");
                                            num.classList.add("mot_passe_checker_condi");
                                        }
                                        if (myInput.value.length >= 8) {
                                            length.classList.remove("mot_passe_checker_condi");
                                            length.classList.add("valid");
                                        } else {
                                            length.classList.remove("valid");
                                            length.classList.add("mot_passe_checker_condi");
                                        }

                                    }
                                </script>
                                <div class="mot_checker">
                                    <p class="mot_pass_titre"> sécurité</p>
                                    <progress max="100" value="0" id="strength" style="width: 230px"></progress>
                                </div>

                            </div>
                            <script type="text/javascript">
                                var pass = document.getElementById("mot_pass_inscription")
                                pass.addEventListener('keyup', function() {
                                    checkPassword(pass.value)
                                })

                                function checkPassword(mot_pass_inscription) {
                                    var strengthBar = document.getElementById("strength")
                                    var strength = 0;
                                    if (mot_pass_inscription.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
                                        strength += 1
                                    }
                                    if (mot_pass_inscription.match(/[~<>?]+/)) {
                                        strength += 1
                                    }
                                    if (mot_pass_inscription.match(/[!@£$%&*()]+/)) {
                                        strength += 1
                                    }
                                    if (mot_pass_inscription.length > 5) {
                                        strength += 1
                                    }
                                    switch (strength) {
                                        case 0:

                                            strengthBar.value = 20;
                                            break
                                        case 1:

                                            strengthBar.value = 40;
                                            break
                                        case 2:

                                            strengthBar.value = 60;
                                            break
                                        case 3:

                                            strengthBar.value = 80;
                                            break
                                        case 4:

                                            strengthBar.value = 100;
                                            break
                                    }
                                }
                            </script>


                        </div>

                    </div>
                    <div class="label">
                        <label>Confirmation du mot de passe</label>
                        <div class="mot-pass-contai">
                            <input type="password" id="mot_pass_confir">
                            <img id="hideOrshow" src="SBS image/icon-eye.png" width="20" />
                            <div class="clear"></div>
                            <div class=" obligatoire" id="mot_pass_confir1">
                                <p>veuillez remplir ce champ</p>
                            </div>
                        </div>
                        <script type="text/javascript">
                            var btn2 = document.getElementById('hideOrshow');
                            btn2.onmousedown = showPassword;
                            btn2.onmouseup = hidePassword;

                            var mot_pass_confir = document.getElementById('mot_pass_confir');

                            function showPassword() {
                                ;
                                mot_pass_confir.setAttribute("type", "text");
                                btn2.style.opacity = 1;
                            }

                            function hidePassword() {

                                mot_pass_confir.setAttribute("type", "password");
                                btn2.style.opacity = 0.5;
                            }
                        </script>
                        <div class="label">
                            <label>Date de naissance</label>
                            <input type="date" name="date_naissance" id="date_inscription" value="<?php echo $clt['date_naissance']; ?>">
                            <div class="clear"></div>
                            <div class="mot_pass_connexion obligatoire" id="date_inscription1">
                                <p>une erreur dans le format</p>
                            </div>
                        </div>
                        <div class="label">
                            <input type="button" id="bouton_connexion" value="Modifier" onclick="test_inscription();">
                        </div>
                        
                </form>
				<?php
				}
				}
				?>
            </div>
        </div>
        <!--body-->

        <!--footer-->
        <?php
        include "pied.php";
        ?>
        <!--footer-->
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/controle_formulaire.js"></script>
</body>

</html> 