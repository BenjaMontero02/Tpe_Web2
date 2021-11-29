{include file="header.tpl"}

{if $error}
    {include file="error.tpl"}
{/if}

<div class="login">
    <h2>Register</h2>

<form action="register" method="post">
    <div class="form-email">
    <input type="email" name="email" placeholder="E-mail">
    </div>
    <div class="form-pw">
    <input type="password" name="password" placeholder="Contraseña">
    </div>
    <input class="btn" type="submit" value="Register">
</form>
</div>
