<?php
	/*llama el archivo BD.php y sus funciones.*/
	include("clases/BD.php");
	$new_obj= new BD;

	/* crea una nueva clase y hereda la clase BD */
	class Operaciones extends BD
	{
		function Operaciones()
        {
            include( "config.php" );
            $this->servidor = $servidor;
            $this->bd       = $bd;
            $this->usuario  = $usuario;
            $this->clave    = $clave;               
        }

        function conexion()
        {
            $con=$this->conectar(); 
        }

        function presentacion($tabla,$cond,$dato)
        {
            $sql="SELECT * FROM $tabla WHERE $cond = '$dato'";
            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }

        function selec_ofertas()
        {
            $sql="SELECT * FROM tb_ofertas WHERE id_oferta<>'1' ORDER BY Desde DESC";
            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }

        function ver_vacante($ver)
        {
            $sql="SELECT * FROM tb_ofertas WHERE Titulo='$ver'";
            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }

        function ver_persona($Documento)
        {
            $sql="SELECT * FROM tb_personas WHERE Documento='$Documento'";
            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }

        function ver_nit($nit)
        {
            $sql="SELECT * FROM tb_empresas WHERE Nit='$nit'";
            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }

        function guardar_registro($Nombre,$Documento,$Direccion,$Ciudad,$Fecha,$Correo,$Celular,$Estado,$archivo,$date,$Aplicar)
        {
            $sql="INSERT INTO tb_personas (id_persona, Nombre, Documento, Direccion, Ciudad, Fech_nac, Estado, Celular, Correo, Url_hv, Registrado, Aplica) ";
            $sql.="VALUES (NULL, '$Nombre', '$Documento', '$Direccion', '$Ciudad', '$Fecha', '$Estado', '$Celular', '$Correo', '$archivo', '$date', '$Aplicar')";

            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }

        function guardar_emp($emp,$nit,$corr,$tel,$for,$rut,$cam,$rep,$fin,$fec)
        {
            $sql="INSERT INTO tb_empresas (Id_empresas, Empresa, Nit, Correo_empresa, Telefono, Formato, Rut, Camara, Representante, Financiero, Fecha) ";
            $sql.="VALUES (NULL, '$emp', '$nit', '$corr', '$tel', '$for', '$rut', '$cam', '$rep', '$fin', '$fec')";

            //echo $sql;
            $r=$this->retornar_usuarios($sql);
            return $r;
        }


        function guardar_oferta(){
            echo "INSERT INTO bd_movilgas_hv. tb_ofertas (id_oferta, Titulo, Descripcion, Ciudad, Desde, Asta, Activa) VALUES (NULL, 'vendedora', 'brindar atención y servicio al cliente, tanquear los vehículos y ofrecer los diferentes productos de la empresa. ', 'Villavicencio', '2017-08-15', '2017-08-29', 'si')";
        }

        /**
            * esta funcion guarda en la tabla desprendibles.
            * @param    recibe una cadena de caracteres.
            * @return   devuelve la cadena sin espacios.
        */
        function quita_espacios($cadena){
            $cadena = str_replace(' ', '', $cadena);
            return $cadena;
        }

        function archivo_nuevo($nuevo, $id)
        {
            $sql="UPDATE tb_personas SET Url_hv = $nuevo WHERE tb_personas. id_persona = $id";

        }
    }
?>