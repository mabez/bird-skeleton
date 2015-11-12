<?php
namespace Admin\Anuncio;

use Zend\Form\Form;
use Anuncio\Anuncio;
use Zend\InputFilter\Factory as InputFilterFactory;

class AnuncioForm extends Form
{
    private $entity = null;
    private $new = true;
    private $redirect = null;

    public function __construct()
    {
        parent::__construct('formAnuncio');
        
        $this->generateHeader();
        $this->generateId();
        $this->generateTitulo();
        $this->generateImagem();
        $this->generateImagemAntiga();
        $this->generatePreco();
        $this->generateDescricao();
        $this->generateSubmit();
        $this->generateAvancado();
        $this->generateInputFilter();
        
    }

    private function generateHeader()
    {
        $this->setAttribute('method', 'POST');
        $this->setAttribute('accept-charset', 'UTF-8');
        $this->generateAction();
    }
    
    private function generateAction()
    {
        $this->setAttribute('action', "/admin/anuncios/salvar/{$this->redirect}");
    }

    private function generateId()
    {
        $this->add(
            array(
                'name' => 'id',
                'type' => 'Hidden',
            )
        );
    
        $this->setId();
    }
    
    private function setId() {
        if ($this->entity instanceof Anuncio){
            $this->get('id')->setValue($this->entity->getId());
        }
    }

    private function generateImagemAntiga()
    {
        $this->add(
            array(
                'name' => 'imagemAntiga',
                'type' => 'Hidden',
            )
        );
    
        $this->setImagemAntiga();
    }
    
    private function setImagemAntiga() {
        if ($this->entity instanceof Anuncio){
            $this->get('imagem')->setLabel('<img src="/img/'.$this->entity->getImagem().'" height="100%">');
            $this->get('imagemAntiga')->setValue($this->entity->getImagem());
        }
    }

    private function generateTitulo()
    {
        $this->add(
            array(
                'name' => 'titulo',
                'type' => 'Text',
                'options' => array(
                    'label' => 'Título',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    )
                ),
                'attributes' => array(
                    'id' => 'inputAnuncioTitulo',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-titulo',
                    'placeholder' => 'Coloque aqui o título do anúncio',
                )
            )
        );
        
        $this->setId();
    }
    
    private function setTitulo()
    {
        if ($this->entity instanceof Anuncio){
            $this->get('titulo')->setValue($this->entity->getTitulo());
        }
    }

    private function generateImagem()
    {
        $this->add(
            array(
                'name' => 'imagem',
                'type' => 'File',
                'options' => array(
                    'label' => '<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    ),
                    'label_options' => array(
                        'disable_html_escape' => true,
                    )
                ),
                'attributes' => array(
                    'id' => 'inputAnuncioImagem',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-imagem',
                    'placeholder' => 'Coloque aqui o caminho do arquivo da imagem do anúncio',
                )
            )
        );
        
    }

    private function generatePreco()
    {
        $this->add(
            array(
                'name' => 'preco',
                'type' => 'Text',
                'options' => array(
                    'label' => 'R$',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    )
                ),
                'attributes' => array(
                    'id' => 'inputAnuncioPreco',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-preco',
                    'placeholder' => 'Escreva aqui o preço do anúncio',
                )
            )
        );
        
        $this->setPreco();
    }
    
    private function setPreco()
    {
        if ($this->entity instanceof Anuncio){
            $this->get('preco')->setValue($this->entity->getPreco());
        }
    }

    private function generateDescricao()
    {
        $this->add(
            array(
                'name' => 'descricao',
                'type' => 'Text',
                'options' => array(
                    'label' => 'Descrição',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    )
                ),
                'attributes' => array(
                    'id' => 'inputAnuncioDescricao',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-descricao',
                )
            )
        );
        
        $this->setDescricao();
    }
    
    private function setDescricao()
    {
        if ($this->entity instanceof Anuncio){
            $this->get('descricao')->setValue($this->entity->getDescricao());
        }
    }

    private function generateSubmit()
    {
        $this->add(
            array(
                'name' => 'submit',
                'type' => 'Submit',
                'options' => array(),
                'attributes' => array(
                    'id' => 'buttonAnuncioSalvar',
                    'class' => 'form-control btn btn-success pull-right btn-lg',
                    'value' => 'Salvar'
                )
            )
        );
    }

    private function generateAvancado()
    {
        $anuncioId = $this->entity ? $this->entity->getId() : null;
        $linkRemover = "/admin/anuncios/remover/{$anuncioId}/{$this->redirect}";
        $campoExiste = array_key_exists('avancado', $this->getElements());
        
        if ($campoExiste) {
            
            if ($this->new) {
                
                $this->remove('avancado');
            } else {
                
                $this->get('avancado')->setOption('hrefRemover', $linkRemover);
            }
        } elseif(!$this->new) {
            
            $this->add(
                array(
                    'name' => 'avancado',
                    'type' => 'Admin\AvancadoFieldset',
                    'options' => array(
                        'idRemover' => 'buttonAnuncioRemover',
                        'hrefRemover' => $linkRemover
                    )
                )
            );
        }
    }
    
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
        $this->generateAction();
        $this->generateAvancado();
        return $this;
    }
    
    public function setEntity(Anuncio $entity) {
        $this->entity = $entity;
        $this->setId();
        $this->setTitulo();
        $this->setImagemAntiga();
        $this->setPreco();
        $this->setDescricao();
        $this->generateAvancado();
        return $this;
    }
    
    public function setNew($new)
    {
        $this->new = $new;
        $this->generateAvancado();
        return $this;
    }
    
    private function generateInputFilter()
    {
        $inputFilterFactory = new InputFilterFactory();
        
        $this->setInputFilter($inputFilterFactory->createInputFilter(array(
            'id' => array(
                'name' => 'id',
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
            'titulo' => array(
                'name' => 'titulo',
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
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'O Campo título é obrigatório.'
                            )
                        )
                    )
                )
            ),
            'imagem' => array(
                'name' => 'imagem',
                'required'   => false,
                'filters' => array(
                    array(
                        'name' => '\Zend\Filter\File\RenameUpload',
                        'options' => array(
                            'target'    => '/var/img/anuncio.png',
                            'randomize' => true,
                            'overwrite' =>true
                        )
                    )
                )
            ),
            'preco' => array(
                'name' => 'preco',
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
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'O Campo preço é obrigatório.'
                            )
                        )
                    )
                )
            ),
            'descricao' => array(
                'name' => 'descricao',
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
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'O Campo descrição é obrigatório.'
                            )
                        )
                    )
                )
            ),
        )));
    }
}
