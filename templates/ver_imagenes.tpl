{foreach from=$lista_imagenes item=imagen}
   {if $imagen->imagen && $imagen->imagen != ''}
      <img src="{$imagen->imagen}"/>
   {/if}
{/foreach}