<?php
namespace Consumidor\Compra;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFilterFactory;

class CompraForm extends Form
{

    public function __construct()
    {
        parent::__construct('formCompra');
        
        $this->setAttribute('method', 'POST');
        $this->setAttribute('accept-charset', 'UTF-8');
        $this->setAttribute('action', '/comprar/');

        $this->add(array(
            'name' => 'produto_id',
            'type' => 'Hidden'
        ));
        
        $this->add(array(
            'name' => 'quantidade',
            'type' => 'Text',
            'options' => array(
                'label' => 'Quantidade',
                'label_attributes' => array(
                    'class' => 'input-group-addon'
                )
            ),
            'attributes' => array(
                'id' => 'inputCompraQuantidade',
                'class' => 'form-control',
                'aria-describedby' => 'sizing-addon-quantidade',
                'placeholder' => 'Digite aqui a quantidade',
                'value' => 1
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'options' => array(),
            'attributes' => array(
                'id' => 'buttonCompraComprar',
                'class' => 'form-control btn btn-default btn-lg btn-success',
                'value' => 'Comprar'
            )
        ));
        
        $this->generateInputFilter();
    }

    private function generateInputFilter()
    {
        $inputFilterFactory = new InputFilterFactory();
        
        $this->setInputFilter($inputFilterFactory->createInputFilter(array(
            'produto_id' => array(
                'name' => 'produto_id',
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
                                'isEmpty' => 'O id do produto é obrigatório.'
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
            ),
            'quantidade' => array(
                'name' => 'quantidade',
                'required' => false,
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
                )
            ),
            'valor' => array(
                'name' => 'valor',
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'NumberParse'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'O valor é obrigatório.'
                            )
                        )
                    )
                )
            )
        )));
    }
    
    
    public function setProdutoId($produtoId)
    {
        $this->get('produto_id')->setValue($produtoId);
        return $this;
    }
}
