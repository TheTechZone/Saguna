	<!--Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top " id="navig" role="navigation"  data-offset-top="0">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigare">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="pull-left"><img src="images/sigla.gif" class="img-responsive" width="50px" height="50px"></a>
			</div>
			<div class="navbar-collapse collapse" id="navigare">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Despre Noi<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="menu-item dropdown dropdown-submenu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>	
								<ul class="dropdown-menu">
									<li class="menu-item"><a href="#">Profil</a></li>
									<li class="menu-item"><a href="#">Istoric</a></li>
									<li class="menu-item"><a href="#">Personalitati</a></li>
									<li class="menu-item"><a href="#">Academicieni</a></li>
									<li class="menu-item"><a href="#">Misiunea/Insemnele</a></li>
									<li class="menu-item"><a href="#">Parteneriate</a></li>
								</ul>
								</li>
							</li>
							<li>
								<a href="#">Dotari</a>
							</li>
							<li><a href="#">Planuri</a></li>
							<li><a href="#">Asociatia De Parinti</a></li>
							<li><a href="#">Personal</a></li>
							<li><a href="#">Elevi</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Educatie<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Plan de scolarizare</a></li>
							<li><a href="#">Orar</a></li>
							<li><a href="#">Examene si admitere</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Activitati<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Deschidere</a>
								<a href="#">Comanda</a>
								<a href="#">Sf. Andrei</a>
								<a href="#">Craciun</a>
								<a href="#">15 Mai</a>
								<a href="#">Maial</a>
								<a href="#">1 Iunie</a>
								<a href="#">Promotii</a>
								<a href="#">Francofonie</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extrașcolar<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Minisat</a></li>
							<li><a href="#">Fanfara</a></li>
							<li><a href="#">Cor</a></li>
							<li><a href="#">Seminar Filozofie</a></li>
							<li><a href="#">Dezbateri</a></li>
							<li><a href="#">Conferintele Saguna</a></li>
							<li><a href="#">TeleAS</a></li>
							<li><a href="#">Publicatii</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Media<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Foto</a></li>
							<li><a href="#">Video</a></li>
						</ul>
					</li>
					<!--
					<form action="" class="navbar-form navbar-right" role="search">
						<div class="form-group input-group">
							<input type="text" class="form-control" placeholder="Cauta-ma">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">Go!</button>
							</span>
						</div>
					</form> -->
					<li>
						<a data-toggle="modal" data-target="#search">
							<i class="glyphicon glyphicon-search"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


<!-- Modal search bar -->
		<div class="modal fade" id="search" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cauta in site</h4>
					</div>
					<div class="modal-body">
						<form action="search.php" method="post" role="search">
							<div class="form-group input-group">
								<input type="search" name="search" class="form-control" placeholder="Cauta-ma">
								<span class="input-group-btn">
									<button class="btn btn-danger class=" name="submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>