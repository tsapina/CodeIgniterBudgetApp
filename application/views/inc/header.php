<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/demo_table.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/demo_table_jui.css" type="text/css"/>
    <title>
    <?php 
       $active_site = $this->router->fetch_class();
       $active_site_method = $this->router->fetch_method();
    ?>
    <?php 
    if(isset($active_site))
    {
      echo ucfirst($active_site); 
    }
    elseif(isset($active_site_method))
    {
      echo ucfirst($active_site_method); 
    }
    ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url();?>css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css">
  
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  
    <!-- jQuery UI -->
      <link href="<?php echo base_url();?>css/jquery-ui-1.10.0.custom.css" rel="stylesheet">
  
    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    
    <!-- Jquery Validation-->
    <script src="<?php echo base_url();?>js/validate/jquery.validate.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>js/validate/jquery.validation.functions.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>js/validation.js" type="text/javascript"></script>
      
      <!-- Highcharts-->
      <script src="<?php echo base_url();?>js/highcharts.js" type="text/javascript"></script>

    <!-- Datepicker-->
     <script>
      $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy.mm.dd" });
      });
     </script>

     <!-- tableSorter!!!!!!-->
    <script src="<?php echo base_url();?>js/jquery.dataTables.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
                $(document).ready(function(){
                    $('#datatables').dataTable({
                        "sPaginationType":"full_numbers",
                        "aaSorting":[[2, "desc"]],
                        "bJQueryUI":true
                    });
                })
    </script>


   <!-- Calendar show hide -->
   <script type="text/javascript">
    $(document).ready(function(){
     
            $(".slidingDiv").show();
            $(".show_hide").show();
     
        $('.show_hide').click(function(){
        $(".slidingDiv").slideToggle();
        });
     
    });
  </script>

   <!-- ? img show hide -->
   <script type="text/javascript">
    $(document).ready(function(){
     
            $(".slidingHelp").hide();
            $(".s_h").show();
     
        $('.s_h').click(function(){
        $(".slidingHelp").slideToggle();
        });
     
    });
  </script>

  </head>
  <body>

    <div id="wrapper">