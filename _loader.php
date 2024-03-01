<style>
    .loader {
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        z-index: 9990;
        transition: opacity 0.5s;
    }

    .loader.esconder {
        opacity: 0;
    }

    .loader.remover {
        display: none;
    }
</style>

<div js-loader class="loader"></div>

<script>
    let loader = document.querySelector('[js-loader]');
    window.addEventListener("load", () => {
        setTimeout(() => {
            loader.classList.add('esconder');
            setTimeout(() => {
                loader.classList.add('remover');
            }, 500);
        }, 20);
    });
</script>