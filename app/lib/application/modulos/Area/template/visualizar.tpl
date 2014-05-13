{include file="layout/site/topo.tpl"} 
{include file="layout/site/navegacao.tpl"}
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<fieldset>
				<legend>Visualização do Registro: {if $Obj->getId()}#{$Obj->getId()}{/if}</legend>
			</fieldset>
			<input type="hidden" name="identificador" value="{$Obj->getIdentificador()}" />
		</div>
		<!-- col-md-12 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-xs-12 col-md-2">
			<label>Área Principal: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-xs-12 col-md-10">
			{$Obj->AreaPrincipal}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-xs-12 col-md-2">
			<label>Título: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-xs-12 col-md-10">
			{$Obj->getTitulo()}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-xs-12 col-md-2">
			<label>Descrição: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-xs-12 col-md-10">
			{$Obj->getDescricao()}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	{include file="layout/site/statusView.tpl"}
</div>
<!-- container -->
{include file="layout/site/rodape.tpl"}
