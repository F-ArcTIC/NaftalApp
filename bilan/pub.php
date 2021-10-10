<?php
session_start();?><? header('Content-Type: text/html;charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NAFTAL</title>

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/select.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css" />
  <link rel="stylesheet" type="text/css" href="../../css/scroller.bootstrap4.min.css">
  <link rel="stylesheet" href="../../css/jquery.toast.css">
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript" language="javascript" src="../../js/jquery-3.3.1.js"></script>
  <script src="../../js/popper.min.js"></script><!--dropdown menue-->
  <script src="../../js/bootstrap.min.js" ></script>
  
 
  <script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/dataTables.bootstrap4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/buttons.flash.min.js"></script>

  <script type="text/javascript" src="../../js/jquery.toast.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>

</head>
<style type="text/css">
  .red {
  color: red !important;
}
</style>
<body>
	<div id="content">
      <?php include("../interface.php"); ?>

 <div class="d-flex justify-content-end">
                <div class="col-sm-2 col-md-2 col-xs-12 p-2" >
                                            <select class="form-control" id="mois">
                                                        <option value="1">Janvier</option>  
                                                        <option value="2">Fevrier</option>
                                                        <option value="3">Mars</option>
                                                        <option value="4">Avril</option>
                                                        <option value="5">Mai</option>  
                                                        <option value="6">Juin</option>
                                                        <option value="7">Juillet</option>
                                                        <option value="8">Aout</option>
                                                        <option value="9">Septembre</option>  
                                                        <option value="10">Octobre</option>
                                                        <option value="11">Novembre</option>
                                                        <option value="12">Decembre</option>
                                            </select> 
                </div>
                <div class="col-sm-2 col-md-2 col-xs-12 p-2" >                                                   
                                            <select class="form-control" id="an">
                                                        <option value="2019">2019</option>  
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>



                                                    </select>
                </div>
                      
            </div>
  <div class="container-fluid table-responsive">
      
            <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">
                  <div>
                      
                    </div>
                    <a href="#" style="font-weight: bold; font-size:22px">Bilan des publications</a>

                    <div>
                        <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                      
                      <!--<button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalConsul" data-toggle="tooltip" data-placement="top" title="Consulter" id="buttonview" disabled=""><i class="fas fa-info-circle fa-lg mt-0"></i></button>-->
                      
                    </div>

                </div>
                <br>
            </div>
            <div class="container-fluid">
                <table id="t1" class="table table-bordered display nowrap" cellspacing="0" width="100%">
       
                 </table>
            </div>
    
      
        </div>
    </div>
</div>
</main>

    <script type="text/javascript">

        var columnDefs = [{
    title: "Total Publication ",
    data:"Total_publication"
  }, {
    title: "Avis de lancement",
    data:"Avis de lancement"
  },{
    title: "Prorogation",
    data:"Prorogation"
  },  {
    title: "Avis de Pr\u00e9qualification",
    data:"Avis de Pr\u00e9qualification"
  }, {
    title: "Resultat Pr\u00e9qualification",
    data:"Resultat Pr\u00e9qualification"
  }, {
    title: "Attribution des march\u00e9s",
    data:"Attribution des march\u00e9s"
  }, {
    title: "R\u00e9ctificatif",
    data:"R\u00e9ctificatif"
  },{
    title: "Avis annulation",
    data:"Avis annulation"
  }, {
    title: "Infructosite",
    data: "Infructosite"
  }
  ];
    function loaddata(mois, ann){
$.get("PHP/publication.php",
            {mois:mois,an:ann},
            
            function(data,status){
                 
          
            },"json");
 }



$(document).ready(function() {
 

//TODO add some select...options column as example
   
  var d = new Date();
  var mois = d.getMonth();
  var ann= d.getFullYear();
 document.getElementById('mois').value=mois +1 ;
  document.getElementById('an').value=ann ;
});
loaddata();
var data = [
    ['subgroupN', 'Group1', 'sub-subgroupN', 'ElementN', '2Element N'],
    ['subgroup1', 'Group2', 'sub-subgroup1', 'Element1', '2Element 1'],
    ['subgroup2', 'Group2', 'sub-subgroup1', 'Element1', '2Element 1'],
    ['subgroup2', 'Group2', 'sub-subgroup1', 'Element2', '2Element 2'],
    ['subgroup2', 'Group2', 'sub-subgroup2', 'Element3', '2Element 2'],
    ['subgroup2', 'Group3', 'sub-subgroup2', 'Element4', '2Element 4'],
    ['subgroup2', 'Group4', 'sub-subgroup2', 'Element2', '2Element 2'],
    ['subgroup3', 'Group1', 'sub-subgroup1', 'Element1', '2Element 1'],
    ['subgroup3', 'Group1', 'sub-subgroup1', 'Element1', '2Element 1'],
    ['subgroup2', 'Group2', 'sub-subgroup2', 'Element1', '2Element 1'],
    ['subgroup4', 'Group2', 'sub-subgroup2', 'Element1', '2Element 1'],
    ['subgroup4', 'Group2', 'sub-subgroup3', 'Element10', '2Element 17'],
    ['subgroup4', 'Group2', 'sub-subgroup3', 'Element231', '2Element 211'],

  ];
  var table = $('#t1').DataTable({
    columns: [
        {
          name:'first',
            title: 'First group',
        },
        {
            name: 'second',
            title: 'Second group [order first]',
        },
        {
            title: 'Third group',
        },
        {
            title: 'Forth ungrouped',
        },
        {
            title: 'Fifth ungrouped',
        },
    ],
    data: data,
    rowsGroup: [// Always the array (!) of the column-selectors in specified order to which rows groupping is applied
                // (column-selector could be any of specified in https://datatables.net/reference/type/column-selector)
        'first:name',
        1,
    ],
    pageLength: '20',
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

      
    
    </script>

   <script type="text/javascript">$(function () {
    $('#buttonAdd').tooltip();
  $('#buttonEdit').tooltip();
  $('#buttonsetout').tooltip();
  $('#buttonview').tooltip()
})</script>


<script>
  var el = document.querySelector('.custom-scrollbar');
  //var ps = new PerfectScrollbar(el);
   </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
        $(document).ready(function () {
          
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>



</body>

</html>

  