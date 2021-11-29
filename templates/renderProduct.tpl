{include file="header.tpl"}

<h3 class="title">{$product->categoria}</h3>
<h1 class="title" id='nombre'>{$product->producto}</h1>

<p class="title">{$product->descripcion}   Precio:{$product->precio}</p>

<p id="user_id" hidden>{$id_usuario}</p>
<p id="user_rol" hidden>{$user_rol}</p>
<input id="id_producto" type="number" value="{$id}" hidden>
<input id="categoria" type="text" value="{$categoria}" hidden>

{if $start}
    <input id="loggin" type="number" value='1' hidden>
    {else}
    <input id="loggin" type="number" value='0' hidden>
{/if}


<h2 class="title">Comentarios sobre {$product->producto}</h2>

<div id="showComments">
        
</div>

<div id='renderProduct'>

</div>
{if $start==true}
    <form id="addComment">
    <input required type="text" placeholder="agregue un comentario" id="input-comment-text">
    <label class="label-p">Agregue una puntuacion del 1 al 5</label><input type="number" id="input-comment-score">
    <button type="submit">Comentar</button>
    </form>`
{/if}


{include file="newFooter.tpl"}