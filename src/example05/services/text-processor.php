<?php

class TextProcessingService {
    public function removeSwearWords($text) {
        return str_replace('damn', '****', $text);
    }

    public function makeTextHtmlSafe($text) {
        return htmlspecialchars($text);
    }
}
