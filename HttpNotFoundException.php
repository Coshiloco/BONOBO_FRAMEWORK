<?php

class HttpNotFoundException extends Exception {
  
  public function __construct(string $messeage)
  {
    parent::__construct($messeage);
  }

}