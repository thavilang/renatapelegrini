//menu mobile
let toggleMenuButton = document.querySelector('[js-button-menu]');
let menu = document.querySelector('[js-menu]');

toggleMenuButton.addEventListener('click', function (e) {
    toggleMenuButton.classList.toggle('ativo');
    menu.classList.toggle('ativo');
    document.querySelector('body').classList.toggle('no-scroll');
});

menu.addEventListener('click', function () {
    toggleMenuButton.classList.remove('ativo');
    menu.classList.remove('ativo');
    document.querySelector('body').classList.remove('no-scroll');
});

new Swiper('[js-swiper-footer]', {
    slidesPerView: 2,
    grid: {
        rows: 2,
    },
    spaceBetween: 0,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    breakpoints: {
        576: {
            slidesPerView: 4,
            grid: {
                rows: 1,
            },
        },
        992: {
            slidesPerView: 5,
            grid: {
                rows: 1,
            },
        },
        1200: {
            slidesPerView: 7,
            grid: {
                rows: 1,
            },
        },
    },
});

//configurações padrão fancybox
if (document.querySelector('[data-fancybox]') != null) {
    const pluginFancybox = document.createElement('script');
    pluginFancybox.src = '/wp-content/themes/magnesiaPhillips/assets/js/plugins/fancybox.min.js';

    pluginFancybox.addEventListener('load', _ => {
        Fancybox.bind('[data-fancybox]', {
            l10n: {
                CLOSE: "Fechar",
                NEXT: "Próximo",
                PREV: "Anterior",
                MODAL: "Você pode fechar este conteúdo modal com a tecla ESC",
                ERROR: "Algo deu errado, tente novamente mais tarde",
                IMAGE_ERROR: "Imagem não encontrada",
                ELEMENT_NOT_FOUND: "Elemento HTML não encontrado",
                AJAX_NOT_FOUND: "Erro ao carregar AJAX: não encontrado",
                AJAX_FORBIDDEN: "Erro ao carregar AJAX: Proibido",
                IFRAME_ERROR: "Erro ao carregar a página",
            }
        });
    });

    document.body.appendChild(pluginFancybox);
}

//compartilhamento nativo
let btnCompartilhar = document.querySelector('[js-btn-compartilhar]');
if (btnCompartilhar) {
    let tituloCompartilhar = btnCompartilhar.getAttribute('data-titulo');
    let legendaCompartilhar = btnCompartilhar.getAttribute('data-legenda');
    let urlCompartilhar = btnCompartilhar.getAttribute('data-url');

    let shareData = {
        title: tituloCompartilhar,
        text: legendaCompartilhar,
        url: urlCompartilhar,
    }

    btnCompartilhar.addEventListener('click', function (e) {
        e.preventDefault();
        navigator.share(shareData);
    });
}

let GTM_ondeComprar = document.getElementsByClassName('GTM_ondeComprar')

Array.from(GTM_ondeComprar).forEach((element) => {

    element.addEventListener('click', function (e) {
        let gam_id = element.getAttribute('data-gam');
        let permutive = element.getAttribute('data-permutive');

        (function () {
            var a = String(Math.floor(Math.random() * 10000000000000000));
            new Image().src = 'https://pubads.g.doubleclick.net/activity;xsp=' + gam_id + ';ord=1;num=' + a + '?';

            new Image().src = permutive;
        })();
    })

});

var publicKey = 'cccecec5-8228-435e-81d1-33c4eccc78e6';
var eventName = "PixelConversion";
var eventProperties = {
    url: (window.location.href ? window.location.href : '')
};

window.addEventListener("load", (event) => {
    (new Image()).src = "https://ib.adnxs.com/getuid?" + encodeURI("https://api.permutive.com/v2.0/px/track?k=" + publicKey + "&i=$UID&e=" + eventName + "&p=" + encodeURIComponent(JSON.stringify(eventProperties)) + "&it=appnexus&rand=" + Math.round(Math.random() * 1000000));
});


let rodou = false;
function init() {
    return new Promise((resolve) => {
        var vidDefer = document.querySelector('#videoYoutube');
        if (vidDefer.getAttribute('data-src')) {
            vidDefer.setAttribute('src', vidDefer.getAttribute('data-src'));
        }
    });
}

async function asyncCall() {
   await init();
}

window.addEventListener("scroll", () => {
    if (!rodou) {
        asyncCall();
        rodou = true;        
    }
});