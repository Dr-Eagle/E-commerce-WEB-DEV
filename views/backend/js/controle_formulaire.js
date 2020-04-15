

/*function email_recuperation() {
    alert("sd");
    var email = "email_recuperation";
    var inp = document.getElementById(email);
    var valeur = inp.value;
    var existe = valeur.indexOf("@");
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (existe == -1 || valeur.indexOf(".", existe) == -1) {
        div_span.innerHTML = "Email incorrect";
        div_span.style.display = 'block';
        inp.style.border = "3px solid rgb(255, 71, 87)";
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".1px solid rgba(0,0,0,0.3)";
    }
}*/


function test_produit_compose() {
    var text = ["nom_produit_compose", "image_produit_compose", "description_courte_produit_compose", "tarif_regulier_compose"];
    var inp, valeur, id_div, div_span;
    var valide = [1, 1, 1, 1];


    /*controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0 || valeur == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            valide[i] = 0;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
            valide[i] = 1;
        }
    }
   
    var submit = 1;
    for (let i = 0; i < valide.length; i++) {
        if (valide[i] == 0) {
            submit = 0;
        }
    }
    if (submit == 1) {
        document.forms['formulaire_produit_compose'].submit();
    }
}

function test_code_promo() {
    var pourcentage = "pourcentage";
    var validite = "validite";
    var inp, valeur, id_div, div_span;
    var d = new Date();
    var jour = new Date(d.getFullYear(), d.getMonth(), d.getDate());

    inp = document.getElementById(pourcentage);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur.length > 2 || valeur < 10 || valeur > 99) {
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }


    inp = document.getElementById(validite);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    var jour_code = new Date(valeur);

    if (jour_code <= jour || valeur.length==0) {
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    document.forms["formulaire_code"].submit();

}

function test_utilisateur() {
    var text = ["url_photo", "nom_utilisateur", "prenom_utilisateur"];
    var mot_pass = "mot_pass_utilisateur";
    var email = "email_utilisateur";
    var inp, valeur, id_div, div_span;

    /* controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            return;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }
    }

    /* controle de l email*/

    inp = document.getElementById(email);
    valeur = inp.value;
    var existe = valeur.indexOf("@");
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (existe == -1 || valeur.indexOf(".", existe) == -1) {
        div_span.firstChild.innerHTML = "Email incorrect";
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    /* controle mot de pass */

    inp = document.getElementById(mot_pass);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur.length < 6 || valeur.length > 25) {
        div_span.style.display = 'block';
        div_span.innerHTML = "le mot de passe doit avoir au moins 6 caractères";
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    document.forms['formulaire_utilisateur'].submit();


}

function text_formulaire_composite() 
{ 
    var text = ["titre1", "titre2", "image_option1","description_option1","prix_option1", "image_option2","description_option2","prix_option2", "image_option3","description_option3","prix_option3"];
    
    var inp, valeur, id_div, div_span;

    /* controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            return;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }
    }

    document.forms['formulaire_composite_product'].submit();

}

function test_livreur() {
    var text = ["url_photo", "nom_livreur", "prenom_livreur"];
    //var mot_pass ="";
    var telephone = "telephone_livreur";
    var email = "email_livreur";
    var inp, valeur, id_div, div_span;

    /* controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            return;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }
    }

    /* controle de l email*/

    inp = document.getElementById(email);
    valeur = inp.value;
    var existe = valeur.indexOf("@");
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (existe == -1 || valeur.indexOf(".", existe) == -1) {
        div_span.firstChild.innerHTML = "Email incorrect";
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }


    /* controle numero de telephone */

    inp = document.getElementById(telephone);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur.length < 8) {

        div_span.style.display = 'block';
        div_span.firstChild.innerHTML = "verifier votre numero de telephone";
        inp.style.border = "3px solid red";
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }


    document.forms['formulaire_livreur'].submit();

}


function test_inscription() {
    var text = ["nom_inscription", "prenom_inscription", "date_inscription"];
    var mot_pass = "mot_pass_inscription";
    var email = "email_inscription";



    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            return;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }
    }

    /* controle de l email*/

    inp = document.getElementById(email);
    valeur = inp.value;
    var existe = valeur.indexOf("@");
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (existe == -1 || valeur.indexOf(".", existe) == -1) {
        div_span.firstChild.innerHTML = "Email incorrect";
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    /* controle mot de pass */

    inp = document.getElementById(mot_pass);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur.length < 6 || valeur.length > 25) {

        div_span.firstChild.innerHTML = "le mot de passe doit avoir au moins 6 caractères";
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.firstChild.innerHTML = "le mot de passe doit avoir au moins 6 caractères";
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    /*confirmation du mot de pass*/

    inp = document.getElementById("mot_pass_inscription_confirmation");
    valeur = inp.value;
    var pass = document.getElementById(mot_pass).value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur != pass || valeur.length == 0) {
        div_span.style.display = 'block';
        div_span.firstChild.innerHTML = "le mot de passe ne correspond pas";
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }


}

function test_connexion() {
    var email = "login";
    var mot_pass = "mot_pass";
    var inp, valeur, id_div, div_span;


    /* controle de l email*/

    inp = document.getElementById(email);
    valeur = inp.value;
    var existe = valeur.indexOf("@");
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (existe == -1 || valeur.indexOf(".", existe) == -1) {
        div_span.firstChild.innerHTML = "Email incorrect";
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    /* controle mot de pass */

    inp = document.getElementById(mot_pass);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur.length < 6 ) {
        div_span.style.display = 'block';
        div_span.firstChild.innerHTML = "le mot de passe doit avoir au moins 6 caractères";
        inp.style.border = "3px solid rgb(255, 71, 87)";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".1px solid rgba(0,0,0,0.3)";
    }


    document.forms['formulaire_connexion'].submit();

}



function test_panier() {
    var text = ["prenom_user_panier", "nom_user_panier", "ville_user_panier", "code_postal_user_panier", "email_user_panier"];
    var check = ["condition_panier"];
    var nombre = ["telephone_user_panier"];
    //var mot_pass ="";
    var telephone = "telephone_user_panier";
    var email = "email_user_panier";
    var inp, valeur, id_div, div_span;

    /* controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }
    }

    /* controle de l email*/

    inp = document.getElementById(email);
    valeur = inp.value;
    var existe = valeur.indexOf("@");
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (existe == -1 || valeur.indexOf(".", existe) == -1) {
        div_span.firstChild.innerHTML = "Email incorrect";
        div_span.style.display = 'block';
        inp.style.border = "3px solid red";
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    /* controle mot de pass */

    /*inp = document.getElementById(mot_pass);
    valeur = inp.value;
    id_div=inp.id+'1';
    div_span=document.getElementById(id_div); 
    if( valeur.length < 6 || valeur.length > 25)
    {
         div_span.style.display='block';
         div_span.innerHTML="le mot de passe doit avoir au moins 6 caractères";
         inp.style.border="3px solid red";
    }
    else
    {
         div_span.style.display='none';
         inp.style.border=".5px solid rgba(0,0,0,0.3)";
    }*/

    /* controle numero de telephone */

    inp = document.getElementById(telephone);
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur.length < 8) {

        div_span.style.display = 'block';
        div_span.firstChild.innerHTML = "verifier votre numero de telephone";
        inp.style.border = "3px solid red";
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }



    /* bouton check obligatoire */

    inp = document.getElementById(check);
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (inp.checked == false) {
        div_span.style.display = 'block';
    } else {
        div_span.style.display = 'none';
    }

}

function test_catalogue() {
    var text = ["image_principale_produit"];
    var inp, valeur, id_div, div_span;
    var valide = [1];


    /*controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0 || valeur == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            valide[i] = 0;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
            valide[i] = 1;
        }
    }
    var submit = 1;
    for (let i = 0; i < valide.length; i++) {
        if (valide[i] == 0) {
            submit = 0;
        }
    }
    if (submit == 1) {
        document.forms['formulaire_catalogue'].submit();
    }
}

function test_produit() {

    var text = ["nom_produit", "description_produit", "description_courte_produit", "image_produit", "tarif_regulier", "quantite_description"];
    var inp, valeur, id_div, div_span;
    var valide = [1, 1, 1, 1, 1, 1, 1];


    /*controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0 || valeur == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "ce champ est obligatoire";
            inp.style.border = "3px solid red";
            valide[i] = 0;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
            valide[i] = 1;
        }
    }
    var existe = 0;
    inp = document.querySelectorAll(".block_categorie input ");
    for (var i = 0; i < inp.length; i++) {
        if (inp[i].checked == true) {
            existe++;
            break;
        }
    }
    if (existe == 0) {
        document.getElementById("block_categorie1").style.display = 'block';
        document.getElementById("block_categorie").style.border = "3px solid red";
        document.getElementById("block_categorie1").firstChild.style.color = 'red';
        valide[6] = 0;
    } else {
        document.getElementById("block_categorie").style.border = 'none';
        document.getElementById("block_categorie1").style.display = 'none';
        valide[6] = 1;
    }
    var submit = 1;
    for (let i = 0; i < valide.length; i++) {
        if (valide[i] == 0) {
            submit = 0;
        }
    }
    if (submit == 1) {
        document.forms['formulaire_produit'].submit();
    }
}

/*function test_produit_modifier() {

    var text = ["nom_produit", "description_produit", "description_courte_produit", "image_produit","tarif_regulier","quantite_description"];
    var inp, valeur, id_div, div_span;
    var valide= [1,1,1,1,1,1,1];


    controle des champs text 

    for(var i=0;i<text.length;i++)
    {
        inp=document.getElementById(text[i]);
        valeur=inp.value;
        id_div=inp.id+'1';
        div_span=document.getElementById(id_div);
            if(valeur.length==0 || valeur==0)
            {
                div_span.style.display='block';
                div_span.firstChild.innerHTML="ce champ est obligatoire";
                inp.style.border="3px solid red";
                valide[i]=0;
            }
            else
            {
                div_span.style.display='none';
                inp.style.border=".5px solid rgba(0,0,0,0.3)";
                valide[i]=1;
            }
    }
    var existe = 0;
    inp = document.querySelectorAll(".block_categorie input ");
    for (var i = 0; i < inp.length; i++) {
        if (inp[i].checked == true) {
            existe++;
            break;
        }
    }
    if (existe == 0) {
        document.getElementById("block_categorie1").style.display = 'block';
        document.getElementById("block_categorie").style.border = "3px solid red";
        document.getElementById("block_categorie1").firstChild.style.color = 'red';
       valide[6]=0;
    } else {
        document.getElementById("block_categorie").style.border = 'none';
        document.getElementById("block_categorie1").style.display = 'none';
        valide[6]=1;
    }
    var submit=1;
    for (let i = 0; i < valide.length; i++) {
        if(valide[i]==0)
        {
            submit=0;
        }
    }
    if(submit==1)
    {
        document.forms['formulaire_produit'].submit();
    }
}*/

function test_categorie() {
    var text = ["nom_categorie", "lien_categorie"];
    var inp, valeur, id_div, div_span;


    /*controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0 || valeur == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "vous avez oublié le nom de la categorie";
            inp.style.border = "3px solid red";
            return;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }
    }

    document.forms['formulaire_categorie'].submit();
}

function test_sous_categorie() {
    var text = ["nom_sous_categorie", "lien_sous_categorie"];
    var inp, valeur, id_div, div_span;


    /*controle des champs text */

    for (var i = 0; i < text.length; i++) {
        inp = document.getElementById(text[i]);
        valeur = inp.value;
        id_div = inp.id + '1';
        div_span = document.getElementById(id_div);
        if (valeur.length == 0 || valeur == 0) {
            div_span.style.display = 'block';
            div_span.firstChild.innerHTML = "vous avez oublié le nom de la sous categorie";
            inp.style.border = "3px solid red";
            return;
        } else {
            div_span.style.display = 'none';
            inp.style.border = ".5px solid rgba(0,0,0,0.3)";
        }

    }

    inp = document.getElementById("categorie_parent");
    valeur = inp.value;
    id_div = inp.id + '1';
    div_span = document.getElementById(id_div);
    if (valeur == "aucune") {
        div_span.style.display = 'block';
        div_span.firstChild.innerHTML = "choisissez une categorie parent";
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }

    document.forms['formulaire_sous_categorie'].submit();
}