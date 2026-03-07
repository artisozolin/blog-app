const addBtn = document.getElementById("addPostBtn");
const modal = document.getElementById("addPostModal");
const closeBtn = document.getElementById("closeAddPost");
const useUserName = document.getElementById('useUserName');
const authorInput = document.getElementById('authorInput');
const loggedUserName = document.getElementById('loggedUserName');

if (addBtn) {
    addBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    });
}

if (closeBtn) {
    closeBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
}

if (useUserName && authorInput && loggedUserName) {

    function updateAuthorField() {
        if (useUserName.checked) {
            authorInput.value = loggedUserName.value;
            authorInput.disabled = true;
        } else {
            authorInput.disabled = false;
            authorInput.value = '';
        }
    }

    updateAuthorField();

    useUserName.addEventListener('change', updateAuthorField);
}




