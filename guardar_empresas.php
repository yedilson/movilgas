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
    
    $empresa          =@$_POST['Empresa'];
    $Nit              =@$_POST['Nit'];
    $Correo           =@$_POST['Correo_empresa'];
    $Telefono         =@$_POST['Telefono'];

    $formato = $_FILES['formato'];
    $rut_1  = $_FILES['rut'];
    $camara = $_FILES['camara'];
    $representante = $_FILES['representante'];
    $financiero = $_FILES['financiero'];


    $for = str_replace(" ","_",$formato['name']); 
    $rut = str_replace(" ","_",$rut_1['name']);
    $cam = str_replace(" ","_",$camara['name']);
    $rep = str_replace(" ","_",$representante['name']);
    $fin = str_replace(" ","_",$financiero['name']);
   
    //$FILES      =@$_FILES['subir_hv'];
    

    $existe=$operacion->ver_nit($Nit);
      if (mysqli_num_rows( $existe ) > 0) 
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

        $target_path = "HV/emp/".$Nit."/";
        if (!file_exists($target_path)) {
            mkdir($target_path, 0777, true);
        }

        if (is_uploaded_file($formato['tmp_name']))
        {
          $target_path1 = $target_path . basename( $for); 
          if(move_uploaded_file($formato['tmp_name'], $target_path1)) 
          { 
            if (is_uploaded_file($rut_1['tmp_name']))
            {
              $target_path2 = $target_path . basename( $rut); 
              if(move_uploaded_file($rut_1['tmp_name'], $target_path2)) 
              { 
                if (is_uploaded_file($camara['tmp_name']))
                {
                  $target_path3 = $target_path . basename( $cam); 
                  if(move_uploaded_file($camara['tmp_name'], $target_path3)) 
                  { 
                    if (is_uploaded_file($representante['tmp_name']))
                    {
                      $target_path4 = $target_path . basename( $rep); 
                      if(move_uploaded_file($representante['tmp_name'], $target_path4)) 
                      { 
                        if (is_uploaded_file($financiero['tmp_name']))
                        {
                          $target_path5 = $target_path . basename( $fin); 
                          if(move_uploaded_file($financiero['tmp_name'], $target_path5)) 
                          { 
                            $guardo=$operacion->guardar_emp($empresa,$Nit,$Correo,$Telefono,$for,$rut,$cam,$rep,$fin,$date);
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
                                              <br>
                                              <label>Tu solicitud esta en proceso, pronto nos pondremos en contacto contigo</label>

                                            </center>
                                        </div>
                                    </div>
                                </body>
                            </html>
<?php
                          }
                        }
                      }
                    }
                  }
                }
              } 
            }
          }
        }else{
          
?>
        <div class='fallo'>El archivo supera los 2 mb o no es compatible</div><br>
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
      }
?>
