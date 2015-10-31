<?php
namespace Admin\Anuncio;

use Zend\Form\Fieldset;

class AvancadoFieldset extends Fieldset
{

    private $linkPrototype = "location.href = '%s';";

    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        
        $idRemover = isset($options['idRemover']) ? $options['idRemover'] : null;
        $hrefRemover = isset($options['hrefRemover']) ? $options['hrefRemover'] : null;
        
        $this->add(array(
            'name' => 'button-remover',
            'type' => 'button',
            'attributes' => array(
                'id' => $idRemover,
                'class' => 'form-control btn btn-danger pull-right btn-lg',
                'onClick' => sprintf($this->linkPrototype, $hrefRemover)
            ),
            'options' => array('label' =>  'Remover')
        ));
    }

    public function setOptions($options)
    {
        $idRemover = isset($options['idRemover']) ? $options['idRemover'] : null;
        $hrefRemover = isset($options['hrefRemover']) ? $options['hrefRemover'] : null;
        
        $this->get('button-remover')->setAttribute('id', $idRemover);
        $this->get('button-remover')->setAttribute('onClick', sprintf($this->linkPrototype, $hrefRemover));
    }
}
