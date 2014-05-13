{include file="layout/site/topo.tpl"} 
{include file="layout/site/navegacao.tpl"}
{include file="layout/site/gerenciar.tpl"}
<form method="post">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<fieldset>
					<legend>Gerenciar Registro: {if $Obj->getId()}#{$Obj->getId()}{/if}</legend>
				</fieldset>
				<input type="hidden" name="identificador" value="{$Obj->getIdentificador()}" />
			</div>
			<!-- span12 -->
			<div class="span12">
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email *: </label>
				    <div class="col-sm-10">
				      <input type="email" name="email" class="form-control" id="email" placeholder="Inserir E-mail" value="{$Obj->getEmail()}" />
				    </div>
				</div>
				<!-- form-group -->
			</div>
			<!-- span12 -->
			<div class="span12">
				<div class="form-group">
					<label for="preferencia" class="col-sm-2 control-label top-10">Preferência: </label> 
					<div class="col-sm-10 top-10">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default {if $Obj->getPreferencia() == 1 || $Obj->getPreferencia() == ""}active{/if}"> 
								<input type="radio" name="preferencia" id="preferencia" value="1" {if $Obj->getPreferencia() == 1 || $Obj->getPreferencia() == ""}checked="checked"{/if}> Principal
							</label> 
							<label class="btn btn-default {if $Obj->getPreferencia() == 2}active{/if}"> 
								<input type="radio" name="preferencia" id="preferencia" value="2" {if $Obj->getPreferencia() == 2}checked="checked"{/if}> Secundário
							</label> 
						</div>
						<!-- btn-group -->
					</div>
					<!-- col-sm-10 -->
				</div>
				<!-- form-group -->
			</div>
			<!-- span12 -->
			{include file="layout/site/status.tpl"}
		</div>
		<!-- row-fluid -->
	</div>
	<!-- container-fluid -->
</form>
{include file="layout/site/rodape.tpl"}
