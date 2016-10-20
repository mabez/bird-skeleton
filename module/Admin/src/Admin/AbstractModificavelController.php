<?php
namespace Admin;

use Acesso\AcessoViewModel;
use Acesso\AcessoController;

abstract class AbstractModificavelController extends AcessoController
{

    protected $modificarViewModel;

    /**
     * @param AcessoViewModel $viewModel
     * @param ModificarViewModel $modificarViewModel
     */
    public function __construct(AcessoViewModel $viewModel, ModificarViewModelInterface $modificarViewModel) {
        $this->viewModel = $viewModel;
        $this->modificarViewModel = $modificarViewModel;
    }

    /**
     * Obtem a model da pagina de modificação
     * @return ModificarViewModel
     */
    protected function getModificarViewModel()
    {
        return $this->modificarViewModel;
    }

    /**
     * @return ModificarViewModel
     */
    abstract public function modificarAction();

    abstract public function salvarAction();

    abstract public function removerAction();

}
