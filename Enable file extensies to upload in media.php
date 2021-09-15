function custom_wp_check_filetype_and_ext($filetype_and_ext, $file, $filename) {
   if(!$filetype_and_ext['ext'] || !$filetype_and_ext['type'] || !$filetype_and_ext['proper_filename']) {
        $extension = pathinfo($filename)['extension'];
        $mime_type = mime_content_type($file);
        $allowed_ext = array(
            'dwg' => array('image/vnd.dwg', 'application/octet-stream'),
            'DWG' => array('image/vnd.dwg', 'application/octet-stream'),
            'ai' => array('application/postscript'),
        );
        if($allowed_ext[$extension]) {
            if(in_array($mime_type, $allowed_ext[$extension])) {
                $filetype_and_ext['ext'] = $extension;
                $filetype_and_ext['type'] = $mime_type;
                $filetype_and_ext['proper_filename'] = $filename;
            }
        }
    }
    return $filetype_and_ext;
}
add_filter('wp_check_filetype_and_ext', 'custom_wp_check_filetype_and_ext', 5, 5);
