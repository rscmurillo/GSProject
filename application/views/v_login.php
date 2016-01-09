<!DOCTYPE html>
<html lang="es">
  
	<head>
	    <meta charset="utf-8">
	    <title>Iniciar Sesión</title>
	    
		<?php 
		echo link_tag('complemento/css/bootstrap.min.css');
		echo link_tag('complemento/css/sb-admin.css');
		echo link_tag('complemento/css/plugins/morris.css');
		echo link_tag('complemento/css/signin.css');
		echo link_tag('complemento/font-awesome/css/font-awesome.min.css');
		?>
    
	</head>

	<body>
		
		<div class="account-container">
		
			<div class="content clearfix">
				<?=form_open(base_url()."index.php/c_session/login")?>
					<h1 class="text-center">Iniciar Sesión</h1>		
				
					<div class="login">
						<?php
						echo validation_errors('<div class="row">
											<div class="col-lg-12">
												<div class="alert alert-danger alert-dismissable">
												    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												    <i class="fa fa-warning"></i>  <strong>Aviso..!! </strong>','
												</div>
											</div>
										</div>');
										if(isset ($no_usuario))
											{
											echo '<div class="row">';
											echo '<div class="col-lg-12">';
												echo '<div class="alert alert-danger alert-dismissable">';
												    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
												    echo '<i class="fa fa-warning"></i>  <strong>Aviso..!! </strong> '.$no_usuario;
												echo '</div>';
											echo '</div>';
											echo '</div>';
											}
						?>
			
						<div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-1x"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name="login">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-1x"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>

						<div class="login-actions">
											
						<button class="button btn btn-info btn-large">Entrar</button>
						
						</div>
						
					</div>


				</form>

			</div>
		
		</div>

	</body>
	
    <script src="<?= base_url(); ?>complemento/js/jquery.js"></script>
    <script src="<?= base_url(); ?>complemento/js/bootstrap.min.js"></script>


</html>
