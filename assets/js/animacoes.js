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