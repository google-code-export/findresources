<?php

class Testdb extends CI_Controller {
  function index()
  {
    echo 'Hola Mundo!';
    echo "<hr>";
    
    $this->load->database();

    $query = $this->db->query('SELECT id, test FROM tests');

    foreach ($query->result() as $row)
    {
        echo $row->ID;
        echo " --> ";
        echo $row->TEST;
        echo "<hr>";
    }

    echo 'Total Results: ' . $query->num_rows();
    echo "<hr>";
  }




}  

?>