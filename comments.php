<div class="comments">

  <?php
  if (!comments_open()):
    __('<p>Comentários fechados</p>');
  else:
    ?>
    <div class="commentform" id="responder">
      <h3><?php printf('Deixe um Comentário Para: <strong>%1$s</strong>', get_the_title(), 'leowps-starter'); ?></h3>
      <p>
        <a rel="nofollow" id="cancel-comment-reply-link" href="#responder" style="display: none;">Cancelar Resposta</a>
      </p>
      <form action="<?php echo ATLAS_URL ?>/wp-comments-post.php" method="post" id="commentform">
        <ul>
          <?php
          if (is_user_logged_in()):
            $u = wp_get_current_user();
            printf(
                  '<li>Logado como: <a href="%s">%s</a>, <a href="%s">Desconectar</a></li>', admin_url('profile.php'), $u->display_name, wp_logout_url(get_permalink())
            );
          else:
            ?>
            <li class="form-group">
              <input name="author" id="author" type="text" class="form-control" name="author" id="author" placeholder="Nome:" class="text" />
            </li>
            <li class="form-group">
              <input name="email" id="email" type="email" class="form-control" placeholder="E-mail:" class="text" />
            </li>
            <li class="form-group">
              <input name="url" type="url" class="form-control" placeholder="Website (Opcional):" class="text" />
            </li>
          <?php
          endif;
          ?>
          <li class="form-group">
            <textarea name="comment" type="text" class="form-control" placeholder="Comentário:" class="text" rows="4" cols="48"></textarea>
          </li>
          <li class="form-group">
            <button type="submit" name="button" class="btn btn-primary btn-md">Enviar Comentário</button>
          </li>
        </ul>
        <input name="comment_post_ID" value="<?php global $post;
        echo $post->ID; ?>" id="comment_post_ID" type="hidden" />
        <input name="comment_parent" id="comment_parent" value="<?php echo ( isset($_GET['replytocom']) ) ? $_GET['replytocom'] : '0'; ?>" type="hidden" />
      </form>
    </div>

    <div class="comments-list">
      <?php printf('<h3>Comentários Recentes</h3>', 'leowps-starter'); ?>
      <?php wp_list_comments('callback=leowps_starter_comments'); ?>
    </div>

  <?php
  endif;
  ?>

</div>
