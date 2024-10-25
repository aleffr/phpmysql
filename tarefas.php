<?php session_start();
include "banco.php";

?>
<html>
    <head>
        <title><?php echo date('d'); ?></title>
        <link rel="stylesheet"  type="text/css" media="screen" href="assests/css/main.css">
        <script src="assests/js/main.js"></script>
    </head>
        <body>
            <h1>Gerenciador de Tarefas</h1>
            <form>
                <fieldset>
                    <legend>Nova Tarefa</legend>
                    
                    <label>Tarefa:</label>
                    <p>
                        <input type="text" name="nome" id="nome"/>
                    </p>
                    
                    <br/>

                    <label>Observação: </label>
                    <p>
                        <textarea name="observacao" id="observacao"></textarea>
                        </p>

                    <fieldset>
                        <legend>Categoria da Tarefa</legend>
                    <p>
                    <label>
                        Categoria:
                        <input type="radio" name="categoria" value="1"/>Prioridade
                        <input type="radio" name="categoria" value="0"/>Normal
                    
                    </label>
                    </p>
                    </fieldset>
                    <br/>
                    <button type="submit" class="btnSalvar">Cadastrar</button> 
                </fieldset>
            </form>

            <?php 

          
     

               
                if(isset($_GET['nome']) && isset($_GET['observacao']) && isset($_GET['categoria']) ){

                    $tarefa = array('nome' =>$_GET['nome'], 'observacao' =>$_GET['observacao'], 'categoria' =>$_GET['categoria']); 
                    gravar_tarefas($conexao, $tarefa);
                 
                    
                }     

                $lista_tarefas = buscar_tarefas($conexao);

            ?>
            <table>
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Observação</th>
                  <th>Categoria</th>
                  <th>Excluir</th>
                  <th>Finalizar<th>
                </tr>
                <?php foreach ($lista_tarefas as $tarefa):?>
                        <tr>
                            <td><?php echo $tarefa['id'];?></td>   
                            <td><?php echo $tarefa['nome'];?></td>
                            <td><?php echo $tarefa['observacao'];?></td>
                            <td><?php if ($tarefa['tp_categoria']){
                                echo "Prioridade";
                            }else{
                                echo "Normal";
                            }?>
                            
                            </td>
                            <td><a href="#">Excluir</a></td>
                            <td>
                                    <?php if($tarefa['fl_concluida']){
                                         echo "<b>Finalizada</b>";
                                    }else{ ?>
                                        <a href="<?php echo ""?>">Finalizar</a></td>
                                    <?php } ?>
                            
                            
                            
                        </tr>
            <?php endforeach; ?> 
            </table>
        </body>
    </html>

    <?php
    
    function buscar_tarefas($conexao){

        $sql = "SELECT * FROM tb_tarefas";
        $resultado = mysqli_query($conexao,$sql);
        $tarefas = array();

        while($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }

        return $tarefas;
    }
    
    function gravar_tarefas($conexao, $tarefa){
        $sqlInsert = "INSERT INTO tb_tarefas (nome, observacao, tp_categoria) VALUES ( '{$tarefa['nome']}', '{$tarefa['observacao']}', '{$tarefa['categoria']}')";
        mysqli_query($conexao,$sqlInsert);
        echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=tarefas.php'>";
    }

    function remover_tarefas($tarefa){

        print_r($tarefa);
        die;

        $sqlRemover = "";
        mysqli_query($conexao, $sqlRemover);
    }
    
    
    function finalizarTarefa(){

    }

    ?>