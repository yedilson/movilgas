<?php  
  /** 
        Incluye los archivos de funciones y arreglos y estiquetas.
    */
  include_once( "clases/graficos.php" );
  $obj_grafico = new Grafico();
  include('config.php');
  include_once('Operaciones.php');  
  $operacion = new Operaciones();

  $obj_grafico->etiqueta();// trae las etiquetas.
  $date = date('Y/m/d h:i:s', time());

  $oferta=$operacion->selec_ofertas();

  $ver=@$_GET['ver'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Trabaja con nosotros</title>
  </head>
  <body>
    <div class="cont_unico"><!-- contenedor personal -->
      <center>
        <img src="img/header.png" class="logo"><!-- logo empresa -->
      </center>
      <br>
      <div class="row">
      <div class="col-md-12">
        <a href="index.php" style="float:right;">
          <button class="btn btn-success">&nbsp;&nbsp; Volver &nbsp;&nbsp;</button>
        </a>
        <br><br><br>
      </div>
        <?php  
          if ($ver=="") {
            $obj_grafico->contenido($oferta); 
          }else {
            $vacante=$operacion->ver_vacante($ver);
            $obj_grafico->vacante($vacante);
          }
        ?>
      </div>
      <center>
        <footer><!-- pie de pagina -->
          <br>
          <img src="img/logo_footer.png"><!-- logo -->
          <span class="copy">
            <br>Copyright 2017 © Mileniumgas.com. todos los derechos recervados
            <br>Diseñado por Yedilson Quevedo.
          </span>
        </footer><!-- fin pie de pagina -->
      </center>
          </div><!-- fin contenedor personal -->
  </body>
</html>