<?php

class Testdb extends CI_Controller {
  function index()
  {
    echo 'Hola Mundo!';
    echo "<hr>";
    
    $this->load->database();

    /*$query = $this->db->query('SELECT ID, D_TABLA FROM TABLA_CREADA_DESDE_CASA');

    foreach ($query->result() as $row)
    {
        echo $row->ID;
        echo " --> ";
        echo $row->D_TABLA;
        echo "<hr>";
    }

    echo 'Total Results: ' . $query->num_rows();*/
    echo "<hr>";

	
	/* 
	 * [INI] EJECUTAR SP CON FUNCIONES NATIVAS DE PHP
	$conn = oci_connect('FINDRESOURCES', 'FINDRESOURCES', 'localhost/XE');
	$curs = oci_new_cursor($this->db->conn_id);
	$stmt = oci_parse($this->db->conn_id, "begin PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES(:data,:n1,:n2); end;");
	                                       begin PAQUETE_CREADO_DESDE_CASA.PR_NOMBRES(:PO_SALIDA,:PO_C_ERROR,:PO_D_ERROR); end;
	oci_bind_by_name($stmt, "data", $curs, -1, SQLT_RSET);
	oci_bind_by_name($stmt, "n1", $n1, -1, SQLT_CHR);
	oci_bind_by_name($stmt, "n2", $n2, -1, SQLT_CHR);
	oci_execute($stmt);
	oci_execute($curs);
	
	while ($data = oci_fetch_row($curs)) {
	    var_dump($data);
	}
	
	oci_free_statement($stmt);
	oci_free_statement($curs);
	oci_close($conn);
	[FIN] EJECUTAR SP CON FUNCIONES NATIVAS DE PHP */
	
	/** [INI] EJECUTAR SP CON FUNCIONES DE CODEIGNITER **/
    $curs = $this->db->get_cursor();
    $n1 = '0';
    $n2 = '0';
	$params = array(
                    //array('name'=>':PO_SALIDA', 'value'=>&$curs, 'type'=>OCI_B_CURSOR, 'length'=>-1),
                    array('name'=>':PO_SALIDA', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
                    array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>-1),
                    array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>-1)
                    );
                              
	$this->db->stored_procedure('PAQUETE_CREADO_DESDE_CASA','PR_NOMBRES',$params);
	echo "<br />";
	echo "<br />";
	oci_execute($curs); /** Ver como reemplazar esta funcion por una de CodeIgniter**/

    while ($data =& oci_fetch_row($this->db->curs_id)) {
	    echo '<pre>';
	    var_dump($data);
	    echo '</pre>';
	    echo "N1:".$n1."<br />";
	    echo "N2:".$n2;
    }
    
	/** [FIN] EJECUTAR SP CON FUNCIONES DE CODEIGNITER **/
  }
}  

?>