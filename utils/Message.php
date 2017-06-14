
<?php

class Message {

    static function succes($msg) {
        echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
    }

    static function error($msg) {
        echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
    }
    static function alert($msg) {
        echo '<div class="alert alert-warning" role="alert">' . $msg . '</div>';
    }
    

}
?>
