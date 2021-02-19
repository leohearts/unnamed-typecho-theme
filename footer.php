<?php if (!empty($this->options->function) && in_array('LinkinNewtab', $this->options->function)) {
    echo '<script>(function(){var res = document.querySelectorAll("a");for (var i=0;i<res.length;i++){  if(res[i].href!=""&&res[i].href.search(document.querySelectorAll("a")[2].href)){    res[i].target="_blank";res[i].rel="noopener";  }}})();</script>';
}
