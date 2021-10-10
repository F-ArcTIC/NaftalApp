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
      <?php include("../interface.php"); ?>


  <div class="container-fluid table-responsive">
      
            <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">
                  <div>
                      
                    </div>
                    <a href="#" style="font-weight: bold; font-size:22px">Table des Membres</a>

                    <div>
                        <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                      <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModification" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Modifier" disabled><i class="fas fa-pencil-alt fa-lg mt-0"></i></button>
                    <button type="button" id="buttonsetout" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="" data-toggle="tooltip" data-placement="top" title="Hors service" disabled><i class="fas fa-times fa-lg mt-0"></i></button>
                      <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalConsul" data-toggle="tooltip" data-placement="top" title="Consulter" id="buttonview" disabled=""><i class="fas fa-info-circle fa-lg mt-0"></i></button>
                      
                    </div>

                </div>
                <br>


                        <!--AjoutnForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                        <div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Nouveau Membre ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formADD" method="post">    
                                        <div class="row">  
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="Nom">Nom </label>  
                                                    <input type="text"  class="form-control" aria-describedby="inputGroupPrepend" id="Nom" autocomplete="off" required />
                                                </div>  
                                            </div>
                                             <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="Prenom">Prenom</label>  
                                                    <input type="text"  class="form-control" aria-describedby="inputGroupPrepend" id="Prenom" autocomplete="off" required />
                                                </div>  
                                            </div>  
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Poste">Poste</label>
                                                    <select class="form-control" id="Poste">
                                                     
                                                        <option value="Chef de section">Chef de section</option>
                                                        <option value="Ingenieur Technique">Ingenieur Technique</option>
                                                        <option value="Cadre d'etude">Cadre d'etude</option>
                                                        <option value="Chargé d'etude">Chargé d'etude</option>
                                                        <option value="Cadre Superieur">Cadre Superieur</option>
                                                        <option value="Chef de Projet">Chef de Projet</option>
                                                        <option value="Attaché de direction">Attaché de direction</option>
                                                        <option value="Directeur">Directeur</option>
                                                        <option value="Chef de departement">Chef de departement</option>
                                                        <option value="Chef de centre">Chef de centre</option>
                                                        <option value="Chargé de service">Chargé de service</option>
                                                        <option value="Conseiller">Conseiller</option>

                                                        
                                                    </select>    
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Districte">Districte</label>
                                                    <select class="form-control" id="Districte">
                                                        <option value="DIR">Branche</option>
                                                       <option value="D02">Districte de Chlef</option>
                                                        <option value="D04">Districte d'Oum El Bouaghi</option>
                                                        <option value="D05">Districte de Batna</option>
                                                        <option value="D06">Districte de Béjaïa</option>
                                                        <option value="D08">Districte de Béchar</option>
                                                        <option value="D09">Districte de Blida</option>
                                                        <option value="D10">Districte de Bouira</option>
                                                        <option value="D13">Districte de Tlemcen</option>
                                                        <option value="D14">Districte de Tiaret</option>
                                                        <option value="D15">Districte de Tizi Ouzou</option>
                                                        <option value="D16">Districte d'Alger</option>
                                                        <option value="D17">Districte de Djelfa</option>
                                                        <option value="D19">Districte de Sétif</option>
                                                        <option value="D20">Districte de Saïda</option>
                                                        <option value="D21">Districte de Skikda</option>
                                                        <option value="D25">Districte de Constantine</option>
                                                        <option value="D30">Districte d'Ouargla</option>
                                                        <option value="D31">Districte d'Oran</option>
                                                        <option value="D34">Districte de Bordj Bou Arreridj</option>

                                                        
                                                    </select>    
                                                </div>  
                                            </div>
                                                
                                        </div>
                                        
                                        <br>
                                
                        <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-primary rounded-0" id="ValidADD" type="submit"  >Register</button>  
                        </div>
                    </form>

                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>



                      <!--ModificationForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalModification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Modifier Membre ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formEdit" method="post">    
                                        <div class="row">  
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="mNom">Nom </label>  
                                                    <input type="text"  class="form-control" aria-describedby="inputGroupPrepend" id="mNom" autocomplete="off" required />
                                                </div>  
                                            </div>
                                             <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="mPrenom">Prenom</label>  
                                                    <input type="text"  class="form-control" aria-describedby="inputGroupPrepend" id="mPrenom" autocomplete="off" required />
                                                </div>  
                                            </div>  
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="mPoste">Poste</label>
                                                     <select class="form-control" id="mPoste">
                                                     
                                                        <option value="Chef de section">Chef de section</option>
                                                        <option value="Ingenieur Technique">Ingenieur Technique</option>
                                                        <option value="Cadre d'etude">Cadre d'etude</option>
                                                        <option value="Chargé d'etude">Chargé d'etude</option>
                                                        <option value="Cadre Superieur">Cadre Superieur</option>
                                                        <option value="Chef de Projet">Chef de Projet</option>
                                                        <option value="Attaché de direction">Attaché de direction</option>
                                                        <option value="Directeur">Directeur</option>
                                                        <option value="Chef de departement">Chef de departement</option>
                                                        <option value="Chef de centre">Chef de centre</option>
                                                        <option value="Chargé de service">Chargé de service</option>
                                                        <option value="Conseiller">Conseiller</option>

                                                        
                                                    </select>    
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="mDistricte">Districte</label>
                                                    <select class="form-control" id="mDistricte">
                                                        <option value="DIR">Branche</option>
                                                        <option value="D02">Districte de Chlef</option>
                                                        <option value="D04">Districte d'Oum El Bouaghi</option>
                                                        <option value="D05">Districte de Batna</option>
                                                        <option value="D06">Districte de Béjaïa</option>
                                                        <option value="D08">Districte de Béchar</option>
                                                        <option value="D09">Districte de Blida</option>
                                                        <option value="D10">Districte de Bouira</option>
                                                        <option value="D13">Districte de Tlemcen</option>
                                                        <option value="D14">Districte de Tiaret</option>
                                                        <option value="D15">Districte de Tizi Ouzou</option>
                                                        <option value="D16">Districte d'Alger</option>
                                                        <option value="D17">Districte de Djelfa</option>
                                                        <option value="D19">Districte de Sétif</option>
                                                        <option value="D20">Districte de Saïda</option>
                                                        <option value="D21">Districte de Skikda</option>
                                                        <option value="D25">Districte de Constantine</option>
                                                        <option value="D30">Districte d'Ouargla</option>
                                                        <option value="D31">Districte d'Oran</option>
                                                        <option value="D34">Districte de Bordj Bou Arreridj</option>

                                                        
                                                    </select>      
                                                </div>  
                                            </div>
                                                
                                        </div>
                                        
                                        <br>
                                
                        <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-primary rounded-0" id="validEdit" type="submit"  >Register</button>  
                        </div>
                    </form>

                                </div>
      
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
</div>
</main>

    <script type="text/javascript">
        var columnDefs = [{
    title: "id",
    data:"id_mem",
    visible: false
  },{title: "Nom",
    data:"nom_mem"
  }, {
    title: "Prenom",
    data:"prenom_mem"
  }, {
    title: "etat",
    data:"etat",
    visible: false
  }, {
    title: "Districte",
    data:"Districte"
  }, {
    title: "Poste",
    data:"poste"
  }];
  
    function loadData() {
        var table=$('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_membres.php",
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
    $('#buttonEdit').prop('disabled', false);
    $('#buttonsetout').prop('disabled', false);
    $('#buttonview').prop('disabled', false);

}
    if(filas.length == 0){
            $('#buttonEdit').prop('disabled', true);
            $('#buttonsetout').prop('disabled', true);
            $('#buttonview').prop('disabled', true);
             


    }
}
$(document).ready(function() {
 

//TODO add some select...options column as example
    $('#buttonEdit').tooltip();
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
    
    $("#formADD").on('submit',(function(e) {
      e.preventDefault();
    var Nom = $("#Nom").val();
       var Prenom = $("#Prenom").val();
       var Poste = $("#Poste").val();
       var Districte = $("#Districte").val();
      
  //alert(Nom +"   "+ Prenom+ "   "+Poste+"   "+Direction);
        $.post("PHP/add_membres.php",
            {nom_mem:Nom, prenom_mem:Prenom, poste:Poste, Districte:Districte},
            
            function(data,status){
                if(data.success) {
                 $('#t1').DataTable().ajax.reload();
                  $('#modalAjout').modal('hide');
                 $.toast({
                heading: 'Success',
                text: 'Membre Ajouté',
                showHideTransition: 'slide',
                hideAfter: 5000,
                 position: 'top-right',
                icon: 'success'
            })
             }
             else {
                //alert(data.message);
                $.toast({
                heading: 'Error',
                text: 'Membre Non Ajouté',
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
        document.getElementById('mNom').value=res[0];
        document.getElementById('mPrenom').value=res[1];
        document.getElementById('mDistricte').value=res[3];
        document.getElementById('mPoste').value=res[4];

});




        $("#formEdit").on('submit',(function(e) {
      e.preventDefault();
       var Nom = $("#mNom").val();
       var Prenom = $("#mPrenom").val();
       var Districte = $("#mDistricte").val();
       var Poste = $("#mPoste").val();
       var res=rowselected();
        alert("anNom:"+res[0] +"anPrenom:"+res[1]+ "AnDirection:"+res[3] +"anPoste:"+res[4]+ "Nom:"+Nom+ "Prenom:"+Prenom+"Districte:"+Districte+"Poste:"+Poste);
        $.post("PHP/edit_membre.php",
            {id_mem: res[5], Nom:Nom, Prenom:Prenom, Districte:Districte, Poste:Poste},
            
            function(data,status){
                if(data.success) {
                 $('#t1').DataTable().ajax.reload();
                 $('#modalModification').modal('hide');
                 $.toast({
                heading: 'Success',
                text: 'Membre Modifié',
                showHideTransition: 'slide',
                hideAfter: 5000,
                position: 'top-right',
                icon: 'success'
            })
             }
             else {
                //alert(data.message);
                $.toast({
                heading: 'Error',
                text: 'Membre Non Modifié',
                showHideTransition: 'plain',
                hideAfter: 5000,
                position: 'top-right',
                icon: 'error'
            })
             }
            },"json");  
            
        }));
    

     

     $('#buttonsetout').click( function () {
        var res= rowselected();
        $.post("PHP/mem_hors_service.php",
            {id_mem: res[5]},
            
            function(data,status){
                if(data.success) {
                 $('#t1').DataTable().ajax.reload();
                 $.toast({
                heading: 'Success',
                text: 'Membre Modifié',
                showHideTransition: 'slide',
                hideAfter: 5000,
                position: 'top-right',
                icon: 'success'
            })
             }
             else {
                //alert(data.message);
                $.toast({
                heading: 'Error',
                text: 'Membre Non Modifié',
                showHideTransition: 'plain',
                hideAfter: 5000,
                position: 'top-right',
                icon: 'error'
            })
             }
            },"json");  
            
        });
      
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

  