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
                Para continuar necesitamos que llenes el formulario, todos los datos ingresados seran guardados con seguridad. disfruta nuestra plataforma, continua el registro.
            </p>
           <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-between flex-wrap mb-3">
                <div class="form-step col-lg-12 mb-2 pl-0">
                    <span class="span d-block step__Number">1</span>
                </div>
               <div class="form-group col-lg-6 pl-0">
                  <?php if(isset($user)): ?>
                    <?php if(!$user['status']): ?>
                     <input type="text" placeholder="Nombre y Apellidos" name="name" class="form-control" value="<?php echo $user['data']['name'] ?>">
                    <?php endif; ?>
                  <?php else: ?>
                    <input type="text" placeholder="Nombre y Apellidos" name="name" class="form-control">
                  <?php endif; ?>
               </div>
               <div class="form-group col-lg-6 pl-0 ">
                  <?php if(isset($user)): ?> 
                     <?php if(!$user['status']): ?>
                      <input type="email" placeholder="Email" name="email" class="form-control" value="<?php echo $user['data']['email'] ?>">
                      <div class="error">
                        <span class="text-danger">El email ya existe, intenta con otro.</span>
                      </div>
                    <?php endif; ?>
                  <?php else: ?>
                    <input type="email" placeholder="Email" name="email" class="form-control">
                   <?php endif; ?>
               </div>
            </div>
            <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-between flex-wrap mb-3">
                <div class="form-step col-lg-12 mb-2 pl-0">
                    <span class="span d-block step__Number">2</span>
                </div>
               <div class="form-group col-lg-6 pl-0">
                    <select name="city" id="" class="form-control">
                       <option value="" selected disabled>Selecciona tu pais</option>
                       <option value="1">Argentina</option>
                       <option value="2">Bolivia</option>
                       <option value="3">Colombia</option>
                       <option value="4">Chile</option>
                       <option value="5">Perú</option>
                   </select>
               </div>
               <div class="form-group col-lg-6 pl-0 ">
                  <?php if(isset($user)): ?> 
                      <?php if(!$user['status']): ?>
                          <input type="text" placeholder="Equipo de futbol" name="equipo" class="form-control" value="<?php echo $user['data']['equipo']; ?>">
                      <?php endif; ?>
                  <?php else: ?>
                      <input type="text" placeholder="Equipo de futbol" name="equipo" class="form-control">
                  <?php endif; ?>
               </div>
            </div>
            <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-between flex-wrap mb-3">
                <div class="form-step col-lg-12 mb-2 pl-0">
                    <span class="span d-block step__Number">3</span>
                </div>
               <div class="form-group col-lg-6 pl-0">
                  <?php if(isset($user)): ?> 
                      <?php if(!$user['status']): ?>
                        <input type="password" placeholder="Ingresa contraseña" name="pw1" class="form-control" value="<?php echo $user['data']['password']; ?>">
                      <?php endif; ?>
                  <?php else: ?>
                    <input type="password" placeholder="Ingresa contraseña" name="pw1" class="form-control">
                  <?php endif; ?>
               </div>
               <div class="form-group col-lg-6 pl-0 ">
                   <input type="password" placeholder="Repite contraseña" name="pw2" class="form-control">
               </div>
            </div>
            <div class="group col-lg-12 pl-0 pr-0 d-flex justify-content-between flex-wrap mb-3">
               <input type="submit" value="Crear Fan" class="">
            </div>
       </form>
        
    </div>
    
    <div class="figure m-0">
        <img src="img/maradona.jpg" alt="">
    </div>
   

</main>