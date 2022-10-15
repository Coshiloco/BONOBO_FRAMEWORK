<?php


// Para la importacion ponemos el namespace que hemos creado
namespace Bonovo;


class HttpNotFoundException extends \Exception {
  
  public function __construct(string $messeage)
  {
    parent::__construct($messeage);
  }

}