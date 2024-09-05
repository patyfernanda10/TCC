
<div class="main-content">
<div class="container">
    <div id="gestao-animais" class="section">
        <h2>Registrar Novo Animal</h2>

        <button class="botao-cadastrar" id="abrir-form-cadastro">+</button>

        
        <div id="form-overlay" class="form-overlay">
            <div class="form-content">
                <h3>Informações Básicas</h3>
               
 <form id="form-animal" action="../BancoDeDados/bancoAnimais.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="animal-id" name="id">

                <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="especie">Espécie:</label>
            <select id="especie" name="especie" required>
                <option value="Cão">Cão</option>
                <option value="Gato">Gato</option>
            </select>
            
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca">
            
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>
            
            <label>Sexo:</label>
            <select id="genero" name="genero" required>
                <option value="Cão">Macho</option>
                <option value="Gato">Fêmea</option>
            </select>
            
            <h3>Saúde</h3>

            <input type="checkbox" id="tratamento-castracao" name="tratamentos[]" value="castracao" onchange="mostrarDetalhes(this)">
            <label for="tratamento-castracao">Castração</label>
            <div class="detalhes-tratamento" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_tratamento_castracao">
                <label>Local:</label>
                <input type="text" name="local_tratamento_castracao">
                <label>Status:</label>
                
            </div>
        </div>
        <div>
            
    <div id="vacinas-section">
        <div>
            <input type="checkbox" id="vacina-v8" name="vacinas[]" value="v8" onchange="mostrarDetalhes(this)">
            <label for="vacina-v8">V8/V10 (cães)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_v8">
                <label>Local:</label>
                <input type="text" name="local_vacina_v8">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-antirrabica" name="vacinas[]" value="antirrabica" onchange="mostrarDetalhes(this)">
            <label for="vacina-antirrabica">Antirrábica</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_antirrabica">
                <label>Local:</label>
                <input type="text" name="local_vacina_antirrabica">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-gripe" name="vacinas[]" value="gripe" onchange="mostrarDetalhes(this)">
            <label for="vacina-gripe">Gripe Canina (Cães)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_gripe">
                <label>Local:</label>
                <input type="text" name="local_vacina_gripe">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-giardia" name="vacinas[]" value="giardia" onchange="mostrarDetalhes(this)">
            <label for="vacina-giardia">Giárdia (Cães)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_giardia">
                <label>Local:</label>
                <input type="text" name="local_vacina_giardia">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-leishmaniose" name="vacinas[]" value="leishmaniose" onchange="mostrarDetalhes(this)">
            <label for="vacina-leishmaniose">Leishmaniose (Cães)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_leishmaniose">
                <label>Local:</label>
                <input type="text" name="local_vacina_leishmaniose">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-triplice" name="vacinas[]" value="triplice" onchange="mostrarDetalhes(this)">
            <label for="vacina-triplice">Tríplice (Gatos)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_triplice">
                <label>Local:</label>
                <input type="text" name="local_vacina_triplice">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-quintupla" name="vacinas[]" value="quintupla" onchange="mostrarDetalhes(this)">
            <label for="vacina-quintupla">Quíntupla (Gatos)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_quintupla">
                <label>Local:</label>
                <input type="text" name="local_vacina_quintupla">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-leucemia" name="vacinas[]" value="leucemia" onchange="mostrarDetalhes(this)">
            <label for="vacina-leucemia">Leucemia (Gatos)</label>
            <div class="detalhes-vacina" style="display:none;">
                <label>Data:</label>
                <input type="date" name="data_vacina_leucemia">
                <label>Local:</label>
                <input type="text" name="local_vacina_leucemia">
            </div>
        </div>
        <div>
            <input type="checkbox" id="vacina-outras" name="vacinas[]" value="outras" onchange="mostrarDetalhes(this)">
            <label for="vacina-outras">Outras</label>
            
            <div class="detalhes-vacina" style="display:none;">
                <label>Nome da vacina:</label>
                <input type="text" id="vacinas-outras" name="vacinas-outras" placeholder="Especificar outras vacinas">
                <label>Data:</label>
                <input type="date" name="data_vacina_outras">
                <label>Local:</label>
                <input type="text" name="local_vacina_outras">
               
            </div>
        </div>
    </div>
    <p></p>
            
            <label for="consultas">Consultas:</label>
            <div id="consultas-section">
                <div class="consulta-item">
                    <input type="date" name="consulta_data[]">
                    <textarea name="consulta_descricao[]" placeholder="Descrição da consulta"></textarea>
                    <select name="consulta_status[]">
                        <option value="pendente">Pendente</option>
                        <option value="realizada">Realizada</option>
                    </select>
                    <button class="botao-remover" type="button" onclick="removerItem(this)">Remover</button>
                    <button class="botao-adicionar" type="button" onclick="adicionarItem('consultas-section')">Adicionar Consulta</button>
                </div>
            </div>


            <h3>Histórico de Resgate</h3>

            <label for="data-resgate">Data do Resgate:</label>
            <input type="date" id="data-resgate" name="data-resgate" required>

            <label for="local-resgate">Local do Resgate:</label>
            <input type="text" id="local-resgate" name="local-resgate">

            <label for="circunstancia-resgate">Circunstâncias do Resgate:</label>
            <textarea id="circunstancia-resgate" name="circunstancia-resgate" rows="3"></textarea>

            <h3>Status Adoção</h3>

            <label for="status-adocao">Status de Adoção:</label>
            <select id="status-adocao" name="status-adocao" required>
                <option value="Disponível">Disponível</option>
                <option value="Adotado">Adotado</option>
                <option value="Em processo de adoção">Em processo de adoção</option>
            </select>
                
            <h3>Fotos do Animal</h3>

                    <label for="fotos">Fotos do Animal:</label><br>
                    <input type="file" id="fotos" name="fotos"><br>
                    <img id="foto-existente" src="" alt="Foto do Animal" style="max-width: 100px; display: none;"><br>
                
                    <button type="submit" name="submit">Cadastrar Animal</button>
                    <button type="button" id="fechar-form-cadastro">Fechar</button>
                </form>
                

                <script>
                    function mostrarDetalhes(checkbox) {
                        const detalhesDiv = checkbox.nextElementSibling.nextElementSibling;
                        if (checkbox.checked) {
                            detalhesDiv.style.display = 'block';
                        } else {
                            detalhesDiv.style.display = 'none';
                        }
                    }
                </script>

                <script>
                    function mostrarOutroCampo(campo) {
                        var checkbox = document.getElementById(campo + '-outros');
                        var inputOutros = document.getElementById(campo + '-outros');
                
                        if (checkbox.checked) {
                            inputOutros.style.display = 'block';
                        } else {
                            inputOutros.style.display = 'none';
                        }
                    }
                </script>
                
                <script>
                    function adicionarItem(sectionId) {
                    // Seleciona a seção de consultas
                    const section = document.getElementById(sectionId);
                    
                    // Cria um novo elemento de consulta
                    const newConsultaItem = document.createElement('div');
                    newConsultaItem.className = 'consulta-item';

                    // Define o conteúdo HTML do novo elemento de consulta
                    newConsultaItem.innerHTML = `
                        <input type="date" name="consulta_data[]">
                        <textarea name="consulta_descricao[]" placeholder="Descrição da consulta"></textarea>
                        <select name="consulta_status[]">
                            <option value="pendente">Pendente</option>
                            <option value="realizada">Realizada</option>
                        </select>
                        <button type="button" onclick="removerItem(this)">Remover</button>
                        <button type="button" onclick="adicionarItem('consultas-section')">Adicionar Consulta</button>
                    `;

                    // Adiciona o novo elemento de consulta à seção
                    section.appendChild(newConsultaItem);
                }

                function removerItem(button) {
                    // Remove o item de consulta correspondente
                    const consultaItem = button.parentElement;
                    consultaItem.remove();
                }

                </script>
            </div>
        </div>

        <hr>
    

<?php
    // Conectar ao banco de dados
    include_once('../BancoDeDados/conexao.php');

    // Consultar os dados dos animais cadastrados
    $query = "SELECT * FROM animais";
    $resultado = mysqli_query($conexao, $query);
    mysqli_close($conexao);
?>

<h3>Animais Cadastrados</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Idade</th>
        <th>Status de Adoção</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        
    <?php   
 if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre os resultados e preencher as linhas da tabela
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['especie']) . "</td>";
        echo "<td>" . htmlspecialchars($row['idade']) . "</td>";
        echo "<td>" . htmlspecialchars($row['status_adocao']) . "</td>";
      
        echo "<td>
        <a href='ficha-animal.php?id=" . $row['id'] . "' class='ver-link'></a>
        <button class='ver-botao' data-id='" . $row['id'] . "'>Ver</button>
        <button class='excluir' data-id='" . $row['id'] . "'>Excluir</button>
      </td>";

    }
} else {
    echo "<tr><td colspan='10'>Nenhum resgate cadastrado.</td></tr>";
}
?>
</tbody>
</table>


<script>
//link do botão "Ver"
document.querySelectorAll('.ver-botao').forEach(button => {
    button.addEventListener('click', function() {
        const link = this.previousElementSibling;
        if (link && link.classList.contains('ver-link')) {
            window.location.href = link.href;
        }
    });
});
</script>

<script>
//função excluir do botão "Excluir"
    document.addEventListener('DOMContentLoaded', function() {
    const botoesExcluir = document.querySelectorAll('.excluir');

    botoesExcluir.forEach(botao => {
        botao.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            if(confirm('Tem certeza que deseja excluir este animal?')) {
                fetch('../BancoDeDados/excluirAnimal.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload(); // Recarrega a página para atualizar a tabela
                });
            }
        });
    });
});
</script>
    
<script>
//função para botões abrir e fechar
     document.getElementById('abrir-form-cadastro').addEventListener('click', function() {
     document.getElementById('form-overlay').style.display = 'block';
    });

    document.getElementById('fechar-form-cadastro').addEventListener('click', function() {
    document.getElementById('form-overlay').style.display = 'none';
     });
 </script>

    </div>
</div>
</div>


<style>

    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    display: flex;
}
    .form-overlay {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    border: 1px solid #ccc;
    padding: 40px;
    z-index: 1000;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    max-height: 80vh; 
    overflow-y: auto;
    border-radius: 20px;
}
.form-overlay.active {
    display: block;
}
.form-overlay::-webkit-scrollbar {
    width: 12px; 
    border-radius: 10px; 
}
.overlay-background {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}
.overlay-background.active {
    display: block;
}
h2 {
    font-size: 28px;
    color: #555;
    margin-bottom: 20px;
}
h3 {
    font-size: 24px;
    color: #555;
    margin-bottom: 15px;
}
label {
    font-weight: bold;
    color: #333;
}
input[type="text"],
input[type="number"],
input[type="date"],
input[type="email"],
textarea,
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}
input[type="file"] {
    margin-bottom: 15px;
}
button {
    background-color: #6db9ff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}
button:hover {
    background-color: #6db9ff;
}

table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    thead {
        background-color: #6db9ff;
        color: white;
    }

    th, td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd; /* Borda inferior */
    }

    th {
        background-color: #6db9ff;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e9f4ff;
    }

    button.editar, button.excluir {
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

   /* Estilo para o botão 'Ver' */
.ver-botao {
    background-color: #003366; /* Azul escuro */
    color: white;
    border: none;
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    text-align: center;
    transition: background-color 0.3s ease;
}

/* Estilo para o botão 'Ver' quando passa o mouse */
.ver-botao:hover {
    background-color: #002244; /* Azul ainda mais escuro */
}

/* Ocultar o link que está dentro do botão */
.ver-link {
    display: none;
}

    button.editar {
        background-color: #4CAF50;
        color: white;
    }

    button.editar:hover {
        background-color: #45a049;
    }

    button.excluir {
        background-color: #f44336;
        color: white;
    }

    button.excluir:hover {
        background-color: #e53935;
    }

    table, th, td {
        border: 1px solid #ddd; /* Cor da borda alterada para cinza claro */
    }


.botao-adicionar, .botao-remover {
  background: #6db9ff; /* Cor de fundo azul */
  border: none; /* Sem borda */
  color: #fff; /* Texto branco */
  padding: 5px 10px; /* Espaçamento interno */
  border-radius: 5px; /* Bordas arredondadas */
  cursor: pointer; /* Cursor em forma de mão ao passar sobre o botão */
  margin-right: 5px; /* Espaçamento à direita */
}
/* Botão Cadastrar Animal */
.botao-cadastrar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px; /* Ajuste a largura conforme necessário */
    height: 80px; /* Ajuste a altura conforme necessário */
    background: none;
    border: 2px solid #6db9ff; /* Cor da borda */
    border-radius: 8px; /* Cantos arredondados */
    font-size: 24px; /* Tamanho da fonte */
    color: #6db9ff; /* Cor do texto */
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease; /* Transição suave para hover */
    text-align: center;
    line-height: 1.2;
    position: relative;
}

.botao-cadastrar::before {
    content: '+';
    font-size: 48px; /* Tamanho do símbolo de mais */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.botao-cadastrar:hover {
    background: #6db9ff; /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
    border-color: #6db9ff; /* Cor da borda ao passar o mouse */
}


</style>
