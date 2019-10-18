{include 'templates/header.tpl'}
<body>
    <form>
        <div class="form-group">
            <label>Email address</label>
            <input type="username" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name= "password" placeholder="Password">
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
{include 'templates/footer.tpl'}