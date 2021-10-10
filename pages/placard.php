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
 
<main>

    
    <div id="content">
          <?php include("../interface.php"); ?>
            <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">
                	<div>
                      
                    </div>
                    <a href="#" style="font-weight: bold; font-size:22px">Table des Placards</a>

                    <div>
                        <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                      <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModification" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Modifier" disabled><i class="fas fa-pencil-alt fa-lg mt-0"></i></button>
                      <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalpub" id="buttonProro" data-toggle="tooltip" data-placement="top" title="Modifier" disabled ><i class="fas fa-calendar-plus fa-lg mt-0"></i></button>
                      
                      <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalConsul" data-toggle="tooltip" data-placement="top" title="Consulter" id="buttonview" disabled=""><i class="fas fa-info-circle fa-lg mt-0"></i></button>
                      
                    </div>

                </div>
                <br>
                <!--AjouterPlacardForm%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                    <div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Ajouter un Placard</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formAddpla" method="post">    
                                        <div class="row">  

                                          <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="Code ">Code</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="Code" required >
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-xs-12">  
                                                    <div class="form-group">   
                                                        <label for="Nature">Nature</label>
                                                        <select class="form-control" id="Nature">
                                                         
                                                            <option value="Insertion d'Appel d'offre ouvert">Insertion d'Appel d'offre ouvert </option>
                                                            <option value="Insertion d'Appel d'offre restreint">Insertion d'Appel d'offre restreint </option>
                                                            <option value="Insertion de Consultaion selective">Insertion de Consultaion selective</option>
                                                            <option value="Prorogation des délais">Prorogation des délais</option>
                                                            <option value="Attribution Provisoire">Attribution Provisoire</option>
                                                            <option value="Attribution Définitive">Attribution Définitive</option>
                                                            <option value="Réctification">Réctification</option>
                                                            <option value="Annulation">Annulation</option>
                                                        </select>    
                                                    </div>  
                                            </div>
                                        </div>
                                <br>
                            
                        <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-primary rounded-0" id="addPlacard" type="submit" >Register</button>  
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
                                    <h4 class="modal-title w-100 font-weight-bold">Modification...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formEdit" method="post">    
                                        <div class="row">  
                                             <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mCode ">Code</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mCode" required >
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="mNature">Nature</label>
                                                    <select class="form-control" id="mNature">
                                                     
                                                        <option value="Insertion d'Appel d'offre ouvert">Insertion d'Appel d'offre ouvert </option>
                                                        <option value="Insertion d'Appel d'offre restreint">Insertion d'Appel d'offre restreint </option>
                                                        <option value="Insertion de Consultaion selective">Insertion de Consultaion selective</option>
                                                        <option value="Préqualification">Préqualification</option>
                                                        <option value="Prorogation des délais">Prorogation des délais</option>
                                                        <option value="Resultat Préqualification">Resultat Préqualification</option>
                                                        <option value="Attribution Provisoire">Attribution Provisoire</option>
                                                        <option value="Attribution Définitive">Attribution Définitive</option>
                                                        <option value="Réctification">Réctification</option>
                                                        <option value="Annulation">Annulation</option>
                                                    </select>    
                                                </div>  
                                            </div>
                                                
                                        </div>
                                               
                            
                        <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-primary rounded-0" id="validEdit" type="submit"  >Register</button>  
                        </div>
                    </form>

                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>

                      
                    
                    
                    <!--ADDpub %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                     <div class="modal fade" id="modalpub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Ajouter un Placard</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formAddpub" method="post">    
                                        <div class="row">     
                                        <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="delai">Délai de publication</label>  
                                                    <div class="container-fluid row">
                                                      <input id="delai" class="form-control col-sm-6 col-md-6" type="text" name="name" value="" required style=" margin-right: 14px;"> 
                                                      <span class="unit" style=" line-height: 2.3;font-size: 18px">Jours</span>
                                                    </div>
                                                </div>  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="Référence">Référence dans le BOASSEM</label>  
                                                    
                                                      <input id="Référence" class="form-control" type="text" name="name" value="" required style=" margin-right: 14px;"> 
                                                      
                                                </div>  
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Surface">Surface</label>
                                                    
                                                    <div class="container-fluid row">
                                                        <input id="Surface" class="form-control col-sm-6 col-md-6" type="text" name="name" value="" required style=" margin-right: 14px;">
                                                    </select>  
                                                      <span class="unit" style=" line-height: 2.3;font-size: 18px">Page</span>
                                                    </div>  
                                                </div>  
                                            </div> 
                                    </div>
                                        
                                <br>
                            
                        <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-primary rounded-0" id="addPlacard" type="submit" >Register</button>  
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


<!--Footer-->

<!--/.Footer-->

<style>

  main input[type=email]:focus,
  main input[type=password]:focus,
  main input[type=text]:focus,
  main input[type=url]:focus,
  main textarea:focus {
    border: 0;
  }

  .embed-responsive-16by9-fix-contact-form::before {
    height: 450px;
  }

  @media (min-width:580px) {

    .modal-contact-form-fix,
    .modal-contact-form-fix * {

      box-sizing: content-box !important;
    }

  }

</style>
    <script type="text/javascript">
        var columnDefs = [{
    title: "N° Placard",
    data:"num_p"
  }, {
    title: "Code",
    data:"code"
  }, {
    title: "Nature",
    data:"nature"
  }, {
    title: "Etat",
    data:"etat"
  }, {
    title: "N° publication",
    data:"num"
  }, {
    title: "Date publication",
    data:"pub"
  },  {
    title: "Référence de publication",
    data:"referenceP"
  },  {
    title: "Date Cloture",
    data:"date_cloture"
  }, {
    title: "N° Prorogations",
    data:"num_proro"
  }, {
    title: "Date Prorogations",
    data:"proro"
  },  {
    title: "Référence",
    data:"reference"
  },  {
    title: " Dépenses de publicité HT (DA)",
    data:"pubHT"
  },  {
    title: " Dépenses de publicité TTC (DA)",
    data:"pubTTC"
  }];
  
    function loadData() {
         var table =$('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/readPla.php",
            dataSrc : "data",
            
           
        },
        columns: columnDefs,
        select: "single",
        info: "false",


  });    
        $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
        return table;

}

function newpub () {

}

function rowselected () {

    var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().num_p, el.data().code, el.data().nature, el.data().etat ,el.data().num, el.data().pub, el.data().date_cloture,el.data().num_proro, el.data().proro, el.data().date_cloture_proro ];
    //alert(el.data().Num_Placard + el.data().code+ el.data().Nature+ el.data().etat+ el.data().num_pub+ el.data().date_pub+ el.data().date_cloture);
    return res;
}



function enableB () {

  var filas=$('#t1').DataTable().row('.selected');
if(filas.length > 0){
    $('#buttonDelete').prop('disabled', false);
    $('#buttonEdit').prop('disabled', false);
    $('#buttonview').prop('disabled', false);
    $('#buttonProro').prop('disabled', false);

    var res=rowselected();
    if(res[4]=='/'){
         $('#buttonProro').prop('disabled', true);
    }
   

}
    if(filas.length == 0){
        $('#buttonDelete').prop('disabled', true);
            $('#buttonEdit').prop('disabled', true);
            $('#buttonview').prop('disabled', true);
            $('#buttonProro').prop('disabled', true);



    }
}
$(document).ready(function() {
 

//TODO add some select...options column as example
    
    var table=loadData();
   
                                
  
  

  $('#t1 tbody').on( 'click', 'tr', function () {
         if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        enableB();
    } );
       $('#buttonAdd').click( function () {
             $.post("PHP/getcode.php",
                                              {},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Code').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].code+'">'+data.data[x].code+'</option>';
                                                      }
                                                       
                                                          $("#Code").html(html)
                                                          $("#Code").selectpicker('refresh');
                                              },"json");
            });
       $('#buttonEdit').click( function () {
             $.post("PHP/getcode.php",
                                              {},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mCode').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].code+'">'+data.data[x].code+'</option>';
                                                      }
                                                       
                                                          $("#mCode").html(html)
                                                          $("#mCode").selectpicker('refresh');
                                              },"json");
            });

          $("#formAddpla").submit(function(e) {
       //alert(document.getElementById('numPla').value);
        e.preventDefault();

            var code=document.getElementById('Code').value;
        
            var nature=document.getElementById('Nature').value;
           
            $.post("PHP/ADDPla.php",
            {code:code, nature:nature, etat:"Non Publié"},
            
            function(data,status){
             
                 $('#t1').DataTable().ajax.reload();
                 enableB();
                 if(data.success){

                    $.toast({
                            heading: 'Success',
                            text: 'Placard  Ajouté',
                            showHideTransition: 'slide',
                            hideAfter: 5000,
                            position: 'top-right',
                            icon: 'success'
                        })
                    $('#modalAjout').modal('hide');

                 }else {
                    $.toast({
                            heading: 'Error',
                            text: 'Placard Non Ajouté',
                            showHideTransition: 'plain',
                            hideAfter: 5000,
                            position: 'top-right',
                            icon: 'error'
                        })
                    $('#modalAjout').modal('hide');

                 }
             
            },"json");
           
             

         });
          $("#formEdit").submit(function(e) {
       //alert(document.getElementById('numPla').value);
        e.preventDefault();
 var res=rowselected();

 var num_p=res[0];
            var code=document.getElementById('mCode').value;
        
            var nature=document.getElementById('mNature').value;
           
            $.post("PHP/editPla.php",
            {num_p:num_p, code:code, nature:nature},
            
            function(data,status){
             
                 $('#t1').DataTable().ajax.reload();
                 enableB();
                 if(data.success){

                    $.toast({
                            heading: 'Success',
                            text: 'Placard  Modifié',
                            showHideTransition: 'slide',
                            hideAfter: 5000,
                            position: 'top-right',
                            icon: 'success'
                        })
                    $('#modalModification').modal('hide');

                 }else {
                    $.toast({
                            heading: 'Error',
                            text: 'Placard Non Modifié',
                            showHideTransition: 'plain',
                            hideAfter: 5000,
                            position: 'top-right',
                            icon: 'error'
                        })
                    $('#modalModification').modal('hide');

                 }
             
            },"json");
           
             

         });

          $("#formAddpub").submit(function(e) {
       //alert(document.getElementById('numPla').value);
        e.preventDefault();
 var res=rowselected();
 var proro=0;
 if (res[3]=="Publié") proro=1;
            var delai=document.getElementById('delai').value;
            var Surface=document.getElementById('Surface').value;
            var Référence=document.getElementById('Référence').value;
            var pubht=Surface*30000;
            var pubttc=Surface*36000;

           
            $.post("PHP/addpub.php",
            {num_p:res[0], delai:delai, Surface:Surface, Référence:Référence,  etat:"Publié", pubht:pubht, pubttc:pubttc, proro:proro },
            
            function(data,status){
             
                 $('#t1').DataTable().ajax.reload();
                 enableB();
                 if(data.success){

                    $.toast({
                            heading: 'Success',
                            text: 'Placard  Publié',
                            showHideTransition: 'slide',
                            hideAfter: 5000,
                            position: 'top-right',
                            icon: 'success'
                        })
                    $('#modalAjout').modal('hide');

                 }else {
                    $.toast({
                            heading: 'Error',
                            text: 'Placard Non Publié',
                            showHideTransition: 'plain',
                            hideAfter: 5000,
                            position: 'top-right',
                            icon: 'error'
                        })
                    $('#modalAjout').modal('hide');

                 }
             
            },"json");
           
             

         });



var temp=[];


  $('#buttonview').click( function () {
        var res= rowselected();
        
        document.getElementById('ccode').innerHTML=res[1];
        document.getElementById('cplacard').innerHTML=res[0];
        document.getElementById('cnature').innerHTML=res[2];
        document.getElementById('cetat').innerHTML=res[3];
         document.getElementById('cpub').innerHTML=res[4];
         document.getElementById('cdatepub').innerHTML=res[5];
        document.getElementById('cclo').innerHTML=res[6];
        document.getElementById('cppub').innerHTML=res[7];
         document.getElementById('cpdatepub').innerHTML=res[8];
        document.getElementById('cpclo').innerHTML=res[9];
        if (res[3]!="Publié"){$(".hide").hide();}
        else{
            $(".hide").show();
        }
      
    });
  //  */
 
});

    
    </script>

   <script type="text/javascript">$(function () {
  $('#buttonEdit').tooltip();
  $('#buttonDelete').tooltip();
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

  