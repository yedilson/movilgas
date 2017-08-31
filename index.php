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
  $Content = $query->Cont_principal();

  foreach ($Content as $Con) {

    $Logo       = $Con["Logo"];
    $F1         = $Con["Frase_1"];
    $F2         = $Con['Frase_2'];
    $Pre        = $Con['Present'];
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
      <div class="row" id="lado_uno"><!-- contenedor bootstrap primario -->
        
        <div class="col-md-2" ></div>
        <div class="col-md-8">
          <div class="cont_uno2"><?=$F1?></div>
        </div>
        <div class="col-md-2"></div>

        <!-- ********************************* S E P A R A D O R ********************************* -->
        <div id="contenido" class="col-md-12"><!-- contenido -->
          <div class="col-md-12" id="menu2"><!-- menú -->
            <ul class="nav nav-pills">
              <li class="active">
                <a  href="#1a" data-toggle="tab">EMPRESA</a>
              </li>
              <li>
                <a href="http://www.mileniumgas.com/nuestra-compania.html" target="_blank">NUESTRA COMPAÑIA</a>
              </li>
              <li>
                <a href="#3a" data-toggle="tab">VINCULARSE</a>
              </li>
              <li>
                <a href="registro.php">TRABAJA CON NOSOTROS</a>
              </li>
            </ul>

            <div class="tab-content clearfix">
              <div class="tab-pane active" id="1a">
                <div class="col-md-8" style="border: solid;">
                  <center><iframe src='<?=$Pre?>' class="diapositiva" frameborder='0'>Esto es un documento de <a target='_blank' href='https://office.com'>Microsoft Office</a> incrustado con tecnología de <a target='_blank' href='https://office.com/webapps'>Office Online</a>.</iframe></center>
                </div>
                <div class="col-md-4" id="presentacion">
                  <span class="text_presentacion"><br><br><?=$F2?></span>
                </div>
              </div><!--  tab-pane active  -->

              <div class="tab-pane" id="3a">
                <br><br>
                <!-- ENLACE DE DESCARGA DEL FORMULARIO -->
                <a id="white" href="SOLICITUD_DE_CREDITOS_EDS.pdf" target="_blank">
                  <button class="btn btn-success">Descarga el formulario <b>Aquí</b></button>
                </a>

                <br><br>
                <center>
                  <h4><b>Datos de contacto<span class="red">*</span></b></h4>
                  <p>
                  <div class="col-md-2"></div><!--  div neutro  -->

                  <!--**************************************** FORMULARIO  ************************************************** -->
                  <div class="col-md-8"><!--  div formulario  -->
                    <form action="guardar_empresas.php" method="post" enctype="multipart/form-data">
                      <div class="col-md-2">
                        <b>Empresa</b><span class="red">*</span>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control" autocomplete="off" id="Empresa" name="Empresa" required placeholder="Cual es tu empresa">
                      </div>

                      <div class="col-md-2">
                        <b>Nit</b><span class="red">*</span>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control" autocomplete="off" id="Nit" name="Nit" required placeholder="Nit de la empresa">
                      </div>

                      <div class="col-md-2">
                        <b>Correo</b><span class="red">*</span>
                      </div>
                      <div class="col-md-10">
                        <input type="email" class="form-control" autocomplete="off" id="Correo_empresa" name="Correo_empresa" required placeholder="Correo donde recibir información">
                      </div> 

                      <div class="col-md-2">
                        <b>Telefono</b><span class="red">*</span>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control" autocomplete="off" id="Telefono" name="Telefono" required placeholder="Telefono de la empresa">
                      </div>                      

                      <div class="col-md-12"><br>
                        <label for="subir_hv">Adjuntar los siguientes documentos<span class="red">*</span></label><br>
                      </div>
                      <h5>formatos requeridos .doc o .pdf</h5>
                      <h6>tamaño menor a 1MB</h6>

                      <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                      <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                              Formato solicitud completo 
                              <input type="file" required style="display: none;" multiple name="formato">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                      </div>

                      <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                              Registro (RUT) 
                              <input type="file" required style="display: none;" multiple name="rut">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                      </div>

                      <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                              Camara comercio 30-dias 
                              <input type="file" required style="display: none;" multiple name="camara">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                      </div>

                      <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                              Doc. representante legal 
                              <input type="file" required style="display: none;" multiple name="representante">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                      </div>

                      <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                              Últimos estados financieros 
                              <input type="file" required style="display: none;" multiple name="financiero">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                      </div>
                      <br>
                      <button class="btn btn-info">ENVIAR</button>
                      <br>
                    </form>
                  </div><!--  fin div formulario  -->
                </center>
              </div><!--  fin tab-pane a3  -->
            </div><!-- fin tab-content clearfix -->
          </div> <!-- fin menú -->
        </div> <!--  fin contenido   -->

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
              <a href="<?=$Youtube?>"><img id="icon" title="youtube" src="img/you.png"></a><p>
            </span>
          </div>
        </div>

      </div><!-- contenedor bootstrap primario -->
    </div><!-- cont_unico -->
  </body>
</html>
