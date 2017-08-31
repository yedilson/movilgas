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

    $Nombre     =@$_POST['Nombre'];
    $Documento   =@$_POST['Documento'];
    $Direccion  =@$_POST['Direccion'];
    $Ciudad     =@$_POST['Ciudad'];
    $Fecha      =@$_POST['Fecha'];
    $Correo     =@$_POST['Correo'];
    $Celular    =@$_POST['Celular'];
    $Estado     =@$_POST['Estado'];
    $Aplicar    =@$_POST['Aplicar'];
    $FILES      =@$_FILES['subir_hv'];
    $target_path = "HV/";

    $archivo = str_replace(" ","_",$FILES['name']); 

    $persona=$operacion->ver_persona($Documento);
      if (mysqli_num_rows( $persona ) > 0) 
      {
?>
        <!DOCTYPE html>
        <html>
          <head>
            <title>Trabaja con nosotros</title>
            <script type="text/javascript">  
              /*var num=10;  
              function contador() {  
                num--;  
                if(num==0) location='index.php';  
                document.getElementById('seg').innerHTML=num;  
              }  */
            </script>
          </head>
          <body onload="setInterval('contador()',1000)">
            <div class="cont_unico"><!-- contenedor personal -->
              <br>
              <div class="row"><!-- contenedor bootstrap primario -->
                <center>
                  <a href="index.php"><img src="img/upss.png" class="logo_oferta"></a>
                </center>
              </div>
            </div>
          </body>
        </html>
<?php
      }
      else
      {
        if (is_uploaded_file($FILES['tmp_name'] ))
        {
          $guardo=$operacion->guardar_registro($Nombre,$Documento,$Direccion,$Ciudad,$Fecha,$Correo,$Celular,$Estado,$archivo,$date,$Aplicar);
          //$url=$operacion->quita_espacios($target_path);
          $target_path = $target_path . basename( $archivo); 
          if(move_uploaded_file($FILES['tmp_name'], $target_path)) 
          { 
            echo "<div class='subio'>El archivo ". basename( $FILES['name']). " ha sido subido</div><br>";
          }
          //echo "<p>".$target_path;
  ?>
          <!DOCTYPE html>
          <html>
              <head>
                  <title>Trabaja con nosotros</title>
                  <script type="text/javascript">  
                    /*var num=10;  
                    function contador() {  
                      num--;  
                      if(num==0) location='index.php';  
                      document.getElementById('seg').innerHTML=num;  
                    } */ 
                  </script>
              </head>
              <body onload="setInterval('contador()',1000)">
                  <div class="cont_unico"><!-- contenedor personal -->
                          <br>
                      <div class="row"><!-- contenedor bootstrap primario -->
                          <center>

                            <a href="index.php"><img src="img/registrado.png" class="logo_oferta"></a>

                          </center>
                      </div>
                  </div>
              </body>
          </html>
  <?php
        }else{
            echo "<div class='fallo'>El archivo supera los 2 mb o no es compatible</div><br>";
          }
?>
        <!DOCTYPE html>
          <html>
              <head>
                  <title>Trabaja con nosotros</title>
                  <script type="text/javascript">  
                    /*var num=10;  
                    function contador() {  
                      num--;  
                      if(num==0) location='index.php';  
                      document.getElementById('seg').innerHTML=num;  
                    } */ 
                  </script>
              </head>
              <body onload="setInterval('contador()',1000)">
                  <div class="cont_unico"><!-- contenedor personal -->
                          <br>
                      <div class="row"><!-- contenedor bootstrap primario -->
                          <center>
                            <a href="index.php"><img src="img/fallo.png" class="logo_oferta"></a>

                          </center>
                      </div>
                  </div>
              </body>
          </html>
<?php
      } 
    ?>
