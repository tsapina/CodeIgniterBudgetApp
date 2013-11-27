
	
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-3">
        	<div class="panel panel-primary">
			      <div class="panel-heading">
			        <h3 class="panel-title">Registracija</h3>
			      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">
	<?php
	if($success == 0)
	{
		echo form_open('user/signup_validation');

		echo validation_errors(); 

		echo "<div id='form-group'>";
		$array = array(
		    'name' => 'email',
		  	'class' => 'form-control'
		);
		echo "<label>Email adresa:</label><p>";
		echo form_input($array, $this->input->post('email'));
		echo "</div>";

		echo "<div id='form-group'>";
		$array = array(
		    'name' => 'password',
		  	'class' => 'form-control'
		);

		echo "<label>Lozinka:</label><p>";
		echo form_password($array);
		echo "</div>";

		$array = array(
		    'name' => 'cpassword',
		  	'class' => 'form-control'
		);
		echo "<div id='form-group'>";
		echo "<label>Potvrdi lozinku:</label><p>";
		echo form_password($array);
		echo "</div>";

		$array = array(
		    'name' => 'ime',
		  	'class' => 'form-control'
		);

		echo "<div id='form-group'>";
		echo "<label>Ime:</label><p>";
		echo form_input($array , $this->input->post('ime'));
		echo "</p>";
		echo "</div>";

		$array = array(
		    'name' => 'prezime',
		  	'class' => 'form-control'
		);
		echo "<div id='form-group'>";
		echo "<label>Prezime:</label><p>";
		echo form_input($array, $this->input->post('prezime'));
		echo "</p>";
		echo "</div>";
		$array = array(
		    'name' => 'signup_submit',
		  	'class' => 'btn btn-default'
		);

		echo "<p>";
		echo form_submit($array, 'Sign up');
		echo "</p>";

	echo form_close();
	?>
	<a href="<?php echo base_url();?>">Povratak na prijavu</a>
	  </div>
    </div>
</div>
</div>
</div>
	<?php
	}
	else
	{
	?>
	
	<p>Uspješno ste se registrirali</p>
	<a href="<?php echo base_url();?>">Povratak na prijavu</a>
	<?php } ?>
	</div>
