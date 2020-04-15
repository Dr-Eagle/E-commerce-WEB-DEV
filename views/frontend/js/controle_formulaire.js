
function test_avis()
{
    var text = ["nom_avis","prenom_avis","nom_prod_avis"];   
     var email ="email_reclamation";   
     var inp,valeur,id_div,div_span;
     
     for(var i=0;i<text.length;i++)
    {
        inp=document.getElementById(text[i]);
        valeur=inp.value;
        id_div=inp.id+'1';
        div_span=document.getElementById(id_div);
            if(valeur.length==0)
            {
                div_span.style.display='block';
                div_span.firstChild.innerHTML="ce champ est obligatoire";
                inp.style.border="3px solid red";
                return;
            }
            else
            {
                div_span.style.display='none';
                inp.style.border=".5px solid rgba(0,0,0,0.3)";
            }
    }
     
    /* controle de l email*/
     
     inp = document.getElementById(email);
     valeur = inp.value;
     var existe=valeur.indexOf("@");
     id_div=inp.id+'1';
     div_span=document.getElementById(id_div);
     if(existe==-1 || valeur.indexOf(".",existe)==-1)
     {
          div_span.innerHTML="Email incorrect";        
          div_span.firstChild.style.display='block';
          inp.style.border="3px solid red";
          return;
     }
     else
     {
         div_span.style.display='none';
         inp.style.border=".5px solid rgba(0,0,0,0.3)";
     }

     document.forms['formulaire_avis'].submit();
          
}
function test_reclamation()
{
    var text = ["nom_reclamation","prenom_reclamation","objet_reclamation","description_reclamation"];   
     var email ="email_reclamation";   
     var telephone="telephone_reclamation";
     var inp,valeur,id_div,div_span;
     
     for(var i=0;i<text.length;i++)
    {
        inp=document.getElementById(text[i]);
        valeur=inp.value;
        id_div=inp.id+'1';
        div_span=document.getElementById(id_div);
            if(valeur.length==0)
            {
                div_span.style.display='block';
                div_span.firstChild.innerHTML="ce champ est obligatoire";
                inp.style.border="3px solid red";
                return;
            }
            else
            {
                div_span.style.display='none';
                inp.style.border=".5px solid rgba(0,0,0,0.3)";
            }
    }
     
    /* controle de l email*/
     
     inp = document.getElementById(email);
     valeur = inp.value;
     var existe=valeur.indexOf("@");
     id_div=inp.id+'1';
     div_span=document.getElementById(id_div);
     if(existe==-1 || valeur.indexOf(".",existe)==-1)
     {
          div_span.innerHTML="Email incorrect";        
          div_span.firstChild.style.display='block';
          inp.style.border="3px solid red";
          return;
     }
     else
     {
         div_span.style.display='none';
         inp.style.border=".5px solid rgba(0,0,0,0.3)";
     }

          /* controle numero de telephone */
     
     inp = document.getElementById(telephone);
     valeur = inp.value;
     id_div=inp.id+'1';
     div_span=document.getElementById(id_div);
     if(valeur.length < 8)
     {
          
          div_span.style.display='block';
          div_span.firstChild.innerHTML="verifier votre numero de telephone";
          inp.style.border="3px solid red";
          return;
     }
     else
     {
          div_span.style.display='none';
          inp.style.border=".5px solid rgba(0,0,0,0.3)";
     }
          
     document.forms['formulaire_reclamation'].submit();
}

function email_verification() {
    var email = "email_recuperation";
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
    
    document.forms['formulaire_recuperation'].submit();
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

    inp = document.getElementById("mot_pass_confir");
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

    document.forms['formulaire_inscription'].submit();

}

function test_connexion() {
    var mot_pass = "mot_pass_connexion";
    var email = "email_connexion";
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
    if (valeur.length < 6 || valeur.length > 25) {
        div_span.style.display = 'block';
        div_span.firstChild.innerHTML = "le mot de passe doit avoir au moins 6 caractères";
        inp.style.border = "3px solid red";
        return;
    } else {
        div_span.style.display = 'none';
        inp.style.border = ".5px solid rgba(0,0,0,0.3)";
    }
    
    document.forms['formulaire_connexion'].submit();
    
}


function select_mas() {
    var select1 = "genre_masculin_inscriptioin",
        select2 = "genre_feminin_inscriptioin";
    if (document.getElementById(select1).checked == true) {
        document.getElementById(select2).checked = false;
    }
}

function select_fem() {
    var select1 = "genre_masculin_inscriptioin",
        select2 = "genre_feminin_inscriptioin";
    if (document.getElementById(select2).checked == true) {
        document.getElementById(select1).checked = false;
    }
}

function select_mauvais()
{
    var select1="note_mauvais",select2="note_moyenne", select3="note_bien", select4="note_tres_bien";
    if(document.getElementById(select1).checked==true)
    {
        document.getElementById(select2).checked=false;
        document.getElementById(select3).checked=false;
        document.getElementById(select4).checked=false;
    }
}
function select_moyenne()
{
    var select1="note_mauvais",select2="note_moyenne", select3="note_bien", select4="note_tres_bien";
    if(document.getElementById(select2).checked==true)
    {
        document.getElementById(select1).checked=false;
        document.getElementById(select3).checked=false;
        document.getElementById(select4).checked=false;
    }
}
function select_bien()
{
    var select1="note_mauvais",select2="note_moyenne", select3="note_bien", select4="note_tres_bien";
    if(document.getElementById(select3).checked==true)
    {
        document.getElementById(select2).checked=false;
        document.getElementById(select1).checked=false;
        document.getElementById(select4).checked=false;
    }
}
function select_tres_bien()
{
    var select1="note_mauvais",select2="note_moyenne", select3="note_bien", select4="note_tres_bien";
    if(document.getElementById(select4).checked==true)
    {
        document.getElementById(select2).checked=false;
        document.getElementById(select3).checked=false;
        document.getElementById(select1).checked=false;
    }
}