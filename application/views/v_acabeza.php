<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	    <title>GerkoSport - Administrator</title>
	    
		<?php 
		echo link_tag('complemento/css/bootstrap.min.css');
		echo link_tag('complemento/css/dataTables.bootstrap.css');
		echo link_tag('complemento/css/sb-admin.css');
		echo link_tag('complemento/css/plugins/morris.css');
		echo link_tag('complemento/font-awesome/css/font-awesome.min.css');
		?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">GerkoSport</a>
            </div>
            <!-- Top Menu Items -->

            <?php
			$login = $this->session->userdata('login');
        	?>
            

	

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">

	<ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?= $login ?> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?= base_url(); ?>index.php/c_session/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
	</ul>


	 <?= $this->session->userdata('usuario') ?> &nbsp; 
	 <!-- /.dropdown -->
	<?php 
	if($this->session->userdata('alerta') != 0)
	{
	?>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a class="dropdown-toggle btn btn-danger square-btn-adjust" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> (<?=$this->session->userdata('alerta')?>) Alerta(s) <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="<?= base_url(); ?>index.php/c_alertas/ver_alertas">
                        <div>
                            <i class="fa fa-warning fa-fw"></i>Materia Prima
                            <span class="pull-right text-muted small">Existen <?=$this->session->userdata('alerta')?> item(s) faltante (s) </span>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
	</ul>
    <!-- /.dropdown -->
    <?php 
	}
	else
	{
	?>
	<ul class="nav navbar-top-links navbar-left">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> Alertas <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-check fa-fw"></i>No Existe Stock Minimo
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
	</ul>
	<?php
	}
	?>
</div>


		<?php
		$this->load->view($this->session->userdata('menu'));
        ?>

            


