<?php
namespace Acesso;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;
use Zend\Authentication\AuthenticationService;

class Acesso extends Acl
{
    const ROLE_ADMIN = 'admin';
    const ROLE_ANONIMO = 'anonimo';
    const ROLE_CONSUMIDOR ='consumidor';
    
    private $roleAtual;

    public function __construct(AuthenticationService $authenticationService, $config)
    {
        $roles = array_keys($config);
        foreach($roles as $role) {
            $this->addRole(new Role($role));
            foreach ($config[$role] as $resource) {
                if(!$this->hasResource($resource)) {
                    $this->addResource(new Resource($resource));
                }
                $this->allow($role, $resource);
            }
        }
        
        $this->roleAtual = $authenticationService->hasIdentity() ? $authenticationService->getIdentity()->getPerfil()->getNome() : self::ROLE_ANONIMO;
    }

    public function isRoleAtualAllowed($resource)
    {
        return parent::isAllowed($this->roleAtual, $resource);
    }
    
    static public function getDefaultRole()
    {
        return self::ROLE_CONSUMIDOR;
    }
}
