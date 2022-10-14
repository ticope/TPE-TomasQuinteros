{if $logged}
    {include file="templates/admin/adminHeader.tpl" }
{else}
        {include file="templates/header.tpl"}
{/if}
<h1 class="text-center"> {$titulo} {$categoria->name} </h1>
<div class="row">
    {foreach from=$productos item=$producto}
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src={$producto->img} class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title">{$producto->name}</h5>
                    <a href="product/{$producto->id}" class="btn btn-primary">Ver</a>
                    <a href="deleteProduct/{$producto->id}" class="btn btn-outline-danger">borrar</a>
                    <p>El precio es: ${$producto->price}</p>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{include file="templates/footer.tpl"}