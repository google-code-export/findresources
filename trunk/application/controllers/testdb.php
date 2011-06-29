<?php

class Testdb extends CI_Controller {
	function index()
	{
		/** LOAD DATABASE **/
		$this->load->database();
		$this->load->library('oracledb');
		
		/** PRUEBAS DE STORED PROCEDURES **/
		echo '<h2>Pruebas de Stored Procedures</h2>';
		echo "<hr>";

		/** PRUEBA SELECT TABLA_CREADA_DESDE_CASA **/
		echo '<h5>PRUEBA SELECT TABLA_CREADA_DESDE_CASA [LIBRERIA CODEIGNITER]</h5>';
		
		$query = $this->db->query('SELECT ID, D_TABLA FROM TABLA_CREADA_DESDE_CASA');
		echo "<pre>";
		foreach ($query->result() as $row)
		{
			echo $row->ID;
			echo " --> ";
			echo $row->D_TABLA;
			echo "<br />";
		}
		echo 'Total Results: ' . $query->num_rows();
		echo "</pre>";
		echo "<hr>";
		
		/** PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES [LIBRERIA FINDRESOURCES]**/
		echo '<h5>PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES [LIBRERIA FINDRESOURCES]</h5>';
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':PO_SALIDA', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PAQUETE_CREADO_DESDE_CASA','PR_NOMBRES',$params);
		
		var_dump($this->oracledb->get_cursor_data());

		if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
		 
		echo "<hr />";
		
		/** PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES [LIBRERIA PHP]**/
		echo '<h5>PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES [LIBRERIA PHP]</h5>';
		//$conn = oci_connect('FINDRESOURCES', 'FINDRESOURCES', 'localhost/XE');
		 $curs2 = oci_new_cursor($this->db->conn_id);
		 $stmt = oci_parse($this->db->conn_id, "begin PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES(:data,:n1,:n2); end;");
		 oci_bind_by_name($stmt, "data", $curs2, -1, SQLT_RSET);
		 oci_bind_by_name($stmt, "n1", $n1, 255, SQLT_CHR);
		 oci_bind_by_name($stmt, "n2", $n2, 255, SQLT_CHR);
		 oci_execute($stmt);
		 oci_execute($curs2);

		 oci_fetch_all($curs2,$all);
		 var_dump($all);
		if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
		
		 oci_free_statement($stmt);
		 oci_free_statement($curs2);
		 //oci_close($conn);


		/** PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES [LIBRERIA CODEIGNITER]**/
		/*echo '<h5>PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES [LIBRERIA CODEIGNITER]</h5>';
		$cursx = $this->db->get_cursor();
		 $n1 = NULL;
		 $n2 = NULL;
		 $params = array(
		 array('name'=>':PO_SALIDA', 'value'=>&$cursx, 'type'=>SQLT_RSET , 'length'=>-1),
		 array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		 array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		 );

		 $this->db->stored_procedure('PAQUETE_CREADO_DESDE_CASA','PR_NOMBRES',$params);
		 echo "<br />";
		 echo "<br />";
		//oci_execute($curs);
		 //oci_fetch_all($refcur, $res);

		 while ($data =& oci_fetch_row($this->db->curs_id)) {
			 echo '<pre>';
			 var_dump($data);
			 echo '</pre>';
		 }
		 if ($n1 == 0)	echo "OK";
		 else			echo "ERROR (".$n1.") :".$n2;
	   
	  	echo "<hr />";
		*/

		/** PKG_UTIL.PR_OBTIENE_TIPOS_DOCUMENTOS [LIBRERIA FINDRESOURCES]**/
		echo '<h5>PKG_UTIL.PR_OBTIENE_TIPOS_DOCUMENTOS [LIBRERIA FINDRESOURCES]</h5>';
		 $n1 = NULL;
		 $n2 = NULL;
		 $curs2 = NULL;
		 $params = array(
		 array('name'=>':PO_SALIDA', 'value'=>&$curs2, 'type'=>SQLT_RSET , 'length'=>-1),
		 array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>-1),
		 array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>-1)
		 );
		 $this->oracledb->stored_procedure($this->db->conn_id,'PKG_UTIL','PR_OBTIENE_TIPOS_DOCUMENTOS',$params);

		var_dump($this->oracledb->get_cursor_data());

		if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
		 
		echo "<hr />";
	  


		/** PKG_USUARIO.PR_CREACION_USUARIO [LIBRERIA FINDRESOURCES]**/
		echo '<h5>PKG_USUARIO.PR_CREACION_USUARIO [LIBRERIA FINDRESOURCES]</h5>';
		$n1 = NULL;
		$n2 = NULL;
		$p1 = 'test9';
		$p2 = 'test9';
		$p3 = 'nombre';
		$p4 = 'apellido';
		$p5 = 'test';
		$p6 = 'DNI';
		$p7 = '12345677';
		$p8 = '1234';
		$p9 = 'ARG';
		$p10 = 'test99@test.com';
		$p11 = 'C';
		$params = array(
		 array('name'=>':pi_usuario', 'value'=>$p1, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_clave', 'value'=>$p2, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_nombre', 'value'=>$p3, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_apellido', 'value'=>$p4, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_razon_social', 'value'=>$p5, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_tipo_documento', 'value'=>$p6, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_numero_documento', 'value'=>$p7, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_telefono', 'value'=>$p8, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_pais', 'value'=>$p9, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_email', 'value'=>$p10, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_t_usuario', 'value'=>$p11, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		 array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		 );
		 $this->oracledb->stored_procedure($this->db->conn_id,'PKG_USUARIO','PR_CREACION_USUARIO',$params);

		if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
		 
		echo "<hr />";


		/** PKG_USUARIO.PR_BAJA_USUARIO [LIBRERIA FINDRESOURCES]**/
		echo '<h5>PKG_USUARIO.PR_BAJA_USUARIO [LIBRERIA FINDRESOURCES]</h5>';
		 $p1 = 'Juan1';
 		 $n1 = NULL;
		 $n2 = NULL;
		 $params = array(
		 array('name'=>':pi_usuario', 'value'=>$p1, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		 array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		 );
		 $this->oracledb->stored_procedure($this->db->conn_id,'PKG_USUARIO','PR_BAJA_USUARIO',$params);

		if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
	  
		echo "<hr />";
		
		
		/** PKG_USUARIO.PR_MODIFICACION_USUARIO [LIBRERIA FINDRESOURCES]**/
		echo '<h5>PKG_USUARIO.PR_MODIFICACION_USUARIO [LIBRERIA FINDRESOURCES]</h5>';
		$n1 = NULL;
		$n2 = NULL;
		$p1 = 'test9';
		$p2 = 'test92';
		$p3 = 'nombre2';
		$p4 = 'apellido2';
		$p5 = 'test2';
		$p6 = 'DNI';
		$p7 = '12345622';
		$p8 = '1234';
		$p9 = 'ARG';
		$p10 = 'test22@test.com';
		$params = array(
		 array('name'=>':pi_usuario', 'value'=>$p1, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_clave', 'value'=>$p2, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_nombre', 'value'=>$p3, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_apellido', 'value'=>$p4, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_razon_social', 'value'=>$p5, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_tipo_documento', 'value'=>$p6, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_numero_documento', 'value'=>$p7, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_telefono', 'value'=>$p8, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_pais', 'value'=>$p9, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':pi_email', 'value'=>$p10, 'type'=>SQLT_CHR, 'length'=>-1),
		 array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		 array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		 );
		 $this->oracledb->stored_procedure($this->db->conn_id,'PKG_USUARIO','MODIFICACION_USUARIO',$params);

		 if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
		echo "<hr />";
		
		
		/** PKG_UTIL.PR_OBTIENE_PAISES [LIBRERIA FINDRESOURCES]**/
		echo '<h5>PKG_UTIL.PR_OBTIENE_PAISES [LIBRERIA FINDRESOURCES]</h5>';
		$n1 = NULL;
		 $n2 = NULL;
		 $curs2 = NULL;
		 $params = array(
		 array('name'=>':PO_SALIDA', 'value'=>&$curs2, 'type'=>SQLT_RSET , 'length'=>-1),
		 array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		 array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		 );
		 $this->oracledb->stored_procedure($this->db->conn_id,'PKG_UTIL','PR_OBTIENE_PAISES',$params);
		var_dump($this->oracledb->get_cursor_data());

		if ($n1 == 0) 	echo "OK";
		else 			echo "ERROR (".$n1.") :".$n2;
		 
		echo "<hr />";
		
		
		 
		/** CERRAR LA CONEXIÓN A LA BASE **/ 
	 	$this->oracledb->close();
	}
}

?>