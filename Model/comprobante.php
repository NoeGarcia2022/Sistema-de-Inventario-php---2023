<?php
class Comprobante
{
	private $pdo;
    
    public $idcomprobante;
    public $giro;
    public $condiciones_operacion;
    public $venta_a_cuenta;
    public $numero_remision;
    public $fecha_remision;
    public $sumas;
    public $iva;
    public $subtotal;
	public $ventas_exenta;
    public $venta_no_sujetas;
	public $iva_retenido;
    public $venta_total;
    


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

			$stm = $this->pdo->prepare("SELECT * FROM comprobante");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idcomprobante)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM comprobante WHERE idcomprobante= ?");
			          

			$stm->execute(array($idcomprobante));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idcomprobante)
	{
		
		try 
		{
		
			$stm = $this->pdo
			            ->prepare("DELETE FROM comprobante WHERE idcomprobante = ?");			          

			$stm->execute(array($idcomprobante));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		
		
	}
	   

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE comprobante SET 
						giro         =?, 
                        condiciones_operacion       =?,
						venta_a_cuenta     =?,
						numero_remision	    =?,
						fecha_remision    =?,
                        sumas      =?,
                        iva      =?,
                        subtotal     =?,
						ventas_exenta      =?,
                        venta_no_sujetas      =?,
                        iva_retenido     =?,
                        venta_total             =?
				    WHERE idcomprobante =?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
                     $data->giro,
                     $data->condiciones_operacion,
                     $data->venta_a_cuenta,
                     $data->numero_remision,
                     $data->fecha_remision,
                     $data->sumas,
                     $data->iva,
                     $data->subtotal,
					 $data->ventas_exenta,
                     $data->venta_no_sujetas,
					 $data->iva_retenido,
                     $data->venta_total,
                     $data->idcomprobante        
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
		$sql = "INSERT INTO `comprobante` (idcomprobante,giro,condiciones_operacion,venta_a_cuenta,numero_remision,fecha_remision,sumas,iva,
		subtotal,ventas_exenta,venta_no_sujetas,iva_retenido,venta_total) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idcomprobante, 
                    $data->giro, 
					$data->condiciones_operacion,
					$data->venta_a_cuenta, 
					$data->numero_remision,    
					$data->fecha_remision, 
					$data->sumas, 
					$data->iva, 
					$data->subtotal,
					$data->ventas_exenta,
					$data->venta_no_sujetas,
					$data->iva_retenido,
					$data->venta_total
					 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>