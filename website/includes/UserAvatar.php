<?php

class UserAvatar {
    private $userId;
    private $default = ICONS_DIR."default.png";
    function __construct($userId) {
        $this->userId = $userId;
    }

    function getUrl() {
        $p = ICONS_DIR.$this->userId.".png";
        if(!file_exists($p)) $p = $this->default;
        return $p;
    }

    function getImage($h = "20px", $w = "20px") {
        return '<img src="'.$this->getUrl().'" height="'.$h.'" width="'.$w.'" />';
    }

}

?>