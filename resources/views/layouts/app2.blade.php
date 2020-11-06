
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Veterinaria "Auxilio Animal"</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini text-sm">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
    
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="btn btn-block btn-default" data-toggle="dropdown" href="#">
            {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Administrador</span>    
                <div class="float-left">
                    <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Perfil</a>
                </div>
                <div class="float-right">
                    @guest
                        <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    @else
                    <a  href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Cerrar Sesion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </li> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link navbar-success">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> Auxilio Animal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-hospital "></i>
                <p>
                    Consutas veterinarias
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ Route('new_consultation') }}" class="nav-link">
                        <i class="fa fa-weight nav-icon"></i>
                        <p>Nueva consulta</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista consultas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="charts/inline.html" class="nav-link">
                        <i class="fa fa-syringe nav-icon"></i>
                        <p>Operaciones quirurgicas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ Route('treatments') }}" class="nav-link">
                        <i class="fa fa-microscope nav-icon"></i>
                        <p>Tratamientos veterinarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="charts/inline.html" class="nav-link">
                        <i class="fa fa-heartbeat nav-icon"></i>
                        <p>Servicios veterinarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="charts/inline.html" class="nav-link">
                        <i class="fa fa-th nav-icon"></i>
                        <p>Jaulas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-capsules"></i>
                <p>
                    Farmacia veterinaria
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-dollar-sign nav-icon"></i>
                        <p>Nueva venta de medica</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista medicamentos</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-bone"></i>
                <p>
                    Pet Shop
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-dollar-sign nav-icon"></i>
                        <p>Nueva venta de producto</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista ventas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cut"></i>
                <p>
                    Peluqueria de mascotas
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-dollar-sign nav-icon"></i>
                        <p>Nueva venta de peluqur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista servicio peluquer</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    Empleados
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ Route('users') }}" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista empleados</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista roles</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    Clientes
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ Route('clients') }}" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Lista clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ Route('pets') }}" class="nav-link">
                        <i class="fa fa-paw nav-icon"></i>
                        <p>Lista mascotas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ Route('providers') }}" class="nav-link">
                <i class="nav-icon fa fa-user-tie"></i>
                <p>
                    Proveedores
                </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
$(function () {
  $('#modal-user-edit').on('show.bs.modal', function (event){
      var button = $(event.relatedTarget)
      var user_id = button.data('myuser_id')
      var name = button.data('myname')
      var adress = button.data('myadress')
      var phone = button.data('myphone')
      var salary = button.data('mysalary')
      var password = button.data('mypassword')
      var email = button.data('myemail')
      var rol_id = button.data('myrol_id')
      var modal = $(this)
      modal.find('.modal-body #user_id').val(user_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #password').val(password);
      modal.find('.modal-body #phone').val(phone);
      modal.find('.modal-body #adress').val(adress);
      modal.find('.modal-body #salary').val(salary);
      modal.find('.modal-body #rol_id').val(rol_id);
  })
})
</script>

<script>
$(function () {
  $('#modal-client-edit').on('show.bs.modal', function (event){
      var button = $(event.relatedTarget)
      var client_id = button.data('myclient_id')
      var name = button.data('myname')
      var ci = button.data('myci')
      var nit = button.data('mynit')
      var phone = button.data('myphone')
      var adress = button.data('myadress')
      var modal = $(this)
      modal.find('.modal-body #client_id').val(client_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #ci').val(ci);
      modal.find('.modal-body #nit').val(nit);
      modal.find('.modal-body #adress').val(adress);
      modal.find('.modal-body #phone').val(phone);
  })
})
</script>

<script>
$(function () {
  $('#modal-pet-edit').on('show.bs.modal', function (event){
      var button = $(event.relatedTarget)
      var pet_id = button.data('mypet_id')
      var client_id = button.data('myclient_id')
      var name = button.data('myname')
      var species = button.data('myspecies')
      var sex = button.data('mysex')
      var age = button.data('myage')
      var race = button.data('myrace')
      var weight = button.data('myweight')
      var color = button.data('mycolor')
      var modal = $(this)
      modal.find('.modal-body #pet_id').val(pet_id);
      modal.find('.modal-body #client_id').val(client_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #species').val(species);
      modal.find('.modal-body #sex').val(sex);
      modal.find('.modal-body #age').val(age);
      modal.find('.modal-body #race').val(race);
      modal.find('.modal-body #weight').val(weight);
      modal.find('.modal-body #color').val(color);
  })
})
</script>

<script>
$(function () {
  $('#modal-provider-edit').on('show.bs.modal', function (event){
      var button = $(event.relatedTarget)
      var provider_id = button.data('myprovider_id')
      var name = button.data('myname')
      var company = button.data('mycompany')
      var description = button.data('mydescription')
      var ci = button.data('myci')
      var nit = button.data('mynit')
      var phone = button.data('myphone')
      var email = button.data('myemail')
      var adress = button.data('myadress')
      var modal = $(this)
      modal.find('.modal-body #provider_id').val(provider_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #phone').val(phone);
      modal.find('.modal-body #company').val(company);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #ci').val(ci);
      modal.find('.modal-body #nit').val(nit);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #adress').val(adress);
  });
});
</script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->

</body>
</html>