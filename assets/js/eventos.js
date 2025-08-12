const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate-slide');
      // Opcional: parar de observar após animar
      observer.unobserve(entry.target);
    }
  });
});

document.querySelectorAll('.container').forEach(el => {
  observer.observe(el);
});