{include file="layout/site/topo.tpl"} 
{include file="layout/site/navegacao.tpl"}
<div class="container-fluid">
<div class="row">
    <div class="col-sm-3">
        {include file="layout/site/search.tpl"}		
    </div>
    <!-- /.col-sm-3 -->
    <div class="col-sm-9">
        <fieldset>
            <legend>
                Listagem de Registros  
            </legend>
			<div class="btn-group">
				<a href="{$Link.add}" class="btn btn-success" target="_blank">
        		   	<i class='glyphicon glyphicon-plus'></i> Adicionar Registro
    	        </a>
				<a href="{$Link.list}" class="btn btn-default" target="_blank">
            		<i class="glyphicon glyphicon-search"></i> Listar Registros
            	</a>
			</div> <!-- btn-group -->	
            <div class="table-responsive top-20">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
						<tr>
						{if $Obj == ""}
						<tr>
							<td colspan="4">
								<div class="top-10">
									<label class="label label-warning"><i class="glyphicon glyphicon-exclamation-sign"></i> Nenhum registro foi localizado</label>
								</div>
							</td>
						</tr>                        
						{else}
						{foreach from=$Obj item=Item}
						<tr>
                            <td>{$Item->getId()}</td>
                            <td>{$Item->getNome()}</td>
                            <td>{$Item->Status}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{$Link.view}{$Item->getId()}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Visualizar - {$Item->getId()}"><i class="glyphicon glyphicon-search"></i></a>
                                    <a href="{$Link.edit}{$Item->getId()}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Alterar - {$Item->getId()}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{$Link.delete}{$Item->getId()}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Excluir - {$Item->getId()}"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </td>
						</tr>
                        {/foreach}
						{/if}
                    </tbody>
                </table>
            </div> <!-- table -->
            {include file="layout/site/pagination.tpl"}<!-- pagination-->
        </fieldset>
    </div><!-- /.col-sm-9 -->
</div><!-- /.row -->
</div><!-- /.row -->
{literal}
    <script>
        $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>
{/literal}
{include file="layout/site/rodape.tpl"}