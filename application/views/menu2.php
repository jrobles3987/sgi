<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="<?=base_url('plantilla/dist/img/logo_utm.png') ?>"/>
  <title>SGI | UTM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/bootstrap/css/bootstrap.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- datepicker -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/datepicker/bootstrap-datepicker.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/daterangepicker/daterangepicker.css')?>">
   <!-- Select2 -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/select2/select2.css')?>">
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/datatables/Responsive-2.2.1/css/responsive.bootstrap.min.css')?>">
  <!-- Diseños Aplicacion -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/dist/css/login.css')?>">
  <!--Alertas-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/sweetalert/sweetalert.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/alertifyjs/css/alertify.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/toastr/toastr.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/dist/css/styles.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/dist/css/SGI.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/dist/css/skins/skin-blue.css')?>">
  <!-- Load c3.css -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/plugins/c3js/c3.css')?>">


  <!-- REQUIRED JS SCRIPTS -->
  <!-- jQuery 2.2.3 -->
  <script src="<?=base_url('plantilla/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?=base_url('plantilla/bootstrap/js/bootstrap.min.js')?>"></script>
  <!-- datepicker -->
  <script src="<?=base_url('plantilla/plugins/datepicker/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/daterangepicker/moment.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/daterangepicker/daterangepicker.js')?>"></script>
  <!--Alertas-->
  <script src="<?=base_url('plantilla/plugins/sweetalert/sweetalert.min.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/alertifyjs/alertify.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/toastr/toastr.js')?>"></script>
  <!-- Select2 -->
  <script src="<?=base_url('plantilla/plugins/select2/select2.full.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('plantilla/dist/js/app.min.js')?>"></script>
  <script src="<?=base_url('plantilla/dist/js/menu.js')?>"></script>
  <script src="<?=base_url('plantilla/dist/js/validacionformularios.js')?>"></script>
  <!-- Datatables -->
  <script src="<?=base_url('plantilla/plugins/datatables/DataTables-1.10.16/js/jquery.dataTables.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/datatables/Responsive-2.2.1/js/responsive.bootstrap.min.js')?>"></script>
  <!-- Load d3.js and c3.js -->
  <script src="<?=base_url('plantilla/plugins/c3js/c3.js')?>"></script>
  <script src="<?=base_url('plantilla/plugins/d3js/d3.v3.min.js')?>"></script>
  <script type="text/javascript">
		var BASE_URL = "<?php echo base_url() ?>";
	</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php //include("incidencias/vmodalincidencia.php"); ?>
<div class="loading_iniciosesion" id="div_loading" style="display: none">
      <div class="loading_background">
          <img class="img_loading" src="<?=base_url('plantilla/dist/img/loading.gif') ?>"/>
          <p class="txt_loading">Guardando Datos espere...</p>
      </div>            
  </div>
  <div class="loading_iniciosesion" id="div_loading_cargando" style="display: none">
      <div class="loading_background">
          <img class="img_loading" src="<?=base_url('plantilla/dist/img/loading.gif') ?>"/>
          <p class="txt_loading">Cargando Datos espere...</p>
      </div>            
  </div>
<div class="wrapper">
<? $img= base_url('plantilla/dist/img/user-men.png');?>
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?=base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>GI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SGI</b>UTM</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<? echo $img ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$this->session->userdata('user') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<? echo $img ?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('apeuser').' '.$this->session->userdata('nomuser') ?>
                  <small><?=$this->session->userdata('nombrerol');?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">                
                <div class="pull-center" action="<?=base_url('login/logout')?>" id="btn-cs">
                  <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<? echo $img ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('user') ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>        
        <li class="treeview">
          <a href="<?=base_url('menu/IngresoNuevaIncidencia')?>"><i class="fa fa-file"></i> <span> Nuevas Incidencias</span></a>          
        </li>
        <li class="treeview">
          <a href="<?=base_url('menu/Cambios_Incidencias')?>"><i class="fa fa-cogs"></i> <span> Cambios en Incidencias</span></a>
        </li>
        <li class="treeview">
          <a href="<?=base_url('menu/Calificacion_Incidencias')?>"><i class="fa fa-check"></i> <span> Calificación de Incidencias</span></a>          
        </li>
        <li class="treeview">
          <a href="<?=base_url('menu/Estadisticas_Incidencias')?>"><i class="fa fa-pie-chart"></i> <span> Estadísticas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('menu/Estadisticas_IncidenciasEstados')?>">Incidencias por estados</a></li>
            <li><a href="<?=base_url('menu/Estadisticas_IncidenciasUrgencia')?>">Incidencias por Urgencia</a></li>
          </ul>        
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="menu-contenido">

      <!-- Your Page Content Here -->
      <? $this->load->view($contenido); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
</body>

</html>
<script src="<?=base_url('plantilla/plugins/socket/socket.io-1.2.0.js')?>"></script>
<script>
  $(function () {
    if(localStorage.expandedMenu==0) {
        $("body").addClass('sidebar-collapse');
    }

    $('body').bind('expanded.pushMenu', function() {
      localStorage.expandedMenu = 1;
    });

    $('body').bind('collapsed.pushMenu', function() {
      localStorage.expandedMenu = 0;
    });
  });
</script>

<script>
  // var tipousuario =10
  // var socket = io.connect('localhost:7000');
  // Notificaciones();
  // socket.on('connected', function (data) {
  //     socket.emit('ready for data', {});
  // });
    
  // socket.on('update', function (data) {
  //   if (tipousuario==10) {
  //     var va = data.message.payload.split(';');
  //     Notificaciones();
  //     notifyMe();
  //   }
  //   console.log(data.message.payload);
  // });  

  // function Notificaciones(tiponotificacion){
  //   var numIncidencias1=0;
  //   var numIncidencias2=0;

  //   $.ajax({
  //     type: "POST",
  //     url: "<?php echo base_url('incidencias/mostrarincidentesnotificaciones');?>",
  //     success: function (data) {
  //       var json = JSON.parse(data);
  //       if (json){
  //         $("#ul-noti1").innerHTML='';
  //         $("#ul-noti2").innerHTML='';
  //         for (var i=0, len=json.length; i < len; i++) {
            
  //           if (json[i].estado=="NUEVO")
  //           {
  //             $("#ul-noti1").append('<li id="'+json[i].idincidencias+'" onclick="myFunction(this)"><a href="#"><i class="li_notificacion fa fa-book" style="color:green"></i>'+json[i].tituloincidencia+'  estado '+json[i].estado+'</a></li>');
  //             numIncidencias1++;
  //           }else{
  //             $("#ul-noti2").append('<li id="'+json[i].idincidencias+'" onclick="myFunction(this)"><a href="#"><i class="li_notificacion fa fa-book" style="color:blue"></i>'+json[i].tituloincidencia+'  estado '+json[i].estado+'</a></li>');
  //             numIncidencias2++;
  //           }            
  //         }
  //       }
  //       $("#li-header1").html('Tienes '+numIncidencias1+' incidencias Nuevas');
  //       $("#muestra1").html(''+numIncidencias1+'');
  //       $("#li-header2").html('Tienes '+numIncidencias2+' incidencias Nuevas');
  //       $("#muestra2").html(''+numIncidencias2+'');
        
  //     },
  //     error: function (xhr, exception) {
  //       location.reload(true);
  //     }

  //   });
  // }

  // function notifyMe() {
  //   // Let's check if the browser supports notifications
  //   if (!("Notification" in window)) {
  //     alert("This browser does not support desktop notification");
  //   }

  //   // Let's check whether notification permissions have already been granted
  //   else if (Notification.permission === "granted") {
  //     // If it's okay let's create a notification
  //     var notification = new Notification("Nueva Incidencia Registrada");
  //   }

  //   // Otherwise, we need to ask the user for permission
  //   else if (Notification.permission !== 'denied') {
  //     Notification.requestPermission(function (permission) {
  //       // If the user accepts, let's create a notification
  //       if (permission === "granted") {
  //         var notification = new Notification("Hi there!");
  //       }
  //     });
  //   }
  // }

  function formato(texto){
    return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
  }
  
  function myFunction(x)
  {
    $.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/mostrarincidentes');?>",
            data: {idincidencia: x.id},
            success: function (data) {
              var json1 = JSON.parse(data);
              //alert(x.id);
              $('#txtidincidencia').val(x.id);
              $('#txttituloincidencia').val(json1.tituloincidencia);
              $('#fechaapertura').val(json1.fechaapertura);
              $('#fechavencimiento').val(json1.fechavencimiento);
              $('#selectestado').val(json1.idincidenciaestado);
              $('#selecturgencia').val(json1.urgencia);
              $('#selectimpacto').val(json1.impacto);
              $('#selectprioridad').val(json1.prioridad);
              $('#selectecnico').val(json1.tecnicoasignado);
              $('#selecfuenteincidencia').val(json1.idincidenciafuente);
              $('#seleclocalizacion').val(json1.idlugarincidente);
              $('#txtareadescripcion').val(json1.descripcion);
              $('#selectcategoria').val(json1.idcategoria);
            },
            error: function (xhr, exception) {
              alert("Ocurrio un error recargue la pagina...");
            }
      });
    $('#vmodalincidencia').modal({show:true});
  }
</script>
