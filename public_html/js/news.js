// News Professional Enhancements
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Lazy load images
    const lazyImages = document.querySelectorAll('img[data-src]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('fade-in');
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Reading progress indicator
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress';
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const article = document.querySelector('.article-text');
        if (article) {
            const articleHeight = article.offsetHeight;
            const articleTop = article.offsetTop;
            const scrollPosition = window.pageYOffset;
            const windowHeight = window.innerHeight;
            
            const progress = Math.min(
                100,
                Math.max(
                    0,
                    ((scrollPosition - articleTop) / (articleHeight - windowHeight)) * 100
                )
            );
            
            progressBar.style.width = `${progress}%`;
        }
    });

    // Share buttons functionality
    const shareButtons = document.querySelectorAll('.article-share a');
    shareButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const url = button.href;
            window.open(url, 'share-dialog', 'width=600,height=400');
        });
    });

    // Estimated reading time calculation
    const articleText = document.querySelector('.article-text');
    if (articleText) {
        const words = articleText.textContent.trim().split(/\s+/).length;
        const readingTime = Math.ceil(words / 200); // Assuming 200 words per minute
        const readingTimeElement = document.querySelector('.reading-time');
        if (readingTimeElement) {
            readingTimeElement.textContent = `${readingTime} min read`;
        }
    }

    // Image zoom functionality
    const featuredImage = document.querySelector('.featured-image img');
    if (featuredImage) {
        const zoom = mediumZoom(featuredImage, {
            margin: 24,
            background: '#000000e6',
            scrollOffset: 0,
        });
    }

    // Handle dark mode toggle
    const darkModeToggle = document.querySelector('.dark-mode-toggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem(
                'darkMode',
                document.body.classList.contains('dark-mode')
            );
        });
    }

    // Related articles hover effect
    const newsCards = document.querySelectorAll('.news-card');
    newsCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            newsCards.forEach(c => {
                if (c !== card) {
                    c.style.opacity = '0.7';
                    c.style.transform = 'scale(0.98)';
                }
            });
        });

        card.addEventListener('mouseleave', () => {
            newsCards.forEach(c => {
                c.style.opacity = '1';
                c.style.transform = 'none';
            });
        });
    });
});
