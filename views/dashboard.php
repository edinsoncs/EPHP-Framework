
<body class="bg__Dashboard">
	<header class="header__Best header__Dashboard pt-2 pb-2">
		<div class="container">
			<div class="d-flex">
				<div class="header__Best--Name col-lg-4 pl-0">
					<h1 class="m-0 title">FANFOUT</h1>
				</div>
				<div class="header__Best--Search col-lg-4 pt-1">
					<form action="" class="form">
						<input type="search" class="form-control" placeholder="Busqueda en general">
					</form>
				</div>
				<div class="header__Best--Avatar col-lg-4 pt-1 d-flex justify-content-end align-items-center">
					
					<img src="https://scontent.faep9-2.fna.fbcdn.net/v/t1.0-1/p160x160/32905289_1891465430905917_9092001833517318144_n.jpg?_nc_cat=0&oh=261206ebea3372fb08ad3957900f24ae&oe=5BEA5928" alt="Edinson" class="">
				</div>
			</div>
		</div>
	</header>


	<main class="container top mt-5 pt-5">
		<div class="row">

			
			<div class="col-3">
				<aside class="aside__Dashboard p-4">
					<ul class="ul p-0 m-0">
						<li class="list d-block mb-2">
							<a href="#" class="link">
								<i class="fa fa-home" aria-hidden="true"></i>
								Inicio
							</a>
						</li>
						<li class="list d-block mb-2">
							<a href="#" class="link">
								<i class="fa fa-address-book-o" aria-hidden="true"></i>
								Mi perfil
							</a>
						</li>
						<li class="list d-block mb-2">
							<a href="#" class="link">
								<i class="fa fa-clipboard" aria-hidden="true"></i>
								Mis publicaciones
							</a>
						</li>
						<li class="list d-block">
							<a href="#" class="link">
								<i class="fa fa-star" aria-hidden="true"></i>
								Mis idolos
							</a>
						</li>
					</ul>
				</aside>
			</div>

			<div class="col-5">
				<section class="section__Post mb-4">
					<form class="form" action="" method="post" enctype="multipart/form-data">
						<textarea class="w-100 p-3 form-control border-0" placeholder="Escribe tus pensamientos o duelos del futbol" name="message"></textarea>
						<div class="image js-image p-2 border-top none">
							<img src="" id="output_image" width="120">
						</div>
						<div class="form-group text-right mt-2 d-flex justify-content-between  border-top pl-3 pr-3 pt-2 pb-2">
							<div class="form-group-input align-items-center">
								<label>
									 <input type="file" name="file" class="none"  accept="image/*" onchange="preview_image(event)">
									 <span class="d-block cursor">
									 	<i class="fa fa-picture-o" aria-hidden="true"></i>
									 	Imagen
									 </span>
								</label>
							</div>
							<div class="form-group-input">
								<input type="submit" value="Publicar" class="btnpub">
							</div>
						</div>
					</form>
				</section>
				<section class="section__List">

					<?php if(isset($all)): ?>

						<?php foreach ($all as $key): ?>


							<article class="list__Post card p-2 mb-4">
								<header class="header__Post pb-2 border-bottom">
									<div class="image d-flex justify-content-between">
										<div class="container__Image">
											<img src="https://scontent.faep9-2.fna.fbcdn.net/v/t1.0-1/p160x160/32905289_1891465430905917_9092001833517318144_n.jpg?_nc_cat=0&oh=261206ebea3372fb08ad3957900f24ae&oe=5BEA5928" class="rounded-circle mr-1 mb-2" width="30" height="30" >
											<span class="name">Edinson</span>
										</div>
										<div class="time text-right">
											<small class="smaill text-muted">
												<?php echo $key['createdAt'] ?>
											</small>
										</div>
									</div>
									
								</header>
								<h6 class="text-muted font-weight-light pt-2 pb-2">
									<?php echo $key['message'] ?>
								</h6>
								<?php if($key['name']): ?>
								<div class="description__Image border-top pt-3">
									<img src="uploads/<?php echo $key['name']; ?>" class="w-100">
								</div>
								<?php endif; ?>

								<div class="description__Options border-top d-flex justify-content-start pt-1 pb-1">
									<div class="list__Options">
										<a href="viewpost/<?php echo $key['id']; ?>">
											<i class="fa fa-share text-muted cursor" aria-hidden="true"></i>
										</a>
									</div>
								</div>
								
							</article>

						<?php endforeach; ?>

					<?php endif; ?>

					<!-- <article class="list__Post card p-2 mb-4">
						<header class="header__Post pb-2 border-bottom">
							<div class="image">
								<img src="https://scontent.faep9-2.fna.fbcdn.net/v/t1.0-1/p160x160/32905289_1891465430905917_9092001833517318144_n.jpg?_nc_cat=0&oh=261206ebea3372fb08ad3957900f24ae&oe=5BEA5928" class="rounded-circle mr-1 mb-2" width="30" height="30" >
								<span class="name">Edinson</span>
							</div>
						</header>
						<h6 class="text-muted font-weight-light pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</h6>
					</article>

					<article class="list__Post card p-2 mb-4">
						<header class="header__Post pb-2 border-bottom">
							<div class="image">
								<img src="https://scontent.faep9-2.fna.fbcdn.net/v/t1.0-1/p160x160/32905289_1891465430905917_9092001833517318144_n.jpg?_nc_cat=0&oh=261206ebea3372fb08ad3957900f24ae&oe=5BEA5928" class="rounded-circle mr-1 mb-2" width="30" height="30" >
								<span class="name">Edinson</span>
							</div>
						</header>
						<h6 class="text-muted font-weight-light pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</h6>
						<div class="image__Post">
							<img src="https://scontent.faep9-2.fna.fbcdn.net/v/t1.0-9/36253208_1891160597661735_3728148337254203392_n.jpg?_nc_cat=0&oh=4b16be9c9fd27895f083b0740f4b7429&oe=5BEA7CA4" class="d-block w-100">
						</div>
					</article>-->

				</section>
			</div>
			
		</div>
		
	</main>
	