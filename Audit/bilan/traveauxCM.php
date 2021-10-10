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
  <script type="text/javascript" language="javascript" src="../../js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/jszip.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/pdfmake.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/vfs_fonts.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/buttons.print.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/buttons.flash.min.js"></script>

  <script type="text/javascript" src="../../js/jquery.toast.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>

</head>
<body>
 
<main>

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
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">
                  <div>
                      
                    </div>
                    <a href="#" style="font-weight: bold; font-size:22px">Table des traveaux CM </a>

                   <div></div>

                </div>
                <br>

                

                      
                    
                    

            <div class="container-fluid">
                <table id="t1" class="table table-bordered display nowrap" cellspacing="0" width="100%">
       
              <thead> 
                <tr>
                <th rowspan="2">Objet</th>
                <th colspan="3">CMB</th>
                <th colspan="3">CMD</th>
            </tr> 
                       <tr>
                       <th>Nombre total</th>
                       <th>Accord</th>
                       <th>Refus</th>
                       <th>Nombre total</th>
                       <th>Accord</th>
                       <th>Refus</th>
                    </tr>
                 </thead>
               

                    
                 
 
    

                 </table>
            </div>
    
      
        </div>
    </div>
</main>


    <script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>

    <script type="text/javascript">
      $(document).ready( function () {
        var d = new Date();
  var mois = d.getMonth();
  var ann= d.getFullYear();
 document.getElementById('mois').value=mois +1 ;
  document.getElementById('an').value=ann ;
var m = $("#mois").val();
var a = $("#an").val();


var table= $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/traveaux_cmb.php",
             type: "get",
            data : { mois : m, an : a },
        },
'columnDefs': [
         
      ],
      'columns': [ 
          { 'data': "objet" },
          { 'data': "Nb_total_br" },
         { 'data': "Nb_accord_br" },
         { 'data': "Nb_refus_br" },
                  { 'data': "Nb_total_dec" },
         { 'data': "Nb_accord_dec" },
         { 'data': "Nb_refus_dec" },

      ],
        select: "single",
        info: "false",
        stretchH: 'all',
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]

  });

   });

    </script>

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

  