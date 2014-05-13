<div class="container-fluid">
	<div class='row'>
        <div class='col-sm-12'>
            <ul class="breadcrumb">
                {foreach from=$Nav item=Link key=key}
                    <li>
                        {if $Link[1] != ""} 
                            <a href="{$Link[1]}" title="{$Link[0]}">{$Link[0]}</a>
                        {else} 
                            <span>{$Link[0]}</span> 
                        {/if}
                    </li> 
                {/foreach}
                <li>
                    <a href="{literal}javascript:history.go(-1){/literal}" title="{$Link[0]}" title="Voltar"><i class='icon-circle-arrow-left'></i> voltar</a>
                </li>
            </ul>
        </div>
    </div>
</div>