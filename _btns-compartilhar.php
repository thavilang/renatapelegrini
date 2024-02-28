<div class="compartilhar__box">
    <p>Compartilhar</p>
    <ul class="compartilhar">
        <li><a title="Clique para compartilhar no Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php echo $link ?>&display=popup&ref=plugin&src=share_button"><?php echo sprite('icon-facebook-share', 'Facebook'); ?></a></li>
        <li><a title="Clique para compartilhar no Linkedin" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $link ?>"><?php echo sprite('icon-linkedin', 'Linkedin'); ?></a></li>
        <li class="d-lg-none"><a title="Clique para compartilhar no Messenger" href="fb-messenger://share/?link=<?php echo $link ?>"><?php echo sprite('icon-messenger', 'Messenger'); ?></a></li>
        <li><a title="Clique para compartilhar no Twitter" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo site_url(); ?>&text=<?php echo $titulo; ?>&url=<?php echo $link ?>"><?php echo sprite('icon-twitter', 'Twitter'); ?></a></li>
        <!--li><a title="Clique para compartilhar no Instagram" target="_blank" href=""><?php echo sprite('icon-instagram', 'Instagram'); ?></a></li-->
        <li><a title="Clique para compartilhar no Pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $link ?>&media=<?php echo $imagem; ?>&description=<?php echo $titulo; ?>"><?php echo sprite('icon-pinterest', 'Pinterest'); ?></a></li>
        <li><a title="Clique para compartilhar no WhatsApp" target="_blank" href="https://wa.me/?text=<?php echo $link ?>"><?php echo sprite('icon-whatsapp', 'WhatsApp'); ?></a></li>
        <li class="d-lg-none"><a title="Clique para compartilhar" href="#" js-btn-compartilhar data-titulo="<?php echo $titulo; ?>" data-legenda="<?php echo $titulo; ?>" data-url="<?php echo $link ?>/"><?php echo sprite('icon-share', 'Compartilhar'); ?></a></li>
    </ul>
</div>