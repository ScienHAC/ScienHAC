<?php
/*
Plugin Name: Upload Files Programatically
Plugin URI: https://wordpress.org/plugins/
Description: Just another file uploader plugin.
Version: 1.0.0
Author: David Angulo
Author URI: https://www.davidangulo.xyz/
*/

function myFileUploader() {
  if (isset($_POST['submit'])) {
    wp_upload_bits($_FILES['fileToUpload']['name'], null, file_get_contents($_FILES['fileToUpload']['tmp_name']));
  }
  echo '
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  ';
}

function myFileUploaderRenderer() {
  ob_start();
  myFileUploader();
  return ob_get_clean();
}

add_shortcode('custom_file_uploader', 'myFileUploaderRenderer');