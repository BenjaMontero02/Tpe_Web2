{include file="header.tpl"}
<div class="tableProducts">
<h2 class="title">Lista completa de nuestros Productos</h2>

    <table>
        <thead>
            <tr>
            {if $user_rol =='admin'}
                <th>ID</th>
            {/if}
                <th>Producto</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$products item=$product}
            <tr>
                {if $user_rol =='admin'}
                    <td>{$product->producto_id}</td>
                    {/if}
                <td>{$product->producto}</td>
                <td>{$product->categoria}</td>
                <td>{$product->precio}</td>
                <td><a href="producto/{$product->producto}">Detalle</a></td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
<br>
{if $user_rol =='admin'}

    <h2 class="title">Ingrese un nuevo producto</h2>
        
        <form action="insertProduct" method="post">
            <input type="text" name="producto" placeholder="Producto">
            <select name="categoria" type="text";
            {foreach from=$categories item=$categorie}
                <option>{$categorie->categorias}</option>
            {/foreach}
            </select>
            <input type="text" name="precio" placeholder="Precio">
            <input type="text" name="descripcion" placeholder="Detail">
            <button type="submit">enviar</button>
        </form>
        <br>

        <h2 class="title">Elimine un producto escogiendo su id</h2>
        <form action="delete" method="post">
            <select name="producto_id" id="">
            {foreach from=$products item=$product}
                <option>{$product->producto_id}</option>
            {/foreach}
            </select>
            <button type="submit">Borrar</button>
        </form>
        <br>

        <h2 class="title">Actualice el producto</h2>
        <form action="confirmUpdate" method="post">
            <input type="text" name="producto" placeholder="Producto">
                <select name="categoria">
                    {foreach from=$categories item=$category}
                        <option>{$category->categorias}</option>
                    {/foreach}
                </select>
                <select name="id">
                    {foreach from=$products item=$product}
                        <option>{$product->producto_id}</option>
                    {/foreach}
                </select>
            <input type="text" name="precio" placeholder="Precio">
            <input type="text" name="descripcion" placeholder="Detail">
            <button type="submit">Update</button>
        </form>
    {/if}
