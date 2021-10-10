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
<body>
  <div id="content">
      <?php include("../interfaceprojet.php"); ?>


  <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">

                   <div></div>

                    <a href="#" style="font-weight: bold; font-size:22px">Table des Commissions COP</a>

                    <div>
                
                        
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModif" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Renouvler membres" disabled=""><i class="fas fa-redo-alt fa-lg mt-0"></i></button>
                      
                      
                    </div>

                </div>
                <br><br>
                        <!--EDITForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalModif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Renouveler les Membres ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formEdit" method="post">    
                                        
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mPresident ">President</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mPresident"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mMembres ">Membres</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mMembres" required multiple>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                       

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit">Register </button>
                                            
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
     function myFunction() {
  $('#t1').DataTable().ajax.reload();
}
   </script>
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
        var columnDefs = [{
   title: "N° Commission",
    data:"id_c"
  }, {
    title: "District",
    data:"district",
    visible:false
  }, {
    title: "District",
    data:"districtC"
  }, {
    title: "President",
    data:"president"
  }, {
    title: "Membres",
    data:"membres"
  }, {
    title: "Date Renouvelement",
   data:"date_renouv"
  }];
    function loadData() {
      
        $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_cop.php",
            type: "POST",
            dataSrc : "data"
        },
        columns: columnDefs,
        select: "single",
        info: "false",
            

  });
}

function rowselected () {

    var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().id_c, el.data().date_renouv,el.data().district, el.data().membres, el.data().president];
    //alert(el.data().Num_Placard + el.data().code+ el.data().Nature+ el.data().etat+ el.data().num_pub+ el.data().date_pub+ el.data().date_cloture);
    return res;
}
      function enableB () {

    var filas=$('#t1').DataTable().row('.selected');
    if(filas.length > 0){
      $('#buttonEdit').prop('disabled', false);
    }

      if(filas.length == 0){
      $('#buttonEdit').prop('disabled', true);
      }
}

    </script>
     <script type="text/javascript">$(function () {
    $('#buttonAdd').tooltip();
  $('#buttonEdit').tooltip();
  
})</script>
    <script type="text/javascript">
      $(document).ready(function() {
       element = document.getElementById("Commissions");
  element.classList.toggle("active2");
  $('#Commissions').on('click', function () {
     element = document.getElementById("Commissions");
  element.classList.toggle("active");
  element = document.getElementById("COP");
  element.classList.toggle("active2");
  });
           
  loadData();
  enableB();

  var table=$('#t1').DataTable();
  $('#t1 tbody').on( 'click', 'tr', function () {
         if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
             enableB();
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        enableB();
    } );


$("#formEdit").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered
               //alert(data.message);
               var res=rowselected();
                    var President = $("#mPresident").val();
                    var Membres = $("#mMembres").val();
                    var id_c=res[0];
                    var renouv =res[1];
                    
                        
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        $.post("PHP/renouv.php",
                            {renouv:renouv, id_c:id_c, President:President, Membres:Membres},
                            function(data,status){
                                if(data.success){
                                $('#modalModif').modal('hide');
                                $('#t1').DataTable().ajax.reload();
                                $('#numD').val('');
                                            $('#dateD').val('');

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Membres Bien Modifié',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
/*
                                    document.getElementById('Code').value='';
                                    document.getElementById('objet').value='';
                                     $('#fileProjet_c').html("Choisissez un fichier");
                                      $('#filepdao').html("Choisissez un fichier");
                                      $('#fileFiche_s').html("Choisissez un fichier");
                                     
*/
                                }
                                else{
                                    $.toast({
                                heading: 'Error',
                                text: 'Membres Non Modifi',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            })
                                }
                                
                            },"json"); 


               
                  
                    
                
                        
                 
   

    }));
$('#buttonEdit').click( function () {
                var res= rowselected();
        
        var PresidentA=res[4];
        var MembresA=res[3];
        var dist=res[2];

                                      $.post("PHP/get_presidentCM.php",
                                              {dist:dist},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mPresident').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                        var sel="";
                                                        if (data.data[x].mem==PresidentA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mPresident").html(html)
                                                          $("#mPresident").selectpicker('refresh');
                                              },"json");
                                      
                                        $.post("PHP/get_memCM.php",
                                              {dist:dist},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mMembres').selectpicker();
                                                      var html='';
                                                      var memA=MembresA.split('<br />\n');
                                                      
                                                      for(x=0;x<l;x++) { var sel=false;
                                                        for (var i =0; i<memA.length; i++) {
                                                          
                                                        if (data.data[x].mem==memA[i]) {html+='<option value="'+data.data[x].id_mem+'" '+"selected"+'>'+data.data[x].mem+'</option>';
                                                        sel=true;
                                                      }
                                                      
                                                        } if (sel==false) {html+='<option value="'+data.data[x].id_mem+'" '+""+'>'+data.data[x].mem+'</option>'}
                                                          
                                                      }
                                                       
                                                          $("#mMembres").html(html)
                                                          $("#mMembres").selectpicker('refresh');
                                              },"json");
                                  
                
    });




  
});
    </script>
</body>