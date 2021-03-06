<?php
/*
 * Theme Name: 960 Base Theme
 * Theme URI: http://960basetheme.kiuz.it
 * Description: Wordpress theme based on 960 Grid System
 * Author: Domenico Monaco
 * Author URI: http://www.kiuz.it
 * Version: 0.5
 */
?>

<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Si prega di non caricare la pagina direttamente. Grazie!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Questo contenuto � protetto da password. Inserisci la password per visualizzare i commenti.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Aggiungi un commento', 'Un commento inserito, partecipa alla discussione', '% commenti inseriti, partecipa alla discussione' );?></h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<div class="cdata">
				<?php echo get_avatar( $comment, 33 ); ?>
				<strong><?php comment_author_link() ?></strong>
				<?php if ($comment->comment_approved == '0') : ?>
				<em>Il tuo commento � stato inserito con successo, ma sar� visibile solo dopo l'approvazione dell'amministratore</em>
				<?php endif; ?>
				<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><b>Inserito il <?php comment_date('d/m/Y') ?> alle <?php comment_time('h:m') ?></a> <?php edit_comment_link('[ edit ]','',''); ?></b></small>
 			</div>
			<div class="ctext"><?php comment_text() ?></div>
		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Inserimento commenti disabilitato.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Lascia un commento</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Devi effttuare l'<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">accesso</a> per inserire un commento.<br />
Se non hai ancora un account effettua subito la <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=register">registrazione</a></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Hai effettuato l'accesso con l'account "<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>". <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Disconnetti account">Disconnetti account &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author">Nome <?php if ($req) echo "(<b style='color:red'>*</b>)"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email">e-mail (non verr&agrave resa pubblica) <?php if ($req) echo "(<b style='color:red'>*</b>)"; ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url">Sito web / Blog</label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Invia commento" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
