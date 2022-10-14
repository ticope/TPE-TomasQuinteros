{if $logged}
    {include file="templates/admin/adminHeader.tpl" }
{else}
        {include file="templates/header.tpl"}
{/if}
<h1 class="text-center"> {$product->name}</h1>
<h4 class="text-center"> El precio es: ${$product->price}</h4>
{if {$product->img}}    
    
        <img  class="rounded mx-auto d-block"  src={$product->img} />

{/if}
{if $logged}
    <form action="uploadImage/{$product->id}" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <input type="file" class="form-control" name="images" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                aria-label="Upload">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Enviar</button>
        </div>
    </form> 
{/if}
<script src="./js/comments.js"></script>
{include file="templates/footer.tpl"}