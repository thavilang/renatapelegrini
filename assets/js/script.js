//menu mobile
let toggleMenuButton = document.querySelector('[js-button-menu]');
let menu = document.querySelector('[js-menu]');
let topo = document.querySelector('header');

toggleMenuButton.addEventListener('click', function (e) {
    toggleMenuButton.classList.toggle('ativo');
    menu.classList.toggle('ativo');
});

menu.addEventListener('click', function () {
    toggleMenuButton.classList.remove('ativo');
    menu.classList.remove('ativo');
});

document.addEventListener('scroll', (e) => {
    //fixa o menu
    let scrollTop = window.scrollY;

    if (scrollTop >= 1) {
        topo.classList.add('scroll');
    } else {
        topo.classList.remove('scroll');
        toggleMenuButton.classList.remove('ativo');
        menu.classList.remove('ativo');
    }
});

//configurações padrão fancybox
if (document.querySelector('[data-fancybox]') != null) {
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