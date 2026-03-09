const editButtons = document.querySelectorAll('.editPostBtn');
const editModal = document.getElementById('editPostModal');
const closeEditPost = document.getElementById('closeEditPost');

const editForm = document.getElementById('editPostForm');
const editTitle = document.getElementById('editTitle');
const editContent = document.getElementById('editContent');
const editStatus = document.getElementById('editStatus');
const editDate = document.getElementById('editDate');
const editAuthor = document.getElementById('editAuthor');
const deleteBtn = document.getElementById('deletePostBtn');

editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;

        editTitle.value = btn.dataset.title;
        editContent.value = btn.dataset.content;
        editStatus.value = btn.dataset.status;
        editDate.value = btn.dataset.date;
        editAuthor.value = btn.dataset.author;

        editForm.action = `/posts/${id}`;

        deleteBtn.onclick = () => {
            if (!confirm("Delete this post?")) return;

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = editForm.action;

            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = token;

            const method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE';

            form.appendChild(csrf);
            form.appendChild(method);

            document.body.appendChild(form);
            form.submit();
        };

        editModal.classList.add('open');
    });
});

closeEditPost.addEventListener('click', () => {
    editModal.classList.remove('open');
});
