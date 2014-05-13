<?php

namespace application\lib;

final class AppSystem
{

	/**
	 * identificador retorna um registro md5 unico calculado com data e hora
	 * @param $value parametro
	 * @return hashmd5
	 */
	public static function identificador($value) {
		if (empty($value))
		{
			$value = md5(date("YmdHis") . mt_rand());
		}
		return $value;
	}

	/**
	 * Converte texto para tag html
	 *
	 * @param $value
	 * @return $value
	 */
	public static function textByHtml($value) {
		$value = trim(html_entity_decode(stripslashes($value), ENT_QUOTES, 'ISO-8859-1'));
		return $value;
	}

	/**
	 * Converte caracteres especiais para HTML
	 * @param $value
	 * @return $value
	 */
	public static function htmlByText($value) {
		$value = trim(htmlspecialchars(stripslashes($value), ENT_QUOTES, 'ISO-8859-1'));
		return $value;
	}

	/**
	 * Metodo checkEmpty
	 * @param $value
	 * @return $value verifica se a variável está vazia
	 */
	public static function checkEmpty($value) {
		return empty($value) && !is_numeric($value);
	}

	/**
	 * Método para tirar caracteres especiais de uma variável
	 * @param $value retorna a variável tratada
	 * @return $value retorna uma string
	 */
	public static function queryString($value) {
		$value = trim(htmlspecialchars(stripslashes($value), ENT_QUOTES, 'ISO-8859-1'));
		return $value;
	}

	/**
	 * Método convertLatinToHtml() Converte os caractéres em formato html
	 * @param $str - valor a ser convertido
	 * @return $str- Converte os caracteres de uma string para formato hmtl
	 */
	public static function convertLatinToHtml($str) {
		$html_entities = array (
						"&" => "&amp;",
						"á" => "&aacute;",
						"Â" => "&Acirc;",
						"â" => "&acirc;",
						"Æ" => "&AElig;",
						"æ" => "&aelig;",
						"À" => "&Agrave;",
						"à" => "&agrave;",
						"Å" => "&Aring;",
						"å" => "&aring;",
						"Ã" => "&Atilde;",
						"ã" => "&atilde;",
						"Ä" => "&Auml;",
						"ä" => "&auml;",
						"Ç" => "&Ccedil;",
						"ç" => "&ccedil;",
						"É" => "&Eacute;",
						"é" => "&eacute;",
						"Ê" => "&Ecirc;",
						"ê" => "&ecirc;",
						"È" => "&Egrave;",
						"ì" => "&igrave;",
						"Ì" => "&Igrave;",
						"í" => "&iacute;",
						"Í" => "&Iacute;",
						"î" => "&icirc;",
						"Î" => "&Icirc;",
						"ï" => "&iuml;",
						"Ï" => "&Iuml;",
						"ð" => "&eth;",
						"ñ" => "&ntilde;",
						"Ñ" => "&Ntilde;",
						"ò" => "&ograve;",
						"Ò" => "&Ograve;",
						"ó" => "&oacute;",
						"Ó" => "&Oacute;",
						"ô" => "&ocirc;",
						"Ô" => "&Ocirc;",
						"õ" => "&otilde;",
						"Õ" => "&Otilde;",
						"ö" => "&ouml;",
						"Ö" => "&Ouml;",
						"÷" => "&divide;",
						"ø" => "&oslash;",
						"ú" => "&uacute;",
						"Ú" => "&Uacute;",
						"û" => "&ucirc;",
						"Ù" => "&Ugrave;",
						"ù" => "&ugrave;",
						"Ü" => "&Uuml;",
						"ü" => "&uuml;",
						"Ý" => "&Yacute;",
						"ý" => "&yacute;",
						"ÿ" => "&yuml;",
						"?" => "&Yuml;",
						"&" => "&amp;",
						"\"" => "&quot;",
						"'" => "&apos;",
						"<" => "&lt;",
						">" => "&gt;" 
		);
		
		foreach ($html_entities as $key => $value)
		{
			$str = str_replace($key, $value, $str);
		}
		return $str;
	}

	/**
	 * tratarRequisicao($values) Responsavel por tratar todos os valores get ou post
	 * @param unknown $values
	 * @return array
	 */
	public static function tratarRequisicao($values) {
		if (is_array($values))
		{
			$k = array_keys($values);
			for ($i = 0; $i < count($k); $i++)
			{
				if (is_array($values[$k[$i]]))
				{
					for ($j = 0; $j < count($values[$k[$i]]); $j++)
					{
						if ($k != "submit" || ($k != "id" && !empty($values[$k[$i]][$j])))
						{
							$values[$k[$i]][$j] = self::htmlByText($values[$k[$i]][$j]);
						}
					}
				}
				else
				{
					if ($k != "submit" || ($k != "id" && !empty($values[$k[$i]])))
					{
						$values[$k[$i]] = self::htmlByText($values[$k[$i]]);
					}
				}
			}
		}
		return $values;
	}

	/**
	 * Validar CPF
	 * @param $cpf
	 * @return boolean
	 */
	public static function validaCPF($cpf) { // Verifiva se o número digitado contém todos os digitos
		$cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
		{
			return false;
		}
		else
		{ // Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++)
			{
				for ($d = 0, $c = 0; $c < $t; $c++)
				{
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				
				$d = ((10 * $d) % 11) % 10;
				
				if ($cpf{$c} != $d)
				{
					return false;
				}
			}
			
			return true;
		}
	}

	/**
	 * Valida CNPJ
	 * @param $cnpj
	 * @return boolean
	 */
	public static function validaCNPJ($cnpj) {
		// Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
		$j = 0;
		for ($i = 0; $i < (strlen($cnpj)); $i++)
		{
			if (is_numeric($cnpj[$i]))
			{
				$num[$j] = $cnpj[$i];
				$j++;
			}
		}
		// Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
		if (count($num) != 14)
		{
			$isCnpjValid = false;
		}
		// Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
		if ($num[0] == 0 && $num[1] == 0 && $num[2] == 0 && $num[3] == 0 && $num[4] == 0 && $num[5] == 0 && $num[6] == 0 && $num[7] == 0 && $num[8] == 0 && $num[9] == 0 && $num[10] == 0 && $num[11] == 0)
		{
			$isCnpjValid = false;
		}
		// Etapa 4: Calcula e compara o primeiro dígito verificador.
		else
		{
			$j = 5;
			for ($i = 0; $i < 4; $i++)
			{
				$multiplica[$i] = $num[$i] * $j;
				$j--;
			}
			$soma = array_sum($multiplica);
			$j = 9;
			for ($i = 4; $i < 12; $i++)
			{
				$multiplica[$i] = $num[$i] * $j;
				$j--;
			}
			$soma = array_sum($multiplica);
			$resto = $soma % 11;
			if ($resto < 2)
			{
				$dg = 0;
			}
			else
			{
				$dg = 11 - $resto;
			}
			if ($dg != $num[12])
			{
				$isCnpjValid = false;
			}
		}
		// Etapa 5: Calcula e compara o segundo dígito verificador.
		if (!isset($isCnpjValid))
		{
			$j = 6;
			for ($i = 0; $i < 5; $i++)
			{
				$multiplica[$i] = $num[$i] * $j;
				$j--;
			}
			$soma = array_sum($multiplica);
			$j = 9;
			for ($i = 5; $i < 13; $i++)
			{
				$multiplica[$i] = $num[$i] * $j;
				$j--;
			}
			$soma = array_sum($multiplica);
			$resto = $soma % 11;
			if ($resto < 2)
			{
				$dg = 0;
			}
			else
			{
				$dg = 11 - $resto;
			}
			if ($dg != $num[13])
			{
				$isCnpjValid = false;
			}
			else
			{
				$isCnpjValid = true;
			}
		}
		// Trecho usado para depurar erros.
		/*
		 * if($isCnpjValid==true) { echo "<p><font color="GREEN">Cnpj é Válido</font></p>"; } if($isCnpjValid==false) { echo "<p><font color="RED">Cnpj Inválido</font></p>"; }
		 */
		// Etapa 6: Retorna o Resultado em um valor booleano.
		return $isCnpjValid;
	}
}
