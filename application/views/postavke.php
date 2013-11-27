<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-6">
			
	<?php if(isset($success))
	{
		echo "<div class='alert alert-success alert-success'>";
		echo 'Uspješno ste promjenili lozinku!';
		echo "</div>";
	}
	?>
	

	<?php echo form_open('user/promjeni_lozinku') ?>
	
	<?php echo validation_errors(); ?>
	<div class="form-group">
		<label  for="password">Lozinka:</label>
		<input class="form-control" type="password" name="password" placeholder="Unesite novu lozinku"/><br />
	</div>	
	<div class="form-group">
		<label for="cpassword">Ponovi lozinku</label>
		<input class="form-control" type="password" name="cpassword" placeholder="Unesite ponovljenu lozinku"><br />
	</div>
		<input class="btn btn-default" type="submit" name="submit" value="Promjeni lozinku" />
	</form>





		</div>
	</div><!-- /.row -->
</div><!-- /#page-wrapper -->

