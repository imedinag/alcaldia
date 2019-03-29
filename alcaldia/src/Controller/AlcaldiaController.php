<?php

namespace Drupal\alcaldia\Controller;

class AlcaldiaController {
  public function content(){
    return [
      '#type' => 'markup',
      '#markup' => t('<label for="titulo">Titulo:</label><input type="text" id="titulo">'),
    ];
  }
}
