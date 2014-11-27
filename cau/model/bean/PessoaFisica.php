<?php
class PessoaFisica implements JsonSerializable{
	private  $id;
	private $nome;
	private $cpf;
	private $dataNascimento;
	private $estadoCivil;
	private $sexo;
	private $estadoCivil;
	private $nomePai;
	private $nomeMae;
	private $enum_cor;
	private $naturalidade;
	private $nacionalidade;
	private $v_o_endereco;
	private $v_o_contato;
	private $v_o_documento;
	private $dataCadastro;
	private $dataAtualizacao;
	
	function __construct($id = "", $nome = "", $cpf = "", $dataNascimento = "", $estadoCivil = "", $sexo = "", $nomePai = "", $nomeMae = "", $enum_cor="", $naturalidade="", $nacionalidade="", $v_o_endereco = "", $v_o_contato = "", $v_o_documento = "", $dataCadastro = "", $dataAtualizacao = "") {
		$this->id = $id;
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->dataNascimento = $dataNascimento;
		$this->estadoCivil = $estadoCivil;
		$this->nomePai = $nomePai;
		$this->nomeMae = $nomeMae;
		$this->enum_cor = $enum_cor;
		$this->naturalidade = $naturalidade;
		$this->nacionalidade = $nacionalidade;
		$this->v_o_endereco = $v_o_endereco;
		$this->v_o_contato = $v_o_contato;
		$this->v_o_documento = $v_o_documento;
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
	public function getSexo() {
		return $this->sexo;
	}
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	public function getEstadoCivil() {
		return $this->estadoCivil;
	}
	public function setEstadoCivil($estadoCivil) {
		$this->estadoCivil = $estadoCivil;
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
	public function getVOEndereco() {
		return $this->v_o_endereco;
	}
	public function setVOEndereco($v_o_endereco) {
		$this->v_o_endereco = $v_o_endereco;
	}
	public function getVOContato() {
		return $this->v_o_contato;
	}
	public function setVOContato($v_o_contato) {
		$this->v_o_contato = $v_o_contato;
	}
	public function getVODocumento() {
		return $this->v_o_documento;
	}
	public function setVODocumento($v_o_documento) {
		$this->v_o_documento = $v_o_documento;
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
		return "Pessoa [id=" . $this->id . ", nome=" . $this->nome . ", cpf=" . $this->cpf . ", data nascimento=" . $this->dataNascimento . ", estado civil=" . $this->estadoCivil . ", sexo=" . $this->sexo . ", nome do pai=" . $this->nomePai . ", nome da mae=" . $this->nomeMae . ", cor= " . $this->enum_cor. ", naturalidade=" . $this->naturalidade . ", nacionalidade= " . $this->nacionalidade . ", " . $this->dataCadastro . ", data atualizacao=" . $this->dataAtualizacao . "]";
	}
	public function jsonSerialize() {
		return array( 
			   	'id' => $this->id,
				'nome' => $this->nome,
				'cpf' => $this->cpf,
				'dataNascimento' => $this->dataNascimento,
				'estadoCivil' => $this->estadoCivil,
				'sexo' => $this->sexo,
				'nomePai' => $this->nomePai,
				'nomeMae' => $this->nomeMae,
				'enum_cor' => $this->enum_cor,
				'naturalidaed' => $this->naturalidade,
				'nacionalidade' => $this->nacionalidade,
				'dataCadastro' => $this->dataCadastro,
				'dataAtualizacao' => $this->dataAtualizacao
		         );
		
	}

}
?>