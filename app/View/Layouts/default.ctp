<!doctype html>
<html lang="pt">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jquery-confirm.css" rel="stylesheet">
	<link href="css/jquery-confirm.min.css" rel="stylesheet">

	<title>Posts</title>
</head>

<body class="d-flex flex-column vh-100">
	<header>
		<nav class="navbar navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/GDV.png" alt="">
				</a>
			</div>
		</nav>

	</header>
		<div class="container py-5 mt-5">
		<div class="tab-content" id="myTabContent">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="produto-tab" onclick="crud('', '', '', 'produtos', 'index', '')" data-bs-toggle="tab"  type="button" role="tab" aria-controls="produto-tab-pane" aria-selected="true">Produtos</button>
				</li>
				<!-- <li class="nav-item" role="presentation">
					<button class="nav-link" id="usuario-tab" onclick="crud('', '', '', 'usuarios', 'index', '')" data-bs-toggle="tab"  type="button" role="tab" aria-controls="usuario-tab-pane" aria-selected="false">Usuários</button>
				</li> -->
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="categoria-tab"  onclick="crud('', '', '', 'categorias', 'index', '')" data-bs-toggle="tab"  type="button" role="tab" aria-controls="categoria-tab-pane" aria-selected="false">Categorias</button>
				</li>
				<!-- <li class="nav-item" role="presentation">
					<button class="nav-link" id="log-tab"  onclick=" login()" data-bs-toggle="tab"  type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Login</button>
				</li>				 -->
			</ul>
		</div>
			<?php echo $this->fetch('content'); ?>
		</div>
				
	</main>
	<footer class="footer mt-auto py-3 bg-dark text-white">
		<div class="container">
			<p class="text-white">&copy; 2024 Pedro, Inc</p>
		</div>
	</footer>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-confirm.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>