<?php

namespace Chururgie\Model;

class ClassePathologie{
    public $id_organe;
    public $nom_organe;
    
    public function exchangeArray($data) {
        $this->id_classe_pathologie = (! empty ( $data ['id_organe'] )) ? $data ['id_organe'] : null;
        $this->nom_classe_pathologie = (! empty ( $data ['nom_organe'] )) ? $data ['nom_organe'] : null;
      
}
}