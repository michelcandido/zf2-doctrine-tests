<?php
/**
 * Michel Candido (http://michelcandido.com.br/)
 * 
 * @license http://pt.wikipedia.org/wiki/Licença_BSD Licença BSD
 * @version GIT: <git_id>
 * @link    http://github.com/michelcandido/
 */

namespace Application\Entity;


/**
 * @ORM\Entity()
 * @ORM\Table(name="categoria")
 */
class Categoria extends CoreEntity {
    
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=false)
     */
    protected $descricao;
    
    /**
     *
     * @var boolean
     */
    protected $ativo = true;
    /**
     * 
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * 
     * @param integer $id
     * @return \Application\Entity\Categoria
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * 
     * @param string $descricao
     * @return \Application\Entity\Categoria
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }
    
    /**
     * 
     * @return boolean
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * 
     * @param boolean $ativo
     * @return \Application\Entity\Categoria
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;
        return $this;
    }




}
