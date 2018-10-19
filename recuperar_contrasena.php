<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Contraseña Olvidada</title>
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="view/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="view/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="view/assets/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="view/assets/css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS -->
        
        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- end: Favicon -->
            <style type="text/css">
                body { background: url(view/assets/img/bg-login.jpg) !important; }
            </style>
    </head>

    <body>
    <div class="container-fluid-full">
        <div class="row-fluid">
            <div class="row-fluid">
                <div class="login-box">
                    <?php
                        $paso = '';
                        $paso = $_GET['p'];
                        if ($paso == 0 OR $paso == null) {
                            ?>
                                <div class="icons">
                                    <a href="index.php"><i class="halflings-icon home"></i></a>
                                    <a href="#"><i class="halflings-icon cog"></i></a>
                                </div>
                                <h2>Recuperar Contraseña</h2>
                                <form class="form-horizontal" action="session/contrasena.php" method="post">
                                    <fieldset>
                                        <div class="input-prepend" title="Usuario">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="nick" id="nick" type="text" placeholder="Usuario" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Correo">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="correo" id="correo" type="text" placeholder="Correo" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass1" id="password" type="password" placeholder="Ingresa la nueva contraseña" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass2" id="password" type="password" placeholder="Ingresa nuevamente la contraseña" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="button-login">	
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </fieldset>
                                </form>
                                <hr>
                            <?php
                        } else if ($paso == 2) {
                            ?>
                                <div class="alert alert-block ">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <h4 class="alert-heading">Error</h4>
                                    <p>Datos Incorrectos</p>
                                </div>
                                <div class="icons">
                                    <a href="index.php"><i class="halflings-icon home"></i></a>
                                    <a href="#"><i class="halflings-icon cog"></i></a>
                                </div>
                                <h2>Recuperar Contraseña</h2>
                                <form class="form-horizontal" action="session/contrasena.php" method="post">
                                    <fieldset>
                                        <div class="input-prepend" title="Usuario">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="nick" id="nick" type="text" placeholder="Usuario" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Correo">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="correo" id="correo" type="text" placeholder="Correo" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass1" id="password" type="password" placeholder="Ingresa la nueva contraseña" required="true" minlenght="5"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass2" id="password" type="password" placeholder="Ingresa nuevamente la contraseña" required="true" minlenght="5"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="button-login">	
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </fieldset>
                                </form>
                                <hr>
                            <?php
                        } else if ($paso == 3) {
                            ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <h4 class="alert-heading">Exitoso</h4>
                                    <p>Se ha guardado los cambios, intenta ingresar con tu contraseña nueva</p>
                                </div>
                                <div class="icons">
                                    <a href="index.php"><i class="halflings-icon home"></i></a>
                                    <a href="#"><i class="halflings-icon cog"></i></a>
                                </div>
                                <h2>Iniciar Sesion</h2>
                                <form class="form-horizontal" action="session/auth.php" method="post">
                                    <fieldset>
                                        <div class="input-prepend" title="Username">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="username" id="username" type="text" placeholder="Nombre de Usuario" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass" id="password" type="password" placeholder="Contraseña" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="button-login">	
                                            <button type="submit" class="btn btn-primary">Iniciar</button>
                                        </div>
                                    </fieldset>
                                </form>
                                <hr>
                                <h3>Olvidaste la Contraseña?</h3>
                                <p>
                                    No hay problema, <a href="recuperar_contrasena.php"> haz click aqui</a> para obtener una nueva contraseña.
                                </p>
                            <?php
                        } else if ($paso == 4) {
                            ?>
                                <div class="alert alert-block ">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <h4 class="alert-heading">Error</h4>
                                    <p>Las contraseñas no son iguales, Intenta nuevamente</p>
                                </div>
                                <div class="icons">
                                    <a href="index.php"><i class="halflings-icon home"></i></a>
                                    <a href="#"><i class="halflings-icon cog"></i></a>
                                </div>
                                <h2>Recuperar Contraseña</h2>
                                <form class="form-horizontal" action="session/contrasena.php" method="post">
                                    <fieldset>
                                        <div class="input-prepend" title="Usuario">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="nick" id="nick" type="text" placeholder="Usuario" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Correo">
                                            <span class="add-on"><i class="halflings-icon user"></i></span>
                                            <input class="input-large span10" name="correo" id="correo" type="text" placeholder="Correo" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass1" id="password" type="password" placeholder="Ingresa la nueva contraseña" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="input-prepend" title="Password">
                                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                                            <input class="input-large span10" name="userpass2" id="password" type="password" placeholder="Ingresa nuevamente la contraseña" required="true"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="button-login">	
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </fieldset>
                                </form>
                            <?php
                        }//FIN DEL SI
                    ?>
                </div><!--/login-box-->
            </div><!--/row-fluid-->
        </div><!--/.row-fluid-->
    </div><!--container-fluid-full-->
    <!-- start: JavaScript-->
    <script src="view/assets/js/jquery-1.9.1.min.js"></script>
    <script src="view/assets/js/jquery-migrate-1.0.0.min.js"></script>
    <script src="view/assets/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="view/assets/js/jquery.ui.touch-punch.js"></script>	
    <script src="view/assets/js/modernizr.js"></script>
    <script src="view/assets/js/bootstrap.min.js"></script>	
    <script src="view/assets/js/jquery.cookie.js"></script>
    <script src='view/assets/js/fullcalendar.min.js'></script>	
    <script src='view/assets/js/jquery.dataTables.min.js'></script>
    <script src="view/assets/js/excanvas.js"></script>
    <script src="view/assets/js/jquery.flot.js"></script>
    <script src="view/assets/js/jquery.flot.pie.js"></script>
    <script src="view/assets/js/jquery.flot.stack.js"></script>
    <script src="view/assets/js/jquery.flot.resize.min.js"></script>	
    <script src="view/assets/js/jquery.chosen.min.js"></script>
    <script src="view/assets/js/jquery.uniform.min.js"></script>
    <script src="view/assets/js/jquery.cleditor.min.js"></script>
    <script src="view/assets/js/jquery.noty.js"></script>
    <script src="view/assets/js/jquery.elfinder.min.js"></script>
    <script src="view/assets/js/jquery.raty.min.js"></script>
    <script src="view/assets/js/jquery.iphone.toggle.js"></script>
    <script src="view/assets/js/jquery.uploadify-3.1.min.js"></script>
    <script src="view/assets/js/jquery.gritter.min.js"></script>
    <script src="view/assets/js/jquery.imagesloaded.js"></script>
    <script src="view/assets/js/jquery.masonry.min.js"></script>
    <script src="view/assets/js/jquery.knob.modified.js"></script>
    <script src="view/assets/js/jquery.sparkline.min.js"></script>
    <script src="view/assets/js/counter.js"></script>
    <script src="view/assets/js/retina.js"></script>
    <script src="view/assets/js/custom.js"></script>
        <!-- end: JavaScript-->
    </body>
</html>