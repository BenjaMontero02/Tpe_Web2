{include file="header.tpl"}

<ul class="lista">
    {foreach from=$categories item=$category}
        <li>{$category->categorias}</li>
    {/foreach}
</ul>
<br>

<h2 class="title">Listar Productos por categoria</h2>
    <form action="ProductByCategorie" method="post">
        <select name="categoria">
        {foreach from=$categories item=$category}
            <option>{$category->categorias}</option>
        {/foreach}
        </select>
        <button type="submit">Load</button>
    </form>

{if $user_rol =='admin'}
    <h2 class="title">Elimine una categoria</h2>
    <form action="deleteCategory" method="post">
        <select name="categorias">
                {foreach from=$categories item=$category}
                    <option>{$category->categorias}</option>
                {/foreach}
                </select>
        <button type="submit">Borrar</button>
    </form>
    <br>

    <h2 class="title">Ingrese un nueva categoria</h2>
    <form action="insertCategory" method="post">
        <input type="text" name="categorias" placeholder="Nueva categoria">
        <input type="submit" value="Agregar">
    </form>
{/if}


