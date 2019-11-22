<?php
	include_once 'model/glossary.php';
?>

<h3><a href="<?php $_SERVER['PHP_SELF'] ?>?page=glossary">Glossary</a></h3>
<?php
// Проверим защиту nonce и что пользователь может редактировать этот пост.
if ( 
	isset( $_POST['my_image_upload_nonce'] ) 
	&& wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )
) {
	// все ок! Продолжаем.
	// Эти файлы должны быть подключены в лицевой части (фронт-энде).
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );

	// Позволим WordPress перехватить загрузку.
	// не забываем указать атрибут name поля input - 'my_image_upload'
	$attachment_id = media_handle_upload( 'my_image_upload', $_POST['post_id'] );

	var_dump($attachment_id);

	if ( is_wp_error( $attachment_id ) ) {
		echo "Ошибка загрузки медиафайла.";
	} else {
		echo "Медиафайл был успешно загружен!";
	}

} else {
	echo "Проверка не пройдена. Невозможно загрузить файл.";
}
?>

<form id="featured_upload" method="post" action="#" enctype="multipart/form-data">
	<input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
	<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />
</form>