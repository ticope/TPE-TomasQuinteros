{if $logged}
    {include file="templates/Admin/adminHeader.tpl" }
{else}
    {include file="templates/header.tpl"}
{/if}




<div class="row">
    {foreach from=$productos item=$producto}
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src={$producto->img} class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title">{$producto->name}</h5>
                    <a href="product/{$producto->id}" class="btn btn-primary">Ver</a>
                    {if $logged}<a href="deleteProduct/{$producto->id}" class="btn btn-outline-danger">borrar</a>{/if}
                    <p>El precio es: ${$producto->price}</p>
                </div>
            </div>
        </div>
    {/foreach}
    </div>


{if $logged}
<div class="d-flex justify-content-evenly">
    <div class="p-2 bd-highlight">
    <div class="card">
        <h2>Crear Producto</h2>
        <form action="createProduct" method="POST">
            <div class="mb-3">
                <input type="text" placeholder="Ingrese el nombre" name="name">
            </div>
            <div class="mb-3">
                <input type="number" placeholder="Ingrese El Precio" name="price">
            </div>
            <div class="mb-3">
                <select name="id_category" class="form-select">
                    {foreach from=$categorys item=$category}
                        <option value="{$category->id}">{$category->name}</option>
                    {/foreach}
                </select>
            </div>
            <input type="submit" value="Crear">
        </form>
    </div>
    </div>

    <div class="p-2 bd-highlight">
    <div class="card">
        <h2>Editar Producto</h2>
        <form action="updateProduct" method="POST">
            <div class="mb-3">
                <select name="id" class="form-select">
                    {foreach from=$productos item=$producto}
                        <option value="{$producto->id}">{$producto->name}</option>
                    {/foreach}
                </select>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Ingrese su nuevo nombre" name="name">
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Ingrese su nuevo precio" name="price">
            </div>
            <div class="mb-3">
                <select name="id_category" class="form-select">
                    {foreach from=$categorys item=$category}
                        <option value="{$category->id}">{$category->name}</option>
                    {/foreach}
                </select>
            </div>

            <input type="submit" value="Editar">
        </form>
    </div>
    </div>
</div>
{/if}
{include file="templates/footer.tpl"}