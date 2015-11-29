<?php
namespace AvancadoForm;

trait AvancadoFieldsetContainerTrait
{
    protected function generateAvancado($link, $id = 'buttonRemover')
    {
        $campoExiste = array_key_exists('avancado', $this->getElements());
    
        if ($campoExiste) {
    
            if ($this->new) {
    
                $this->remove('avancado');
            } else {
    
                $this->get('avancado')->setOption('hrefRemover', $link);
            }
        } elseif (! $this->new) {
    
            $this->add(array(
                'name' => 'avancado',
                'type' => 'AvancadoForm\AvancadoFieldset',
                'options' => array(
                    'idRemover' => $id,
                    'hrefRemover' => $link
                )
            ));
        }
    }
}
