let ultimaChamada = 0;

function verificarChamada(element) {
	const tempoAtual = Date.now();
	if (tempoAtual - ultimaChamada >= 2000) {
		// 3000 milissegundos = 3 segundos
		more_ajax_scrolling(element);
		ultimaChamada = tempoAtual;
	} else {
		console.log("A função só pode ser chamada após 2 segundos.");
	}
}

document.addEventListener("scroll", function (e) {
	var altura = window.innerHeight || document.documentElement.clientHeight;
	let elementToScroll = document.querySelectorAll(".ajaxScrooling");

	elementToScroll.forEach((element) => {
		if (element.classList.contains("stopAjax")) {
			return;
		}

		if (element.getBoundingClientRect().bottom < altura) {
			verificarChamada(element);
		}
	});
});

var posts_per_page = 0;
var pageNumber = 0;

function more_ajax_scrolling(element) {
	jQuery(function ($) {
		let posts_per_page = $(element).data("posts_per_page");
		let post_type = $(element).data("post_type");
		let post_status = $(element).data("post_status");
		let element_item = $(element).data("element_item");

		pageNumber++;
		var str =
			"&pageNumber=" +
			pageNumber +
			"&posts_per_page=" +
			posts_per_page +
			"&post_type=" +
			post_type +
			"&post_status=" +
			post_status +
			"&element_item=" +
			element_item +
			"&action=more_ajax_scrolling";

		$.ajax({
			type: "POST",
			dataType: "html",
			url: "/wp-admin/admin-ajax.php",
			data: str,
			success: function (data) {
				dataParsed = JSON.parse(data);

				if (dataParsed.count > 0) {
					$(element).append(dataParsed.itens);

					// if (dataParsed.count < element.data("posts_per_page")) {
					// 	$(e.target).hide();
					// }
				} else {
					$(element).addClass("stopAjax");
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			},
		});
		return false;
	});
}
