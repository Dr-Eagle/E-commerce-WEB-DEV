<?php
include "include.php";
$_GET['id_clin']=0;
?>


<!DOCTYPE html>
<html>

<head>
<?php
    include 'tete.php';
    ?>

</head>

<body>

    <!-- Entete-->
    <?php
    include "entete.php";
    ?>

    <!-- Entete-->

    <div class="super_container">
        <!-- Menu de gauche-->

        <?php
        include "menu.php";
        ?>
        <!-- Menu de gauche-->

        <div class="space_work">
            <div class="affichage">
                <h2>Tous les Clients</h2>
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>

                <table>
                <td>

                <div class="form-group" >
                    
                    <input class="form-control" type="text" id="recherche-client" placeholder="Rechercher un client" >
                    <div style="margin-top: calc(50% - 50px)">
                        <a><div id="resulta-recherche"></div></a>
                    </div>
            
                    
                </div>
                <form method="post" action="tri_clients.php">
                <div class="form-group" >
                    
                    <h3> <label for="trii">Recherche</label></h3>
                        <select class="custom-select from-control-sm" name="trii" id="trii">
                        <option value="nom">Nom</option>
                        <option value="prenom">Prenom</option>
                        </select>
                        <button type="submit">
                            trier
                        </button>
                    </div>
                </form>
            
                    
                </div>
                </td>
                </table>
                
                <form action="" method="post">
                    <table class="table table-striped table-inverse affichage_produit" id="resultat-rech">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="nom_utilisateur">Id Client</th>
                                <th class="image_produit"><i class="fas fa-file-image"></i>Image</th>
                                <th class="nom_utilisateur">Nom</th>
                                <th class="nom_utilisateur">Prenom</th>
                                <th class="nom_utilisateur">Date_naissance</th>
                                <th class="Adresse_Messagerie">Adresse de Messagerie</th>
                                <th class="nom_utilisateur">Sexe</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($_POST['trii']=='nom')
                        {
                            $list=client_core::triclient();
                        }else
                        {
                            $list=client_core::triprenomclient();
                        }
                        $client=$list->fetchall(PDO::FETCH_ASSOC);
                        if($_GET['id_clin']==0){

                        foreach($client as $clt){
                        ?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td>
                                <?php echo $clt['id_client']; ?>
                                <div class="option_produit">      
                                        <a href="recuperation/supprimer_client.php?id_cl=<?PHP echo $clt['id_client'];?>">Supprimer</a>
                                    </div>
                                </td>
                                <td>
                                    <img src="<?php echo $clt['image_profil']; ?>" alt="image">
                                    
                                </td>
                                <td>
                                   <?php echo $clt['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $clt['prenom']; ?>
                                </td>
                                <td><?php echo $clt['date_naissance']; ?></td>
                                <td><?php echo $clt['email']; ?></td>
                                <td><?php echo $clt['sexe']; ?></td>
                            </tr>
                        <?php
                        }}
                        ?>
                        </tbody>
                    </table>
                </form>
                <br />
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>
            </div>


            <!-- pied de page-->

            <div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
            </div>

            <!-- pied de page-->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/slick-1.8.0/slick.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/controle_formulaire.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>

    <script>
    /*$(document).ready(function(){

        var $input=$('input[name=rech]'):
        var critere=$.trim($input.val());
        $input.keyup(function(){
            critere=$.trim($input.val());

            if(critere!=''){

                $.ajax({
                    url: 'recuperation/rechercher_client.php',
                    data: 'critere'+critere,
                    success: function(retour){

                        $('#resultat-rech').html(retour).fadeIn();
                    }
                });

            }else $('#resultat-rech').empty().fadeOut();

        });
    });*/

    $(document).ready(function(){
    $('#recherche-client').keyup(function(){
    $('#resultat-rech').html('');
        var utilisateur= $(this).val();
        if(utilisateur != ""){
            $.ajax({
                type: 'GET',
                url: 'recuperation/rechercher_client.php',
                data: 'user=' + encodeURIComponent(utilisateur),
                success: function(data){
                    if(data != ""){
                          $('#resultat-rech').html(data).fadeIn();
                    
                    }else
                    {
                        document.getElementById('resultat-rech').innerHTML =" <div style='font-size: 20px; text-align:center; margin-top: 10px'>Ce livreur n'existe pas !!</div> "
                    }
                }
            });
        }
        console.log(utilisateur);
    });
    });
    </script>


</body>

</html> 