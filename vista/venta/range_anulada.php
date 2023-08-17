<?php
	$db = new Database();
	$conn = $db->getMysqli();
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	if(ISSET($_POST['search'])){		
		$date3 = date("Y-m-d", strtotime($_POST['date3']));
		$date4 = date("Y-m-d", strtotime($_POST['date4']));
		$query = mysqli_query($conn, "SELECT  venta.id_venta, venta.tipoc, venta.fecha, owner.nom_due, owner.ape_due, 
									venta.tipopa, venta.total, venta.estado									
									FROM venta 									
									INNER JOIN owner ON venta.id_due =owner.id_due 
									WHERE venta.fecha  BETWEEN '$date3' AND '$date4' GROUP BY venta.id_venta DESC")
				or die(mysqli_error($conn));

		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['tipoc']?></td>		
		<td><?php echo $fetch['fecha']?></td>
		<td><?php echo $fetch['nom_due']?> &nbsp;<?php echo $fetch['ape_due']?></td>
		<td><?php echo $fetch['tipopa']?></td>
		<td>S/.<?php echo $fetch['total']?></td>
		<td>
			<?php    

			if($fetch['estado']==1)  { ?> 
			<form  method="get" action="javascript:activo('<?php echo $fetch['id_venta']; ?>')">				
				<span class="label label-success">Aceptado</span>
			</form>
			<?php  }   else {?> 

				<form  method="get" action="javascript:inactivo('<?php echo $fetch['id_venta']; ?>')"> 
					<button type="submit" class="btn btn-danger btn-xs">Anuladas</button>
					</form>
					<?php  } ?>                         
        </td>
        <td>           
			<a type="button" href="../venta/detalles?id=<?php echo $fetch['id_venta']; ?>"  class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
				<i class="material-icons">remove_red_eye</i>
			</a>
		</td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>No hay asistencias en el rango de fechas</center></td>
			</tr>';
		}
	}else{
		$query = mysqli_query($conn, "SELECT  venta.id_venta, venta.tipoc, venta.fecha, owner.nom_due, owner.ape_due, 
									venta.tipopa, venta.total, venta.estado									
									FROM venta 									
									INNER JOIN owner ON venta.id_due =owner.id_due 
									WHERE venta.estado  = '0'") 
				or die(mysqli_error($conn));

		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['tipoc']?></td>		
		<td><?php echo $fetch['fecha']?></td>
		<td><?php echo $fetch['nom_due']?> &nbsp;<?php echo $fetch['ape_due']?></td>
		<td><?php echo $fetch['tipopa']?></td>
		<td>S/.<?php echo $fetch['total']?></td>
		<td>
                <?php    

                if($fetch['estado']==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $fetch['id_venta']; ?>')">                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?>
                    <form  method="get" action="javascript:inactivo('<?php echo $fetch['id_venta']; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Anuladas</button>
                     </form>
                        <?php  } ?>                         
        </td>
        <td>             
			<a type="button" href="../venta/detalles?id=<?php echo $fetch['id_venta']; ?>"  class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
				<i class="material-icons">remove_red_eye</i>
			</a>
		</td>
	</tr>
<?php
		}
	}
?>
