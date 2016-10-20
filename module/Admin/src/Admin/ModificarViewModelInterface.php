<?php
namespace Admin;

interface ModificarViewModelInterface
{

    /**
     *
     * @param string $id
     *            da entidade
     */
    public function getDescricao($id = null);

    /**
     *
     * @param array $array
     *            a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array);

    /**
     *
     * @param mixed $id
     *            a da instancia a ser removida
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function remove($id);

    /**
     *
     * @return \Zend\Form\Form
     */
    public function getForm();
}
