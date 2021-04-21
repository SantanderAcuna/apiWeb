<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOM | photos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
</head>
<body>

    <!-- Just an image -->
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{asset('letra-m.svg')}}" width="30" height="30" alt="">
    </a>
    </nav>
    
    <br>
    <div class="container">
    
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        Administracion de Photos Api.
                    </div>
                    <div class="card-body">

                        <div class="d-flex flex-row-reverse">
                            <div class="p-2">
                                <a id="add" class="btn btn-primary"><i data-feather="plus"></i> Nuevo registro</a>
                            </div>                   
                        </div>

                    </div>
                    <div class="container">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                                <tr>
                                    <td>{{$dt->title}}</td>
                                    <td><img src="{{$dt->thumbnailUrl}}" class="img-fluid" alt="Responsive image"></td>
                                    <td>
                                        <center>
                                            <button class="btn btn-warning modif" id="{{$dt->id}}"><i data-feather="edit-3"></i></button>
                                            <br>
                                            <br>
                                            <button class="btn btn-danger del" id="{{$dt->id}}"><i data-feather="trash"></i></button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        
                        </table>

                        <br>
                        <br>
                    </div>
                </div>
            </div>        
        </div>
    </div>  



    <!-- modals-->
    <!-- modal add -->
    <div id="add-md" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titulo</label>
                        <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Ej. Imagen corta">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Url imagen</label>
                        <input type="text" class="form-control" name="url" id="formGroupExampleInput2" placeholder="Ej. goole-images.com/img3">
                    </div>  
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Thumbnail imagen</label>
                        <input type="text" class="form-control" id="thurl" name="thurl" id="formGroupExampleInput2" placeholder="Ej. goole-images.com/img3">
                    </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div id="modif-md" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm-modif" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" id="mdid" name="mdid" />
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titulo</label>
                            <input type="text" class="form-control" id="mdtitle" name="mdtitle" id="formGroupExampleInput" placeholder="Ej. Imagen corta">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Url imagen</label>
                            <input type="text" class="form-control" id="mdurl" name="mdurl" id="formGroupExampleInput2" placeholder="Ej. goole-images.com/img3">
                        </div>   
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Thumbnail imagen</label>
                            <input type="text" class="form-control" id="mdthurl" name="mdthurl" id="formGroupExampleInput2" placeholder="Ej. goole-images.com/img3">
                        </div>  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- modal resposne-->
    <div id="md-res" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mdtext">Registro guardado correctamente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="resContenido">
                
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
            </div>
        </div>
    </div>

    <!-- end modal response -->


    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
    <script>

        $( document ).ready(function() {
            $('#myTable').DataTable();
            $('#add').on('click', function(){
                $('#add-md').modal('show');                
            });
        });

        $('#frm-add').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                    url: "{{route('post')}}",
                    type: "POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
                }).done(function(data) {
                    $('.mdtext').text('Registro guardado correctamente.');
                    var html=
                    '<center>'+
                    '<h4 id="titulores">'+data.title+'</h4>'+
                    '<p>Se registro con el id '+data.id+'</p>'+
                    '<img src="'+data.thumbnailUrl+'" class="img-fluid" alt="Responsive image">'+                
                    '</center>';
                    $('#resContenido').html(html);
                    
                    $('#add-md').modal('hide');
                    $('#md-res').modal('show');

                        console.log(data.url);
                });
            });

        $('.del').on('click', function()
        {
            var id = $(this).attr('id');
            console.log(id);
            $.ajax({
                    url: "{{url('photos/del')}}"+"/"+id,
                    type: "GET",
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(data) {
                    $('.mdtext').text('Registro eliminado correctamente.');
                    var html=
                    '<center>'+
                    '<h4 id="titulores">Listo!</h4>'+
                    '<p>Se ha eliminado la photo con id '+id+'</p>'+                   
                    '</center>';
                    $('#resContenido').html(html);
                    $('#md-res').modal('show');
                });
        });

        $('.modif').on('click', function()
        {
            var id = $(this).attr('id');
            console.log(id);
            
            $.get( "{{url('photos/')}}"+"/"+id, function( data ) {
                console.log(data);
                $('#mdid').val(data.id);
                $('#mdtitle').val(data.title);
                $('#mdurl').val(data.url);
                $('#mdthurl').val(data.thumbnailUrl);
                $('#modif-md').modal('show');
            });
        });
        

        $('#frm-modif').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                    url: "{{route('patch')}}",
                    type: "POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
                }).done(function(data) {
                    $('.mdtext').text('Registro modificado correctamente.');
                    var html=
                    '<center>'+
                    '<h4 id="titulores">'+data.title+'</h4>'+
                    '<p>Se modifico la photo con el id '+data.id+'</p>'+
                    '<img src="'+data.thumbnailUrl+'" class="img-fluid" alt="Responsive image">'+                
                    '</center>';
                    $('#resContenido').html(html);
                    
                    $('#modif-md').modal('hide');
                    $('#md-res').modal('show');

                        console.log(data.url);
                });
            });

    </script>


</body>
</html>