{include file="header.tpl"}

{if $error}
    {include file="error.tpl"}
{/if}

<div class="login">
    <h2>Login</h2>

    <form action="login" method="post">
    <div class="form-email">
        <input type="email" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-pw">
    <input type="password" name="password" placeholder="Contraseña" required>
    </div>
    <input class="btn" type="submit" value="Login">
</form>
</div>
