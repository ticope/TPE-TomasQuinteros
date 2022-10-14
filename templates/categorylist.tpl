{if $logged}
    {include file="templates/admin/adminHeader.tpl" }
{else}
    {include file="templates/header.tpl"}
{/if}
<h2 class="text-center lead alert alert-danger" >Atencion, para eliminar una categoria, se deben eliminar los productos que pertenecen a el anteriormente</h2>
<ul class="list-group container-lg">
    {foreach from=$categorias item=$cat}
        <div class="text-center">
        <li class="list-group-item">
            <button type="button" class="btn btn-outline-primary">
            <a href="showProductsbyCategory/{$cat->id}">{$cat->name}</a>
            {if $logged}<button type="button" class="btn btn-outline-danger"> <a href="deleteCategory/{$cat->id}">Borrar</a></button>{/if}
        </li>
        </div>
    {/foreach}
</ul>
{if $logged}
<div class="d-flex justify-content-evenly">
    <div class="card">
    <div class="p-2 bd-highlight">
        <h2> Crear Categoria </h2>
        <form action="createCategory" method="POST">
            <div class="mb-3">
                <input type="text" name="category" placeholder="Ingrese su categoria">
            </div>
            <div class="mb-3">
                <input type="submit" value="Crear">
            </div>
        </form>
    </div>
    </div>

    <div class="card">
    <div class="p-2 bd-highlight">
        <h2>Editar categoria</h2>
        <form action="updateCategory" method="POST">
            <div class="mb-3">
                <select name="id" class="form-select">
                    {foreach from=$categorias item=$cat}
                        <option value="{$cat->id}">{$cat->name}</option>
                    {/foreach}
                </select>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Ingrese su nueva categoria" name="name">
            </div>
            <input type="submit" value="Editar">
        </form>
    </div>
    </div>
</div>
{/if}


{include file="templates/footer.tpl"}