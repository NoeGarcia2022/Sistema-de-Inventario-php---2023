<?php
class Usuario
{
	private $pdo;

    public $idusuario;
    public $nombres;
    public $correo;
    public $user;
	public $clave;
   
    


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

			$stm = $this->pdo->prepare("SELECT * FROM usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idusuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE idusuario = ?");
			          

			$stm->execute(array($idusuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idusuario)
	{
		
		try 
		{
		
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuario WHERE idusuario = ?");			          

			$stm->execute(array($idusuario));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		
		
	}
	   

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						nombres       = ?, 
                        correo        = ?,
                        user        = ?,
                        clave      = ?
				    WHERE idusuario= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
                        $data->nombres, 
                        $data->correo,
                        $data->user,
                        $data->clave,   
						$data->idusuario
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
		$sql = "INSERT INTO `usuario` (idusuario,nombres,correo,user,clave) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idusuario, 
                    $data->nombres, 
					$data->correo,
                    $data->user,
					$data->clave
                      
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
