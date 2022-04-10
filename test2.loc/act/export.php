<?php

 include('simple_html_dom.php');

 $html = file_get_html('../index.php');

 echo $html->find('title', 0)->plaintext;

?>