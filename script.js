const formLogin = document.getElementById("forms-login");
if (formLogin) {
    formLogin.addEventListener("submit", function (e) {
        e.preventDefault();


        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;


        let valid = true;


        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '' || !emailRegex.test(email)) {
            alert('Por favor, insira um e-mail válido');
            valid = false;
        }


        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        if (password === '') {
            alert('Por favor, preencha a senha');
            valid = false;
        }


        if (!passwordRegex.test(password)) {
            alert('A senha deve conter no mínimo:\n- 8 caracteres\n- 1 letra maiúscula\n- 1 letra minúscula\n- 1 número\n- 1 caractere especial');
            return;
        }


        if (valid) {
            window.location = "public/menu.html";
        }
    });
}


// Script para formulário de administrador
const formAdm = document.getElementById("formsAdm");
if (formAdm) {
    formAdm.addEventListener("submit", function (e) {
        e.preventDefault();


        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;


        let valid = true;


        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '' || !emailRegex.test(email)) {
            alert('Por favor, insira um e-mail válido');
            valid = false;
        }


        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        if (password === '') {
            alert('Por favor, preencha a senha');
            valid = false;
        }


        if (!passwordRegex.test(password)) {
            alert('A senha deve conter no mínimo:\n- 8 caracteres\n- 1 letra maiúscula\n- 1 letra minúscula\n- 1 número\n- 1 caractere especial');
            return;
        }


        if (valid) {
            window.location = "add_usuario.html";
        }
    });
};


document.addEventListener("DOMContentLoaded", function () {
    const addUserBtn = document.getElementById("addUserBtn");




    addUserBtn.addEventListener("click", function (e) {
        e.preventDefault();


        const nameInput = document.getElementById("userName");
        const passwordInput = document.getElementById("userPassword");
        const roleSelect = document.getElementById("userRole");
        const emailInput = document.getElementById("userEmail");
        const phoneInput = document.getElementById("userPhone");


        const name = nameInput.value.trim();
        const password = passwordInput.value.trim();
        const role = roleSelect.value;
        const email = emailInput ? emailInput.value.trim() : "";
        const phone = phoneInput.value.trim();


        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        const phoneRegex = /^\d{8,}$/;


        if (!name) {
            alert("Por favor, preencha o nome do usuário.");
            return;
        }


        if (!password) {
            alert("Por favor, preencha a senha.");
            return;
        }


        if (!passwordRegex.test(password)) {
            alert("A senha deve conter no mínimo:\n- 8 caracteres\n- 1 letra maiúscula\n- 1 letra minúscula\n- 1 número\n- 1 caractere especial.");
            return;
        }


        if (!role) {
            alert("Por favor, selecione uma função.");
            return;
        }


        if (!email || !emailRegex.test(email)) {
            alert("Por favor, insira um e-mail válido.");
            return;
        }


        if (!phone || !phoneRegex.test(phone)) {
            alert("Por favor, insira um número de contato válido (Com no mínimo 8 dígitos).");
            return;
        }


        alert("Usuário adicionado com sucesso!");


        nameInput.value = "";
        passwordInput.value = "";
        roleSelect.value = "";
        if (emailInput) emailInput.value = "";
        phoneInput.value = "";
    });
});
