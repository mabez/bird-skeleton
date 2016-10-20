<?php
namespace Admin\Site;

use Zend\Form\Form;
use Site\Site;
use Zend\InputFilter\Factory as InputFilterFactory;

class SiteForm extends Form
{
    protected $imageDirectory;

    public function __construct($imageDirectory)
    {
        $this->imageDirectory = $imageDirectory;

        parent::__construct('formSite');

        $this->setAttribute('method', 'POST');
        $this->setAttribute('accept-charset', 'UTF-8');
        $this->setAttribute('action', '/admin/site/salvar/');

        $this->add(
            array(
                'name' => 'id',
                'type' => 'Hidden'
            )
        );

        $this->add(
            array(
                'name' => 'logoAntigo',
                'type' => 'Hidden'
            )
        );
        $this->add(
            array(
                'name' => 'logo',
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
                    'id' => 'inputSiteLogo',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-logo',
                    'placeholder' => 'Coloque aqui o caminho do arquivo do logo do site'
                )
            )
        );
        $this->add(
            array(
                'name' => 'nome',
                'type' => 'Text',
                'options' => array(
                    'label' => 'Nome',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    )
                ),
                'attributes' => array(
                    'id' => 'inputSiteNome',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-nome',
                    'placeholder' => 'Escreva aqui o nome do site'
                )
            )
        );
        $this->add(
            array(
                'name' => 'intro',
                'type' => 'Text',
                'options' => array(
                    'label' => 'Introdução',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    )
                ),
                'attributes' => array(
                    'id' => 'inputSiteIntro',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-intro',
                    'placeholder' => 'Escreva aqui o texto que aparecerá na página inicial do site'
                )
            )
        );
        $this->add(
            array(
                'name' => 'copyright',
                'type' => 'Text',
                'options' => array(
                    'label' => '©',
                    'label_attributes' => array(
                        'class'  => 'input-group-addon'
                    )
                ),
                'attributes' => array(
                    'id' => 'inputSiteCopyright',
                    'class' => 'form-control',
                    'aria-describedby' => 'sizing-addon-copyright'
                )
            )
        );
        $this->add(
            array(
                'name' => 'submit',
                'type' => 'Submit',
                'options' => array(),
                'attributes' => array(
                    'id' => 'buttonSiteSalvar',
                    'class' => 'form-control btn btn-success pull-right btn-lg',
                    'value' => 'Salvar'
                ),
            )
        );

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
            'nome' => array(
                'name' => 'nome',
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
                                'isEmpty' => 'O Campo nome é obrigatório.'
                            )
                        )
                    )
                )
            ),
            'logo' => array(
                'name' => 'logo',
                'required'   => false,
                'filters' => array(
                    array(
                        'name' => '\Zend\Filter\File\RenameUpload',
                        'options' => array(
                            'target'    => $this->imageDirectory . 'logo.png',
                            'overwrite' => true
                        )
                    )
                )
            ),
            'intro' => array(
                'name' => 'intro',
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
                                'isEmpty' => 'O Campo intro é obrigatório.'
                            )
                        )
                    )
                )
            ),
            'copyright' => array(
                'name' => 'copyright',
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
                                'isEmpty' => 'O Campo copyright é obrigatório.'
                            )
                        )
                    )
                )
            ),
        )));
    }

    public function setEntity(Site $site)
    {
        $this->get('id')->setValue($site->getId());
        if ($site->getLogo()) {
            $this->get('logo')->setLabel('<img src="/img/'.$site->getLogo().'" height="100%">');
            $this->get('logoAntigo')->setValue($site->getLogo());
        }
        $this->get('nome')->setValue($site->getNome());
        $this->get('intro')->setValue($site->getIntro());
        $this->get('copyright')->setValue($site->getCopyright());
        return $this;
    }
}
