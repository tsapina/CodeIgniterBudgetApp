<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-11">
			<h1>Stanje</h1>
		</div>
		
		<div class="col-lg-1" >
			<img src="img/help.png" width="50" height="50" class="s_h"></img>
		</div>
 	</div>
	<div class="row">
		<div class="slidingHelp alert alert-success alert-dismissable">
				Stranica stanje sadrži pregled stanja svih vaših računa, kao i grafički prikaz rashoda za poslednjih trideset dana. 
				Također sadrži kalendar gdje možete unositi podatke po želji.Klikom na gumb kalendar možete sakriti kalendar odnosno ponovno ga prikazati.
		</div>
	</div>
	<div class="row">
		<div class="col-lg-11"></div>
		<div class="col-lg-1">
			<p class="show_hide" > <a  class="btn btn-primary btn">Kalendar</a></p>
		</div>
	</div>
	<div class="row">
		<div class="slidingDiv">
	<!--- Calendar START-->
		<div class="col-lg-12">
			<div class="panel panel-primary">
		      <div class="panel-heading">
		        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Kalendar Podsjetnik</h3>
		      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">
						<div id="calendar">
							<?php echo $calendar;?>
							<script type="text/javascript">
							$(document).ready(function(){
								$('.calendar .day').click(function(){
									day_num = $(this).find('.day_num').html();
									day_data = prompt('Enter Stuff', $(this).find('.content').html());
									if(day_data !=null){
										$.ajax({
											url: window.location,
											type: 'POST',
											data: {
												day: day_num,
												data: day_data
											},
											success: function(msg){
												location.reload();
											}

										});
									}
								});
							});
							</script>
						</div><!-- /#calendar -->
					</div>
				</div>
			</div>
		</div><!-- /.col-lg-6 -->
		
	
	<!--- Calendar END-->
	</div>
		</div><!-- /#row-->
	<hr>
    <div class="row">
		<!--- Prikaz stanja na racunima start-->
		<div class="col-lg-6">
		    <div class="panel panel-primary">
		      <div class="panel-heading">
		        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Stanje na računima</h3>
		      </div>
          		<div class="panel-body">	
          			<div id="morris-chart-area">
						<div id="stanje">
							<?php
							$valute = array(
									"kuna" => "kuna",
									"euro" => "euro",
									"dolar" => "dollar",
									"franak" => "franak",
								);
							$i=0;
							foreach($stanje as $iznos)
							{	
								switch ($valuta[$i]) {
								    case $valute['kuna']:
								        $val = 'HRK';
								        break;
								    case $valute['euro']:
								        $val = 'EUR';
								        break;
							        case $valute['dolar']:
							      		 $val = 'USD';
							        break;
							        case $valute['franak']:
							      		 $val = 'CHF';
							        break;
								}
								$iznos = number_format($iznos, 2, ',', ' ');
								$iznos = $iznos . " " . $val;
								
			   					echo "<div class='stanje-naziv label-primary'>";
								echo  $naziv_banke[$i] . '<br>';
								echo "</div>";
								echo "<div class='stanje-iznos alert alert-dismissable alert-info'>";
								echo $iznos . '<br>';
								echo "</div>";
								$i=$i+1;

							}
							?>
						</div><!-- /#stanje -->
					</div>
				</div>
			</div>
		</div><!-- /.col-lg-6 -->
		<!--- Prikaz stanja na racunima end-->
		
	</div><!-- /.row -->
	
	<hr>
	<?php
	if(!isset($graf_rashod['uslucajudanemanista']))
	{
	?>
	<!--- Prikaz grafa, staviti samo ako rashodi postoje!!!!!!!-->
	<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Grafički prikaz rashoda za posljednjih 30 dana</h3>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
            	<div id="rashodi_graf" style="width:100%; height:400px; margin: 0 auto;">
					<script>
					$(function () { 
					    $('#rashodi_graf').highcharts({
						chart: {
					         renderTo: 'container',
					         type: 'column'         
				     	 },
					    series: [{
					    	name: 'Rashodi',
					         data: [<?php echo join($graf_rashod['iznos'], ',') ?>]
					    }],
					   colors: [
				            'red'
				            ],
					    yAxis: {
				        	title: {
				                text: 'Ukupan iznos po danu'
				            },
				        },
				        xAxis: {
				            categories: ['<?php echo join($graf_rashod['datum'], "','") ?>'],
				            tickInterval: 1
				        },
					   	title: {
				            text: 'Rashodi za posljednjih 30 dana'
				        }
					    });
					});
					</script>
				</div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.row -->
	<?php } ?>
	<hr>
	<?php
	if(!isset($graf_prihod['uslucajudanemanista']))
	{
	?>
	<!--- Prikaz grafa, staviti samo ako rashodi postoje!!!!!!!-->
	<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Grafički prikaz prihoda za posljednjih 180 dana</h3>
          </div>
          <div class="panel-body">
            <div id="morris-chart-area">
            	<div id="prihodi_graf" style="width:100%; height:400px; margin: 0 auto;">
					<script>
					$(function () { 
					    $('#prihodi_graf').highcharts({
						chart: {
					         renderTo: 'container',
					         type: 'column'         
				     	 },
					    series: [{
					    	name: 'Prihodi',
					         data: [<?php echo join($graf_prihod['iznos'], ',') ?>]
					    }],
					   colors: [
				            '#B0E094'
				            ],
					    yAxis: {
				        	title: {
				                text: 'Ukupan iznos po danu'
				            },
				        },
				        xAxis: {
				            categories: ['<?php echo join($graf_prihod['datum'], "','") ?>'],
				            tickInterval: 1
				        },
					   	title: {
				            text: 'Prihod za posljednjih 180 dana'
				        }
					    });
					});
					</script>
				</div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.row -->
	<?php } ?>
</div><!-- /.row -->
</div><!-- /#page-wrapper -->