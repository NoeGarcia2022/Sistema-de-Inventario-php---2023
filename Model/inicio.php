<?php
class Inicio
{
    private $pdo;

    public $titulo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Conexion::StartUp();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        $result = "dentro del modelo";
        return $result;
    }
}
?>