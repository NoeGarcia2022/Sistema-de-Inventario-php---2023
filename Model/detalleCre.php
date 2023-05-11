<?php
class DetalleCre
{
	private $pdo;
    
    public $id_detalleCre;
    public $cantidad;
    public $descripcion;
    public $precioUnitario;
	public $ventas_exentas;
    public $ventas_no_sujetas;
    public $ventas_grabadas;
    


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

			$stm = $this->pdo->prepare("SELECT * FROM detallecredito");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($id_detalleCre)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detallecredito WHERE id_detalleCre = ?");
			          

			$stm->execute(array($id_detalleCre));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_detalleCre)
	{
		
		try 
		{
		
			$stm = $this->pdo
			            ->prepare("DELETE FROM detallecredito WHERE id_detalleCre = ?");			          

			$stm->execute(array($id_detalleCre));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		
		
	}
	   

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE detallecredito SET 
						 cantidad         = ?,
						descripcion      = ?, 
                        precioUnitario     = ?,  
						ventas_exentas    = ?,
						ventas_no_sujetas   = ?,
                        ventas_grabadas    = ?
				       WHERE id_detalleCre = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
                        
                        $data->cantidad,
						$data->descripcion, 
                        $data->precioUnitario,
						$data->ventas_exentas,
                        $data->ventas_no_sujetas,
                        $data->ventas_grabadas,
						$data->id_detalleCre
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
		$sql = "INSERT INTO `detallecredito` (id_detalleCre,cantidad,descripcion,precioUnitario,ventas_exentas,ventas_no_sujetas,ventas_grabadas) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $sqlv = "UPDATE productos set existencia= existencia - ? WHERE idproducto = ?";		

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->id_detalleCre, 
					$data->cantidad,
                    $data->descripcion,
                    $data->precioUnitario,
					$data->ventas_exentas,
                    $data->ventas_no_sujetas,
                    $data->ventas_grabadas            
                )
			);

			$this->pdo->prepare($sqlv)
			->execute(
			   array(
					$data->cantidad,
					$data->idproducto
	
			   )
		   );




		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
