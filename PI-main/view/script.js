document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item a');
    const chartButtons = document.querySelectorAll('.btn-chart');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            menuItems.forEach(menuItem => {
                menuItem.parentElement.classList.remove('active');
            });
            this.parentElement.classList.add('active');
            const section = this.getAttribute('href').substring(1);
            console.log('Navigating to:', section);
        });
    });
    
    chartButtons.forEach(button => {
        button.addEventListener('click', function() {
            chartButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    const userProfile = document.querySelector('.user-profile');
    if (userProfile) {
        userProfile.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.querySelector('.dropdown-menu');
            if (dropdown) {
                dropdown.style.opacity = dropdown.style.opacity === '1' ? '0' : '1';
                dropdown.style.visibility = dropdown.style.visibility === 'visible' ? 'hidden' : 'visible';
                dropdown.style.transform = dropdown.style.transform === 'translateY(0px)' ? 'translateY(-10px)' : 'translateY(0px)';
            }
        });
    }
    
    document.addEventListener('click', function() {
        const dropdown = document.querySelector('.dropdown-menu');
        if (dropdown) {
            dropdown.style.opacity = '0';
            dropdown.style.visibility = 'hidden';
            dropdown.style.transform = 'translateY(-10px)';
        }
    });
});

function validarSenhas() {
    const senha = document.getElementById("senha");
    const confirmar = document.getElementById("confirmarSenha");
    
    if (senha && confirmar) {
        if (senha.value !== confirmar.value) {
            alert("As senhas não coincidem!");
            return false;
        }
        return true;
    }
    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (this.onsubmit && this.onsubmit.toString().includes('validarSenhas')) {
                if (!validarSenhas()) {
                    e.preventDefault();
                }
            }
        });
    });
    
    const inputs = document.querySelectorAll('input[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = 'var(--color-blue)';
            }
        });
        
        input.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.style.borderColor = 'var(--color-blue)';
            }
        });
    });
});

function maskTelefone(value) {
    value = value.replace(/\D/g, "");
    value = value.replace(/^(\d{2})(\d)/g, "($1) $2");
    value = value.replace(/(\d{5})(\d)/, "$1-$2");
    value = value.substring(0, 15);
    return value;
}

function maskCEP(value) {
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{5})(\d)/, "$1-$2");
    value = value.substring(0, 9);
    return value;
}

window.addEventListener('DOMContentLoaded', function() {
    var tel = document.getElementById('telefone');
    if (tel) {
        tel.addEventListener('input', function(e) {
            e.target.value = maskTelefone(e.target.value);
        });
    }
    var cep = document.getElementById('cep');
    if (cep) {
        cep.addEventListener('input', function(e) {
            e.target.value = maskCEP(e.target.value);
        });
    }
});


const botaoGaleria = document.getElementById('abrirGaleria');
const galeria = document.getElementById('galeria');
const avatarInput = document.getElementById('avatarSelecionado');
const preview = document.getElementById('previewAvatar');

botaoGaleria.addEventListener('click', () => {
    galeria.style.display = galeria.style.display === 'flex' ? 'none' : 'flex';
});

const avatares = document.querySelectorAll('.avatar-img');

avatares.forEach(avatar => {
    avatar.addEventListener('click', () => {
        // Remove a seleção de todos
        avatares.forEach(a => a.classList.remove('selecionado'));
        // Marca o selecionado
        avatar.classList.add('selecionado');
        // Coloca o valor no input hidden
        avatarInput.value = avatar.src.split('/').pop();
        // Mostra o preview
        preview.innerHTML = `<img src="${avatar.src}" class="avatar-img" style="border:2px solid purple;">`;
        // Fecha a galeria
        galeria.style.display = 'none';
    });
});
