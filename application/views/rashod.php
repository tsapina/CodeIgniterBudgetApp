<div id="page-wrapper">
	 <div class="row">
	 	<div class="col-lg-6">
	

	<!-- If is enable mode add , display form for adding data-->
	<?php if($mode == 'add') { ?>
	<h1>Dodaj rashod</h1>
	<div class="alert alert-info alert-dismissable">
	<?php echo validation_errors(); ?>
	<?php echo form_open('rashod/add') ?>
	<div class="form-group">
		<label for="racun">Racun:</label>
		<select class="form-control" id="racun" name="racun_rashod">
			<?php foreach($racun_data as $racun): ?>
				<option value ="<?php echo $racun['naziv']; ?>"><?php echo $racun['naziv']; ?></option>
			<?php endforeach; ?>
		</select><br />
	</div>
	<div class="form-group">
		<label for="vrsta">Vrsta:</label>
		<select class="form-control" id="vrsta" name="vrsta_rashod">
			<option value ="Režije">Režije</option>
			<option value ="Prehrana">Prehrana</option>
			<option value ="Kućne potrepštine">Kućne potrepštine</option>
			<option value ="Odjeća i obuća">Odjeća i obuća</option>
			<option value ="Auto i prijevoz">Auto i prijevoz</option>
			<option value ="Zdravlje">Zdravlje</option>
			<option value ="Krediti i dugovi">Krediti i dugovi</option>
			<option value ="Štednja i investicije">Štednja i investicije</option>
			<option value ="Ostali troškovi">Ostali troškovi</option>
		</select><br />
	</div>
	<div class="form-group">
		<label for="komentar">Komentar:</label>
		<textarea class="form-control" name="komentar_rashod" id="komentar" cols="20" rows="2"></textarea><br>	
	</div>
	<div class="form-group">
		<label for="iznos">Iznos:</label>
		<input class="form-control" type="text" id="iznos" name="iznos_rashod" placeholder="Unesite vaš iznos"/><br />
	</div>
	<div class="form-group">
		<label for="etiketa">Etiketa:</label>
		<input class="form-control" type="text" id="etiketa" name="etiketa_rashod" placeholder="Unesite vašu etiketu"/><br />
	</div>
	<div class="form-group">
		<label for="datum">Datum:</label>
		<input class="form-control" type="text" id="datepicker" name="datum_rashod" placeholder="Unesite vaš datum"/><br />
	</div>
		<input class="btn btn-default" type="submit" name="dodaj_rashod" value="Dodaj rashod" />

	</form>
	</div>
	<!-- End of adding part-->

	

	<!-- If isn't enable mode add , display form for editing data-->
	<?php } else { ?>   
	<h1>Uredi rashod</h1>	
	<div class="alert alert-success alert-dismissable">
	<?php echo validation_errors(); ?>
	<?php echo form_open("rashod/edit/{$rashod_data[0]['transakcija_ID']}") ?>
	<div class="form-group">
	<label for="racun">Racun:</label>
		<select class="form-control" id="racun" name="racun_rashod">
			<?php foreach($racun_data as $racun): ?>
				<option 
					value ="<?php echo $racun['naziv'];?>" 
					<?php if($rashod_data[0]['racun'] == $racun['naziv']) echo ' selected=\"selected"'; ?>>
					<?php echo $racun['naziv']; ?>
				</option>
			<?php endforeach; ?>
		</select><br />
	</div>
	<?php 
	echo '<pre>';
	print_r($rashod_data); 
	echo '</pre>';
	?>
	<div class="form-group">
		<label for="vrsta">Vrsta:</label>
		<select class="form-control" id="vrsta" name="vrsta_rashod">
			<option value ="Režije" <?php if ($rashod_data[0]['vrsta'] == 'Režije') echo ' selected="selected"'; ?>>Režije</option>
			<option value ="Prehrana" <?php if ($rashod_data[0]['vrsta'] == 'Prehrana') echo ' selected="selected"'; ?>>Prehrana</option>
			<option value ="Kućne potrepštine" <?php if ($rashod_data[0]['vrsta'] == 'Kućne potrepštine') echo ' selected="selected"'; ?>>Kućne potrepštine</option>
			<option value ="Odjeća i obuća" <?php if ($rashod_data[0]['vrsta'] == 'Odjeća i obuća') echo ' selected="selected"'; ?>>Odjeća i obuća</option>
			<option value ="Auto i prijevoz" <?php if ($rashod_data[0]['vrsta'] == 'Auto i prijevoz') echo ' selected="selected"'; ?>>Auto i prijevoz</option>
			<option value ="Krediti i dugovi" <?php if ($rashod_data[0]['vrsta'] == 'Krediti i dugovi') echo ' selected="selected"'; ?>>Krediti i dugovi</option>
			<option value ="Štednja i investicije" <?php if ($rashod_data[0]['vrsta'] == 'Štednja i investicije') echo ' selected="selected"'; ?>>Štednja i investicije</option>
			<option value ="Ostali troškovi" <?php if ($rashod_data[0]['vrsta'] == 'Ostali troškovi') echo ' selected="selected"'; ?>>Ostali troškovi</option>
		</select><br />
	</div>
	<div class="form-group">
		<label for="komentar">Komentar:</label>
		<textarea class="form-control" name="komentar_rashod" id="komentar" cols="20" rows="2"><?php echo $rashod_data[0]['komentar'];?></textarea><br>	
	</div>
	<div class="form-group">		
		<label for="iznos">Iznos:</label>
		<input class="form-control" type="text" id="iznos" name="iznos_rashod" placeholder="Unesite vaš iznos" value="<?php echo $rashod_data[0]['iznos'];?>"/><br />
	</div>
	<div class="form-group">
		<label for="etiketa">Etiketa:</label>
		<input class="form-control" type="text" id="etiketa" name="etiketa_rashod" value="<?php echo $rashod_data[0]['etiketa'];?>" placeholder="Unesite vašu etiketu"/><br />
	</div>
	<div class="form-group">
		<label for="datum">Datum:</label>
		<input class="form-control" type="text" id="datepicker" name="datum_rashod" value="<?php echo $rashod_data[0]['datum'];?>" placeholder="Unesite vaš datum"/><br />
	</div>
		<input class="btn btn-default" type="submit" name="uredi_rashod" value="Uredi rashod" />

	</form>
	</div>
		
	<?php } ?>
	</div>
</div>