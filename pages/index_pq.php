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

  <script type="text/javascript" language="javascript" src="../../js/buttons.flash.min.js"></script>

  <script type="text/javascript" src="../../js/jquery.toast.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>

</head>
<body>
	<div id="content">
      <?php include("../interfaceprojet.php"); ?>


	<div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">

                   <div></div>

                    <a href="#" style="font-weight: bold; font-size:22px">Table des préqualification</a>

                    <div>
                
                                          
                    </div>

                </div>
                <br>

                
                    
                    <!--AnnulerForm%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Annuler </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formcancel" method="post">   
                                      
                                        <div class="row" >
                                                        <div class="col-sm-3 col-md-3 col-xs-12">
                                                            <div class="custom-control custom-checkbox">
                                                                  <input type="checkbox" class="custom-control-input" id="Annuler" name="example1">
                                                                  <label class="custom-control-label" for="Annuler">Annuler</label>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <br><br>
                                                         <div class="col-sm-12 col-md-12 col-xs-12">  
                                                            <div class="form-group">  
                                                                    <label for="Motif">Motif</label>  
                                                                    <textarea class="form-control" rows="2" id="Motif" aria-describedby="inputGroupPrepend" autocomplete="off" required disabled=""></textarea>  
                                                            </div>  
                                                        </div>
                                        </div>
                                        <br>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="validCancel">Register</button>  
                                            
                                        </div>
                                    </form>

                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>


                    <!--ConsultationForm%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                    <div class="modal fade" id="modalConsul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Consultation ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formcons" method="post">    
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div>
                                                    <h6>Code</h6>
                                                    <p id="ccode"></p>
                                                </div>
                                                <div>
                                                    <h6>Type</h6>
                                                    <p id="ctype"></p>
                                                </div>
                                                <div>
                                                    <h6>Etape</h6>
                                                    <p id="cetape"></p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div>
                                                    <h6>Declencheur</h6>
                                                    <p id="cdeclencheur"></p>
                                                </div>
                                                <div>
                                                    <h6>Mode</h6>
                                                    <p id="cmode"></p>
                                                </div>
                                                <div>
                                                    <h6>Etat</h6>
                                                    <p id="cetat"></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div>
                                                    <h6>Objet</h6>
                                                    <p id="cobjet"></p>
                                                </div>
                                                
                                            </div>
                                         
                                            
                                        </div>
                                        
                                    </form>

                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="container-fluid">
                <table id="t1" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                  
 
    
 
    

                 </table>
            </div>

            </div>
    </div>


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
    <script type="text/javascript">
        var columnDefs = [ {
    title: "id",
    data:"id_pq"
  },{
    title: "Code",
    data:"code"
  }, {
    title: "Objet",
    data:"objet"
  }, {
    title: "N° / Date Décision CVT",
    data:"Decisioncvt"
  }, {
    title: "N° / Date VISA CVT",
    data:"pvcvt"
  }, {
    title: "N° / Date VISA CMB",
    data:"pvcmb"
  },{
    title: "N°/ Date Publication",
    data:"pub",
        visible: false

  }, {
    title: "Date de clôture finale",
    data: "cloture",
        visible: false


  }, {
    title: "N° / Date Décision CPQ",
    data:"Decisioncpq"
  }, {
    title: "N° / Date CPQ ",
    data: "pvcpq"
  }, {
    title: "Motif",
    data:"motif"
  }, {
    title: "etape",
    data:"etape"
  },{
    title: "projt",
    data:"projet",
        "visible":false

  },{
    title: "fs",
    data:"fiche_suivi",
        "visible":false

  },{
    title: "cc",
    data:"cc",
    "visible":false
  }];
    function loadData() {
        $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_pq.php",
            dataSrc : "data"
        },
        columns: columnDefs,
        select: "single",
        info: "false",
        /*dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]*/
            
          "createdRow": function( row, data, dataIndex){
                 if ( data["etat"] == "Ajourné" ) {        
                      $(row).addClass('red');
                    }
            }

  });
}
    	function enableB () {

  	var filas=$('#t1').DataTable().row('.selected');
		if(filas.length > 0){
	    $('#buttoncancel').prop('disabled', false);
	    $('#buttonview').prop('disabled', false);
		}

	    if(filas.length == 0){
	    $('#buttoncancel').prop('disabled', true);
	    $('#buttonview').prop('disabled', true);
	    }
}
    </script>
    <script type="text/javascript">
    	$(document).ready(function() {
 
	
//TODO add some select...options column as example
  
  loadData();
  enableB();

    $('#pdfbutton').click( function () {
      var el= $('#t1').DataTable().row('.selected');
      window.open("../../structure/pages/PHP/"+el.data().projet);
    } );
    
     $('#ccbutton').click( function () {
      var el= $('#t1').DataTable().row('.selected');
      window.open("../../structure/pages/PHP/"+el.data().cc);
    } );
 $("#Annuler").change(function() {
        if((this).checked){
        $('#Motif').prop('disabled', false);
    } else {
        $('#Motif').prop('disabled', true);

    }
  });
 var table = $('#t1').DataTable();

  $('#t1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        enableB();
        /*if(table.row( this ).data().short_list==""  ){
        $('#shortlbutton').prop('disabled', true);

        }else           $('#shortlbutton').prop('disabled', false);*/
    } );
 $("#Annuler").change(function() {
        if((this).checked){
        $('#Motif').prop('disabled', false);
    } else {
        $('#Motif').prop('disabled', true);

    }
  });
 $("#formcancel").on('submit',(function(e) {
        e.preventDefault();
        var Annuler = $("#Annuler").val();
        var Motif = $("#Motif").val();
        $.post("appeloffre/PHP/Annuler.php",
                            {Motif:Motif, Annuler:Annuler },
                            
                            function(data,status){
                                if(data.success){
                                $('#cancelModal').modal('hide');
                                $('#t1').DataTable().ajax.reload();

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Appel d\'offre Annulé',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
                                }
                                else{
                                    $.toast({
                                heading: 'Error',
                                text: 'Appel d\'offre Non Annulé',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            })
                                }
                                
                            },"json");
            


    }));
  
});
    </script>
</body>