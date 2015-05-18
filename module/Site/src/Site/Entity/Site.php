<?php
namespace Site\Entity;

class Site
{
    private $id;
    private $nome;
    private $logo;
    private $intro;
    private $copyright;

    /**
     * Obtem o nome do site
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Obtem o caminho da imagem do logo do site
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Obtem o texto de introdução do site
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Modifica o nome do site
     * @param string $nome
     * @return \Application\Entity\Site
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Modifica o caminho da imagem do logo do site
     * @param string $logo
     * @return \Application\Entity\Site
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * Modifica o texto de introdução do site
     * @param string $intro
     * @return \Application\Entity\Site
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
        return $this;
    }
    
    /**
     * Obtem a informação de copyright do site
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * Modifica a informação de copyright do site
     * @param string $copyright
     * @return \Application\Entity\Site
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @param mixed $id
     * @return \Site\Entity\Site
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
   
    /**
     * Obtem a estrutura da entity Site em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'logo' => $this->getLogo(),
            'intro' => $this->getIntro(),
            'copyright' => $this->getCopyright()
        );
    }
    
    /**
     * Preenche a entidade a partir de um array
     */
    public function exchangeArray($array)
    {
        $this->setId($array['id']);
        $this->setNome($array['nome']);
        $this->setLogo($array['logo']);
        $this->setIntro($array['intro']);
        $this->setCopyright($array['copyright']);
        return $this;
    }
}