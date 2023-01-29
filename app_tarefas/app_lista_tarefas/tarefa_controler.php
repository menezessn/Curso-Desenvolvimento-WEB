<?php
    
    require_once '../../app_lista_tarefas/tarefa.model.php';
    require_once '../../app_lista_tarefas/tarefa.service.php';
    require_once '../../app_lista_tarefas/conexao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'create'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->create();
        header('Location: nova_tarefa.php?inclusao=1');
    } else if ($acao == 'read'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->read();
    } else if($acao=='update'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);
        
        $conexao = new Conexao();

        $update = new TarefaService($conexao, $tarefa);
        if($update->update()){
            if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('Location:index.php');
            } else{
                header('Location:todas_tarefas.php');
            }
        }
    } else if ($acao == 'delete'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        
        $conexao = new Conexao();

        $delete = new TarefaService($conexao, $tarefa);
        if($delete->delete()){
            if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('Location:index.php');
            } else{
                header('Location:todas_tarefas.php');
            }
        }
    } else if ($acao== 'realized'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);
        
        $conexao = new Conexao();

        $realized = new TarefaService($conexao, $tarefa);
        if($realized->realized()){
            if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('Location:index.php');
            } else{
                header('Location:todas_tarefas.php');
            }
        }
    } else if ($acao == 'readPendent'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->readPendent();
    }
?>