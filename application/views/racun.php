<div id="page-wrapper">
	 <div class="row">
	 	<div class="col-lg-6">
	 		<?php 		
			if($empty === 1)
			{
				echo "<div class='alert alert-dismissable alert-warning'>";
				echo 'Da bi koristili aplikaciju morate dodati račun!';
				echo "</div>";
			}	
			 ?>
	<!-- If is enable mode add , display form for adding data-->
	<?php if($mode == 'add') { ?>
	<h1>Dodaj račun</h1>
	<div class="alert alert-info alert-dismissable">
		<?php echo validation_errors(); ?>
		<?php echo form_open('racun/add') ?>
		<div class="form-group">
			<label for="racun">Ime racuna:</label>
			<input class="form-control" type="text" id="racun" name="racun" placeholder="Unesite vaš racun"/><br />
		</div>
		<div class="form-group">
			<label for="valuta">Valuta:</label>
			<select id="valuta" name="valuta"  class="form-control">
				<option value ="kuna">Kuna</option>
				<option value ="euro">Euro</option>
				<option value ="dollar">Dollar</option>
				<option value ="franak">CHF</option>
			</select><br />
		</div>
		<input  class="btn btn-default" type="submit" name="dodaj_racun" value="Dodaj račun">
		</form>
	</div>
	
	<!-- If isn't enable mode add , display form for editing data-->
	<?php } else { ?> 
	<h1>Uredi račun</h1>
	<div class="alert alert-success alert-dismissable">	
	<?php echo validation_errors(); ?>
	<?php echo form_open("racun/edit/{$racun_data[0]['racun_ID']}") ?>
		<div class="form-group">
			<label for="racun">Ime racuna:</label>
			<input class="form-control" type="text" id="racun" name="racun" value="<?php echo $racun_data[0]['naziv'];?>" /><br />
		</div>
		<div class="form-group">
		<label for="valuta">Valuta:</label>
		<select class="form-control" id="valuta" name="valuta">
			<option value ="kuna" <?php if ($racun_data[0]['valuta'] == 'kuna') echo ' selected="selected"'; ?>>Kuna</option>
			<option value ="euro" <?php if ($racun_data[0]['valuta'] == 'euro') echo ' selected="selected"'; ?>>Euro</option>
			<option value ="dollar" <?php if ($racun_data[0]['valuta'] == 'dollar') echo ' selected="selected"'; ?>>Dollar</option>
			<option value ="franak" <?php if ($racun_data[0]['valuta'] == 'franak') echo ' selected="selected"'; ?>>CHF</option>
		</select><br />
		</div>
		<input  class="btn btn-default" type="submit" name="uredi_racun" value="Uredi račun">
	</form>
	</div>
	<?php } ?>
	
	</div>
</div>