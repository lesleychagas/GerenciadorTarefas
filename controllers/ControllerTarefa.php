<?php

include "./dao/DaoTarefa.php";

class ControllerTarefa {
    private DaoTarefa $daoTarefa;

    public function __construct()
    {
        $this->daoTarefa = new DaoTarefa();
    }

    public function cadastrar():void{
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $responsavel = $_POST['id_responsavel'];

            if(!empty($descricao) && !empty($descricao) && !empty($responsavel)) {

                //$responsavel = $this->daoResponsavel->buscaResponsavel($id);
                $responsavel = new Responsavel(1, "Rafael");

                $tarefa = new Tarefas(null, $titulo, $descricao, $responsavel);
            
                if($this->daoTarefa->inserir($tarefa)) {
                    header("Location: ListarTarefas.php?sucesso=1");
                    exit;
                }
            } else {
                header("Location: cadastrarTarefa.php?erro=1");
                exit;
            }
        } else {
            header("Location: cadastrarTarefa.php?erro=1");
            exit;
        }
    }
    
    /*
    public function listar():array{
        return $this->daoTarefa->listarTodas();
    }
    */
}