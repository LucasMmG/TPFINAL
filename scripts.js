document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector(".carousel-track");
    const slides = Array.from(track.children);
    const prevButton = document.querySelector(".carousel-button.prev");
    const nextButton = document.querySelector(".carousel-button.next");
    const titleElement = document.getElementById("carousel-title-text");

    
    const titles = [
        "Primer Año",
        "Segundo Año",
        "Tercer Año",
        "Cuarto Año",
        "Quinto Año",
        "Sexto Año",
        "Septimo Año"
    ];

    let currentIndex = 0;

    
    const moveToSlide = (index) => {
        const slideWidth = slides[0].getBoundingClientRect().width;
        track.style.transform = `translateX(-${index * slideWidth}px)`;
        currentIndex = index;

      
        titleElement.textContent = titles[index];
    };

    prevButton.addEventListener("click", () => {
        const newIndex = currentIndex === 0 ? slides.length - 1 : currentIndex - 1;
        moveToSlide(newIndex);
    });

   
    nextButton.addEventListener("click", () => {
        const newIndex = currentIndex === slides.length - 1 ? 0 : currentIndex + 1;
        moveToSlide(newIndex);
    });

    
    window.addEventListener("resize", () => moveToSlide(currentIndex));
});
// scripts.js
function toggleSection() {
    const section = document.getElementById("honorable-mentions");
    section.classList.toggle("hidden");
}
function toggleLearned() {
    const section = document.getElementById("what-i-learned");
    section.classList.toggle("hidden");
}
