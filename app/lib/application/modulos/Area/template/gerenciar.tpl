{include file="layout/site/topo.tpl"} 
{include file="layout/site/navegacao.tpl"}
{include file="layout/site/gerenciar.tpl"}
<form method="post">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<fieldset>
					<legend>Gerenciar Registro: {if $Obj->getId()}#{$Obj->getId()}{/if}</legend>
				</fieldset>
				<input type="hidden" name="identificador" value="{$Obj->getIdentificador()}" />
			</div><!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="id_area_pai" class="col-sm-2 control-label top-10">Área Principal *: </label>
				    <div class="col-sm-10">
						<select name="id_area_pai" class="form-control" id="id_area_pai">
							<option value="0" {if $Obj->getIdAreaPai() == 0}selected="selected"{/if}>Área Principal</option>
							{foreach from=$Select item=Item}
							<option value="{$Item.id}" {if $Obj->getIdAreaPai() == $Item.id}selected="selected"{/if}>{$Item.titulo}</option>
							{/foreach}
						</select>
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo" class="col-sm-2 control-label top-20">Título *: </label>
				    <div class="col-sm-10">
				      <input type="titulo" name="titulo" class="form-control top-10" id="titulo" placeholder="Inserir o nome da área" value="{$Obj->getTitulo()}" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="preferencia" class="col-sm-2 control-label top-20">Descrição: </label> 
					<div class="col-sm-10 top-10">
						<textarea name="descricao" class="form-control col-sm-10" rows="5" maxlength="500"></textarea>
					</div> <!-- col-sm-10 -->
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		{include file="layout/site/status.tpl"}
	</div>
	<!-- container-fluid -->
</form>
{include file="layout/site/rodape.tpl"}
