const loginBtn = document.getElementById('loginBtn');
const loginModal = document.getElementById('loginModal');
const closeModal = document.getElementById('closeModal');

if (loginBtn && loginModal) {
    loginBtn.addEventListener('click', () => {
        loginModal.classList.remove('hidden');
        loginModal.classList.add('flex');
    });
}

if (closeModal && loginModal) {
    closeModal.addEventListener('click', () => {
        loginModal.classList.add('hidden');
        loginModal.classList.remove('flex');
    });
}

if (loginModal) {
    loginModal.addEventListener('click', (e) => {
        if (e.target === loginModal) {
            loginModal.classList.add('hidden');
            loginModal.classList.remove('flex');
        }
    });
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && loginModal) {
        loginModal.classList.add('hidden');
        loginModal.classList.remove('flex');
    }
});
