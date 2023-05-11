<?php
class Persona
{
	private $pdo;
    
    public $idcliente;
    public $nombre;
    public $apellido;
    public $nrc;
    public $municipio;
    public $direccion;
	public $telefono;
	public $email;
	public $giro;
	public $DUI;


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
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM persona");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idcliente)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM persona WHERE idcliente = ?");
			          

			$stm->execute(array($idcliente));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idcliente)
	{
			try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM persona WHERE idcliente = ?");			          

			$stm->execute(array($idcliente));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE persona SET 
						nombre          = ?, 
						apellido        = ?,
                        nrc           = ?,
					    municipio            = ?, 
						direccion          = ?,
						telefono        = ?,
						email          = ?,
						giro           = ?,
						DUI          = ?
				    WHERE idcliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellido,
                        $data->nrc,
                        $data->municipio,
                        $data->direccion,
						$data->telefono,
						$data->email,
						$data->giro,
						$data->DUI,
                        $data->idcliente
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO `persona` (nombre,apellido,nrc,municipio,direccion,telefono,email,giro,DUI) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre, 
                    $data->apellido,
                    $data->nrc,
                    $data->municipio,
                    $data->direccion,
					$data->telefono,
					$data->email,
					$data->giro,
					$data->DUI               
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
