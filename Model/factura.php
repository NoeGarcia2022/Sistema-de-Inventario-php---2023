<?php
class Factura
{
	private $pdo;
    
    public $idfactura;
    public $num_factura;
    public $fecha;
    public $idcliente;
    public $venta_a_cuenta;
    public $forma_pago;
    public $suma;
    public $iva_retenido;
    public $subtotal;
    public $venta_no_sujeta;
    public $venta_exenta;
    public $total;
    


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

			$stm = $this->pdo->prepare("SELECT * FROM factura");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($idfactura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM factura WHERE idfactura= ?");
			          

			$stm->execute(array($idfactura));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idfactura)
	{
		
		try 
		{
		
			$stm = $this->pdo
			            ->prepare("DELETE FROM factura WHERE idfactura = ?");			          

			$stm->execute(array($idfactura));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		
		
	}
	   

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE factura SET 
						num_factura         =?, 
                        fecha       =?,
                        idcliente      =?,
                        venta_a_cuenta      =?,
                        forma_pago      =?,
                        suma      =?,
                        iva_retenido       =?,
                        subtotal     =?,
                        venta_no_sujeta      =?,
                        venta_exenta      =?,
                        total             =?
				    WHERE idfactura =?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
                     $data->num_factura,
                     $data->fecha,
                     $data->idcliente,
                     $data->venta_a_cuenta,
                     $data->forma_pago,
                     $data->suma,
                     $data->iva_retenido,
                     $data->subtotal,
                     $data->venta_no_sujeta,
                     $data->venta_exenta,
                     $data->total,
                     $data->idfactura         
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
		$sql = "INSERT INTO `factura` (idfactura,num_factura,fecha,idcliente,venta_a_cuenta,forma_pago,suma,iva_retenido,
		subtotal,venta_no_sujeta,venta_exenta,total) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idfactura, 
                    $data->num_factura, 
					$data->fecha,
					$data->idcliente, 
					$data->venta_a_cuenta,    
					$data->forma_pago, 
					$data->suma, 
					$data->iva_retenido,
					$data->subtotal,
					$data->venta_no_sujeta,
					$data->venta_exenta,
					$data->total
					 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>