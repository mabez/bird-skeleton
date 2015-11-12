<?php
namespace Consumidor\Compra;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFilterFactory;

class CompraForm extends Form
{

    public function __construct()
    {
        parent::__construct('formCompra');
        $this->generateInputFilter();
    }

    private function generateInputFilter()
    {
        $inputFilterFactory = new InputFilterFactory();
        
        $this->setInputFilter($inputFilterFactory->createInputFilter(array(
            'anuncio_id' => array(
                'name' => 'anuncio_id',
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'Int'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'O id do anuncio é obrigatório.'
                            )
                        )
                    )
                )
            ),
            'autenticacao_id' => array(
                'name' => 'autenticacao_id',
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'Int'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'O id da autenticação é obrigatório.'
                            )
                        )
                    )
                )
            )
        )));
    }
}
