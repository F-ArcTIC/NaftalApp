
<?php
session_start(); ?>
<? header('Content-Type: text/html;charset=utf-8'); ?>
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
      <?php include("../interface.php"); ?>


  <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">

                   <div></div>

                    <a href="#" style="font-weight: bold; font-size:22px">Table des Utilisateurs</a>

                    <div>
                      <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModif" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Modifier" disabled=""><i class="fas fa-pencil-alt fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;"  id="buttonReset" data-toggle="tooltip" data-placement="top" title="Modifier Mot de passe" disabled=""><i class="fas fa-redo-alt fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" id="buttonDelete"  data-toggle="modal" data-target="#suppModal"  data-toggle="tooltip" data-placement="top" title="Supprimer" disabled ><i class="far fa-trash-alt fa-lg mt-0" ></i>
                      </button>
                    </div>

                </div>
                <br>

                

                                        
                    <div class="container-fluid">
                <table id="t1" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                  
               </table>
                     

            </div>
                 
                  <!--AjoutForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Nouvelle Utilisateur ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formAdd" method="post">    
                                        
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Type">Type</label>
                                                    <select class="form-control" id="Type">
                                                        <option value="Structure">Structure</option>
                                                        <option value="CM">Commission Marché</option>

                                                        
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
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Direction" id="LDirection">Direction</label>
                                                    <select class="form-control" id="Direction">
                                                        
                                                        <option value="TECH">Direction Technique</option>
                                                        <option value="TRS">Direction Transport</option>
                                                        <option value="DAM">Direction Administration</option>
                                                        <option value="CAN">Direction Canalisation</option>
                                                        <option value="PETR">Direction Lubrifiants</option>
                                                        <option value="INF">Direction Informatique</option>
                                                        <option value="HSE">Direction HSE</option>
                                                        <option value="DEV">Direction Développement</option>
                                                        

                                                        
                                                    </select>    
                                                </div>  
                                            </div>
                                        </div>
                                        <br>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="addAO">Enregistrer </button>
                                            
                                        </div>
                                    </form>


                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>

                     <!--EditForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalModif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Modifier Utilisateur ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formEdit" method="post">    
                                        
                                        <div class="row">
                                            
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="MDistricte">Districte</label>
                                                    <select class="form-control" id="MDistricte">
                                                        
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
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="MDirection" id="MLDirection">Direction</label>
                                                    <select class="form-control" id="MDirection">
                                                        
                                                        <option value="TECH">Direction Technique</option>
                                                        <option value="TRS">Direction Transport</option>
                                                        <option value="DAM">Direction Administration</option>
                                                        <option value="CAN">Direction Canalisation</option>
                                                        <option value="PETR">Direction Lubrifiants</option>
                                                        <option value="INF">Direction Informatique</option>
                                                        <option value="HSE">Direction HSE</option>
                                                        <option value="DEV">Direction Développement</option>
                                                        

                                                        
                                                    </select>    
                                                </div>  
                                            </div>
                                        </div>
                                        <br>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="addAO">Enregistrer </button>
                                            
                                        </div>
                                    </form>


                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>
                 <!--SuppressionForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                
                        <div class="modal fade" id="suppModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Suppression</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                Voulez vous supprimer cet Appel d'Offre?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="validSupp">OUI</button>
                                              </div>
                                            </div>
                                          </div>
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
        /*var columnDefs = [{    
    data:"numSeq" 
  },{
    data:"code"
  },{
    data:"Objet"
  },{
            title: "OK",
            "targets": -1,
            "data": null,
            "defaultContent": "<div id='tool' class='text-center'><button class='btn btn-light ' ><i class='fas fa-file-pdf fa-lg'></i></button></div>"
        }];*/
        var columnDefs = [{
    title: "id user",
    data:"id_user",
    visible: false
  },{title: "Nom d'Utilisateur",
    data:"username"
  }, {
    title: "Mot de passe",
    data:"password"
  }, {
    title: "Type",
    data:"Type",

  }, {
    title: "Districte / Branche",
    data:"Districte"
  }, {
    title: "Direction",
    data:"Direction"
  }, {
    title: "Districte",
    data:"districte",
    visible: false
  }, {
    title: "Direction",
    data:"direction",
    visible: false
  }];
    function loadData() {
        var table= $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_users.php",
        },
columns: columnDefs,
        info: "false",
                select: "single",


  });
       
   
}

function rowselected () {
      
      // Set initial data
      //$('#edit-name').val(data["code"]).focus();
      //var res=[data["id_projet"], data["type"],data["mode"],data["nature"], data["code"], data["objet"] ,data["direction"],data["operateur"],data["pdao"],data["id_user"]];
       //return res;
  var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().id_user, el.data().username, el.data().password, el.data().Type, el.data().districte,el.data().direction];
    //alert(el.data().Num_Placard + el.data().code+ el.data().Nature+ el.data().etat+ el.data().num_pub+ el.data().date_pub+ el.data().date_cloture);
    return res;
   
    
 
   
}
function enableB () {


  var filas=$('#t1').DataTable().row('.selected');
  if(filas.length > 0 ){
    $('#buttonEdit').prop('disabled', false);
        $('#buttonReset').prop('disabled', false);
        $('#buttonDelete').prop('disabled', false);


}
    if(filas.length == 0){
            $('#buttonEdit').prop('disabled', true);
                $('#buttonReset').prop('disabled', true);
                $('#buttonDelete').prop('disabled', true);

             


    }
}
      
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
 element = document.getElementById("user");
  element.classList.toggle("active"); 



  $('#buttonEdit').tooltip();
  $('#buttonAdd').tooltip();
  $('#buttonDelete').tooltip();
  $('#buttonReset').tooltip()
  

  $("#Direction").show();

    $("#LDirection").show();
 $( "#Type" ).change(function() {
  var Type = $("#Type").val();
  if(Type=="CM"){
  $("#Direction").hide();
  $("#LDirection").hide();
   
  }else  {
   $("#Direction").show();

    $("#LDirection").show();

     }
  });
     $( "#MType" ).change(function() {
  var Type = $("#MType").val();
  if(Type=="CM"){
  $("#MDirection").hide();
  $("#MLDirection").hide();
   
  }else  {
   $("#MDirection").show();

    $("#MLDirection").show();

     }
//TODO add some select...options column as example
  });
  loadData();
  var table = $('#t1').DataTable();
    $('#t1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        enableB();
        if(table.row( this ).data().Type=="Audit" || table.row( this ).data().Type=="Administrateur" ){
          $('#buttonEdit').prop('disabled', true);
          $('#buttonDelete').prop('disabled', true);
        }
        
    } );

  $("#formAdd").on('submit',(function(e) {
         e.preventDefault(); //If this method is called, the default action of the event will not be                            triggered.
        //var res=rowselected();
        
        var Type = $("#Type").val();
        var Districte = $("#Districte").val();
        var Direction = $("#Direction").val();

        
                        $.post("PHP/add_user.php",
                            {Type:Type, Districte:Districte, Direction:Direction},

                            
                            function(data,status){
                                if(data.success){
                                $('#modalAjout').modal('hide');
                                $('#t1').DataTable().ajax.reload();

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Utilisateur bien Ajouté',
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
                                text: 'Utilisateur Non Ajouté',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            })
                                }
                                
                            },"json"); 


                    
                    
                    

                   
                

    }));
  $('#buttonEdit').click( function () {
      
$("#MDirection").show();
  $("#MLDirection").show();
        var res= rowselected();
        document.getElementById('MDirection').value=res[5];
        document.getElementById('MDistricte').value=res[4];
        if(res[3]=='CM') {
          $("#MDirection").hide();
  $("#MLDirection").hide();
   
        }

});
  $('#validSupp').click( function () {
    var res= rowselected();
        $.post("php/delete_user.php",
            {id_user:res[0]},
            
            function(data,status){
             if(data.success) {
                 $('#t1').DataTable().ajax.reload();
                 enableB();
                 //alert(data);
                 $.toast({
          heading: 'Success',
          text: 'Utilisateur Supprimé',
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
          text: 'Utilisateur Non Supprimé',
          showHideTransition: 'plain',
                hideAfter: 5000,
                position: 'top-right',
          icon: 'error'
      })
             }
            },"json");

    });

$('#buttonReset').click( function () {
        var res=rowselected();
      $.post("PHP/reset_pass.php",
                            {id_user:res[0]},

                            
                            function(data,status){
                              if(data.success){
                                $('#t1').DataTable().ajax.reload();

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Mot de passe bien Modifié',
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
                                text: 'Mot de passe Non Modifié',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            })
                                }
                                
                            },"json"); 


});
$("#formEdit").on('submit',(function(e) {
         e.preventDefault(); //If this method is called, the default action of the event will not be                            triggered.
        var res=rowselected();
        
        var Type = res[3];
        var Districte = $("#MDistricte").val();
        var Direction = $("#MDirection").val();

        
                        $.post("PHP/edit_user.php",
                            {id_user:res[0], Districte:Districte, Direction:Direction , Type:Type},

                            
                            function(data,status){
                                if(data.success){
                                $('#modalModif').modal('hide');
                                $('#t1').DataTable().ajax.reload();

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Utilisateur Modifié',
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
                                text: 'Utilisateur Non Modifié',
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