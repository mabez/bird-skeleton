<?php
namespace Admin\Usuario;

use Login\LoginForm;
use Ecompassaro\Autenticacao\Autenticacao;
use AvancadoForm\AvancadoFieldsetContainerTrait;

class UsuarioForm extends LoginForm
{
    use AvancadoFieldsetContainerTrait;

    private $new;

    public function __construct()
    {
        parent::__construct('formUsuario');
        $this->setAttribute('action', "/admin/usuario/salvar/{$this->routeRedirect}");
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        $this->get('usuario')->setAttribute('id', 'inputAdminUsuario');
        $this->get('usuario')->setAttribute('aria-describedby', 'sizing-addon-usuario');
        $this->get('usuario')->setOptions(array(
            'label' => 'Usuário',
            'label_attributes' => array(
                'class' => 'input-group-addon'
            )
        ));
        $this->get('usuario')->setAttribute('placeholder', 'Digite o usuário');
        
        $this->get('senha')->setAttribute('id', 'inputAdminSenha');
        $this->get('senha')->setAttribute('aria-describedby', 'sizing-addon-senha');
        $this->get('senha')->setAttribute('placeholder', 'Digite a senha');
        $this->get('senha')->setOptions(array(
            'label' => 'Senha',
            'label_attributes' => array(
                'class' => 'input-group-addon'
            )
        ));
        
        $this->get('submit')->setAttribute('id', 'buttonAdminUsuario');
        $this->get('submit')->setAttribute('value', 'Salvar');
    }

    public function setEntity(Autenticacao $entity)
    {
        $this->get('id')->setValue($entity->getId());
        $this->get('usuario')->setValue($entity->getUsuario());
        return $this;
    }

    public function setNew($new)
    {
        $this->new = $new;
        $this->generateAvancado("/admin/usuario/remover/{$this->get('id')->getValue()}/{$this->routeRedirect}", 'buttonUsuarioRemover');
        return $this;
    }
}
