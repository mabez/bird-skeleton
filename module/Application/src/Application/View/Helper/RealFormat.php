<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Formatador de números para dinheiro BRL
 */
class RealFormat extends AbstractHelper
{
    /**
     * @param double $valor
     * @return string
     */
    public function __invoke($valor)
    {
        $moneyFormat = money_format("R$ %i", $valor);
        $moneyFormat = str_replace(',', '#', $moneyFormat);
        $moneyFormat = str_replace('.', ',', $moneyFormat);
        $moneyFormat = str_replace('#', '.', $moneyFormat);
        return $moneyFormat;
    }
}