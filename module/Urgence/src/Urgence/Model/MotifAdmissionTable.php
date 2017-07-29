<?php
namespace Urgence\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
class MotifAdmissionTable{
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	public function addMotifAdmission($values, $id_admission){
		for($i=1 ; $i<=5; $i++){
			if($values->get ( 'motif_admission'.$i )->getValue ()){
				$datamotifadmission = array(
						'libelle_motif' => $values->get ( 'motif_admission'.$i )->getValue (),
						'id_admission_urgence' => $id_admission,
				);
				$this->tableGateway->insert($datamotifadmission);
			}
	
		}
	}
	
	public function getMotifAdmissionUrgence($id_admission){ 
		$id_admission = ( int ) $id_admission;
		$rowset = $this->tableGateway->select ( array (
				'id_admission_urgence' => $id_admission
		) );
		
		return $rowset;
	}
	
	public function deleteMotifAdmission($id_admission){
		$this->tableGateway->delete(array('id_admission_urgence' => $id_admission));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getMotifAdmission($id){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from('motif_admission');
		$select->columns(array('Id_motif'=>'id_motif', 'Id_cons'=>'id_cons', 'Libelle_motif'=>'libelle_motif'));
		$select->where(array('id_cons'=>$id));
		$select->order('id_motif ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		return $result;
	}
	
	public function nbMotifs($id){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from('motif_admission');
		$select->columns(array('id_motif'));
		$select->where(array('id_cons'=>$id));
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute()->count();
		return $result;
	}
	
	public function addMotifAdmissionPourExamenJour($values, $codeExamen){
		$tabMotif = array(
				1 => $values->motif_admission1,
				2 => $values->motif_admission2,
				3 => $values->motif_admission3,
				4 => $values->motif_admission4,
				5 => $values->motif_admission5,
		);
		for($i=1 ; $i<=5; $i++){
			if($tabMotif[$i]){
				$datamotifadmission	 = array(
						'libelle_motif' => $tabMotif[$i],
						'id_cons' => $codeExamen,
				);
				$this->tableGateway->insert($datamotifadmission);
			}
		}
	}
}