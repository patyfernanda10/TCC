const loginsec = document.querySelector('.login-section');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');

// Evento para alternar entre login e registro
registerlink.addEventListener('click', () => {
    loginsec.classList.add('active');
});

loginlink.addEventListener('click', () => {
    loginsec.classList.remove('active');
});

// Função para mostrar ou ocultar a senha
function togglePasswordVisibility(senhaId, button) {
    const senhaInput = document.getElementById(senhaId);

    if (senhaInput) {
        if (senhaInput.type === 'password') {
            senhaInput.type = 'text'; // Muda para mostrar a senha
            button.textContent = '🙈'; // Ícone para "ocultar"
        } else {
            senhaInput.type = 'password'; // Muda para ocultar a senha
            button.textContent = '👁️'; // Ícone para "mostrar"
        }
    } else {
        console.error(`Campo de senha com o ID "${senhaId}" não encontrado.`);
    }
}

// Adicione um listener ao DOMContentLoaded para garantir que o DOM esteja pronto
document.addEventListener('DOMContentLoaded', () => {
    const toggleButtons = document.querySelectorAll('.toggle-password');
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const inputId = button.previousElementSibling.id;
            togglePasswordVisibility(inputId, button);
        });
    });
});

// Função para validar a senha
// Função para validar a senha
function validarSenha() {
    const senha = document.getElementById('senha-cadastro').value; // Atualize o ID para 'senha-cadastro'
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!regex.test(senha)) {
        alert('A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos.');
        return false; // Impede o envio do formulário
    }
    return true;
}

// Adiciona um evento de submissão ao formulário de cadastro para validar antes de enviar
document.querySelector('.form-box.register form').addEventListener('submit', function(event) {
    if (!validarSenha()) {
        event.preventDefault(); // Cancela o envio do formulário se a validação falhar
    }
});