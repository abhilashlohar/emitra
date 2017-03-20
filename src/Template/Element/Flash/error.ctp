<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="callout callout-danger" onclick="this.classList.add('hidden');"><?= $message ?></div>
