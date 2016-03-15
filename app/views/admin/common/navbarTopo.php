<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://localhost/precodaconstrucao/public/admin">Área Administrativa</a>
		</div>
		<div class="navbar-right">
			<p class="navbar-text">
				<?php 
					echo 'Logado como: <b>' . $data["nomeLoja"] . '</b>';
				?>
			</p>
			<p class="navbar-text">
				<a href="http://localhost/precodaconstrucao/public/admin/logout" role="button">Sair</a>
			</p>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<!-- <div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="#">Página Inicial</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div> -->
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>