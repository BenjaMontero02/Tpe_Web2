{if $error == 1}
    <h2 class="title">Usuario o Contraseña incorrectas</h2>
    {elseif $error == 2}
        <h2 class="title">Solo usuarios autorizados!</h2>
    {elseif $error == 3}
    <h2 class="title">Su usuario ya existe!</h2>
{/if}