{include file="layout/site/topo.tpl"} 
{include file="layout/site/navegacao.tpl"}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<fieldset>
				<legend>Visualização do Registro: {if $Obj->getId()}#{$Obj->getId()}{/if}</legend>
			</fieldset>
			<input type="hidden" name="identificador" value="{$Obj->getIdentificador()}" />
		</div>
		<!-- col-md-12 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>Nome: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			{$Obj->getNome()}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>CPF: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			{$Obj->getCpf()}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>RG: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			{$Obj->getRg()}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>CNH: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			{$Obj->getCnh()}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>Data de Nascimento: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			{$Obj->getDataNascimento()|date_format:"%d/%m/%Y"}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>Data de Nascimento: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			{$Obj->getDataCadastro()|date_format:"%d/%m/%Y"}
		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	{include file="layout/site/statusView.tpl"}
</div><!-- container -->
{include file="layout/site/rodape.tpl"}
