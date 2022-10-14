{if $logged}
    {include file="templates/admin/adminHeader.tpl"}
    {else}
        {include file="templates/header.tpl"}
{/if}


<div class="d-flex justify-content-evenly">
    <div class="p-2 bd-highlight">
        <h2 class="text-center"> Inicio de sesión</h2>
        <form class=form action="verify" method="POST" >
            <div class="mb-3 text-center">
                <input placeholder="Ingrese su nombre" type="text" name="user" required>
            </div>
            <div class="mb-3 text-center">
                <input placeholder="Ingrese su contraseña" type="password" name="password" required>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" class="btn-submit" value="Iniciar sesión">
            </div>
        </form>
        <h4 class="alerta text-center">{$error}</h4>
    </div>
</div>

{include file='templates/footer.tpl'}