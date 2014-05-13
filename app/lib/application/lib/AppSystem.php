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
	 * @return $value verifica se a vari�vel est� vazia
	 */
	public static function checkEmpty($value) {
		return empty($value) && !is_numeric($value);
	}

	/**
	 * M�todo para tirar caracteres especiais de uma vari�vel
	 * @param $value retorna a vari�vel tratada
	 * @return $value retorna uma string
	 */
	public static function queryString($value) {
		$value = trim(htmlspecialchars(stripslashes($value), ENT_QUOTES, 'ISO-8859-1'));
		return $value;
	}

	/**
	 * M�todo convertLatinToHtml() Converte os caract�res em formato html
	 * @param $str - valor a ser convertido
	 * @return $str- Converte os caracteres de uma string para formato hmtl
	 */
	public static function convertLatinToHtml($str) {
		$html_entities = array (
						"&" => "&amp;",
						"�" => "&aacute;",
						"�" => "&Acirc;",
						"�" => "&acirc;",
						"�" => "&AElig;",
						"�" => "&aelig;",
						"�" => "&Agrave;",
						"�" => "&agrave;",
						"�" => "&Aring;",
						"�" => "&aring;",
						"�" => "&Atilde;",
						"�" => "&atilde;",
						"�" => "&Auml;",
						"�" => "&auml;",
						"�" => "&Ccedil;",
						"�" => "&ccedil;",
						"�" => "&Eacute;",
						"�" => "&eacute;",
						"�" => "&Ecirc;",
						"�" => "&ecirc;",
						"�" => "&Egrave;",
						"�" => "&igrave;",
						"�" => "&Igrave;",
						"�" => "&iacute;",
						"�" => "&Iacute;",
						"�" => "&icirc;",
						"�" => "&Icirc;",
						"�" => "&iuml;",
						"�" => "&Iuml;",
						"�" => "&eth;",
						"�" => "&ntilde;",
						"�" => "&Ntilde;",
						"�" => "&ograve;",
						"�" => "&Ograve;",
						"�" => "&oacute;",
						"�" => "&Oacute;",
						"�" => "&ocirc;",
						"�" => "&Ocirc;",
						"�" => "&otilde;",
						"�" => "&Otilde;",
						"�" => "&ouml;",
						"�" => "&Ouml;",
						"�" => "&divide;",
						"�" => "&oslash;",
						"�" => "&uacute;",
						"�" => "&Uacute;",
						"�" => "&ucirc;",
						"�" => "&Ugrave;",
						"�" => "&ugrave;",
						"�" => "&Uuml;",
						"�" => "&uuml;",
						"�" => "&Yacute;",
						"�" => "&yacute;",
						"�" => "&yuml;",
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
	public static function validaCPF($cpf) { // Verifiva se o n�mero digitado cont�m todos os digitos
		$cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
		// Verifica se nenhuma das sequ�ncias abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
		{
			return false;
		}
		else
		{ // Calcula os n�meros para verificar se o CPF � verdadeiro
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
		// Etapa 1: Cria um array com apenas os digitos num�ricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
		$j = 0;
		for ($i = 0; $i < (strlen($cnpj)); $i++)
		{
			if (is_numeric($cnpj[$i]))
			{
				$num[$j] = $cnpj[$i];
				$j++;
			}
		}
		// Etapa 2: Conta os d�gitos, um Cnpj v�lido possui 14 d�gitos num�ricos.
		if (count($num) != 14)
		{
			$isCnpjValid = false;
		}
		// Etapa 3: O n�mero 00000000000 embora n�o seja um cnpj real resultaria um cnpj v�lido ap�s o calculo dos d�gitos verificares e por isso precisa ser filtradas nesta etapa.
		if ($num[0] == 0 && $num[1] == 0 && $num[2] == 0 && $num[3] == 0 && $num[4] == 0 && $num[5] == 0 && $num[6] == 0 && $num[7] == 0 && $num[8] == 0 && $num[9] == 0 && $num[10] == 0 && $num[11] == 0)
		{
			$isCnpjValid = false;
		}
		// Etapa 4: Calcula e compara o primeiro d�gito verificador.
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
		// Etapa 5: Calcula e compara o segundo d�gito verificador.
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
		 * if($isCnpjValid==true) { echo "<p><font color="GREEN">Cnpj � V�lido</font></p>"; } if($isCnpjValid==false) { echo "<p><font color="RED">Cnpj Inv�lido</font></p>"; }
		 */
		// Etapa 6: Retorna o Resultado em um valor booleano.
		return $isCnpjValid;
	}
}
