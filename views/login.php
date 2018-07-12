<?php
use DaVinci\Storage\Session;

if(Session::has('_errors')) {
	$_errors = Session::once('_errors');
	$_old_input = Session::once('_old_input');
}
?>
<header class="header__Best mt-5 mb-5">
    <div class="container">
        <h1 class="m-0 title">FANFOUT</h1>
        <p class="m-0">fanáticos del futbol</p>
    </div>
</header>

<main class="main__Best">


    <div class="container">

       <form action="" method="post" class="form__Register col-lg-6 pl-0 ">
            <p class="description">
                Para continuar usando la plataforma, ingresa con tus datos registrados
            </p>
            <div class="card col-8 center p-3">
            	<?php if(isset($_errors)): ?>
	            	<span class="text-danger">
	            		<?php echo $_errors['login']; ?>
	            	</span>
	            <?php endif; ?>
	           <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-between flex-wrap mb-3">
	                <div class="form-step col-lg-12 mb-2 pl-0">
	                    <span class="span d-block step__Number">1</span>
	                </div>
	               <div class="form-group col-lg-12 pl-0 ">
	                    <input type="email" placeholder="Email" name="email" class="form-control">
	                   
	               </div>
	            </div>
	           
	            <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-between flex-wrap mb-3">
	                <div class="form-step col-lg-12 mb-2 pl-0">
	                    <span class="span d-block step__Number">2</span>
	                </div>
	               <div class="form-group col-lg-12 pl-0 ">
	                   <input type="password" placeholder="Ingresa contraseña" name="pw" class="form-control">
	               </div>
	            </div>
	            
	            <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-center flex-wrap mb-3">
	               <input type="submit" value="Ingresar Fan" class="">
	            </div>
	        </div>
       </form>
        
    </div>
    
    <div class="figure m-0">
        <img src="img/maradona.jpg" alt="">
    </div>
   

</main>