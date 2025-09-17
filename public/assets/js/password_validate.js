document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const requirementsDiv = document.getElementById('passwordRequirements');
    const strengthDiv = document.getElementById('passwordStrength');
    const strengthBar = document.getElementById('strengthBar');
    const submitBtn = document.getElementById('submitBtn');
    const passwordMatchMsg = document.getElementById('passwordMatchMsg');

    // Elementos de requisitos
    const lengthReq = document.getElementById('lengthReq');
    const lowercaseReq = document.getElementById('lowercaseReq');
    const uppercaseReq = document.getElementById('uppercaseReq');
    const numberReq = document.getElementById('numberReq');
    const specialReq = document.getElementById('specialReq');

    function updateRequirement(element, isValid) {
        const icon = element.querySelector('.requirement-icon');
        if (isValid) {
            element.classList.remove('invalid');
            element.classList.add('valid');
            icon.textContent = '✓';
        } else {
            element.classList.remove('valid');
            element.classList.add('invalid');
            icon.textContent = '✗';
        }
    }

    function calculateStrength(password) {
        let score = 0;

        if (password.length >= 8) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/\d/.test(password)) score++;
        if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) score++;

        return score;
    }

    function updateStrengthBar(score) {
        const percentage = (score / 5) * 100;
        strengthBar.style.width = percentage + '%';

        strengthBar.classList.remove('strength-weak', 'strength-fair', 'strength-good', 'strength-strong');

        if (score <= 1) {
            strengthBar.classList.add('strength-weak');
        } else if (score <= 2) {
            strengthBar.classList.add('strength-fair');
        } else if (score <= 3) {
            strengthBar.classList.add('strength-good');
        } else {
            strengthBar.classList.add('strength-strong');
        }
    }

    function validatePassword() {
        const password = passwordInput.value;
        const confirmPassword = passwordConfirmInput.value;

        if (password.length === 0) {
            requirementsDiv.style.display = 'none';
            strengthDiv.style.display = 'none';
            return false;
        } else {
            requirementsDiv.style.display = 'block';
            strengthDiv.style.display = 'block';
        }

        // Verificar cada requisito
        const hasLength = password.length >= 8;
        const hasLowercase = /[a-z]/.test(password);
        const hasUppercase = /[A-Z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSpecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

        updateRequirement(lengthReq, hasLength);
        updateRequirement(lowercaseReq, hasLowercase);
        updateRequirement(uppercaseReq, hasUppercase);
        updateRequirement(numberReq, hasNumber);
        updateRequirement(specialReq, hasSpecial);

        // Actualizar barra de fortaleza
        const score = calculateStrength(password);
        updateStrengthBar(score);

        // Verificar si todas las condiciones se cumplen
        const allValid = hasLength && hasLowercase && hasUppercase && hasNumber && hasSpecial;

        // Verificar coincidencia de contraseñas
        let passwordsMatch = true;
        if (confirmPassword.length > 0) {
            passwordsMatch = password === confirmPassword;
            if (passwordsMatch) {
                passwordMatchMsg.innerHTML = '<small class="text-success">✓ Las contraseñas coinciden</small>';
                passwordMatchMsg.style.display = 'block';
                passwordConfirmInput.classList.remove('is-invalid');
                passwordConfirmInput.classList.add('is-valid');
            } else {
                passwordMatchMsg.innerHTML = '<small class="text-danger">✗ Las contraseñas no coinciden</small>';
                passwordMatchMsg.style.display = 'block';
                passwordConfirmInput.classList.remove('is-valid');
                passwordConfirmInput.classList.add('is-invalid');
            }
        } else {
            passwordMatchMsg.style.display = 'none';
            passwordConfirmInput.classList.remove('is-valid', 'is-invalid');
        }

        // Habilitar/deshabilitar botón de envío
        const canSubmit = allValid && passwordsMatch && confirmPassword.length > 0;
        submitBtn.disabled = !canSubmit;

        if (allValid) {
            passwordInput.classList.remove('is-invalid');
            passwordInput.classList.add('is-valid');
        } else {
            passwordInput.classList.remove('is-valid');
            if (password.length > 0) {
                passwordInput.classList.add('is-invalid');
            }
        }

        return allValid;
    }

    // Event listeners
    passwordInput.addEventListener('input', validatePassword);
    passwordInput.addEventListener('focus', function () {
        if (this.value.length > 0) {
            requirementsDiv.style.display = 'block';
            strengthDiv.style.display = 'block';
        }
    });

    passwordConfirmInput.addEventListener('input', validatePassword);

    // Prevenir envío si las validaciones no pasan
    document.querySelector('form').addEventListener('submit', function (e) {
        if (submitBtn.disabled) {
            e.preventDefault();
            alert('Por favor, completa todos los requisitos de la contraseña antes de continuar.');
        }
    });
});