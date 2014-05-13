<?php

namespace application\lib;

class AppDate {

    /**
     * Função para converter data
     * @param type $data data para ser convertida
     * @param type $type tipo de formatação para ParBanco de dados (1) ou para formulário (2)
     * @return string
     */
    public static function convertData($data, $type) {
        switch ($type) {
            case 1:
                $value = explode("/", $data);
                $result = $value[2] . "-" . $value[1] . "-" . $value[0];
                break;
            case 2:
                $value = explode("-", $data);
                $result = $value[2] . "/" . $value[1] . "/" . $value[0];
                break;
        }
        return $result;
    }

    /**
     * Método compararData()
     * Retorna a diferença entre as datasa
     * @param type $data_inicial    - Data Inicial
     * @param type $data_final      - Data Final
     * @return type - Diferença entre data
     */
    public static function compararData($data_inicial, $data_final) {
        $d0 = explode("-", $data_inicial);
        $d1 = explode("-", $data_final);

        $result = $d0[2] - $d1[2];

        return $result;
    }

    public static function ajustarData($data) {
        $data = self::FormatarData($data, "Y-m-d");

        $d = explode("-", $data);

        if ($d[1] < 10) {
            $d[1] = "0" . intval($d[1]);
        }
        if ($d[2] < 10) {
            $d[2] = "0" . intval($d[2]);
        }

        $data = $d[0] . "-" . $d[1] . "-" . $d[2];

        return $data;
    }

    public static function diferencaMesFatura($data_inicial, $data_final) {

        $data_inicial = self::formatarData($data_inicial, "d/m/Y");
        $d1 = explode('/', $data_inicial);

        $data_final = self::formatarData($data_final, "d/m/Y");
        $d2 = explode('/', $data_final);

        $dia1 = $d1[0];
        $mes1 = $d1[1];
        $ano1 = $d1[2];

        $dia2 = $d2[0];
        $mes2 = $d2[1];
        $ano2 = $d2[2];

        if ($ano1 < $ano2) {
            $a1 = ($ano2 - $ano1) * 12;
            if ($mes1 == $mes2) {
                return $a1;
            } else {
                $m1 = ($mes2 - $mes1);
                $m2 = $a1 + ($m1);
                return $m2;
            }
        } else {
            if ($mes1 > $mes2) {
                $m1 = 0;
            } else {
                $m1 = $mes2 - $mes1;
                if ($m1 < 0) {
                    $m1 *= -1;
                } else if ($m1 == 0) {
                    $m1 = 1;
                }
            }
            return $m1;
        }
    }

    public static function compararDataInicial($dataAtual, $dataInicial) {

        $dataInicial = self::formatarData($dataInicial, "Y-m-d");
        $dataFinal = self::formatarData($dataFinal, "Y-m-d");

        $p1 = explode("-", $dataAtual);
        $p2 = explode("-", $dataInicial);

        if ($p1[0] == $p2[0]) {
            if ($p1[1] == $p2[1]) {
                if ($p1[2] == $p2[2]) {
                    return true;
                } else {
                    if ($p1[2] > $p2[2]) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                if ($p1[1] > $p2[1]) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if ($p1[0] > $p2[0]) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function compararDataFinal($dataAtual, $dataFinal) {

        $dataInicial = self::formatarData($dataInicial, "Y-m-d");
        $dataFinal = self::formatarData($dataFinal, "Y-m-d");

        $p1 = explode("-", $dataAtual);
        $p2 = explode("-", $dataFinal);

        if ($p1[0] == $p2[0]) {
            if ($p1[1] == $p2[1]) {
                if ($p1[2] == $p2[2]) {
                    return true;
                } else {
                    if ($p1[2] < $p2[2]) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                if ($p1[1] < $p2[1]) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if ($p1[0] < $p2[0]) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Método formataData()
     * Método para formatar data
     * @param type $data    - data a ser formatada
     * @param type $formato - formato para a data
     * @return a data formatada
     */
    public static function formatarData($data, $formato = "d/m/Y H:i:s") {

        //Valida: Y-m-d H:i:s
        $expdata = "/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}[[:space:]](([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/";

        if (preg_match($expdata, $data)) {

            $array = explode(" ", $data);
            $adata = explode("-", $array[0]);
            $ahora = explode(":", $array[1]);

            $strdata = $formato;
            $strdata = preg_replace("{y}", substr($adata[0], 2, 2), $strdata);
            $strdata = preg_replace("{Y}", $adata[0], $strdata);
            $strdata = preg_replace("{m}", $adata[1], $strdata);
            $strdata = preg_replace("{d}", $adata[2], $strdata);
            $strdata = preg_replace("{H}", $ahora[0], $strdata);
            $strdata = preg_replace("{i}", $ahora[1], $strdata);
            $strdata = preg_replace("{s}", $ahora[2], $strdata);

            return $strdata;
        }

        //Valida: d/m/Y H:i:s
        $expdata = "/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}[[:space:]](([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/";

        if (preg_match($expdata, $data)) {

            $array = explode(" ", $data);
            $adata = explode("/", $array[0]);
            $ahora = explode(":", $array[1]);

            $strdata = $formato;
            $strdata = preg_replace("{y}", substr($adata[2], 2, 2), $strdata);
            $strdata = preg_replace("{Y}", $adata[2], $strdata);
            $strdata = preg_replace("{m}", $adata[1], $strdata);
            $strdata = preg_replace("{d}", $adata[0], $strdata);
            $strdata = preg_replace("{H}", $ahora[0], $strdata);
            $strdata = preg_replace("{i}", $ahora[1], $strdata);
            $strdata = preg_replace("{s}", $ahora[2], $strdata);

            return $strdata;
        }

        //Valida: Y-m-d
        $expdata = "/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}$/";

        if (preg_match($expdata, $data)) {

            $adata = explode("-", $data);

            $strdata = $formato;
            $strdata = preg_replace("{y}", substr($adata[0], 2, 2), $strdata);
            $strdata = preg_replace("{Y}", $adata[0], $strdata);
            $strdata = preg_replace("{m}", $adata[1], $strdata);
            $strdata = preg_replace("{d}", $adata[2], $strdata);

            return $strdata;
        }

        //Valida: d/m/Y
        $expdata = "/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}$/";

        if (preg_match($expdata, $data)) {

            $adata = explode("/", $data);

            $strdata = $formato;
            $strdata = preg_replace("{y}", substr($adata[2], 2, 2), $strdata);
            $strdata = preg_replace("{Y}", $adata[2], $strdata);
            $strdata = preg_replace("{m}", $adata[1], $strdata);
            $strdata = preg_replace("{d}", $adata[0], $strdata);

            return $strdata;
        }

        //Valida: H:i:s
        $expdata = "/^(([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/";

        if (preg_match($expdata, $data)) {

            $ahora = explode(":", $data);

            $strdata = $formato;
            $strdata = preg_replace("{H}", $ahora[0], $strdata);
            $strdata = preg_replace("{i}", $ahora[1], $strdata);
            $strdata = preg_replace("{s}", $ahora[2], $strdata);

            return $strdata;
        }

        return null;
    }

    /**
     * Método diferencaData()
     * Retorna a diferença em dias entre duas datas
     * @param type $DataInicial
     * @param type $DataFinal
     * @return type - Retorna a diferença entre as datas (dias)
     */
    public static function diferencaData($DataInicial, $DataFinal) {

        $DataInicial = self::formatarData($DataInicial, "m/d/Y");
        $DataFinal = self::formatarData($DataFinal, "m/d/Y");

        $DataInicial = strtotime($DataInicial);
        $DataFinal = strtotime($DataFinal);

        return floor(($DataFinal - $DataInicial) / 86400);
    }

    /**
     * Método último dia do mês
     * @param type $mes
     * @param type $ano
     * @return type int = último dia do Mês
     */
    public static function ultimoDia($mes, $ano) {
        if ($mes == 2) {
            if ((($ano % 4) == 0 && ($ano % 100) != 0) || ($ano % 400) == 0) {
                $ultimoDia = 29;
            } else {
                $ultimoDia = 28;
            }
        } else {
            $ultimoDia = date("t", mktime(0, 0, 0, $mes, '01', $ano)); // Mágica, plim!
        }
        return $ultimoDia;
    }

}
