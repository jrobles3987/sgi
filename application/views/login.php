<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="<?=base_url('plantilla/dist/img/logo_utm.png') ?>"/>
    <meta http-equiv="Content Type" content="text/html" charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0">    
    <meta http-equiv="Expires" content="0" /> 
    <meta http-equiv="Pragma" content="no-cache"/>    
    <link rel="stylesheet" href="<?=base_url('plantilla/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('plantilla/dist/css/login.css')?>">
    <title>SGI | UTM</title>    
</head>
<body>
    <div class="main">
        <div class="loading_iniciosesion" id="div_loading">
            <div class="loading_background">
                <img class="img_loading" src="<?=base_url('plantilla/dist/img/loading.gif') ?>"/>
                <p class="txt_loading">Iniciando sesión espere...</p>
            </div>            
        </div>
        <div class="container titulo">
            <div class="panel panel-primary">
                <h3 class="heading">Sistema de Gestión de Incidencias UTM</h3>
            </div>
        </div>
        
        <div class="container contenido">
            <div class="row titulo">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <strong>Ingrese el usuario y la contraseña</strong>
                        </div>
                        <div class="panel-body">
                           <?php echo form_open(base_url('login/iniciasesion')) ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="center-block">
                                            <img class="img-utm" src="<?=base_url('plantilla/dist/img/logo_utm.png') ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input class="loginname form-control" placeholder="Usuario" name="loginname" type="text" value="jrobles3987" autofocus autocomplete="on">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-lock"></i>
                                                    </span>
                                                    <input class="password form-control" placeholder="Contraseña" name="password" type="password" value="12345">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar Sesión">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                           <!-- </form> -->
                           <?php form_close() ?>
                        </div>
                        <div class="panel-footer">
                            Utilice su cuenta del SGA para ingresar al sistema
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-center">
                            <div class="errorsession alert alert-danger" align="center" style="display: none;"></div>
                        </div>                
                    </div>
                </div>
            </div>            
        </div>       
    </div>    
<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>plantilla/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>plantilla/bootstrap/js/bootstrap.min.js"></script>
<!-- login -->
<script src="<?=base_url('plantilla/dist/js/login.js')?>"></script>
</body>
</html>