	
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-3">
        	<div class="panel panel-primary">
			      <div class="panel-heading">
			        <h3 class="panel-title">Prijava</h3>
			      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">
	<?php echo validation_errors(); ?>

	<?php echo form_open('user/login_validation') ?>
	<div class="form-group">
		<label  for="email">Email adresa:</label>
		<input class="form-control" type="email" name="email" placeholder="Unesite vaš email"/><br />
	</div>	
	<div class="form-group">
		<label for="lozinka">Lozinka</label>
		<input class="form-control" type="password" name="lozinka" placeholder="Unesite vašu lozinku"><br />
	</div>
		<input class="btn btn-default" type="submit" name="submit" value="Ulogiraj me" />

	</form>
	<br>
	
	<a href="<?php echo base_url();?>user/register">Registracija</a>
  </div>
    </div>
</div>
</div>
</div>