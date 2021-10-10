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

                    <a href="#" style="font-weight: bold; font-size:22px">Table des PVs d'ouverture technique</a>

                    <div>
                
                        
                      <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModification" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Modifier" disabled="" ><i class="fas fa-pencil-alt fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;"  id="buttonview" data-toggle="tooltip" data-placement="top" title="Consulter PV" disabled="" ><i class="fas fa-file-pdf fa-lg mt-0"></i></button>
                    </div>

                </div>
                <br>

                
                    
                    <!--AjoutForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Nouveau PV Technique ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formAdd" method="post">    
                                        <div class="row">  
                                           <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="Code ">Code</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="Code" required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="numpv">N° PV</label>  
                                                    <input type="text" id="numpv"  class="form-control" aria-describedby="inputGroupPrepend" required autocomplete="off"/>
                                                </div>  
                                            </div> 
                                            <div class="col-sm-6 col-md-6 col-xs-12" >
                                              <div class="form-group">  
                                                    <label for="datepv">Date PV</label> 
                                                            <input placeholder="Selected date" type="date" id="datepv" autocomplete="off" class="form-control datepicker" required>
                                              </div>
                                            </div>
                                                 <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="nbcc">Nombre de Cahier de charge retiré</label>  
                                                    <input type="text" id="nbcc"  class="form-control" aria-describedby="inputGroupPrepend" required autocomplete="off"/>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="nboff">Nombre d'offre reçus</label>  
                                                    <input type="text" id="nboff"  class="form-control" aria-describedby="inputGroupPrepend" required autocomplete="off"/>
                                                </div>  
                                            </div>
                                        
                                          <div class="col-sm-12 col-md-12 col-xs-12">
                                                 <label for="pvcopt">Fichier</label>  
                                                            <div class="custom-file">  
                                                                <input type="file" name="pvcopt" class="custom-file-input" id="pvcopt" autocomplete="off" >  
                                                                <label class="custom-file-label" for="pvcopt" style="font-weight: initial;" id="filepvcopt">Choisissez un fichier</label>  
                                                                  
                                                            </div>
                                            </div>
                                            
                                        </div>
 
                                        
                                        <br>
                                        <br> 
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="addAO">Register </button>
                                            
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
                                    <h4 class="modal-title w-100 font-weight-bold">Modifier PV Technique ...</h4>
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
                                                    <select class="selectpicker form-control" data-live-search="true" id="mCode" required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="mnumpv">N° PV</label>  
                                                    <input type="text" id="mnumpv"  class="form-control" aria-describedby="inputGroupPrepend" required autocomplete="off"/>
                                                </div>  
                                            </div> 
                                            <div class="col-sm-6 col-md-6 col-xs-12" >
                                              <div class="form-group">  
                                                    <label for="mdatepv">Date PV</label> 
                                                            <input placeholder="Selected date" type="date" id="mdatepv" autocomplete="off" class="form-control datepicker" required>
                                              </div>
                                            </div>
                                                 
                                        
                                        <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="mnbcc">Nombre de Cahier de charge retiré</label>  
                                                    <input type="text" id="mnbcc"  class="form-control" aria-describedby="inputGroupPrepend" required autocomplete="off"/>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="mnboff">Nombre d'offre reçus</label>  
                                                    <input type="text" id="mnboff"  class="form-control" aria-describedby="inputGroupPrepend" required autocomplete="off"/>
                                                </div>  
                                            </div>
                                        
                                          <div class="col-sm-12 col-md-12 col-xs-12">
                                                 <label for="mpvcopt">Fichier</label>  
                                                            <div class="custom-file">  
                                                                <input type="file" name="mpvcopt" class="custom-file-input" id="mpvcopt" autocomplete="off" >  
                                                                <label class="custom-file-label" for="mpvcopt" style="font-weight: initial;" id="mfilepvcopt">Choisissez un fichier</label>  
                                                                  
                                                            </div>
                                            </div>
                                           </div> 
 
                                        
                                        <br>
                                        <br> 
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="add">Register </button>
                                            
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

   <script type="text/javascript">$(function () {
  $('#buttonEdit').tooltip();
  $('#buttonAdd').tooltip();
  $('#buttonview').tooltip()
})</script>
    <script type="text/javascript">
        var columnDefs = [{
    title: "id",
    data:"id_pv",
    visible: false
  }, {
    title: "num_pv",
    data:"num_pv",
    visible: false
  }, {
    title: "date_pv",
    data:"date_pv",
    visible: false
  }, {
    title: "N° / Date PV",
    data:"n_date"
  }, {
    title: "Code",
    data:"code"
  },{
    title: "file",
    data:"file_pv",
    visible: false
  },{
    title: "Nombre CC retiré",
    data:"nb_cc",
  },{
    title: "Nombre offre reçus",
    data:"nb_offre",
  }];
    function loadData() {
        $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_pvcop.php",
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
                 if ( data["etat"] == "Annulé" ) {        
                      $(row).addClass('red');
                    }
            }

  });
}
function rowselected () {

    var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().id_pv, el.data().num_pv,el.data().date_pv,el.data().n_date, el.data().code, el.data().objet,el.data().file_pv,el.data().nb_cc,el.data().nb_offre];
    //alert(el.data().Num_Placard + el.data().code+ el.data().Nature+ el.data().etat+ el.data().num_pub+ el.data().date_pub+ el.data().date_cloture);
    return res;
}
 function enableB () {

    var filas=$('#t1').DataTable().row('.selected');
    if(filas.length > 0){
      $('#buttonEdit').prop('disabled', false);
      $('#buttonview').prop('disabled', false);
        
        
    }

      if(filas.length == 0){
      $('#buttonEdit').prop('disabled', true);
        $('#buttonview').prop('disabled', true);
      }


}

    </script>
    <script type="text/javascript">
      $(document).ready(function() {

//TODO add some select...options column as example
 element = document.getElementById("PV");
  element.classList.toggle("active2");
  $('#PV').on('click', function () {
     element = document.getElementById("PV");
  element.classList.toggle("active");
  element = document.getElementById("PVCOPt");
  element.classList.toggle("active2");
  });
         
  loadData();
  enableB();

   var table = $('#t1').DataTable();
    
 $('#t1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        enableB();
        
    } );


   $('#cmbacc ').on('click',function(){
    if ($(this).is(':checked')) {
      $( "#numvisa").prop('disabled', false);
       $( "#typevisa").prop('disabled', false);
    }else{
      $( "#numvisa").prop('disabled', true);
      $( "#typevisa").prop('disabled', true);
      document.getElementById('numvisa').value="";
    }
            });
   $('#mcmbacc ').on('click',function(){
    if ($(this).is(':checked')) {
      $( "#mnumvisa").prop('disabled', false);
      $( "#mtypevisa").prop('disabled', false);
      
    }else{
      $( "#mnumvisa").prop('disabled', true);
      $( "#mtypevisa").prop('disabled', true);
      document.getElementById('mnumvisa').value="";
    }
            });

  $('#pvcopt ').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('#filepvcopt').html(fileName);
            });
  $('#mpvcopt ').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('#mfilepvcopt').html(fileName);
            });


  $('#buttonAdd').click( function () {
      

    
                $.post("PHP/get_code_pvcopt.php",
                        {},
                        
                        function(data,status){
                          if(data.success){
                            var x=0;
                            var l=data.data.length;
                             
                                $('#Code').selectpicker();
                                var html='';
                                
                                
                                for(x=0;x<l;x++) {
                                    html+='<option value="'+data.data[x].code+'">'+data.data[x].code+'</option>';
                                }
                                 
                                    $("#Code").html(html)
                                    $("#Code").selectpicker('refresh');
                          }else {
                             var html='';
                              $("#Code").html(html)
                              $("#Code").selectpicker('refresh');
                          }
                         },"json");

  });

  $('#buttonview').click( function () {
      var el= $('#t1').DataTable().row('.selected');
      window.open("PHP/"+el.data().file_pv);
    } );


  $('#buttonEdit').click( function () {
    var res=rowselected();
    document.getElementById('mnumpv').value=res[1];
        document.getElementById('mdatepv').value=res[2];
    document.getElementById('mfilepvcopt').innerHTML = res[6];
    document.getElementById('mnbcc').value = res[7];
    document.getElementById('mnboff').value = res[8];


               
                $.post("PHP/get_code_pvcopt.php",
                        {},
                        
                        function(data,status){
                          if(data.success){
                            var x=0;
                            var l=data.data.length;
                             
                                $('#mCode').selectpicker();
                                var html='';
                                
                                
                                for(x=0;x<l;x++) {
                                    html+='<option value="'+data.data[x].code+'">'+data.data[x].code+'</option>';
                                }
                                html+='<option value="'+res[4]+'" selected >'+res[4]+'</option>';
                                 
                                    $("#mCode").html(html)
                                    $("#mCode").selectpicker('refresh');
                          }else {
                             var html='';
                             html+='<option value="'+res[4]+'" selected >'+res[4]+'</option>';
                              $("#mCode").html(html)
                              $("#mCode").selectpicker('refresh');
                          }
                         },"json");
        
        
        
      

  });
  $("#formAdd").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered.
        $.ajax({
            url: "PHP/upl_pvcopt.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,     //when we send json file we write contentType: 'application/json'
            cache: false,
            processData:false,
            success: function(data)
            {
               

               //alert(data.message);
               if(data.success){
                   var Code = $("#Code").val();
                   var numpv = $("#numpv").val();
                   var datepv = $("#datepv").val();
                   var nbcc = $("#nbcc").val();
                   var nboff = $("#nboff").val();
                 
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        $.post("PHP/add_pvcopt.php",
                            {code:Code, numpv:numpv, datepv:datepv, file_pv:data.pvcopt, nbcc:nbcc,  nboff:nboff },
                            
                            function(data,status){
                                if(data.success){
                                $('#modalAjout').modal('hide');
                                $('#t1').DataTable().ajax.reload();
                                $("#pvcopt").next('#filepvcopt').html("Choisissez un fichier");
                                    $.toast({
                                heading: 'Success',
                                text: 'PV COP  bien Ajouté',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })

                                }
                                else{
                                    
                                    $.toast({
                                heading: 'Error',
                                text: 'PV COP Non Ajouté',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            }) 
                                    $.toast({
                                heading: 'Warning',
                                text: data.message,
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'Warning'
                            })
                                }
                                
                            },"json"); 
               }
               else{

                $.toast({
                                heading: 'Error',
                                text: 'PV COP Non Ajouté',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            }) 

                  $.toast({
                            heading: 'Warning',
                            text: data.message,
                            showHideTransition: 'plain',
                            hideAfter: 5000,
                            icon: 'Warning',
                            position: 'top-right',
                        })  
                
                
                

                

               }

                  
                    
                
                        },
                 
       });

    }));
  $("#formEdit").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered.
        
        var res=rowselected();
        $.ajax({
            url: "PHP/upl_editpvcopt.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,     //when we send json file we write contentType: 'application/json'
            cache: false,
            processData:false,
            success: function(data)
            {
               

               //alert(data.message);
               if(data.success){
                var id_cop = res[0];
                var ancode = res[4];
                   var Code = $("#mCode").val();
                   var numpv = $("#mnumpv").val();
                   var datepv = $("#mdatepv").val();
                   var nbcc = $("#mnbcc").val();
                   var nboff = $("#mnboff").val();
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        $.post("PHP/edit_pvcopt.php",
                            {id_cop:id_cop, ancode:ancode, code:Code, num_pv:numpv, date_pv:datepv, file_pv:data.pvcopt, an_pv:res[6],nbcc:nbcc, nboff:nboff },
                            
                            function(data,status){
                                if(data.success){
                                $('#modalModification').modal('hide');
                                $('#t1').DataTable().ajax.reload();
                                $("#mpvcopt").next('#mfilepvcopt').html("Choisissez un fichier");
                                    $.toast({
                                heading: 'Success',
                                text: 'PV Bien Modifié',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })

                                }
                                else{
                                $("#pdao").next('#filepdao').html("Choisissez un fichier");
                                    
                                    $.toast({
                                heading: 'Error',
                                text: 'PV COP Non Modifié',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            }) 
                                    $.toast({
                                heading: 'Warning',
                                text: data.message,
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'Warning'
                            })
                                }
                                
                            },"json"); 
               }
               else{

                $.toast({
                                heading: 'Error',
                                text: 'PV COP Non Modifié',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            }) 

                  $.toast({
                            heading: 'Warning',
                            text: data.message,
                            showHideTransition: 'plain',
                            hideAfter: 5000,
                            icon: 'Warning',
                            position: 'top-right',
                        })  
                
                
                

                

               }

                    
                
                        },
                 
       });

    }));

});
 
    </script>
</body>