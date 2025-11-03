// Referências principais do DOM
const body = document.querySelector('body'),
      barraLateral = body.querySelector('nav'),
      btnAlternar = body.querySelector(".alternar"),
      btnPesquisa = body.querySelector(".caixa-pesquisa"),
      interruptor = body.querySelector(".interruptor"),
      textoModo = body.querySelector(".texto-modo");


// Abre/fecha a barra lateral
btnAlternar.addEventListener("click" , () =>{
    barraLateral.classList.toggle("fechada");
})

// Ao clicar na busca, garante a barra lateral aberta
btnPesquisa.addEventListener("click" , () =>{
    barraLateral.classList.remove("fechada");
})

// Alterna o tema claro/escuro
interruptor.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        textoModo.innerText = "Modo claro";
    }else{
        textoModo.innerText = "Modo escuro";
        
    }
});

// ===== Videos: category filter (visual only) =====
// Filtro de categorias (visual)
const categoryChips = document.querySelectorAll('.etiqueta');
const videoCards = document.querySelectorAll('.cartao-video');

// Aplica filtro por categoria nos cartões
function aplicarFiltroCategoria(category){
    videoCards.forEach(card => {
        const cardCat = card.getAttribute('data-category');
        const isMatch = category === 'all' || cardCat === category;
        card.style.display = isMatch ? '' : 'none';
    });
}

// Clique nas etiquetas para filtrar
categoryChips.forEach(chip => {
    chip.addEventListener('click', () => {
        categoryChips.forEach(c => c.classList.remove('ativo'));
        chip.classList.add('ativo');
        const category = chip.getAttribute('data-category');
        aplicarFiltroCategoria(category);
    });
});

// Default filter
// Filtro padrão (todas categorias)
aplicarFiltroCategoria('all');

// ===== Modal: Novo Vídeo (visual) =====
// Modal "Novo vídeo" (visual)
const openNewVideoBtn = document.getElementById('open-new-video');
const modalNewVideo = document.getElementById('modal-new-video');
const closeNewVideoBtn = document.getElementById('close-new-video');
const cancelNewVideoBtn = document.getElementById('cancel-new-video');

// Abre a modal
function abrirModal(){
    if(modalNewVideo){ modalNewVideo.classList.add('open'); modalNewVideo.setAttribute('aria-hidden','false'); }
}
// Fecha a modal
function fecharModal(){
    if(modalNewVideo){ modalNewVideo.classList.remove('open'); modalNewVideo.setAttribute('aria-hidden','true'); }
}

// Ligações de eventos da modal
openNewVideoBtn && openNewVideoBtn.addEventListener('click', abrirModal);
closeNewVideoBtn && closeNewVideoBtn.addEventListener('click', fecharModal);
cancelNewVideoBtn && cancelNewVideoBtn.addEventListener('click', (e)=>{ e.preventDefault(); fecharModal(); });
modalNewVideo && modalNewVideo.addEventListener('click', (e)=>{ if(e.target === modalNewVideo) fecharModal(); });

// ===== Navegação entre seções (Videos / Assinaturas) =====
// Navegação entre seções (Vídeos / Assinaturas)
const navLinks = document.querySelectorAll('.links-menu .link-nav a[data-target]');
const sectionsMap = {
    videos: document.getElementById('section-videos'),
    assinaturas: document.getElementById('section-assinaturas')
};

// Mostra a seção alvo e oculta as demais
function mostrarSecao(target){
    Object.values(sectionsMap).forEach(sec => { if(sec) sec.style.display = 'none'; });
    const section = sectionsMap[target];
    if(section){ section.style.display = ''; }
    // O título já está dentro de cada seção
}

// Ativa o link e renderiza a seção correspondente
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const target = link.getAttribute('data-target');
        // active state
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        // show section
        mostrarSecao(target);
    });
});

// Default section
// Seção inicial padrão
mostrarSecao('videos');

const modalEditVideo = document.getElementById('modal-edit-video');
const closeEditVideoBtn = document.getElementById('close-edit-video');
const cancelEditVideoBtn = document.getElementById('cancel-edit-video');
const editId = document.getElementById('edit-id');
const editTitulo = document.getElementById('edit-titulo');
const editUrl = document.getElementById('edit-url');
const editCategoria = document.getElementById('edit-categoria'); // Corrigido!
const editThumb = document.getElementById('edit-thumbnail');
const editDescricao = document.getElementById('edit-descricao');

// Abre modal preenchendo os dados
document.querySelectorAll('.btn-editar').forEach(btn => {
    btn.addEventListener('click', () => {
        editId.value = btn.dataset.id;
        editTitulo.value = btn.dataset.titulo;
        editUrl.value = btn.dataset.url;
        editCategoria.value = btn.dataset.categoria || "1"; // 1 = categoria padrão
        editThumb.value = btn.dataset.thumbnail;
        editDescricao.value = btn.dataset.descricao;

        modalEditVideo.classList.add('open');
        modalEditVideo.setAttribute('aria-hidden','false');
    });
});

// Fecha modal
function fecharEditModal(){
    modalEditVideo.classList.remove('open');
    modalEditVideo.setAttribute('aria-hidden','true');
}

closeEditVideoBtn && closeEditVideoBtn.addEventListener('click', fecharEditModal);
cancelEditVideoBtn && cancelEditVideoBtn.addEventListener('click', (e)=>{ e.preventDefault(); fecharEditModal(); });
modalEditVideo && modalEditVideo.addEventListener('click', (e)=>{ if(e.target === modalEditVideo) fecharEditModal(); });
