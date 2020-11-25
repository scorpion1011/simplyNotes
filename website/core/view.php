<?php
ob_start(function ($content) {
    return str_replace('{{ content }}', $content, file_get_contents(__DIR__ . '/../views/layout.php'));
});