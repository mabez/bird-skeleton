<?php
namespace Admin\Produto;

use Zend\Form\Form;
use Ecompassaro\Produto\Produto;
use Zend\InputFilter\Factory as InputFilterFactory;
use Ecompassaro\AvancadoForm\FieldsetContainerTrait as AvancadoFieldsetContainerTrait;

class ProdutoForm extends Form
{
    use AvancadoFieldsetContainerTrait;
    private $entity = null;
    private $new = true;
    private $redirect = null;
    protected $imageDirectory;

    public function __construct($imageDirectory)
    {
        $this->imageDirectory = $imageDirectory;

        parent::__construct('formProduto');

        $this->generateHeader();
        $this->generateId();
        $this->generateTitulo();
        $this->generateImagem();
        $this->generateImagemAntiga();
        $this->generatePreco();
        $this->generateDescricao();
        $this->generateSubmit();
        $this->generateAvancadoInfo();
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
        $this->setAttribute('action', "/admin/produtos/salvar/{$this->redirect}");
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
        if ($this->entity instanceof Produto){
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
        if ($this->entity instanceof Produto){
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
                    'id' => 'inputProdutoTitulo',
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
        if ($this->entity instanceof Produto){
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
                    'id' => 'inputProdutoImagem',
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
                    'id' => 'inputProdutoPreco',
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
        if ($this->entity instanceof Produto){
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
                    'id' => 'inputProdutoDescricao',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-descricao',
                )
            )
        );

        $this->setDescricao();
    }

    private function setDescricao()
    {
        if ($this->entity instanceof Produto){
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
                    'id' => 'buttonProdutoSalvar',
                    'class' => 'form-control btn btn-success pull-right btn-lg',
                    'value' => 'Salvar'
                )
            )
        );
    }

    protected function generateAvancadoInfo()
    {
        $produtoId = $this->entity ? $this->entity->getId() : null;
        $linkRemover = "/admin/produtos/remover/{$produtoId}/{$this->redirect}";
        $this->generateAvancado($linkRemover, 'buttonProdutoRemover');
    }

    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
        $this->generateAction();
        $this->generateAvancadoInfo();
        return $this;
    }

    public function setEntity(Produto $entity) {
        $this->entity = $entity;
        $this->setId();
        $this->setTitulo();
        $this->setImagemAntiga();
        $this->setPreco();
        $this->setDescricao();
        $this->generateAvancadoInfo();
        return $this;
    }

    public function setNew($new)
    {
        $this->new = $new;
        $this->generateAvancadoInfo();
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
                            'target'    => $this->imageDirectory . 'produto.png',
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
