<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">
      <link rel="stylesheet" href="../fotos_de_perfil/fotos.css">


      <title>MundoKids - Inicio</title>
   </head>
   <body>
    

<?php
session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'pessoa') {
    header('Location: login.php');
    exit();
}

?>
      <!--=============== HEADER ===============-->
      <header class="header" id="header">
         <div class="header__container">
            <a href="#" class="header__logo">
               <i class="ri-cloud-fill"></i>
               <span>MundoKids</span>
            </a>
            
            <button class="header__toggle" id="header-toggle">
               <i class="ri-menu-line"></i>
            </button>
         </div>
      </header>

      <!--=============== SIDEBAR ===============-->
      <nav class="sidebar" id="sidebar">
         <div class="sidebar__container">
            <div class="sidebar__user">
               <div class="sidebar__img">
                  <img id="user-img" src="../fotos_de_perfil/Patrick.png" alt="Foto de Perfil">
               </div>
   
               <div class="sidebar__info" an class="user-name"><?php echo isset($_SESSION['pessoa_nome']) ? htmlspecialchars($_SESSION['pessoa_nome']) : 'pessoa'; ?></span>
                  <span><br><?php echo isset($_SESSION['pessoa_email']) ? htmlspecialchars($_SESSION['pessoa_email']) : 'pessoa'; ?></span>
               </div>
            </div>

            <div class="sidebar__content">
               <div>
                  <h3 class="sidebar__title">Categorias</h3>

                  <div class="sidebar__list">
                     <a href="#" class="sidebar__link active-link" data-category="animacoes">
                        <i class="ri-film-fill"></i>
                        <span>Animações</span>
                     </a>
                     
                     <a href="#" class="sidebar__link" data-category="filmes-infantis">
                        <i class="ri-emotion-happy-fill"></i>
                        <span>Filmes Infantis</span>
                     </a>

                     <a href="#" class="sidebar__link" data-category="aventuras">
                        <i class="ri-compass-3-fill"></i>
                        <span>Aventuras</span>
                     </a>

                     <a href="#" class="sidebar__link" data-category="comedia">
                        <i class="ri-emotion-laugh-fill"></i>
                        <span>Comedia e Humor</span>
                     </a>

                     <a href="#" class="sidebar__link" data-category="imaginacao">
                        <i class="ri-rocket-fill"></i>
                        <span>Mundo da Imaginação</span>
                     </a>
                  </div>
               </div>

               <div>
                  <h3 class="sidebar__title">PRIVACIDADE</h3>

                  <div class="sidebar__list">
                     <a href="#" class="sidebar__link" data-privacy="perfil">
                        <i class="ri-user-3-fill"></i>
                        <span>Perfil</span>
                     </a>

                     <a href="#" class="sidebar__link" data-privacy="playlists">
                        <i class="ri-play-list-2-fill"></i>
                        <span>PlayLists</span>
                     </a>

                     <a href="#" class="sidebar__link" data-privacy="assistir-mais-tarde">
                        <i class="ri-time-fill"></i>
                        <span>Assistir mais tarde</span>
                     </a>
                     <a href="#" class="sidebar__link" data-privacy="videos-salvos">
                        <i class="ri-bookmark-fill"></i>
                        <span>Videos Salvos</span>
                     </a>
                     <a href="#" class="sidebar__link" data-privacy="videos-curtidos">
                        <i class="ri-heart-3-fill"></i>
                        <span>Videos Curtidos</span>
                     </a>
                  </div>
               </div>
            </div>

            <div class="sidebar__actions">
               <button>
                  <i class="ri-moon-clear-fill sidebar__link sidebar__theme" id="theme-button">
                     <span>Tema</span>
                  </i>
               </button>

               <button class="sidebar__link">
                  <i class="ri-logout-box-r-fill"></i>
                  <span>Saida</span>
               </button>
            </div>
         </div>
      </nav>

      <!--=============== MAIN ===============-->
      <main class="main container" id="main">
         <section class="categories" id="categories">
            <section class="category-section active" data-category="animacoes">
               <h2>Animações</h2>
               <div class="cards">
                  <article class="card" data-title="Toy Story" data-tags="pixar animacao brinquedos">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Toy Story</h3>
                     <p class="card__desc">Clássico da Pixar com Woody e Buzz.</p>
                  </article>
                  <article class="card" data-title="Como Treinar seu Dragão" data-tags="dreamworks dragao amizade animacao">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Como Treinar seu Dragão</h3>
                     <p class="card__desc">Amizade entre Soluço e Banguela.</p>
                  </article>
               </div>
            </section>
            
            <section class="category-section" data-category="filmes-infantis">
               <h2>Filmes Infantis</h2>
               <div class="cards">
                  <article class="card" data-title="Moana" data-tags="disney oceano ilha aventura">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Moana</h3>
                     <p class="card__desc">Aventura pelo oceano em busca de sua identidade.</p>
                  </article>
                  <article class="card" data-title="Frozen" data-tags="disney princesas neve irmas">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Frozen</h3>
                     <p class="card__desc">O laço entre irmãs transforma um reino.</p>
                  </article>
               </div>
            </section>

            <section class="category-section" data-category="aventuras">
               <h2>Aventuras</h2>
               <div class="cards">
                  <article class="card" data-title="Indiana Jones" data-tags="acao exploracao arqueologia aventura">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Indiana Jones</h3>
                     <p class="card__desc">Exploração e mistérios ao redor do mundo.</p>
                  </article>
                  <article class="card" data-title="Piratas do Caribe" data-tags="mar piratas aventura jack sparrow">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Piratas do Caribe</h3>
                     <p class="card__desc">Jack Sparrow em mares repletos de lendas.</p>
                  </article>
               </div>
            </section>

            <section class="category-section" data-category="comedia">
               <h2>Comedia e Humor</h2>
               <div class="cards">
                  <article class="card" data-title="As Branquelas" data-tags="comedia disfarce humor">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/SubaruOutbackOnStreetAndDirt.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">As Branquelas</h3>
                     <p class="card__desc">Disfarces e confusões hilárias.</p>
                  </article>
                  <article class="card" data-title="Todo Mundo em Pânico" data-tags="parodia comedia terror humor">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Todo Mundo em Pânico</h3>
                     <p class="card__desc">Paródia dos clássicos de terror.</p>
                  </article>
               </div>
            </section>

            <section class="category-section" data-category="imaginacao">
               <h2>Mundo da Imaginação</h2>
               <div class="cards">
                  <article class="card" data-title="Interestelar" data-tags="espaco ciencia ficcao viagem no tempo">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/WeAreGoingOnBullrun.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Interestelar</h3>
                     <p class="card__desc">Jornada pelo espaço e pelo tempo.</p>
                  </article>
                  <article class="card" data-title="Harry Potter" data-tags="magia fantasia escola bruxos">
                     <div class="card__video-wrapper">
                        <video class="card__video" controls preload="metadata" poster="MundoKids.png">
                           <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4" type="video/mp4">
                           Seu navegador não suporta vídeo HTML5.
                        </video>
                     </div>
                     <h3 class="card__title">Harry Potter</h3>
                     <p class="card__desc">Um mundo mágico repleto de possibilidades.</p>
                  </article>
               </div>
            </section>
         </section>

         <section class="privacy" id="privacy" style="display:none;">
            <section class="privacy-section" data-privacy="perfil" style="display:none;">
               <h2>Perfil</h2>
               <div class="profile-card">
                  <div class="profile__header">
                     <div class="profile__cover"></div>
                     <div class="profile__avatar">
                        <img id="profile-photo-preview" src="assets/img/perfil.png" alt="Foto de perfil">
                     </div>
                     <div class="profile__identity">
                        <h3 class="profile__name">Kayo Hipolito</h3>
                        <p class="profile__email">kayohipolito2018@hotmail.com</p>
                     </div>
                  </div>

                  <form id="profile-form" class="profile__form">
                     <div class="profile__row input-group">
                        <label for="fullName">Nome completo</label>
                        <i class="ri-user-3-line input-icon"></i>
                        <input id="fullName" name="fullName" type="text" placeholder="Seu nome completo" required disabled>
                     </div>
                     <div class="profile__row input-group">
                        <label for="fatherName">Nome do Pai</label>
                        <i class="ri-user-smile-line input-icon"></i>
                        <input id="fatherName" name="fatherName" type="text" placeholder="Nome do pai" disabled>
                     </div>
                     <div class="profile__row input-group">
                        <label for="motherName">Nome da Mãe</label>
                        <i class="ri-user-heart-line input-icon"></i>
                        <input id="motherName" name="motherName" type="text" placeholder="Nome da mãe" disabled>
                     </div>
                     <div class="profile__row input-group">
                        <label for="email">Email</label>
                        <i class="ri-mail-line input-icon"></i>
                        <input id="email" name="email" type="email" placeholder="seu@email.com" required disabled>
                     </div>
                     <div class="profile__row input-group">
                        <label for="phone">Telefone</label>
                        <i class="ri-phone-line input-icon"></i>
                        <input id="phone" name="phone" type="tel" placeholder="(00) 00000-0000">
                     </div>
                     <div class="profile__row input-group">
                        <label for="birthDate">Data de nascimento</label>
                        <i class="ri-calendar-line input-icon"></i>
                        <input id="birthDate" name="birthDate" type="date" required>
                     </div>
                     <div class="profile__actions">
                        <button type="submit" class="button"><i class="ri-save-3-fill"></i> Salvar</button>
                     </div>
                  </form>
               </div>
            </section>

            <section class="privacy-section" data-privacy="playlists" style="display:none;">
               <h2>Playlists</h2>
               <div class="cards cards--grid">
                  <article class="card list-card" data-list-key="playlist">
                     <div class="card__thumb">🎵</div>
                     <h3 class="card__title">Minhas Playlists</h3>
                     <p class="card__desc">Ver todos os vídeos das suas playlists.</p>
                  </article>
               </div>
            </section>

            <section class="privacy-section" data-privacy="assistir-mais-tarde" style="display:none;">
               <h2>Assistir mais tarde</h2>
               <div class="cards cards--grid">
                  <article class="card list-card" data-list-key="later">
                     <div class="card__thumb">⏰</div>
                     <h3 class="card__title">Assistir mais tarde</h3>
                     <p class="card__desc">Abra a lista para ver todos.</p>
                  </article>
               </div>
            </section>

            <section class="privacy-section" data-privacy="videos-salvos" style="display:none;">
               <h2>Vídeos salvos</h2>
               <div class="cards cards--grid">
                  <article class="card list-card" data-list-key="saved">
                     <div class="card__thumb">🔖</div>
                     <h3 class="card__title">Vídeos salvos</h3>
                     <p class="card__desc">Abra para ver seus marcados.</p>
                  </article>
               </div>
            </section>

            <section class="privacy-section" data-privacy="videos-curtidos" style="display:none;">
               <h2>Vídeos curtidos</h2>
               <div class="cards cards--grid">
                  <article class="card list-card" data-list-key="likes">
                     <div class="card__thumb">❤️</div>
                     <h3 class="card__title">Vídeos curtidos</h3>
                     <p class="card__desc">Veja tudo que você curtiu.</p>
                  </article>
               </div>
            </section>
         </section>
      </main>
      
      <!--=============== VIDEO MODAL ===============-->
      <div class="video-modal" id="video-modal" aria-hidden="true">
         <div class="video-modal__backdrop" id="video-modal-backdrop"></div>
         <div class="video-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="video-modal-title">
            <button class="video-modal__close" id="video-modal-close" aria-label="Fechar">
               <i class="ri-close-fill"></i>
            </button>
            <div class="video-modal__header">
               <h3 class="video-modal__title" id="video-modal-title">Título do Vídeo</h3>
            </div>
            <div class="video-modal__player">
               <video id="video-modal-player" controls preload="metadata">
                  <source id="video-modal-source" src="" type="video/mp4">
               </video>
            </div>
            <div class="video-modal__actions">
               <button class="action-btn" id="action-like" title="Curtir">
                  <i class="ri-heart-3-fill"></i>
                  <span>Curtir</span>
               </button>
               <button class="action-btn" id="action-playlist" title="Adicionar à playlist">
                  <i class="ri-play-list-2-fill"></i>
                  <span>Playlist</span>
               </button>
               <button class="action-btn" id="action-later" title="Assistir mais tarde">
                  <i class="ri-time-fill"></i>
                  <span>Mais tarde</span>
               </button>
               <button class="action-btn" id="action-save" title="Salvar vídeo">
                  <i class="ri-bookmark-fill"></i>
                  <span>Salvar</span>
               </button>
            </div>
         </div>
      </div>

      <!--=============== LIST MODAL ===============-->
      <div class="list-modal" id="list-modal" aria-hidden="true">
         <div class="list-modal__backdrop" id="list-modal-backdrop"></div>
         <div class="list-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="list-modal-title">
            <button class="list-modal__close" id="list-modal-close" aria-label="Fechar">
               <i class="ri-close-fill"></i>
            </button>
            <div class="list-modal__header">
               <h3 class="list-modal__title" id="list-modal-title">Lista</h3>
               <span class="badge" id="list-modal-count"><i class="ri-play-fill"></i>0 itens</span>
            </div>
            <div class="list-modal__content">
               <ul class="list-modal__list" id="list-modal-list">
               </ul>
               <div class="empty-state" id="list-modal-empty" style="display:none;">
                  <i class="ri-file-list-3-fill"></i>
                  <p>Nenhum item por aqui ainda.</p>
               </div>
            </div>
         </div>
      </div>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
   </body>
</html>