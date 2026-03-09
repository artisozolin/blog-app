let page = 2;
let loading = false;
const scrollTrigger = document.getElementById("scrollTrigger");
const loader = document.getElementById("scrollLoader");
const postsContainer = document.getElementById("postsContainer");

async function loadNextPage() {
    if (loading) return;
    loading = true;

    loader.classList.add("open");

    try {
        const response = await fetch(`?page=${page}`, {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        });
        const data = await response.text();

        if (data.trim() === "") {
            loader.classList.remove("open");
            observer.disconnect();
            return;
        }

        await new Promise(resolve => setTimeout(resolve, 1500));

        postsContainer.insertAdjacentHTML("beforeend", data);

        page++;
        loading = false;
        loader.classList.remove("open");

    } catch (err) {
        console.error("Error loading posts:", err);
        loading = false;
        loader.classList.remove("open");
    }
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            loadNextPage();
        }
    });
}, {
    rootMargin: "200px"
});

if (scrollTrigger) {
    observer.observe(scrollTrigger);
}
