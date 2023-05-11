<?php
class DetalleFac
{
	private $pdo;
    
    public $id_detalle;
    public $idfactura;
    public $cantidad;
    public $idproducto;
    public $precio_unitario;
    public $ventas_no_sujetas;
    public $ventas_exentas;
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

			$stm = $this->pdo->prepare("SELECT * FROM detallefactura");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($id_detalle)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detallefactura WHERE id_detalle= ?");
			          

			$stm->execute(array($id_detalle));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_detalle)
	{
		
		try 
		{
		
			$stm = $this->pdo
			            ->prepare("DELETE FROM detallefactura WHERE id_detalle = ?");			          

			$stm->execute(array($id_detalle));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		
		
	}
	   

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE detallefactura SET 
						idfactura     = ?, 
                        cantidad         = ?,
                        idproducto       = ?,  
                        precio_unitario      = ?,  
                        ventas_no_sujetas     = ?,
                        ventas_exentas     = ?,
                        ventas_grabadas    = ?
				       WHERE id_detalle= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
                        $data->idfactura, 
                        $data->cantidad,
						$data->idproducto,
                        $data->precio_unitario ,
                        $data->ventas_no_sujetas ,
                        $data->ventas_exentas ,
                        $data->ventas_grabadas ,
                        $data->id_detalle
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
		$sql = "INSERT INTO `detallefactura` (id_detalle,idfactura,cantidad,idproducto,precio_unitario,ventas_no_sujetas,ventas_exentas,ventas_grabadas) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?) ";

		$sqlv = "UPDATE productos set existencia= existencia - ? WHERE idproducto = ?";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->id_detalle, 
                    $data->idfactura, 
					$data->cantidad,
                    $data->idproducto,
                    $data->precio_unitario,
                    $data->ventas_no_sujetas,
                    $data->ventas_exentas,
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
