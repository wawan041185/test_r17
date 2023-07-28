<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>R17</title>

        <!-- Bootstrap Core CSS -->
       
       <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

        <!-- MetisMenu CSS -->
       
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables CSS -->
       
        <!-- DataTables Responsive CSS -->
      <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

        <!-- Custom CSS -->
        <link href="{{url('fileadmin/css/startmin.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
      

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">R17</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                

               
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                               
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="#" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                               

                            </li>
                           
                          
                            
                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">


                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data User</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        
           <form method="post"action="{{url('/simpandataurl')}}">  
           @csrf               <!-- /.panel -->
Input URL :<input type="text"name="url"class="form-control"><br><input type="submit"class="btn btn-success"value="cek">
<br>
</form>
<div class="col-lg-12">
                           
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">


 

                     <table class="table table-striped table-bordered example" style="width:100%">
        <thead>
            <tr>
                
                <th>id</th>
                <th>Nama</th>
                <th>jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <?php $no=1
                                                ?>
        
        <tbody>
            @foreach($userData as $user)
            <tr>

               
                <td>{{$user->id}}</td>
                <td>{{$user->nama}}</td>
                <td>{{$user->jabatan}}</td>
                <td>{{$user->jenis_kelamin}}</td>
                <td>{{$user->alamat}}</td>
                
                <td><img src="{{url('fileadmin/pencil.png')}}"width="20px"height="20px" data-bs-toggle="modal" data-bs-target="#myModal{{$user->id}}">&nbsp;&nbsp;&nbsp;<img src="{{url('fileadmin/trash.png')}}"width="20px"height="20px"data-bs-toggle="modal" data-bs-target="#myModal2{{$user->id}}"></td>
            </tr>

            <div class="modal" id="myModal{{$user->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Input Data </h4>
        <form action="{{url('/simpan')}}"method="POST">
                @csrf
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
        Nama : <input type="hidden"id="id"name="id"value="{{$user->id}}"> <input type="text" class="form-control" name="nama"id="nama"value="{{$user->nama}}">
             
        Jabatan :  <input type="text" class="form-control" name="jabatan"id="jabatan"value="{{$user->jabatan}}">
               
        Jenis Kelamin :  <select name="jenis_kelamin"id="jenis_kelamin"class="form-control">

            <option value="Laki-laki">Laki - Laki</option><option value="Perempuan">Perempuan</option></select>
        Alamat :  <input type="text" class="form-control" name="alamat"id="alamat"value="{{$user->alamat}}">
            
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>&nbsp;&nbsp;<button type="submit" class="btn btn-success">Simpan</button>
      </div>
</form>
    </div>
  </div>
</div>

<div class="modal" id="myModal2{{$user->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data </h4>
        <form action="{{url('/hapus')}}"method="POST">
                @csrf
      </div>

      <!-- Modal body -->
      <div class="modal-body">
    <p>Apakah Anda Ingin Menghapus Data ini nama : <font color="red">{{$user->nama}}</font> ?</p>
      <input type="hidden"id="id"name="id"value="{{$user->id}}"class="form-control"readonly>
             
       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>&nbsp;&nbsp;<button type="submit" class="btn btn-danger">Hapus</button>
      </div>
</form>
    </div>
  </div>
</div>

            @endforeach
        </tbody>
       
        <tfoot>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
                                          
                                  
                                    <!-- /.table-responsive -->
                                   
                                   
                                </div>
                                <!-- /.panel-body -->
                            </div>








                        </div>
                        <!-- /.col-lg-12 -->
                    
                    <!-- /.row -->
                   
                    <!-- /.row -->
                   
                    <!-- /.row -->
                  
                    <!-- /.row -->
                </div>
            </div>
</div>









                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
       
<script type="text/javascript">
  $(document).ready(function() {
    $('.example').DataTable();
  } );


     </script>


        <!-- Bootstrap Core JavaScript -->
      

        <!-- Metis Menu Plugin JavaScript -->
     

        <!-- DataTables JavaScript -->
       
    

        <!-- Custom Theme JavaScript -->
        
     
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
       


    </body>
</html>
