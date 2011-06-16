<?php

class Testdb extends CI_Controller {
  function index()
  {
    echo 'Hola Mundo!';
    echo "<hr>";
    
    $this->load->database();

    $query = $this->db->query('SELECT ID, D_TABLA FROM TABLA_CREADA_DESDE_CASA');

    foreach ($query->result() as $row)
    {
        echo $row->ID;
        echo " --> ";
        echo $row->D_TABLA;
        echo "<hr>";
    }

    echo 'Total Results: ' . $query->num_rows();
    echo "<hr>";
  }




}  

?>