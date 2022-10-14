{if $logged}
    {include file="templates/Admin/adminHeader.tpl" }
{else}
    {include file="templates/header.tpl"}
{/if}

<h1 class="text-center"> ¡ATENCION! </h1>
<p class="text-center lead"> Has dejado el formulario sin completar.
Tristemente, no podemos trabajar sin informacion
¡Completalo y vuelve a intentarlo!</p>
{include file="templates/footer.tpl"}