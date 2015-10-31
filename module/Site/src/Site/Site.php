<?php
namespace Site;

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
     * @return Site
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Modifica o caminho da imagem do logo do site
     * @param string $logo
     * @return Site
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * Modifica o texto de introdução do site
     * @param string $intro
     * @return Site
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
     * @return Site
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
     * @return Site
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
        $logoAntigo = null;
        if (isset($array['logoAntigo'])) {
            $logoAntigo = $array['logoAntigo'];
            unset($array['logoAntigo']);
        }
        if (is_array($array['logo'])) {
            if (isset($array['logo']['tmp_name']) && !empty($array['logo']['tmp_name'])) {
                $this->setLogo(basename($array['logo']['tmp_name']));
            } else {
                $this->setLogo($logoAntigo);
            }
        } else {
            $this->setLogo($array['logo']);
        }
        $this->setIntro($array['intro']);
        $this->setCopyright($array['copyright']);
        return $this;
    }
}