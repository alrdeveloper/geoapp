<?php

namespace application\lib;

class AppPaginacao {

    protected $myRegistrosPorPagina, $myRegistrosAfetados, $myPaginas, $myNumeroPagina, $myPaginacaoInicio, $myLabelPaginacao, $myUrl;

    public function __construct($RegistrosPorPagina, $RegistrosAfetados, $NumeroPagina, $Url) {
        $this->setRegistrosPorPagina($RegistrosPorPagina);
        $this->setRegistrosAfetados($RegistrosAfetados);
        $this->setNumeroPagina($NumeroPagina);
        $this->setPaginas(intval($RegistrosAfetados / $RegistrosPorPagina));
        $this->setUrl($Url);

        $this->GerarPaginacao();
    }

    public function __destruct() {
        
    }

    public function GerarPaginacao() {
        $ifor = 0;
        $qpg = 10;
        $qtd_page = $this->getPaginas();
        $search_page = $this->getNumeroPagina();

        if ($search_page > 0) {
            $this->setPaginacaoInicio($search_page * $this->getRegistrosPorPagina());
        } else {
            $this->setPaginacaoInicio(0);
        }

        if ($qtd_page >= $qpg) {
            if ($search_page >= $qpg) {
                $ifor = $search_page - ($qpg - 1);
                if ($ifor < 0)
                    $ifor = 1;
            }
        }
        $label_paginacao .= "<ul class='pagination'>";
        if ($search_page >= 1)
            $label_paginacao .="<li><a href=\"" . $this->getUrl() . "&pg=" . ($search_page - 1) . "\">Anterior</a>&nbsp;</li>";
        else
            $label_paginacao .="<li><span>Anterior</span>&nbsp;<li>";

        $j = 0;

        for ($i = $ifor; ( ($i <= $qtd_page) && ($j < $qpg)); $i++) {
            if ($i == $search_page)
            //$label_paginacao .= "<span class=\"paginacao_item_atual\">[".($i+1)."]</span>&nbsp;";
                $label_paginacao .= "<li><span>" . ($i + 1) . "</span>&nbsp;</li>";
            else
                $label_paginacao .= "<li><a href=\"" . $this->getUrl() . "&pg=" . $i . "\">" . ($i + 1) . "</a>&nbsp;</li>";
            $j++;
        }

        if ($search_page < $qtd_page)
            $label_paginacao .= "<li><a href=\"" . $this->getUrl() . "&pg=" . ($search_page + 1) . "\">Próximo</a>&nbsp;</li>";
        else
            $label_paginacao .="<li><span>Próximo</span></li>";
        $label_paginacao .= "</ul>";

        $this->setLabelPaginacao($label_paginacao);
    }

    public function Result($vobj) {
        $vresult = array();
        $h = 0;
        for ($i = $this->getPaginacaoInicio(), $j = 0; ( ($i < count($vobj)) && ($j < $this->getRegistrosPorPagina())); $i++, $j++) {
            $vresult[$h++] = $vobj[$i];
        }
        return $vresult;
    }

    public function setRegistrosPorPagina($value) {
        $this->myRegistrosPorPagina = $value;
    }

    public function getRegistrosPorPagina() {
        return $this->myRegistrosPorPagina;
    }

    public function setRegistrosAfetados($value) {
        $this->myRegistrosAfetados = $value;
    }

    public function getRegistrosAfetados() {
        return $this->myRegistrosAfetados;
    }

    public function setPaginas($value) {
        $this->myPaginas = $value;
    }

    public function getPaginas() {
        return $this->myPaginas;
    }

    public function setNumeroPagina($value) {
        $this->myNumeroPagina = $value;
    }

    public function getNumeroPagina() {
        return $this->myNumeroPagina;
    }

    public function setPaginacaoInicio($value) {
        $this->myPaginacaoInicio = $value;
    }

    public function getPaginacaoInicio() {
        return $this->myPaginacaoInicio;
    }

    public function setLabelPaginacao($value) {
        $this->myLabelPaginacao = $value;
    }

    public function getLabelPaginacao() {
        return $this->myLabelPaginacao;
    }

    public function setUrl($value) {
        $this->myUrl = $value;
    }

    public function getUrl() {
        return $this->myUrl;
    }

}

?>