<?php
namespace Login\Registrar;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFilterFactory;

class RegistrarForm extends Form
{
    public function __construct()
    {
        parent::__construct('formLogin');
        
        $this->setAttribute('method', 'POST');
        $this->setAttribute('accept-charset', 'UTF-8');
        $this->setAttribute('action', "/login/registrar/");
        
        $this->add(array(
            'name' => 'urlRedireciona',
            'type' => 'Hidden',
            'attributes' => array(
                'value' => '/'
            )
        ));
        
        $this->add(array(
            'name' => 'usuario',
            'type' => 'Text',
            'attributes' => array(
                'id' => 'inputLoginUsuario',
                'class' => 'form-control',
                'placeholder' => 'Digite seu email'
            )
        ));
        
        $this->add(array(
            'name' => 'senha',
            'type' => 'Password',
            'attributes' => array(
                'id' => 'inputLoginSenha',
                'class' => 'form-control',
                'placeholder' => 'Digite sua senha'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'id' => 'buttonLogin',
                'class' => 'form-control btn btn-success pull-right',
                'value' => 'Salvar'
            )
        ));
        
        $inputFilterFactory = new InputFilterFactory();
        
        $this->setInputFilter($inputFilterFactory->createInputFilter(array(
            'usuario' => array(
                'name' => 'usuario',
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'EmailAddress'
                    )
                )
            ),
            'senha' => array(
                'name' => 'senha',
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            )
        )));
    }
    
    public function setRouteRedirect($routeRedirect)
    {
        return $this->setAttribute('urlRedireciona', array('value' => $routeRedirect));
    }
}
