<?php
include "include.php";
?>

<!DOCTYPE html>
<html>

<head>
    <?php
    include 'tete.php';
    ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <style>
        #chartdiv {
            width: 100%;
            height: 800px;
        }
    </style>
</head>
<?php
$commande = new Commande_core();
//$tab = $commande->stat_order_product(3);
//var_dump($tab);
?>

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
            <!-- pied de page-->
            <a href="recuperation/statistique_commande.php?stat=true" id="statistique" class="btn btn-primary">afficher stat</a>
            <!--<div class="stat" style="width:90%;margin:100px auto;">
                <canvas id="myChart"></canvas>
            </div>-->
            <div class="form-group">
                <label for="">Nombres de produits à afficher</label>
                <select class="custom-select" name="" id="nbre_elements">
                    <option selected>4</option>
                    <option value="1">1</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="60">60</option>
                    <option value="80">80</option>
                    <option value="100">100</option>

                </select>
            </div>

            <!-- Chart code -->
            <script>
                $(document).ready(function() {


                    $('#nbre_elements').on('change', function(){
                        afficher_stat();
                    });

                    $('#statistique').on('click', function(event) {
                        event.preventDefault();
                        $.post("recuperation/statistique_commande.php", {
                                nbre_elements: $('#nbre_elements').val()
                            },
                            function(data, textStatus, jqXHR) {
                                //console.log(data);
                                var chartData = [];
                                for (let i = 0; i < data["nom_produit"].length; i++) {
                                    chartData.push({
                                        
                                        country: data["nom_produit"][i],
                                        visits: data["commande"][i]
                                    });
                                    console.log(data["commande"][i]);
                                }
                                am4core.ready(function() {

                                // Themes begin
                                am4core.useTheme(am4themes_animated);
                                // Themes end

                                // Create chart instance
                                var chart = am4core.create("chartdiv", am4charts.XYChart);

                                // Add data
                                chart.data = chartData;

                                // Create axes

                                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                                categoryAxis.dataFields.category = "country";
                                categoryAxis.renderer.grid.template.location = 0;
                                categoryAxis.renderer.minGridDistance = 30;

                                categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                                    if (target.dataItem && target.dataItem.index & 2 == 2) {
                                        return dy + 25;
                                    }
                                    return dy;
                                });

                                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                                // Create series
                                var series = chart.series.push(new am4charts.ColumnSeries());
                                series.dataFields.valueY = "visits";
                                series.dataFields.categoryX = "country";
                                series.name = "Visits";
                                series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                                series.columns.template.fillOpacity = .8;

                                // Add scrollbar
                                chart.scrollbarX = new am4charts.XYChartScrollbar();
                                chart.scrollbarX.series.push(series);

                                var columnTemplate = series.columns.template;
                                columnTemplate.strokeWidth = 2;
                                columnTemplate.strokeOpacity = 1;

                                }); // end am4core.ready()


                            },
                            "json"
                        );
                    });

                    function afficher_stat() {
                        
                        $.post("recuperation/statistique_commande.php", {
                                nbre_elements: $('#nbre_elements').val()
                            },
                            function(data, textStatus, jqXHR) {
                                console.log(data['nom_produit']);
                                var chartData = [];
                                for (let i = 0; i < data["nom_produit"].length; i++) {
                                    chartData.push({
                                        country: data["nom_produit"][i],
                                        visits: data["commande"][i]
                                    });

                                }
                                am4core.ready(function() {

                                // Themes begin
                                am4core.useTheme(am4themes_animated);
                                // Themes end

                                // Create chart instance
                                var chart = am4core.create("chartdiv", am4charts.XYChart);

                                // Add data
                                chart.data = chartData;

                                // Create axes

                                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                                categoryAxis.dataFields.category = "country";
                                categoryAxis.renderer.grid.template.location = 0;
                                categoryAxis.renderer.minGridDistance = 30;

                                categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                                    if (target.dataItem && target.dataItem.index & 2 == 2) {
                                        return dy + 25;
                                    }
                                    return dy;
                                });

                                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                                // Create series
                                var series = chart.series.push(new am4charts.ColumnSeries());
                                series.dataFields.valueY = "visits";
                                series.dataFields.categoryX = "country";
                                series.name = "Visits";
                                series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                                series.columns.template.fillOpacity = .8;

                                // Add scrollbar
                                chart.scrollbarX = new am4charts.XYChartScrollbar();
                                chart.scrollbarX.series.push(series);

                                var columnTemplate = series.columns.template;
                                columnTemplate.strokeWidth = 2;
                                columnTemplate.strokeOpacity = 1;

                                }); // end am4core.ready()


                            },
                            "json"
                        );
                    };

                }); 
            </script>

            <div id="chartdiv"></div>

            <div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
            </div>

            <!-- pied de page-->
        </div>
    </div>
    <script>

    </script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>