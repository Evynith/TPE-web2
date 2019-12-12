<section class="imagenes">
   {foreach from=$lista_imagenes item=imagen}
      {if $imagen->imagen && $imagen->imagen != ''}
         <img src="{$BASE_URL}{$imagen->imagen}"/>
      {/if}
   {/foreach}
</section>