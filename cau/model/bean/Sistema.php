<?php
	class Sistema{
		private $id;
		private $nome;
		private $sigla;
		private $dataCadastro;
		private $dataAtualizacao;
		
		function __construct($id="", $nome="", $sigla="", $dataCadastro="", $dataAtualizacao=""){
			$this->id= $id;
			$this->nome = $nome;
			$this->sigla = $sigla;
			$this->dataCadastro = $dataCadastro;
			$this->dataAtualizacao = $dataAtualizacao;
		}
		
		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getNome() {
			return $this->nome;
		}
		public function setNome($nome) {
			$this->nome = $nome;
		}
		public function getSigla() {
			return $this->sigla;
		}
		public function setSigla($sigla) {
			$this->sigla = $sigla;
		}
		public function getDataCadastro() {
			return $this->dataCadastro;
		}
		public function setDataCadastro($dataCadastro) {
			$this->dataCadastro = $dataCadastro;
		}
		public function getDataAtualizacao() {
			return $this->dataAtualizacao;
		}
		public function setDataAtualizacao($dataAtualizacao) {
			$this->dataAtualizacao = $dataAtualizacao;
		}
		
		function __toString(){
			return 'Sistema: ' . 'id-' . $this->id . ' Nome-' .$this->nome . ' Sigla-' . $this->sigla . ' DataCadastro-' . $this->dataCadastro . 'DataAtualizacao-' . $this->dataAtualizacao ;
		}
		
		
	}
?>