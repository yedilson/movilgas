<?php  
  /** 
        Incluye los archivos de funciones y arreglos y estiquetas.
    */
  include "clases/masterClass.php";
  include_once( "clases/graficos.php" );
  $obj_grafico = new Grafico();
  include('config.php');
  include_once('Operaciones.php');  
  $operacion = new Operaciones();

  $obj_grafico->etiqueta();// trae las etiquetas.


$query = new Masters();
$Content = $query->Cont_trabaja();

  foreach ($Content as $Con) {

    $Logo       = $Con["Logo"];
    $Frase      = $Con["Frase"];
    $Imagen     = $Con["Imagen"];
    $Direccion  = $Con["Direccion"];
    $Telefono   = $Con["Telefono"];
    $Twitter    = $Con["Twitter"];
    $Facebook   = $Con["Facebook"];
    $Youtube    = $Con["Youtube"];

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Trabaja con nosotros</title>
  </head>
  <body>
    <div class="cont_unico"><!-- contenedor personal -->
      <center>
        <img src="img/<?=$Logo?>" class="logo"><!-- logo empresa -->
      </center>
      <br>
      <div class="row" id="menu"><!-- contenedor bootstrap primario -->

      <!-- ************************* MENU PESTAÑAS ******************************************  -->
        <ul class="nav nav-pills">
          <li class="active">
            <a href="#3a" data-toggle="tab">TRABAJA CON NOSOTROS</a>
          </li>
          <li>
            <a href="http://www.mileniumgas.com/nuestra-compania.html" target="_blank">NUESTRA COMPAÑIA</a>
          </li>
          <li>
            <a  href="index.php">INICIO</a>
          </li>
        </ul>

        <div class="row">
          <center>
          <div class="cont_dos">
            <p class="text-justify"><!-- texto de entrada o bienvenida -->
              <?=$Frase?>
            </p>
            </div>
          </center>
          <br>
          <center><!-- imagen de ofertas -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <a href="ofertas.php"><img class="logo_oferta" src="img/<?=$Imagen?>"></a>
            </div>
          </center>
        </div>
        <div class="col-md-1"></div>
        <form action="guardar.php" enctype='multipart/form-data' method="post" autocomplete="off">
          <center>        
          <?php
            $Aplicar=@$_POST["Aplicar"];
            $Titulo=@$_POST["Titulo"];
            if ($Aplicar=="") 
            {
              echo "<h3><p><br>Registra tu Hoja de Vida aquí:</h3>";
              echo "<input type='hidden' class='form-control' id='Aplicar' name='Aplicar' readonly value='1'>";  
            }else{
              echo "<input type='hidden' class='form-control' id='Aplicar' name='Aplicar' readonly value='".$Aplicar."'>";
              echo "<br><br><h3>Registrate para aplicar como <b>$Titulo</b> aquí:</h3>";
            }
          ?>
          </center>
          <!-- Formulario de registro -->

          <div class="col-md-12"><br></div> 

          <div class="col-md-6">
            <label for="Nombre">Nombre<span class="red">*</span></label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required placeholder="Introduce tu Nombre">
          </div>

          <div class="col-md-6">
            <label for="Documento">Documento<span class="red">*</span></label>
            <input type="number" class="form-control" id="Documento" name="Documento" required placeholder="Introduce tu documento">
          </div>

          <div class="col-md-6">
            <label for="Direccion">Dirección<span class="red">*</span></label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" required placeholder="Introduce tu Dirección">
          </div>

          <div class="col-md-6">
            <label for="Ciudad">Ciudad<span class="red">*</span></label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" required placeholder="Introduce tu Ciudad">
          </div>

          <div class="col-md-6">
            <label for="Fecha">Fecha de nacimiento<span class="red">*</span></label>
            <input type="date" class="form-control" id="Fecha" name="Fecha" required placeholder="Introduce tu Fecha">
          </div>

          <div class="col-md-6">
            <label for="Correo">Email<span class="red">*</span></label>
            <input type="email" class="form-control" id="Correo" name="Correo" required placeholder="Introduce tu email">
          </div> 

          <div class="col-md-6">
            <label for="Celular">Celular<span class="red">*</span></label>
            <input type="number" class="form-control" id="Celular" name="Celular" required placeholder="Introduce tu Celular">
          </div>

          <div class="col-md-6">
            <label for="Estado">Estado civil<span class="red">*</span></label>
            <select class="form-control" id="Estado" name="Estado" required>
              <option name="Estado" value="">Seleccionar</option>
              <option name="Estado" value="Soltero">Soltero</option>
              <option name="Estado" value="Casado">Casado</option>
              <option name="Estado" value="U_Libre">Unión libre</option>
            </select>
          </div>

          <div class="col-md-12"><br></div>

          <div class="col-md-6">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <div class="input-group">
              <label class="input-group-btn">
                <span class="btn btn-primary">
                  Adjuntar Hoja deVida
                  <input type="file" id="subir_hv" required style="display: none;" multiple name="subir_hv">
                </span>
              </label>
              <input type="text" class="form-control" readonly>
            </div>
                              
            <p class="help-block">&nbsp;formato de documentos .doc o .pdf</p>
          </div>

          <div class="col-md-12">
            <center><button type="submit" class="btn btn-success" id="btn_enviar">Enviar</button></center>
          </div>
          <br><div class="col-md-12"><br></div><br>
        </form><!-- fin formulario -->
      </div><!-- fin row principal -->
      <!-- ********************************* S E P A R A D O R ********************************* -->
        <div class="col-md-12">
          <div class="cont_txt_ent1">
            <span class="txt_entrada_emp">
              PARA MÁS INFORMACIÓN<p>
              <?=$Direccion?><p>
              Teléfono: <?=$Telefono?>
              Siguenos en:<p>
              <a href="<?=$Twitter?>"><img id="icon" title="twitter" src="img/twi.png"></a> 
              &nbsp;
              <a href="<?=$Facebook?>"><img title="facebook" src="img/face.png" id="icon"></a>
              y
              <a href="<?=$Youtube?>"><img id="icon" title="youtube" src="img/you.png"></a><p>
            </span>
          </div>
        </div>
    </div><!-- fin contenedor personal -->
  </body>
</html>