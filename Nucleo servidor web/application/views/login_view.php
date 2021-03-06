<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="<?=base_url('estilos/login.css');?>">
  <link rel="stylesheet" href="<?=base_url('estilos/bootstrap/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('estilos/bootstrap/bootstrap-grid.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('estilos/bootstrap/bootstrap-reboot.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('estilos/bootstrap-datepicker.min.css');?>">
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> -->
	<script src="<?=base_url('scripts/jquery.min.js');?>"></script>
	<script src="<?=base_url('scripts/bootstrap-datepicker.min.js');?>"></script>
	<script src="<?=base_url('scripts/popper.min.js');?>"></script>
	<script src="<?=base_url('scripts/bootstrap.min.js');?>"></script>
</head>
<body class="text-center align-content-center" data-gr-c-s-loaded="true">
  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">
        <?php echo form_open('UsuarioController/iniciarSesion',array('id'=>'formulario', 'class'=>'form-signin'))?>

          <img class="mb-4x" src="<?=base_url('estilos/imagenes/login.png');?>" alt="imagen login"/>
          <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
          <label for="inputEmail" class="sr-only">Usuario</label>
          <input type="text" id="usuario" class="form-control" placeholder="Usuario" required="" autofocus="" name="usuario">
          <label for="contrasena" class="sr-only">Contraseña</label>
          <input type="password" id="contrasena" class="form-control" placeholder="Contraseña" required="" name="contrasena">
          <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnEnviar">Ingresar</button>
          <p id="mensaje"><?php if (isset($info)) {
            echo $info;
          }?></p>
          <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
        </form>
      </div>
      <div class="col"></div>
    </div>
  </div>
</body>

</html>
