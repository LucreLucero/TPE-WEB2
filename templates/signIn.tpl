    {* <h1>Sign In:</h1>
    <p> este es el singin <p>
    <form action= "signInEnter" method= "POST">
        <div class="form-group">
            <label>User Name:</label>
            <input type="text" name="userName" placeholder="User name"/>
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="userEmail" placeholder="Enter email"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name= "password" placeholder="Password"/>
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form> *}

    <div class="container">
  <form action="signInEnter" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">User name</label>
      <input name="userName" placeholder="Enter user name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="userEmail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name= "password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Registrarse y entrar</button>
  </form>
</div>
{if $yaExisteEmail} 
    <p>El email ingresado ya existe. Reintentelo con uno diferente</p>
{/if}
{if $faltanDatos} 
    <p>Falta llenar datos obligatorios </p>
{/if}
