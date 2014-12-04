<?php
class DocumentoPf implements JsonSerializable{
	private $id;
	private $enum_tipo;
	private $numero;
	private $dataEmissao;
	private $orgaoEmissor;
	private $via;
	private $o_pessoaFisica;
	private $dataCadastro;
	private $dataAtualizacao;
	
	public function __construct($id="", $enum_tipo="", $numero="", $dataEmissao="", $orgaoEmissaor="", $via="", $o_pessoaFisica="", $dataCadastro="", $dataAtualizacao=""){
		$this->id = $id;
		$this->enum_tipo = $enum_tipo;
		$this->numero = $numero;
		$this->dataAtualizacao = $dataEmissao;
		$this->orgaoEmissor = $orgaoEmissaor;
		$this->via = $via;
		$this->o_pessoaFisica = $o_pessoaFisica;
		$this->dataCadastro = $dataCadastro;
		$this->dataAtualizacao = $dataAtualizacao;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getEnumTipo() {
		return $this->enum_tipo;
	}
	public function setEnumTipo($enum_tipo) {
		$this->enum_tipo = $enum_tipo;
	}
	public function getNumero() {
		return $this->numero;
	}
	public function setNumero($numero) {
		$this->numero = $numero;
	}
	public function getDataEmissao() {
		return $this->dataEmissao;
	}
	public function setDataEmissao($dataEmissao) {
		$this->dataEmissao = $dataEmissao;
	}
	public function getOrgaoEmissor() {
		return $this->orgaoEmissor;
	}
	public function setOrgaoEmissor($orgaoEmissor) {
		$this->orgaoEmissor = $orgaoEmissor;
	}
	public function getVia() {
		return $this->via;
	}
	public function setVia($via) {
		$this->via = $via;
	}
	public function getOPessoafisica() {
		return $this->o_pessoaFisica;
	}
	public function setOPessoafisica($o_pessoaFisica) {
		$this->o_pessoaFisica = $o_pessoaFisica;
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
	
	public function __toString(){
		"DocumentoPf [ id= " . $this->id . ", tipo= " . $this->enum_tipo . ", numero= " . $this->numero . ", data de emissao= " . $this->dataEmissao . ", orgao emissor= " . $this->orgaoEmissor . ", via= " . $this->via . ", " . $this->o_pessoaFisica . ", data de cadastro= " . $this->dataCadastro . ", data de atualizacao= " . $this->dataAtualizacao . " ]";
	}
	
	public function jsonSerialize() {
		return [
				'id' => $this->id,
				'enum_tipo' => $this->enum_tipo,
				'numero' => $this->numero,
				'dataEmissao' => $this->dataEmissao,
				'orgaoEmissor' => $this->orgaoEmissor,
				'via' => $this->via,
				'o_pessoaFisica' => $this->o_pessoaFisica->jsonSerialize(),
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
		];
	}

}
?>