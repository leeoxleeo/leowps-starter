<section class="default-header container">
    <div class="content">

        <header class="section-header">
            <h2><?php esc_html_e( 'Ops: Não encontramos nada :/', 'leowps-starter' ); ?></h2>
        </header>

        <div class="clear"></div>
    </div>
</section>

<section class="main-not-found container">
  <div class="content">

    <div class="section-content">
      <?php if( is_home() && current_user_can( 'publish_posts' ) ): ?>
        <p class="lead">
          <?php printf(
					/* translators: 1: link. */
			wp_kses( __( 'Pronto para publicar seu primeiro post? <a href="%1$s">Comece por aqui</a>.', 'leowps-starter' ), array(
			    'a' => array(
				'href' => array(),
				),
			) ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
        </p>
      <?php elseif( is_search() ): ?>
        <p class="lead"><?php esc_html_e( 'Ops: Não encontramos nada com o termo pesquisado :/. Tente novamente com palavras diferentes.', 'leowps-starter' ); ?></p>
        <?php get_search_form(); ?>
      <?php else: ?>
        <p class="lead"><?php esc_html_e( 'Ops: Parece que não encontramos o que você está procurando :/... Faça uma pesquisa abaixo.', 'leowps-starter' ); ?></p>
        <?php get_search_form(); ?>
      <?php endif; ?>
    </div>

    <div class="clear"></div>
  </div>
</section>
