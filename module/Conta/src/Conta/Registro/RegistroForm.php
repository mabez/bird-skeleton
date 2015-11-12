<?php
namespace Conta\Registro;

use Login\LoginForm;
use Autenticacao\Autenticacao;

class RegistroForm extends LoginForm
{

    public function __construct()
    {
        parent::__construct('formRegistro');
        $this->setAttribute('action', "/conta/registro/salvar/{$this->routeRedirect}");
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        $this->get('usuario')->setAttribute('id', 'inputContaUsuario');
        $this->get('usuario')->setAttribute('aria-describedby', 'sizing-addon-usuario');
        $this->get('usuario')->setOptions(array(
            'label' => 'Usuário',
            'label_attributes' => array(
                'class' => 'input-group-addon'
            )
        ));
        $this->get('usuario')->setAttribute('placeholder', 'Digite o usuário');
        
        $this->get('senha')->setAttribute('id', 'inputContaSenha');
        $this->get('senha')->setAttribute('aria-describedby', 'sizing-addon-senha');
        $this->get('senha')->setAttribute('placeholder', 'Digite a senha');
        $this->get('senha')->setOptions(array(
            'label' => 'Senha',
            'label_attributes' => array(
                'class' => 'input-group-addon'
            )
        ));
        
        $this->get('submit')->setAttribute('id', 'buttonContaRegistro');
        $this->get('submit')->setAttribute('value', 'Salvar');
    }

    public function setEntity(Autenticacao $entity)
    {
        $this->get('id')->setValue($entity->getId());
        $this->get('usuario')->setValue($entity->getUsuario());
        return $this;
    }
}
