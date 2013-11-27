<div id="page-wrapper">
	<div class="row">
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-11">
					<h1>Etikete po prihodima</h1>
				</div>
				
				<div class="col-lg-1" >
					<img src="<?php echo base_url(); ?>img/help.png" width="50" height="50" class="s_h"></img>
				</div>
				
			</div>
			<div class="row">
				<div class="slidingHelp alert alert-success alert-dismissable">
					Etikete predstavljaju detaljnije kategorirane prihode. Klikom na gumb izlistaj etikete dobit će te izlist prihoda koji sadrže odabranu etiketu.
				</div>
			</div>
			<hr>
		<?php 
			/*Remove duplicates from $etikete_prihodi*/
			$originalArray = $etikete_prihodi; 
			$newArray = array(); 
			$usedFruits = array(); 
			foreach ( $originalArray AS $line ) { 
			    if ( !in_array($line['etiketa'], $usedFruits) ) { 
			        $usedFruits[] = $line['etiketa']; 
			        $newArray[] = $line; 
			    } 
			} 
			$originalArray = $newArray; 
			unset($newArray,$usedFruits);	
		?> 
	<?php echo validation_errors(); ?>
	<?php echo form_open('statistika/etikete_prihodi') ?>
	<div class="form-group">
		<label for="etiketa">Etiketa:</label>
		<select class="form-control" id="etiketa" name="etiketa">
			<?php foreach($originalArray as $etiketa): ?>
				<option value ="<?php echo $etiketa['etiketa']; ?>"><?php echo $etiketa['etiketa']; ?></option>
			<?php endforeach; ?>
		</select><br />
	</div>
	<input  class="btn btn-default" type="submit" name="izlistaj_etikete" value="Izlistaj etikete" />
	</form>
	<hr>
	<?php 
	if(isset($izlistane_etikete))
	{?>
		 <table  class="table table-bordered table-hover table-striped tablesorter" >
		  	<thead>
			  	<tr>
					<th>Rbr</th>
					<th>Račun</th>
					<th>Vrsta prihoda</th>
					<th>Iznos</th>
					<th>Komentar</th>
					<th>Etiketa</th>
					<th>Datum</th>
					<th>Akcije</th>
				</tr>
			</thead>
			<tbody>
			<?php $i= 1 ; ?>
			<?php foreach ($izlistane_etikete as $row): ;?>
			    <tr>
			    	<td><?php echo $i++?></td>
					<td><?php echo $row['racun']; ?></td>
					<td><?php echo $row['vrsta']; ?></td>
					<td><?php echo $row['iznos']; ?></td>
					<td><?php echo $row['komentar']; ?></td>
					<td><?php echo $row['etiketa']; ?></td>
					<td><?php echo $row['datum']; ?></td>
					<td>
						<a href="<?php echo base_url()."prihod/edit/{$row['transakcija_ID']}"; ?>"  >Uredi</a>  
						<a href="<?php echo base_url()."prihod/delete/{$row['transakcija_ID']}"; ?>" onclick="return confirm('Dali ste sigurni da želite obrisati ovaj red?');">Obriši</a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		 </table>
	<?php } ?>
	
	</div><!-- /.row -->
</div><!-- /#page-wrapper -->
