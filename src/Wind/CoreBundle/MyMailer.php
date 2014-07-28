<?php
namespace Wind\CoreBundle;

class MyMailer {

  /**
   * @param $dest
   * @return string
   */
  public function send($dest) {
    return 'Mail has been send to '.$dest;
  }
}