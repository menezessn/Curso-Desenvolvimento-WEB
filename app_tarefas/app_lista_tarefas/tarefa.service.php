<?php

class TarefaService{
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }
    public function create(){
        $query = 'INSERT INTO tb_tarefas (tarefa) VALUES (:tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();
    }
    public function read(){
        $query = 'SELECT 
                    t.id, t.tarefa, s.status
                    FROM 
                    tb_tarefas AS t LEFT JOIN tb_status AS s ON (t.id_status = s.id)
                    ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update(){
        $query = 'UPDATE tb_tarefas SET tarefa = :tarefa WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function delete(){
        $query = 'DELETE FROM tb_tarefas WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function realized(){
        $query = 'UPDATE tb_tarefas SET id_status = :id_status WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function readPendent(){
        $query = 'SELECT 
                    t.id, t.tarefa, s.status
                    FROM 
                    tb_tarefas AS t LEFT JOIN tb_status AS s ON (t.id_status = s.id)
                    WHERE
                    t.id_status=1
                    ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>