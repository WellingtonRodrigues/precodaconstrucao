<!-- Barra Lateral -->

<div class="col-sm-3">
	<img class="img-responsive logo" src="http://localhost/precodaconstrucao/public/img/brand/pc.png">
	<div class="sidebar-nav">
		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<span class="visible-xs navbar-brand">Sidebar menu</span>
			</div>
			<div class="navbar-collapse collapse sidebar-navbar-collapse">
				<ul class="nav navbar-nav categorias">
          	<?php
          		echo "\n";
          		foreach ($data["categorias"] as $categoria){
					echo "<li class='LiCategoria' value='". $categoria->getIdCategoria() . "'><a href='javascript:;'><b>";
					echo $categoria->getNomeCategoria();
					echo "</b> <span class='glyphicon glyphicon-chevron-right right' aria-hidden='true'></span></a></li>\n";
				}
				echo "\n";
			?>
          </ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
<!-- Fim Barra Lateral -->
