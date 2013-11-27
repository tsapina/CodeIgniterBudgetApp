<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-11">
			<h1>Rashodi</h1>
		</div>
		
		<div class="col-lg-1" >
			<img src="img/help.png" width="50" height="50" class="s_h"></img>
		</div>
		
	</div>
	<div class="row">
		<div class="slidingHelp alert alert-success alert-dismissable">
				Rashodi predstavljaju smanjenje neto vrijednosti koje nastaju kao rezultat financijskih transakcija. 
				Na pregledu svih unesenih rashoda, u sekciji "Akcije" možete izmjeniti i obrisati odabrani rashod.
				Možete dodati neograničen broj rashoda.
				Za svaki rashod potrebno je da odaberete račun kome pripada rashod, vrstu rashoda, komentar, etiketu,,  iznos i datum na kalendaru. Datum potvrđujete odabirom dana na kalendaru.
				Etikete predstavljaju detaljnije kategorirane prihode. 
		</div>
	</div>
	<hr>
	 <div class="row">
	 	<div class="col-lg-12">
		<a href="<?php echo base_url()."rashod/add"; ?>"  class="btn btn-primary btn-lg">Dodaj Rashod</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12">
	    	<div class="panel panel-primary">
			      <div class="panel-heading">
			        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Izlist Rashoda</h3>
			      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">
						  <table class="table table-bordered table-hover table-striped tablesorter" class="display" id="datatables">
						  	<thead>
							  	<tr>
									<th>Rbr</th>
									<th>Račun</th>
									<th>Vrsta rashoda</th>
									<th>Iznos</th>
									<th>Komentar</th>
									<th>Etiketa</th>
									<th>Datum</th>
									<th>Akcije</th>
								</tr>
							</thead>
							<tbody>
							<?php $i= 1 ; ?>
							<?php foreach ($data as $row): ;?>
							    <tr>
							    	<td><?php echo $i++?></td>
									<td><?php echo $row['racun']; ?></td>
									<td><?php echo $row['vrsta']; ?></td>
									<td><?php echo $row['iznos']; ?></td>
									<td><?php echo $row['komentar']; ?></td>
									<td><?php echo $row['etiketa']; ?></td>
									<td><?php echo $row['datum']; ?></td>
									<td>
										<a href="<?php echo base_url()."rashod/edit/{$row['transakcija_ID']}"; ?>">Uredi</a>  
										<a href="<?php echo base_url()."rashod/delete/{$row['transakcija_ID']}"; ?>" onclick="return confirm('Dali ste sigurni da želite obrisati ovaj red?')";> Obriši</a>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
						  </table>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.row -->
</div><!-- /#page-wrapper -->