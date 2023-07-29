<?php if (!empty($this->options->function) && in_array('LinkinNewtab', $this->options->function)) : ?>
    <script>
        (function() {
            [].forEach.call(document.querySelectorAll("a"), e => {
                if (e.href != "" && new URL(e.href).hostname != location.host ){
                    e.target = "_blank";
                    e.rel = "noopener";
                }
            });
        })();
    </script>

<?php endif; ?>
