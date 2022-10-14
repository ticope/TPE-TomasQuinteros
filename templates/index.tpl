{if $logged}
    {include file="templates/admin/adminHeader.tpl"}
    {else}
        {include file="templates/header.tpl"}
{/if}

<h2 class="text-center">¡Bienvenidos!</h2>
<p class="text-center lead">Les damos la bienvenida a nuestra tienda de ropa</p>


<img src="./img/tienda.jpg" class="rounded mx-auto d-block">

{include file="templates/footer.tpl"}