<?php
class Producto
{
	private $pdo;
    
    public $idproducto;
    public $descripcion;
    public $idcategoria;
    public $precio_unitario;
    public $existencia;
    public $total;
	public $imagen;
	
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

			$stm = $this->pdo->prepare("SELECT * FROM productos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idproducto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM productos WHERE idproducto= ?");
			          

			$stm->execute(array($idproducto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idproducto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM productos WHERE idproducto = ?");			          

			$stm->execute(array($idproducto));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE productos SET 
						descripcion         = ?, 
						idcategoria        = ?,
                        precio_unitario           = ?,
					    existencia           = ?, 
						total         = ?,
						imagen       = ?
				    WHERE idproducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->descripcion, 
                        $data->idcategoria,
                        $data->precio_unitario,
                        $data->existencia,
                        $data->total,
						$data->imagen,
						$data->idproducto
					
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
		$sql = "INSERT INTO `productos` (descripcion,idcategoria,precio_unitario,existencia,total,imagen) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->descripcion, 
                    $data->idcategoria,
                    $data->precio_unitario,
                    $data->existencia,
                    $data->total,
                    $data->imagen             
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
