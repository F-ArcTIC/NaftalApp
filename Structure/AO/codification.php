
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
    <script type="text/javascript" language="javascript" src="../../js/dataTables.select.min.js"></script>

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

                    <a href="#" style="font-weight: bold; font-size:22px">Table des demandes de Codifications</a>

                    <div>
                
                        <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModif" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Modifier" ><i class="fas fa-pencil-alt fa-lg mt-0"></i></button>
                        <button class="btn btn-outline-white btn-rounded px-2" id="pdfbutton" ><i class='fas fa-file-pdf fa-lg'></i></button>
                      
                      
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
                                    <h4 class="modal-title w-100 font-weight-bold">Nouvelle demande de codification ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formAddAO" method="post">    
                                        
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="mode">Mode</label>
                                                    <select class="form-control" id="mode">
                                                     
                                                        <option value="Appel d'offre">Appel d'offre </option>  
                                                        <option value="Consultation">Consultation</option>
                                                        <option value="Grés a Grés">Grés a Grés</option>
                                                        <option value="Préqualification">Préqualification</option>
                                                    </select>    
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="nature" id="tmode">Nature du mode</label>
                                                    <select class="form-control" id="natureao">
                                                        <option value="Ouvert">Ouvert</option>
                                                        <option value="Restreint">Restreint</option>
                                                        
                                                    </select>
                                                    <select class="form-control" id="naturegg">
                                                        <option value="Simple">Simple</option>
                                                        <option value="Aprés Consultation">Aprés Consultation</option>
                                                        
                                                    </select>
                                                    <select class="form-control" id="naturecs">
                                                        <option value="Selective">Selective</option>
                                                        <option value="Restreinte">Restreinte</option>
                                                        
                                                    </select>   
                                                </div>  
                                            </div> 
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="type">Type</label>
                                                    <select class="form-control" id="type">
                                                        
                                                        <option value="National">National</option>  
                                                        <option value="National et International">National et International</option>
                                                    </select>   
                                                </div>  
                                            </div>
                                        </div>
                        
                                        <div class="row">  
                                            <div class="col-sm-12 col-md-12 col-xs-12">  
                                                <div class="form-group">  
                                                        <label for="objet">Objet</label>  
                                                        <textarea class="form-control" rows="3" id="objet" aria-describedby="inputGroupPrepend" autocomplete="off" required=""></textarea>  
                                                </div>  
                                            </div>
                                        </div>
                                        
                                        <div class="row">  
                                            <div class="col-sm-12 col-md-12 col-xs-12">
                                                 <label for="pdao">Projet dossier d'Appel d'ofrre</label>  
                                                            <div class="custom-file">  
                                                                <input type="file" name="pdao" class="custom-file-input" id="pdao" autocomplete="off" required="">  
                                                                <label class="custom-file-label" for="pdao" style="font-weight: initial;" id="filepdao">Choisissez un fichier</label>  
                                                                  
                                                            </div>
                                            </div>
                                        </div>
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
                    <!--EDITForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalModif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Modifier demande de codification ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formEditAO" method="post">    
                                        
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Mmode">Mode</label>
                                                    <select class="form-control" id="Mmode">
                                                     
                                                        <option value="Appel d'offre">Appel d'offre </option>  
                                                        <option value="Consultation">Consultation</option>
                                                        <option value="Grés a Grés">Grés a Grés</option>
                                                        <option value="Préqualification">Préqualification</option>
                                                    </select>    
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="nature" id="Mtmode">Type du mode</label>
                                                    <select class="form-control" id="Mnatureao">
                                                        <option value="Ouvert">Ouvert</option>
                                                        <option value="Restreint">Restreint</option>
                                                        
                                                    </select>
                                                    <select class="form-control" id="Mnaturegg">
                                                        <option value="Simple">Simple</option>
                                                        <option value="Aprés Consultation">Aprés Consultation</option>
                                                        
                                                    </select>
                                                    <select class="form-control" id="Mnaturecs">
                                                        <option value="Selective">Selective</option>
                                                        <option value="Restreinte">Restreinte</option>
                                                        
                                                    </select>   
                                                </div>  
                                            </div> 
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-6 col-md-6 col-xs-12">  
                                                <div class="form-group">   
                                                    <label for="Mtype">Type</label>
                                                    <select class="form-control" id="Mtype">
                                                        
                                                        <option value="National">National</option>  
                                                        <option value="National et International">National et International</option>
                                                    </select>   
                                                </div>  
                                            </div>
                                        </div>
                        
                                        <div class="row">  
                                            <div class="col-sm-12 col-md-12 col-xs-12">  
                                                <div class="form-group">  
                                                        <label for="Mobjet">Objet</label>  
                                                        <textarea class="form-control" rows="3" id="Mobjet" aria-describedby="inputGroupPrepend" autocomplete="off" ></textarea>  
                                                </div>  
                                            </div>
                                        </div>
                                        
                                        <div class="row">  
                                            <div class="col-sm-12 col-md-12 col-xs-12">
                                                 <label for="Mpdao">Projet dossier d'Appel d'ofrre</label>  
                                                            <div class="custom-file">  
                                                                <input type="file" name="Mpdao" class="custom-file-input" id="Mpdao" autocomplete="off" >  
                                                                <label class="custom-file-label" for="Mpdao" style="font-weight: initial;" id="Mfilepdao">Choisissez un fichier</label>  
                                                                  
                                                            </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="editAO">Register </button>
                                            
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
        var columnDefs = [{
   title: "id",
    data:"id_projet",
   "visible": false
  },{ title: "modeH",
    data:"modeH",
    "visible": false
    
  },{ title: "nature",
    data:"nature",
    "visible": false
    
  },{title: "Objet",
    data:"objet" 
  },{
    title: "Mode",
    data:"mode"
  },{
    title: "Type",
    data:"type"
  },{
    title: "hide",
    data:"pdao",
    "visible": false
  }];
    function loadData() {
        $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_project_sc.php",
            dataSrc : "data"
        },
        columns: columnDefs,
        select: "single",
        info: "false",
            

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
function rowselected () {

    var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().id_projet, el.data().objet,el.data().modeH,el.data().nature, el.data().mode, el.data().type ,el.data().pdao];
    return res;
}
    </script>
    <script type="text/javascript">
    	$(document).ready(function() {
        $("#naturegg").hide();
  $("#naturecs").hide()

 $( "#mode" ).change(function() {
	var mode = $("#mode").val();
  if(mode=="Appel d'offre"){
  $("#naturegg").hide();
  $("#naturecs").hide();
   $("#tmode").show();

  $("#natureao").show();

            
  }
    if(mode=="Consultation") {
        $("#naturegg").hide();
  $("#natureao").hide();
   $("#tmode").show();

    $("#naturecs").show();

     }
     if(mode=="Grés a Grés"){       
        $("#natureao").hide();
  $("#naturecs").hide();
   $("#tmode").show();

    $("#naturegg").show();

     }
   if(mode=="Préqualification"){       
        $("#natureao").hide();
  $("#naturecs").hide();
    $("#naturegg").hide();
 $("#tmode").hide();
     }

  });



 $("#Mnaturegg").hide();
  $("#Mnaturecs").hide()

 $( "#Mmode" ).change(function() {
  var mode = $("#Mmode").val();
  if(mode=="Appel d'offre"){
  $("#Mnaturegg").hide();
  $("#Mnaturecs").hide();
   $("#Mtmode").show();

  $("#Mnatureao").show();

            
  }
    if(mode=="Consultation") {
        $("#Mnaturegg").hide();
  $("#Mnatureao").hide();
   $("#Mtmode").show();

    $("#Mnaturecs").show();

     }
     if(mode=="Grés a Grés"){       
        $("#Mnatureao").hide();
  $("#Mnaturecs").hide();
   $("#Mtmode").show();

    $("#Mnaturegg").show();

     }
   if(mode=="Préqualification"){       
        $("#Mnatureao").hide();
  $("#Mnaturecs").hide();
    $("#Mnaturegg").hide();
 $("#Mtmode").hide();
     }

  });
  
  loadData();
  enableB();

    $('#pdfbutton').click( function () {
      var el= $('#t1').DataTable().row('.selected');
      window.open("PHP/"+el.data().pdao);
    } );

  $('#t1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        enableB();
    } );
$('#pdao ').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('#filepdao').html(fileName);
            });
$('#Mpdao ').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('#Mfilepdao').html(fileName);
            });

  $("#formAddAO").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered.

        $.ajax({
            url: "PHP/upl_projet.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,     //when we send json file we write contentType: 'application/json'
            cache: false,
            processData:false,
            success: function(data)
            {
               

               //alert(data.message);
               if(data.success){
                   var type = $("#type").val();
                   var mode = $("#mode").val();
                   var objet = $("#objet").val();
                    var pdao = $("#pdao").val();
                    var nature="";
                    if (mode=="Grés a Grés") nature=$("#naturegg").val();
                     if (mode=="Consultation") nature=$("#naturecs").val();
                     if (mode=="Appel d'offre") nature=$("#natureao").val();
                        
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        $.post("PHP/add_project.php",
                            {type:type, mode:mode, objet:objet, pdao:data.pdao, nature:nature },
                            
                            function(data,status){
                                if(data.success){
                                $('#modalAjout').modal('hide');
                                $('#t1').DataTable().ajax.reload();
                                $("#pdao").next('#filepdao').html("Choisissez un fichier");
                                document.getElementById('objet').value='';
                                    $.toast({
                                heading: 'Success',
                                text: 'Projet bien Ajouté',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })

                                    if(data.notif==false){
                                        $.toast({
                                heading: 'Warning',
                                text: 'Notification Non envoyer à L\'AUDIT !',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'Warning'

                            })
                                    }else {
                                        $.toast({
                                heading: 'Success',
                                text: 'Notification bien envoyer à L\'AUDIT !',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
                                    }
                                }
                                else{
                                $("#pdao").next('#filepdao').html("Choisissez un fichier");
                                    
                                    $.toast({
                                heading: 'Error',
                                text: 'Projet bien Ajouté',
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
                                $("#pdao").next('#filepdao').html("Choisissez un fichier");

                $.toast({
                                heading: 'Error',
                                text: 'Projet Non Ajouté',
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


$("#formEditAO").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered.

        $.ajax({
            url: "PHP/upl_edit.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,     //when we send json file we write contentType: 'application/json'
            cache: false,
            processData:false,
            success: function(data)
            {
        
               if(data.success){
                   var type = $("#Mtype").val();
                   var mode = $("#Mmode").val();
                   var objet = $("#Mobjet").val();
                    var pdao = $("#Mpdao").val();
                    var nature="";
                    if (mode=="Grés a Grés") nature=$("#Mnaturegg").val();
                     if (mode=="Consultation") nature=$("#Mnaturecs").val();
                     if (mode=="Appel d'offre") nature=$("#Mnatureao").val();
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        var res= rowselected();

                        $.post("PHP/edit_project.php",
                            {id_projet:res[0] , type:type, mode:mode, objet:objet, pdao:data["pdao"], nature:nature, ancien_objet:res[1], ancien_mode:res[2], ancien_pdao:res[6], ancien_type:res[5]},
                            
                            function(data,status){
                                if(data.success){
                                $('#modalModif').modal('hide');
                                $('#t1').DataTable().ajax.reload();
                                $("#pdao").next('#filepdao').html("Choisissez un fichier");
                                document.getElementById('objet').value='';
                                    $.toast({
                                heading: 'Success',
                                text: 'Projet bien Modifié',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
                            }
                                else{
                                   $.toast({
                                heading: 'Error',
                                text: 'Projet Non Modifié',
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
                                
                            },"json"); 

               }
               else{
                   $.toast({
                                heading: 'Error',
                                text: 'Projet Non Modifié',
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
                        },
                 
       });

    }));




  $('#buttonEdit').click( function () {
      

    var res= rowselected();
        document.getElementById('Mobjet').value=res[1];
        document.getElementById('Mtype').value=res[5];
        var mode=res[2];
        var nat=res[3];
        if(mode=="Appel d'offre") { 
       $("#Mnaturegg").hide();
        $("#Mnaturecs").hide();
         $("#Mtmode").show();

        $("#Mnatureao").show();
        
      document.getElementById('Mnatureao').value=nat;

      }
        if(mode=="Consultation")  {
      $("#Mnaturegg").hide();
      $("#Mnatureao").hide();
       $("#Mtmode").show();

      $("#Mnaturecs").show();
     
      document.getElementById('Mnaturecs').value=nat;
      }
        if(mode=="Grés a Grés") { 
         $("#Mnatureao").hide();
          $("#Mnaturecs").hide();
           $("#Mtmode").show();

            $("#Mnaturegg").show();
      
            document.getElementById('Mnaturegg').value=nat;

        }
        if(mode=="Préqualification") {  
      $("#Mnatureao").hide();
        $("#Mnaturecs").hide();
          $("#Mnaturegg").hide();
       $("#Mtmode").hide();
      }
        document.getElementById('Mmode').value=mode;
        $('#Mfilepdao').html(res[6]);

        
         
  

    });
});
    </script>
</body>