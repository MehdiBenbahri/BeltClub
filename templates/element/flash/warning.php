<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-warning m-2" onclick="this.classList.add('d-none');">
    <div class="d-flex justify-content-between align-items-center">
        <span><?= $message ?></span>
        <button class="btn btn-sm btn-outline-warning"><i class="bi bi-eraser"></i></button>
    </div>
</div>
