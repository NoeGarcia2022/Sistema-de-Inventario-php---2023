<?php
class Categoria
{
	private $pdo;
    
    public $idcategoria;
    public $nom_categoria;
    public $descripcion;
    


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

			$stm = $this->pdo->prepare("SELECT * FROM categorias");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idcategoria)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM categorias WHERE idcategoria= ?");
			          

			$stm->execute(array($idcategoria));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idcategoria)
	{
		
		try 
		{
		
			$stm = $this->pdo
			            ->prepare("DELETE FROM categorias WHERE idcategoria = ?");			          

			$stm->execute(array($idcategoria));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		
		
	}
	   

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE categorias SET 
						nom_categoria         = ?, 
                        descripcion         = ?
				    WHERE idcategoria= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
                        $data->nom_categoria, 
                        $data->descripcion,
						$data->idcategoria
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
		$sql = "INSERT INTO `categorias` (idcategoria,nom_categoria,descripcion) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idcategoria, 
                    $data->nom_categoria, 
					$data->descripcion               
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
