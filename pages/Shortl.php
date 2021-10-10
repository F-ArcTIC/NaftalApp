<?php
session_start();?><? header('Content-Type: text/html;charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Example #5</title>

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
      <?php include("../interfaceprojet.php"); ?>


  <div class="container-fluid table-responsive">
      
            <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">
                  <div>
                      
                    </div>
                    <a href="#" style="font-weight: bold; font-size:22px">Table des Membres</a>

                    <div>
                      <button class="btn btn-outline-white btn-rounded px-2" id="pdfbutton" title="Consulter" disabled><i class='fas fa-file-pdf fa-lg mt-0' ></i></button>
                      
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
   title: "N° Shortlist",
    data:"num_ShorList"
  },{
   title: "Objet",
    data:"objet"
  }, {
    title: "file_ShortList",
    data:"file_ShortList",
            "visible":false

  }
  ];
    function loadData() {
        var table=$('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_sl.php",
            dataSrc : "data",

        },
        columns: columnDefs,
        info: "false",
                select: "single",

        "createdRow": function( row, data, dataIndex){
                 if ( data["etat"] == "0" ) {        
                      $(row).addClass('red');
                    }
            }

  });    


}


function rowselected () {

    var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().nom_mem, el.data().prenom_mem, el.data().etat, el.data().Districte, el.data().poste,el.data().id_mem];
    //alert(el.data().Num_Placard + el.data().code+ el.data().Nature+ el.data().etat+ el.data().num_pub+ el.data().date_pub+ el.data().date_cloture);
    return res;
}

function enableB () {


  var filas=$('#t1').DataTable().row('.selected');
  if(filas.length > 0 ){
    $('#pdfbutton').prop('disabled', false);
    $('#buttonsetout').prop('disabled', false);
    $('#buttonview').prop('disabled', false);

}
    if(filas.length == 0){
            $('#pdfbutton').prop('disabled', true);
            $('#buttonsetout').prop('disabled', true);
            $('#buttonview').prop('disabled', true);
             


    }
}
$(document).ready(function() {
 
$('#pdfbutton').click( function () {
      var el= $('#t1').DataTable().row('.selected');
      window.open("PHP/"+el.data().file_ShortList);
    } );
//TODO add some select...options column as example
    $('#pdfbutton').tooltip();
  $('#buttonAdd').tooltip();
  $('#buttonsetout').tooltip();
  $('#buttonview').tooltip()
  loadData();
  var table = $('#t1').DataTable();
    $('#t1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        enableB();
        if(table.row( this ).data().etat==0){
          $('#buttonEdit').prop('disabled', true);
            $('#buttonsetout').prop('disabled', true);
        }
        
    } );
    
      
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

  