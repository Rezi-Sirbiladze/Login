<?php
require "./BD/connect.php";

class Sentencia extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_datos($x)
    {
        $sql = "SELECT * FROM users where email = :n_email and id = :n_id";
        $resultado = $this->connection_db->prepare($sql);
        $resultado->execute(array(":n_email" => $x[0], ":n_id" => $x[1]));
        $registro = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $resultado->closeCursor();
        
        return array($registro, $resultado->rowCount());
        $this->connection_db = null;
    }
}
