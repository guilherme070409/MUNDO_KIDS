<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../fotos_de_perfil/fotos.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Painel Admin</title> 
</head>
<body>
    
<?php
session_start();
require_once '../../service/conexao.php'; 
require_once '../../model/videos.php';  

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$nome_categoria = $_GET['categoria']  ?? "Todos";


if ($nome_categoria != "Todos") {
    $lista_videos = videos::listarPorNomeCategoria($pdo, $nome_categoria);
} else {
    
    $lista_videos = videos :: listar($pdo); // nenhum vídeo se não houver categoria

}
if(isset($_POST['id'])){
    $id = (int)$_POST['id'];
    $resultado = videos::deletar($pdo, $id);

    if($resultado){
        header("Location: index.php?categoria=" . urlencode($nome_categoria));
        exit;
    } else {
        echo "Erro ao deletar o vídeo.";
    }
}

?>
    <!-- Barra lateral (menu principal) -->
    <nav class="barra-lateral fechada">
        <header>
            <!-- Logo e texto do topo da barra lateral -->
            <div class="imagem-texto">
                <span class="imagem">
                    <img src="../fotos_de_perfil/Patrick.png" alt="">
                </span>

                <div class="texto texto-logo">
                    <span class="nome"><?php echo isset($_SESSION['admin_nome']) ? htmlspecialchars($_SESSION['admin_nome']) : 'admin'; ?></span>
                    <span class="profissao"><?php echo isset($_SESSION['admin_cargo']) ? htmlspecialchars($_SESSION['admin_cargo']) : 'admin';?></span>
                </div>
            </div>

            <!-- Botão para abrir/fechar a barra lateral -->
            <i class='bx bx-chevron-right alternar'></i>
        </header>

        <!-- Área rolável com navegação, pesquisa e modo -->
        <div class="barra-menu">
            <div class="menu">

                <!-- Caixa de pesquisa (somente visual) -->
                <li class="caixa-pesquisa">
                    <i class='bx bx-search icone'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="links-menu">
                    <!-- Links de navegação entre seções -->
                    <li class="link-nav">
                        <a href="#videos" data-target="videos" class="active">
                            <i class='bx bx-home-alt icone' ></i>
                            <span class="texto">Videos</span>
                        </a>
                    </li>

                    <li class="link-nav">
                        <a href="#assinaturas" data-target="assinaturas">
                            <i class='bx bx-bar-chart-alt-2 icone' ></i>
                            <span class="texto">Assinaturas</span>
                        </a>
                    </li>

                    <li class="link-nav">
                        <a href="#">
                            <i class='bx bx-bell icone'></i>
                            <span class="texto">Curtidas</span>
                        </a>
                    </li>

                    <li class="link-nav">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icone' ></i>
                            <span class="texto">Playlists</span>
                        </a>
                    </li>

                    <li class="link-nav">
                        <a href="#">
                            <i class='bx bx-heart icone' ></i>
                            <span class="texto">visualizações</span>
                        </a>
                    </li>

                    <li class="link-nav">
                        <a href="#">
                            <i class='bx bx-wallet icone' ></i>
                            <span class="texto">Publicações</span>
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Parte inferior: Logout e alternância de tema -->
            <div class="conteudo-inferior">
                <li>
                    <a href="#">
                        <i class='bx bx-log-out icone' ></i>
                        <span class="texto">Logout</span>
                    </a>
                </li>

                <li class="modo">
                    <div class="sol-lua">
                        <i class='bx bx-moon icone lua'></i>
                        <i class='bx bx-sun icone sol'></i>
                    </div>
                    <span class="texto-modo texto">Dark mode</span>

                    <div class="interruptor">
                        <span class="chave"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <!-- Seção: Vídeos -->
     
    <section class="inicio secao" id="section-videos">
        <div class="texto">Videos</div>
        <div class="conteudo">
            <!-- Filtros por categoria (somente visual) -->
            <div class="categorias-video" role="tablist" aria-label="Categorias de vídeos">
                <button class="etiqueta ativo" data-category="all" role="tab" aria-selected="true">Todas</button>
                <button class="etiqueta" data-category="animacoes">Animaçoes</button>
                <button class="etiqueta" data-category="filmes infantis">filmes infantis</button>
                <button class="etiqueta" data-category="aventuras">aventuras</button>
                <button class="etiqueta" data-category="comedia e humor">Comedia e humor</button>
                <button class="etiqueta" data-category="mundo da imaginacao">Mundo da imaginação</button>
            </div>
            <!-- Barra de ações dos vídeos -->
            <div class="barra-videos">
                <div class="esquerda">
                    <button class="botao primario" id="open-new-video">
                        <i class='bx bx-plus'></i>
                        Novo vídeo
                    </button>
                </div>
                
</div>
            
            <div class="videos-container">            

            <!-- Grade de cartões de vídeos -->
            <div class="grade-videos">
                <?php if (!empty($lista_videos) && is_array($lista_videos)): ?>
                  <?php foreach($lista_videos as $video): ?>
                <!-- Card único (exemplo) -->
                <article class="cartao-video" data-category="<?php echo htmlspecialchars($video['nome_da_categoria']); ?>">
                    <div class="miniatura">
                        <div class="selo"><?php echo htmlspecialchars($video['nome_da_categoria']); ?></div>
                         <iframe src="<?php echo htmlspecialchars($video['url']); ?>" 
                    title="<?php echo htmlspecialchars($video['titulo']); ?>" 
                    allowfullscreen>
            </iframe>
                        <div class="duracao">12:47</div>
                    </div>
                    <div class="meta">
                        <h3 class="titulo"><?php echo htmlspecialchars($video['titulo']); ?>                                        </h3>
                        <p class="descricao">Passo a passo para construir um sidebar com tema claro/escuro.</p>
                        <div class="estatisticas">
                            <span><i class='bx bx-show'></i> 1.2k</span>
                            <span><i class='bx bx-like'></i> 214</span>
                            <span><i class='bx bx-comment'></i> 18</span>
                        </div>
                        
        </div>
                    <div class="acoes">
                         <form method="post" action="">
<button type="button" class="btn-editar"
        data-id="<?php echo $video['ID']; ?>"
        data-titulo="<?php echo $video['titulo']; ?>"
        data-url="<?php echo $video['url']; ?>"
        data-thumbnail="<?php echo $video['thumbnail']; ?>"
        data-descricao="<?php echo $video['descricao']; ?>">
    Editar
</button>
                        <button class="botao fantasma" disabled><i class='bx bx-link'></i> Copiar link</button>
                         <input type="hidden" name="id" value="<?php echo $video['ID']; ?>">
                        <button class="botao perigo" type="submit" onclick="return confirm('Deseja realmente deletar este vídeo?')" ><i class='bx bx-trash'></i> Excluir</button>
                    </div>
                </article>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Nenhum vídeo encontrado para esta categoria.</p>
            <?php endif; ?>
    </section>

    <!-- Seção: Assinaturas -->
    <section class="inicio secao" id="section-assinaturas" style="display:none;">
        <div class="texto">Assinaturas</div>
        <div class="conteudo">
            <!-- Cartões de indicadores (KPI) -->
            <div class="grade-kpi">
                <div class="cartao-kpi">
                    <div class="titulo-kpi">Total assinantes</div>
                    <div class="valor-kpi" id="kpi-total">0</div>
                </div>
                <div class="cartao-kpi">
                    <div class="titulo-kpi">Ativos</div>
                    <div class="valor-kpi" id="kpi-ativos">0</div>
                </div>
                <div class="cartao-kpi">
                    <div class="titulo-kpi">Expirados</div>
                    <div class="valor-kpi" id="kpi-expirados">0</div>
                </div>
                <div class="cartao-kpi">
                    <div class="titulo-kpi">Vendas </div>
                    <div class="valor-kpi" id="kpi-mrr">R$ —</div>
                </div>
            </div>

            <!-- Filtros da tabela (somente visual) -->
            <form class="filtros" id="subs-filters">
                <div class="linha-filtros">
                    <div class="linha-form">
                        <label>Busca (usuário ou email)</label>
                        <input type="text" id="f-search" placeholder="ex: maria, @example.com">
                    </div>
                    <div class="linha-form">
                        <label>Status</label>
                        <select id="f-status">
                            <option value="all">Todos</option>
                            <option value="ativo">Ativo</option>
                            <option value="expirado">Expirado</option>
                        </select>
                    </div>
                    <div class="linha-form">
                        <label>Plano</label>
                        <select id="f-plano">
                            <option value="all">Todos</option>
                            <option value="mensal">Mensal</option>
                            <option value="anual">Anual</option>
                        </select>
                    </div>
                </div>
                <div class="acoes-filtros">
                    <button class="botao" id="f-clear" type="button"><i class='bx bx-x'></i> Limpar</button>
                    <button class="botao primario" id="f-apply" type="button"><i class='bx bx-filter-alt'></i> Aplicar</button>
                </div>
            </form>

            <!-- Barra superior da tabela -->
            <div class="barra-assinaturas">
                <div class="esquerda">
                    <button class="botao" disabled><i class='bx bx-filter'></i> Filtros</button>
                </div>
            </div>

            <!-- Tabela de assinaturas -->
            <div class="container-tabela">
                <table class="tabela-assinaturas" aria-label="Tabela de assinaturas">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Método de pagamento</th>
                            <th>Expira em</th>
                            <th>Plano</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-username="maria.s" data-email="maria.s@example.com" data-status="ativo" data-plan="anual" data-expira="2025-11-02">
                            <td>maria.s</td>
                            <td>maria.s@example.com</td>
                            <td><span class="selo-suave sucesso">Ativo</span></td>
                            <td>Cartão (Visa)</td>
                            <td>2025-11-02</td>
                            <td><span class="selo-suave informacao">Anual</span></td>
                            <td class="acoes-linha">
                                <button class="botao fantasma" disabled><i class='bx bx-user'></i> Ver</button>
                                <button class="botao perigo" disabled><i class='bx bx-block'></i> Cancelar</button>
                            </td>
                        </tr>
                        <tr data-username="ana.p" data-email="ana.p@example.com" data-status="expirado" data-plan="mensal" data-expira="2024-06-10">
                            <td>ana.p</td>
                            <td>ana.p@example.com</td>
                            <td><span class="selo-suave perigo">Expirado</span></td>
                            <td>Pix</td>
                            <td>2024-06-10</td>
                            <td><span class="selo-suave informacao">Mensal</span></td>
                            <td class="acoes-linha">
                                <button class="botao fantasma" disabled><i class='bx bx-user'></i> Ver</button>
                                <button class="botao perigo" disabled><i class='bx bx-block'></i> Cancelar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Paginação (visual) -->
            <div class="paginacao">
                <div class="esquerda">
                    <span id="pg-range"></span>
                </div>
                <div class="direita">
                    <button class="botao" id="pg-prev" type="button"><i class='bx bx-chevron-left'></i></button>
                    <button class="botao" id="pg-next" type="button"><i class='bx bx-chevron-right'></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal: Novo Vídeo (visual) -->
    <!-- Janela modal para criação de novo vídeo (somente visual) -->
  
    <div class="fundo-modal" id="modal-new-video" aria-hidden="true" role="dialog" aria-modal="true">
        <div class="modal">
            <div class="cabecalho-modal">
                <h3>Novo vídeo</h3>
                <button class="btn-icone" id="close-new-video" aria-label="Fechar">
                    <i class='bx bx-x'></i>
                </button>
            </div>
            <div class="corpo-modal">
                 <form method="POST" action="../../controller/Adicionar.php">
                    <div class="linha-form">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo"
                         placeholder="Ex: Meu vídeo incrível" />
                    </div>
                    <div class="linha-form">
                        <label for="link">URL do vídeo</label>
                        <input type="url" name="url" id="url" placeholder="https://..." />
                    </div>
                    <div class="grade-form">
                        <div class="linha-form">
                            <label>Categoria</label>
                            <select name="categoria" id="categoria">
                                <option value="1">Animaçoes</option>
                                <option value="2">filmes infantis</option>
                                <option value="3">aventuras</option>
                                <option value="4">Comedia e humor</option>
                                <option value="5">Mundo da imaginação</option>
                            </select>
                        </div>
                        <div class="linha-form">
                            <label for="capa">Thumbnail (URL)</label>
                            <input type="url" name="thumbnail" id="thumbnail" placeholder="https://.../thumb.jpg" />
                        </div>
                    </div>
                    <div class="linha-form">
                        <label for="descricao">descricao</label>
                        <textarea rows="4" name="descricao" id="descricao" placeholder="Breve descricao do vídeo..."></textarea>
                         <div class="rodape-modal">
                <button class="botao" id="cancel-new-video">Cancelar</button>
                <button type="submit" class="botao primario">Salvar</button>
            </div>
        </div>
    </div>
                    </div>
                </form>
            </div>
           <div class="fundo-modal" id="modal-edit-video" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal">
        <div class="cabecalho-modal">
            <h3>Editar vídeo</h3>
            <button class="btn-icone" id="close-edit-video" aria-label="Fechar">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div class="corpo-modal">
            <form method="POST" action="../../controller/Editar.php">
                <input type="hidden" name="id" id="edit-id">
                <div class="linha-form">
                    <label for="edit-titulo">Título</label>
                    <input type="text" name="titulo" id="edit-titulo"/>
                </div>

                <div class="linha-form">
                    <label for="edit-url">URL do vídeo</label>
                    <input type="url" name="url" id="edit-url"/>
                </div>

                <div class="grade-form">
                    <div class="linha-form">
                        <label for="edit-categoria">Categoria</label>
                        <select name="categoria_id" id="edit-categoria">
                            <option value='1'>Animaçoes</option>
                            <option value="2">filmes infantis</option>
                            <option value="3">aventuras</option>
                            <option value="4">Comedia e humor</option>
                            <option value="5">Mundo da imaginação</option>
                        </select>
                    </div>
                    <div class="linha-form">
                        <label for="edit-thumbnail">Thumbnail (URL)</label>
                        <input type="url" name="thumbnail" id="edit-thumbnail"/>
                    </div>
                </div>

                <div class="linha-form">
                    <label for="edit-descricao">Descrição</label>
                    <textarea rows="4" name="descricao" id="edit-descricao"></textarea>
                </div>

                <div class="rodape-modal">
                    <button class="botao" id="cancel-edit-video">Cancelar</button>
                    <button type="submit" class="botao primario">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <script src="script.js"></script>

</body>
</html>