<?php
include "include.php";
$_GET['id_reca']=0;
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
                <h2>Tout les Reclamations</h2>
                <table>
                 <td>
                
                    <div class="form-group">
                        <input class="form-control" type="text" id="recherche-reclamation" placeholder="nom">
                        <div style="margin-top: calc(50% - 50%)">
                            <a><div id="result-recherche"></div></a>    
                        
                    </div>
                    <form method="post" action="trier_reclamation.php">
                    <select class="custom-select form-control-sm" name="recherche" id="recherche">
                      <option value="nom">nom</option>
                      <option value="prenom">prenom</option>
                    </select>
                    <button type="submit"> trier</button>
                    </form>
                    </div>
                 </td>
                </table>
                
                <div class="navigation">
                    <button type="submit">
                    <</button> <span>---</span>
                    <button type="submit">></button>
                    <div class="clear"></div>
                </div>

                <form action="" method="post">
                    <table class="table table-striped table-inverse affichage_produit" id="resultat-recherche">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="nom_utilisateur">Id Reclamation</th>
                                <th class="nom_utilisateur">Nom</th>
                                <th class="nom_utilisateur">Prenom</th>
                                <th class="nom_utilisateur">Telephone</th>
                                <th class="Adresse_Messagerie">Adresse de Messagerie</th>
                                <th class="nom_utilisateur">Objet</th>
                                <th class="nom_utilisateur">Message</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($_POST['recherche']=='nom')
                              {
                                $list=reclamation_core::tri_reclamation_nom();
                              }
                            else
                             {
                                $list=reclamation_core::tri_reclamation_prenom();
                             }

                         $reclamation=$list ->fetchall(PDO::FETCH_ASSOC);
                        if($_GET['id_reca']==0)
                        {
                        foreach($reclamation as $rec){
                        ?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td>
                                <?php echo $rec['id_reclamation']; ?>
                                <div class="option_produit">      
                                        <a href="recuperation/supprimer_reclamation.php?id_reclamation=<?PHP echo $rec['id_reclamation'];?>">Supprimer</a>
                                    </div>
                                </td>
                                <td>
                                   <?php echo $rec['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $rec['prenom']; ?>
                                </td>
                                <td><?php echo $rec['telephone']; ?></td>
                                <td><?php echo $rec['email']; ?></td>
                                <td><?php echo $rec['objet']; ?></td>
                                <td><?php echo $rec['message']; ?></td>
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

<script>

    $(document).ready(function(){
    $('#recherche-reclamation').keyup(function(){
    $('#resultat-recherche').html('');
        var utilisateur= $(this).val();
        if(utilisateur != ""){
            $.ajax({
                type: 'GET',
                url: 'recuperation/rechercher_reclamation.php',
                data: 'user=' + encodeURIComponent(utilisateur),
                success: function(data){
                    if(data != ""){
                          $('#resultat-recherche').html(data).fadeIn();
                    
                    }else
                    {
                        document.getElementById('resultat-recherche').innerHTML =" <div style='font-size: 20px; text-align:center; margin-top: 10px'> nope !!</div> "
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