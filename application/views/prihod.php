<div id="page-wrapper">
	 <div class="row">
	 	<div class="col-xs-6">

			<!-- If is enable mode add , display form for adding data-->
			<?php if($mode == 'add') { ?>
			<h1>Dodaj prihod</h1>
			<div class="alert alert-info alert-dismissable">
			<?php echo validation_errors(); ?>
			<?php echo form_open('prihod/add') ?>
			<div class="form-group">
				<label for="racun">Racun:</label>
				<select class="form-control" id="racun" name="racun">
					<?php foreach($racun_data as $racun): ?>
						<option value ="<?php echo $racun['naziv']; ?>"><?php echo $racun['naziv']; ?></option>
					<?php endforeach; ?>
				</select><br />
			</div>
			<div class="form-group">
				<label for="vrsta">Vrsta:</label>
				<select class="form-control" id="vrsta" name="vrsta">
					<option value ="Neto plaća 1">Neto plaća 1</option>
					<option value ="Neto plaća 2">Neto plaća 2</option>
					<option value ="Neto mirovina 1">Neto mirovina 1</option>
					<option value ="Neto mirovina 2">Neto mirovina 2</option>
					<option value ="Najamnine">Najamnine</option>
					<option value ="Kamate">Kamate</option>
					<option value ="Ostalo">Ostalo</option>
				</select><br />
			</div>
			<div class="form-group">
				<label for="komentar">Komentar:</label>
				<textarea class="form-control" name="komentar" id="komentar" cols="20" rows="2"></textarea><br>	
			</div>
			<div class="form-group">	
				<label for="iznos">Iznos:</label>
				<input class="form-control" type="text" id="iznos" name="iznos" placeholder="Unesite vaš iznos"/><br />
			</div>
			<div class="form-group">
				<label for="etiketa">Etiketa:</label>
				<input class="form-control" type="text" id="etiketa" name="etiketa" placeholder="Unesite vašu etiketu"/><br />
			</div>
			<div class="form-group">
				<label for="datum">Datum:</label>
				<input class="form-control" type="text" name="datum" id="datepicker" placeholder="Unesite vaš datum"/><br />
			</div>
				<input  class="btn btn-default" type="submit" name="dodaj_prihod" value="Dodaj prihod" />

			</form>
		</div>
	<!-- End of adding part-->
	</div><!-- End of row part-->

	<!-- If isn't enable mode add , display form for editing data-->
	<?php } else { ?>   
	<h1>Uredi prihod</h1>	
	<div class="alert alert-info alert-dismissable">
	<?php echo validation_errors(); ?>
	<?php echo form_open("prihod/edit/{$prihod_data[0]['transakcija_ID']}") ?>
	<div class="form-group">
	<label for="racun">Racun:</label>
		<select class="form-control" id="racun" name="racun">
			<?php foreach($racun_data as $racun): ?>
				<option 
					value ="<?php echo $racun['naziv'];?>" 
					<?php if($prihod_data[0]['racun'] == $racun['naziv']) echo ' selected=\"selected"'; ?>>
					<?php echo $racun['naziv']; ?>
				</option>
			<?php endforeach; ?>
		</select><br />
	</div>
	<div class="form-group">
		<label for="vrsta">Vrsta:</label>
		<select class="form-control" id="vrsta" name="vrsta">
			<option value ="Neto plaća 1" <?php if ($prihod_data[0]['vrsta'] == 'Neto plaća 1') echo ' selected="selected"'; ?>>Neto plaća 1</option>
			<option value ="Neto plaća 2" <?php if ($prihod_data[0]['vrsta'] == 'Neto plaća 2') echo ' selected="selected"'; ?>>Neto plaća 2</option>
			<option value ="Neto mirovina 1" <?php if ($prihod_data[0]['vrsta'] == 'Neto mirovina 1') echo ' selected="selected"'; ?>>Neto mirovina 1</option>
			<option value ="Neto mirovina 2" <?php if ($prihod_data[0]['vrsta'] == 'Neto mirovina 2') echo ' selected="selected"'; ?>>Neto mirovina 2</option>
			<option value ="Najamnine" <?php if ($prihod_data[0]['vrsta'] == 'Najamnine') echo ' selected="selected"'; ?>>Najamnine</option>
			<option value ="Kamate" <?php if ($prihod_data[0]['vrsta'] == 'Kamate') echo ' selected="selected"'; ?>>Kamate</option>
			<option value ="Ostalo" <?php if ($prihod_data[0]['vrsta'] == 'Ostalo') echo ' selected="selected"'; ?>>Ostalo</option>
		</select><br />
	</div>
	<div class="form-group">
		<label for="komentar">Komentar:</label>
		<textarea class="form-control" name="komentar" id="komentar" cols="20" rows="2"><?php echo $prihod_data[0]['komentar'];?></textarea><br>	
	</div>
	<div class="form-group">
		<label for="iznos">Iznos:</label>
		<input class="form-control" type="text" name="iznos" id="iznos" placeholder="Unesite vaš iznos" value="<?php echo $prihod_data[0]['iznos'];?>"/><br />
	</div>
	<div class="form-group">
		<label for="etiketa">Etiketa:</label>
		<input class="form-control" type="text" name="etiketa" id="etiketa" value="<?php echo $prihod_data[0]['etiketa'];?>" placeholder="Unesite vašu etiketu"/><br />
	</div>
	<div class="form-group">
		<label for="datum">Datum:</label>
		<input class="form-control" type="text" name="datum" id="datepicker" value="<?php echo $prihod_data[0]['datum'];?>" placeholder="Unesite vaš datum"/><br />
	</div>
		<input class="btn btn-default" type="submit" name="uredi_prihod" value="Uredi prihod" />

	</form>
	</div>
		
	<?php } ?>
	
	
</div>