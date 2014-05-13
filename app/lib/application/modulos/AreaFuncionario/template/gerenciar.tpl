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
					<label for="nome" class="col-sm-2 control-label top-20">Nome *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="nome" class="form-control top-10" id="nome" placeholder="Inserir o nome do funcionário" value="{$Obj->getNome()}" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="cpf" class="col-sm-2 control-label top-20">CPF *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="cpf" class="form-control top-10" id="cpf" placeholder="Inserir o CPF" value="{$Obj->getCpf()}" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="rg" class="col-sm-2 control-label top-20">RG *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="rg" class="form-control top-10" id="rg" placeholder="Inserir o RG" value="{$Obj->getRg()}" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="cnh" class="col-sm-2 control-label top-20">CNH *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="cnh" class="form-control top-10 bottom-10" id="cnh" placeholder="Inserir a CNH" value="{$Obj->getCnh()}" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="data_nascimento" class="col-sm-2 control-label top-10">Data de Nascimento: </label>
				    <div class="col-sm-4">
						<div class='input-group datetimepicker date'>
							<input name="data_nascimento" class="form-control data data_nascimento" id="data_nascimento" placeholder="Inserir a data de nascimento" value="{$Obj->getDataNascimento()|date_format:"%d/%m/%Y"}" />
        	            	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					    </div>
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<input type="hidden" name="data_cadastro" value="{$Obj->getDataCadastro()}" />
		{include file="layout/site/status.tpl"}
	</div>
	<!-- container-fluid -->
</form>
{include file="layout/site/rodape.tpl"}