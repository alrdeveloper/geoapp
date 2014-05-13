<fieldset>
	<legend>Pesquisar: </legend>
	<form name="pesquisar" method="post" role="form">
		<div class="form-group">
			<div class="radiobox">
				<label for="qunatidade">Quantidade: </label> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default {if $Qtde == 10 || $Qtde == ""}active{/if}">
						<input type="radio" name="quantidade" id="quantidade" value="10" {if $Qtde== 10}checked="checked" {/if} /> 10
					</label> 
					<label class="btn btn-default {if $Qtde == 20}active{/if}">
						<input type="radio" name="quantidade" id="quantidade" value="20" {if $Qtde== 20}checked="checked" {/if} /> 20
					</label> 
					<label class="btn btn-default {if $Qtde == 40}active{/if}">
						<input type="radio" name="quantidade" id="quantidade" value="40" {if $Qtde== 40}checked="checked" {/if} /> 40
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="param">Parametro: </label> 
			<input type="text" name="param" id="param" class="form-control" placeholder="Informe o Parametro" value="{$Param}">
		</div>
		<div class="form-group">
			<label for="attribute">Campo Consultado: </label> 
				<select name="attribute" id="attribute" class="form-control" placeholder="Informe o Campo Consultado">
				<option value="">[Selecione a Coluna]</option> 
				{foreach from=$ListParam item=Item}
				<option value="{$Item.attribute}" {if $Item.attribute == $Attribute}selected="selected"{/if}>{$Item.value}</option>
				{/foreach}
			</select>
		</div>
		<div class="form-group">
			<label for="attribute">Forma de Comparação: </label> 
			<select name="comparer" id="comparer" class="form-control" placeholder="Informe a Forma de Comparação">
				<option value="">[Selecione a Forma de Comparação]</option> 
				{foreach from=$ListComparer item=Item}
				<option value="{$Item}" {if $Item== $Comparer}selected="selected"{/if}>{$Item}</option>
				{/foreach}
			</select>
		</div>
		<div class="form-group">
			<label for="attribute_order">Ordenar por Campo: </label> 
			<select name="attribute_order" id="attribute_order" class="form-control" placeholder="Informe o Campo para Ordem">
				<option value="">[Selecione a Campo para Ordem]</option> 
				{foreach from=$ListParam item=Item}
				<option value="{$Item.attribute}" {if $Item.attribute==$AttributeOrder}selected="selected"{/if}>{$Item.value}</option>
				{/foreach}
			</select>
		</div>
		<div class="form-group">
			<div class="radiobox">
				<label for="qunatidade">Órdem dos Registros: </label> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default {if $Order == 1 || $Order == ""}active{/if}">
						<input type="radio" name="order" id="order" value="1" {if $Order == 1}checked="checked" {/if} /> 
						<i class="glyphicon glyphicon-arrow-up"></i> Crescente
					</label> 
					<label class="btn btn-default {if $Order == 2}active{/if}"> 
						<input type="radio" name="order" id="order" value="2" {if $Order == 2}checked="checked" {/if} /> 
						<i class="glyphicon glyphicon-arrow-down"></i> Decrescente
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="radiobox">
				<label for="qunatidade">Situação do registro: </label> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default {if $Status == 1}active{/if}">
						<input type="radio" name="status" id="status" value="1" {if $Status == 1}checked="checked" {/if} /> 
						<i class="glyphicon glyphicon-ok"></i> Ativo
					</label> 
					<label class="btn btn-default {if $Status == 2}active{/if}"> 
						<input type="radio" name="status" id="status" value="2" {if $Status == 2}checked="checked" {/if} /> 
						<i class="glyphicon glyphicon-remove"></i> Inativo
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary col-lg-12" value="1">
				<i class="glyphicon glyphicon-search"></i> Pesquisar
			</button>
		</div>
	</form>
</fieldset>