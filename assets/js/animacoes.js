gsap.registerPlugin(ScrollTrigger);

let parallaxCanvas = document.querySelectorAll('[gsap-parallax]');
parallaxCanvas.forEach(elemento => {
    let movimento = elemento.hasAttribute('gsap-parallax-movimento') ? elemento.getAttribute('gsap-parallax-movimento') : -40;
    let pontoStart = elemento.hasAttribute('gsap-parallax-start') ? elemento.getAttribute('gsap-parallax-start') : "top bottom";
    let pontoEnd = elemento.hasAttribute('gsap-parallax-end') ? elemento.getAttribute('gsap-parallax-end') : "bottom top";

    let contexto = elemento.closest('section');

    gsap.to(elemento, {
        yPercent: movimento,
        ease: "none",
        scrollTrigger: {
            trigger: contexto,
            start: pontoStart,
            end: pontoEnd,
            scrub: 2
        },
    });
});

let gsapAparecerFade = document.querySelector("[gsap-aparecer-fade]");
if (gsapAparecerFade) {
    gsap.set("[gsap-aparecer-fade]", { autoAlpha: 0, ease: "power3" });

    window.addEventListener("load", (event) => {
        setTimeout(() => {
            ScrollTrigger.batch("[gsap-aparecer-fade]", {
                start: "top bottom-=100px",
                onEnter: batch => gsap.to(batch, { autoAlpha: 1, stagger: 0.15, duration: 0.6 })
            });
        }, 500);
    });
}

let gsapAparecerDown = document.querySelector("[gsap-aparecer-down]");
if (gsapAparecerDown) {
    gsap.set("[gsap-aparecer-down]", { autoAlpha: 0, yPercent: 30, ease: "power3" });

    window.addEventListener("load", (event) => {
        setTimeout(() => {
            ScrollTrigger.batch("[gsap-aparecer-down]", {
                start: "top bottom-=100px",
                onEnter: batch => gsap.to(batch, { autoAlpha: 1, yPercent: 0, stagger: 0.15, duration: 0.4 })
            });
        }, 500);
    });
}


if (window.innerWidth >= 768) {
    let barraFixa = document.querySelector('.navegacao-sessoes');
    window.addEventListener("scroll", function() {
        if (window.scrollY > barraFixa.closest('.navegacao-sessoes__box').offsetTop) {
            barraFixa.classList.add("fixar");
        } else {
            barraFixa.classList.remove("fixar");
        }
    });

    let bannerHome = document.querySelector('.banner-home');
    if (bannerHome) {
        let tlBannerHome = gsap.timeline({
            ease: "power3",
            duration: 0.6
        });
        window.addEventListener("load", (event) => {
            tlBannerHome
                .from(bannerHome.querySelector('.banner-home__content'), { autoAlpha: 0 })
                .from(bannerHome.querySelector('.banner-home__marca-dagua'), { scale: 0.9, autoAlpha: 0 }, "-=0.3")
                .from(bannerHome.querySelector('.sombra'), { autoAlpha: 0, xPercent: 60 }, "-=0.4")
                .from(bannerHome.querySelector('.zo'), { autoAlpha: 0, yPercent: 60 }, "-=0.5")
                .from(bannerHome.querySelector('.ti'), { autoAlpha: 0, xPercent: -60 }, "-=0.3")
                .from(bannerHome.querySelector('.ne'), { autoAlpha: 0, yPercent: -60 }, "-=0.3")
                .from(bannerHome.querySelector('.banner-home__titulo'), { autoAlpha: 0, xPercent: 10 }, "-=0.1")
                .from(bannerHome.querySelector('.banner-home__content p'), { autoAlpha: 0, xPercent: 10 }, "-=0.3")
                .from(bannerHome.querySelector('.video'), { autoAlpha: 0, duration: 0.8 }, "-=0.5")
                .from(bannerHome.querySelector('.banner-home__seta'), { autoAlpha: 0, yPercent: -30 }, "-=0.2");
        });
    }
}