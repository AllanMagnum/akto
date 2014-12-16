<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/EnderecoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/ContatoPF.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/git/akto/cau/" . 'model/bean/DocumentoPF.php';

class PessoaFisica implements JsonSerializable{
	private  $id;
	private $nome;
	private $cpf;
	private $dataNascimento;
	private $estadoCivil;
	private $enum_sexo;
	private $enum_estadoCivil;
	private $nomePai;
	private $nomeMae;
	private $enum_cor;
	private $naturalidade;
	private $nacionalidade;
	private $v_o_enderecoPF = array();
	private $v_o_contatoPF = array();
	private $v_o_documentoPF = array();
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id = null, $nome = null, $cpf = null, $dataNascimento = null, $enum_estadoCivil = null, $enum_sexo = null, $nomePai = null, $nomeMae = null, $enum_cor=null, $naturalidade=null, $nacionalidade=null, $dataCadastro = null, $dataAtualizacao = null) {
		$this->id = $id;
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->dataNascimento = $dataNascimento;
		$this->enum_estadoCivil = $enum_estadoCivil;
		$this->enum_sexo = $enum_sexo;
		$this->nomePai = $nomePai;
		$this->nomeMae = $nomeMae;
		$this->enum_cor = $enum_cor;
		$this->naturalidade = $naturalidade;
		$this->nacionalidade = $nacionalidade;
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
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function getDataNascimento() {
		return $this->dataNascimento;
	}
	public function setDataNascimento($dataNascimento) {
		$this->dataNascimento = $dataNascimento;
	}
	public function getEstadoCivil() {
		return $this->estadoCivil;
	}
	public function setEstadoCivil($estadoCivil) {
		$this->estadoCivil = $estadoCivil;
	}
	public function getEnumSexo() {
		return $this->enum_sexo;
	}
	public function setEnumSexo($enum_sexo) {
		$this->enum_sexo = $enum_sexo;
	}
	public function getEnumEstadocivil() {
		return $this->enum_estadoCivil;
	}
	public function setEnumEstadocivil($enum_estadoCivil) {
		$this->enum_estadoCivil = $enum_estadoCivil;
	}
	public function getNomePai() {
		return $this->nomePai;
	}
	public function setNomePai($nomePai) {
		$this->nomePai = $nomePai;
	}
	public function getNomeMae() {
		return $this->nomeMae;
	}
	public function setNomeMae($nomeMae) {
		$this->nomeMae = $nomeMae;
	}
	public function getEnumCor() {
		return $this->enum_cor;
	}
	public function setEnumCor($enum_cor) {
		$this->enum_cor = $enum_cor;
	}
	public function getNaturalidade() {
		return $this->naturalidade;
	}
	public function setNaturalidade($naturalidade) {
		$this->naturalidade = $naturalidade;
	}
	public function getNacionalidade() {
		return $this->nacionalidade;
	}
	public function setNacionalidade($nacionalidade) {
		$this->nacionalidade = $nacionalidade;
	}
	public function getVOEnderecoPF() {
		return $this->v_o_enderecoPF;
	}
	public function setVOEnderecoPF($v_o_enderecoPF) {
		$this->v_o_enderecoPF = $v_o_enderecoPF;
	}
	public function getVOContatoPF() {
		return $this->v_o_contatoPF;
	}
	public function setVOContato($v_o_contatoPF) {
		$this->v_o_contatoPF = $v_o_contatoPF;
	}
	public function getVODocumentoPF() {
		return $this->v_o_documentoPF;
	}
	public function setVODocumentoPF($v_o_documentoPF) {
		$this->v_o_documentoPF = $v_o_documentoPF;
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
	
	public function adicionarEndereco(EnderecoPF $o_enderecoPF){
		array_push($this->v_o_enderecoPF, $o_enderecoPF);
	}
	
	public function adicionarContato(ContatoPF $o_contatoPF){
		array_push($this->v_o_contatoPF, $o_contatoPF);
	}
	
	public function adicionarDocumento(DocumentoPF $o_documentoPF){
		array_push($this->v_o_documentoPF, $o_documentoPF);
	}
	
	public function __toString(){
		return "Pessoa [id=" . $this->id . ", nome=" . $this->nome . ", cpf=" . $this->cpf . ", data nascimento=" . $this->dataNascimento . ", estado civil=" . $this->enum_estadoCivil . ", sexo=" . $this->enum_sexo . ", nome do pai=" . $this->nomePai . ", nome da mae=" . $this->nomeMae . ", cor= " . $this->enum_cor. ", naturalidade=" . $this->naturalidade . ", nacionalidade= " . $this->nacionalidade . ", " . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
	
	public function jsonSerialize() {
		return [ 
			   	'id' => $this->id,
				'nome' => $this->nome,
				'cpf' => $this->cpf,
 				'dataNascimento' => $this->dataNascimento,
 				'enum_estadoCivil' => $this->enum_estadoCivil,
 				'enum_sexo' => $this->enum_sexo,
 				'nomePai' => $this->nomePai,
				'nomeMae' => $this->nomeMae,
 				'enum_cor' => $this->enum_cor,
 				'naturalidade' => $this->naturalidade,
 				'nacionalidade' => $this->nacionalidade,
 				'dataCadastro' => $this->dataCadastro,
 				'dataAtualizacao' => $this->dataAtualizacao
		        ];
		
	}
	
	

}
?>