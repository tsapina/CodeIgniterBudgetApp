<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-11">
			<h1>Prihodi</h1>
		</div>
		
		<div class="col-lg-1" >
			<img src="img/help.png" width="50" height="50" class="s_h"></img>
		</div>
		
	</div>
	<div class="row">
		<div class="slidingHelp alert alert-success alert-dismissable">
				Prihodi predstavljaju povećanje neto vrednosti koje nastaju kao rezultat financijskih transakcija.
				Na pregledu svih unesnih prihoda, u sekciji "Akcije" možete izmjeniti i obrisati odabrani prihod.
				Možete dodati neograničen broj prihoda.
				Za svaki prihod potrebno je da odaberete račun kome pripada prihod, vrstu prihoda, komentar, etiketu, iznos i datum na kalendaru. 
				Datum potvrđujete odabirom dana na kalendaru.Etikete predstavljaju detaljnije kategorirane prihode. 
		</div>
	</div>
	<hr>
	 <div class="row">
	 	<div class="col-lg-12">
		<a href="<?php echo base_url()."prihod/add"; ?>"  class="btn btn-primary btn-lg">Dodaj Prihod</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12">
	    	<div class="panel panel-primary">
			      <div class="panel-heading">
			        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Izlist prihoda</h3>
			      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">
	  					<table  class="table table-bordered table-hover table-striped tablesorter" id="datatables" >
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
										<a href="<?php echo base_url()."prihod/edit/{$row['transakcija_ID']}"; ?>"  >Uredi</a>  
										<a href="<?php echo base_url()."prihod/delete/{$row['transakcija_ID']}"; ?>" onclick="return confirm('Dali ste sigurni da želite obrisati ovaj red?');">Obriši</a>
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

