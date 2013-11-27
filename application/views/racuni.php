<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-11">
			<h1>Računi</h1>
		</div>
		
		<div class="col-lg-1" >
			<img src="img/help.png" width="50" height="50" class="s_h"></img>
		</div>
		
	</div>
	<div class="row">
		<div class="slidingHelp alert alert-success alert-dismissable">
				Računi predstavljaju vaše stvarne račune, bilo oni tekući, devizni ili novac u vašem novčaniku. 
				Na pregledu svih unesenih računa, u sekciji "Akcije" možete izmjeniti i obrisati odabrani račun.
				Možete dodati neograničen broj računa. Za svaki račun potrebno je da unesete naziv, na primjer "Tekući račun" i valutu računa.
				Možete izmjeniti naziv i valutu. 
				<b>Ukoliko brišete račun, također brišete i prihode i rashode vezane uz taj račun.</b>
		</div>
	</div>
	<hr>
	

	 <div class="row">
	 	<div class="col-lg-12">
		<a href="<?php echo base_url()."racun/add"; ?>"  class="btn btn-primary btn-lg">Dodaj Račun</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12">
	    	<div class="panel panel-primary">
			      <div class="panel-heading">
			        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Izlist računa</h3>
			      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">

	  					<table  class="table table-bordered table-hover table-striped tablesorter" id="datatables">
						  	<thead>
							  	<tr>
									<th scope="col">Rbr</th>
									<th scope="col">Naziv</th>
									<th scope="col">Valuta</th>
									<th scope="col">Akcije</th>
								</tr>
							</thead>
							<tbody>
							<?php $i= 1 ; ?>
							<?php foreach ($data as $row): ;?>
							    <tr>
							    	<td><?php echo $i++?></td>
									<td><?php echo $row['naziv']; ?></td>
									<td><?php echo $row['valuta']; ?></td>
									<td>

										<a href="<?php echo base_url()."racun/edit/{$row['racun_ID']}"; ?>">Uredi</a>  
										
										<a href="<?php echo base_url()."racun/delete/{$row['racun_ID']}"; ?>" onclick="return confirm('Brisanjem računa brišete prihode i rashode vezane uz račun.Dali ste sigurni da želite obrisati ovaj red?');">Obriši</i></a>
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
