<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Reservas</title>
        <link rel="icon" href="http://php.net/images/logos/php-icon.png" sizes="16x16" type="image/png"> 
        <!-- Bootstrap Core CSS -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- AngularJS -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="bower_components/raphael/raphael-min.js"></script>



        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/codigo.js"></script>


    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav  id="navegador" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="user_id_span" href="?">hola</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" data-toggle="modal" data-target="#editarperfil"><i class="fa fa-user fa-fw"></i>Editar perfil</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Herramientas</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#" id="btlogout"><i class="fa fa-sign-out fa-fw"></i>Cerrar sesión</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li id="menu_admin">
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>Administracion<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#addaula">Añadir aula</a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#signinmodal">Añadir profesor</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li id="menu_personal">
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>Administracion<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#addaula">Añadir aula</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li id="menu_activo">
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>Administracion<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">No puede realizar ninguna accion, sin permisos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="page-header">Bienvenido </h2><h3><span id="nuser"></span></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" id="formLogin">
                    <div class="col col-lg-4">
                        <form class="form-horizontal" role="form" id="formInsertar" method="POST">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="clave">Clave:</label>
                                <div class="col-sm-10"> 
                                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox"> Recordarme</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" id="btlogin" class="btn btn-success">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <p>Si no tiene cuenta, haga click aqui para darse de alta: </p>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#signinmodal">
                            Sign in
                        </button>  
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col col-md-2">
                             <a class="title" href="https://github.com/ealvarez1990/gestionaulas.git">Ver en GitHub <i class="fa fa-github fa-2x"></i></a>
                        </div>
                    </div>

                </div>
                
                <div id="calendario">
                     
                     <?php include './plantillas/_calendario.php';?>
                </div>
               
        <!--MODALS-->
        <!-- Modal sigin-->
        <div class="modal fade" id="signinmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">SIGN IN</h4><span id="mensajealta"></span>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="POST" id="signinform">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email_r">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email_r" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="clave_r">Clave:</label>
                                <div class="col-sm-10"> 
                                    <input type="password" class="form-control" id="clave_r" placeholder="Enter password">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="repiteclave">Repita la clave:</label>
                                <div class="col-sm-10"> 
                                    <input type="password" class="form-control" id="repiteclave" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="alias">Alias:</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" id="alias" placeholder="Enter alias">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button id="btalta"   class="btn btn-success">SIGN IN</button>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="reset" class="btn btn-danger" value="Reset"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal añadir aula-->
        <div class="modal fade" id="addaula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">AÑADIR AULA</h4>
                        <span id="mensaje_aula"></span>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="aulaform">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="idaula">Id Aula:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idaula" placeholder="AUTO" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nombreaula">Nombre aula:</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" id="nombreaula" placeholder="Enter classroom name">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button id="btaddaula" class="btn btn-success">ADD CLASS</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar perfil-->
        <div class="modal fade" id="editarperfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDITAR PERFIL</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="idprofesor">Id Profesor:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idprofesor" placeholder="Enter your personal id" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="clave">Clave:</label>
                                <div class="col-sm-10"> 
                                    <input type="password" class="form-control" id="clave" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" id="nombre" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="apellido">Apellidos:</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" id="apellido" placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">EDIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        
    </body>

</html>
