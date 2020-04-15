$(document).ready(function () {
  
  /*$('#statistique').on('click',function(e){
      e.preventDefault();
      $.get($('#statistique').attr('href'),{},
        function (data, textStatus, jqXHR) {
          //console.log(data);
          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
              // The type of chart we want to create
              type: 'bar',

              // The data for our dataset
              data: {
                  labels: data['nom_produit'],
                  datasets: [{
                      label: 'My First dataset',
                      backgroundColor: 'rgb(255, 99, 132)',
                      borderColor: 'rgb(255, 99, 132)',
                      data: data['commande']
                  }]
              },

              // Configuration options go here
              options: { 
                scales: {
                  xAxes: [{
                      stacked: true
                  }],
                  yAxes: [{
                      stacked: true
                  }]
                }
          }
        });
        },
        "json"
      );
      
  });*/
  init_affichage_commande();
  $("#suivant").on('click', function (event) {
      event.preventDefault();
      next();
      var debut=parseInt($("#precedent").attr('data-valeur'));
      var fin=parseInt($("#suivant").attr('data-valeur'));
      display_commande(debut,fin);
  });
  $("#precedent").on('click', function (event) {
    event.preventDefault();
    previous();
    var debut=parseInt($("#precedent").attr('data-valeur'));
    var fin=parseInt($("#suivant").attr('data-valeur'));
    display_commande(debut,fin);
});
$("#nbre_elements").on('change', function () {
  init_affichage_commande();
});
function init_affichage_commande() {
  var intervalle=parseInt($("#nbre_elements").val());
  $("#precedent").attr('data-valeur',0);
  $("#suivant").attr('data-valeur',intervalle);
  var debut=$("#precedent").attr('data-valeur');
  var fin=$("#suivant").attr('data-valeur');
  display_commande(debut,fin);
}
function next() {
  var intervalle=parseInt($("#nbre_elements").val());
  suivant=parseInt($('#suivant').attr('data-valeur'));
  precedent=parseInt($('#precedent').attr('data-valeur'));

  var new_next=suivant+intervalle;
  var new_prev=precedent+intervalle;

$('#suivant').attr('data-valeur',new_next);
  $('#precedent').attr('data-valeur',new_prev);
}
function previous() {
  var intervalle=parseInt($("#nbre_elements").val());
  var suivant=parseInt($('#suivant').attr('data-valeur'));
  var precedent=parseInt($('#precedent').attr('data-valeur'));
  var new_next=suivant-intervalle;
  var new_prev=precedent-intervalle;

  if(new_prev<0)
  {
    new_prev=0;
    new_next=new_prev + intervalle;
  }

  $('#suivant').attr('data-valeur',new_next);
  $('#precedent').attr('data-valeur',new_prev);
}
function hide() { 
  var commande=$("tbody .commande");
  commande.each(function () {
 
        if(!$(this).hasClass('hidden'))
        {
          $(this).addClass('hidden');
        }
    });
 }
function display_commande(debut,fin) {
  hide();
  var intervalle=parseInt($("#nbre_elements").val());
  var commande=$("tbody .commande");
  var max=commande.length;
  
  if(fin>max)
  {
    fin=max;
    debut=fin-intervalle;
    if(debut<0)
    {
      debut=0;
    }
  }
  var i=0;
  
  $('#suivant').attr('data-valeur',fin);
  $('#precedent').attr('data-valeur',debut);
  commande.each(function () {
    if(i>=debut && i<fin)
    {
        if($(this).hasClass('hidden'))
        {
          $(this).removeClass('hidden');
        }
    }
    i++;
  });

}
  

  

  $(".menu_gauche .menu .nav-item a").on('click', function () {
    $(".sous_menu").slideUp('slow');
    $(this).next().slideToggle('slow');
  });

  $("#tout_cocher").on('click', function () {
    if ($("#tout_cocher").is(":checked")) {
      $('form tbody tr td:first-child input').prop('checked', true);
    } else {
      $('form tbody tr td:first-child input').prop('checked', false);
    }
  });

  $(".block_categorie input").on('click', function () {
    $('.block_categorie input').prop('checked', false);
    $(this).parent().parent().parent().children("#categorie").prop('checked', true);
    $(this).prop('checked', true);
  });
  $("#pourcentage").on("change", function () {
    var input = $("#pourcentage");
    var valeur = input.val();
    if (valeur.length > 2) {
      var p = "";
      for (var i = 0; i < 2; i++) {
        p += valeur[i];
      }
      input.prop("value", p);
      $("#code").prop("value", p + $("#code").val().substr(2, $("#code").val().length));
    }
    if (valeur.length == 2) {
      $("#code").prop("value", valeur + $("#code").val().substr(2, $("#code").val().length));
    }
  });
  if($("#code").val().length==0)
  {
    $("#code").prop("value","__"+random_code());
  }
  function random_code() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 8; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
  }

});

