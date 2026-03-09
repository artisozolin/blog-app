const loginBtn = document.getElementById('loginBtn');
const loginModal = document.getElementById('loginModal');
const closeModal = document.getElementById('closeModal');

if (loginBtn && loginModal) {
    loginBtn.addEventListener('click', () => {
        loginModal.classList.add('open');
    });
}

if (closeModal && loginModal) {
    closeModal.addEventListener('click', () => {
        loginModal.classList.remove('open');
    });
}

if (loginModal) {
    loginModal.addEventListener('click', (e) => {
        if (e.target === loginModal) {
            loginModal.classList.remove('open');
        }
    });
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && loginModal) {
        loginModal.classList.remove('open');
    }
});
