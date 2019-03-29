<?php

namespace Drupal\alcaldia\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 *
 * @Block(
 *   id = "AlcaldiaBlock",
 *   admin_label = @Translation("Bloque Alcaldia"),
 *   category = @Translation("Alcaldia"),
 * )
 */

Class AlcaldiaBlock extends BlockBase {

  public function build(){
    return [
      '#markup' => $this->t('Bloque Alcadia'),
    ];
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['bloquealcaldia'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Body'),
      '#description' => $this->t('Cuerpo del bloque'),
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['bloquealcaldia'] = $form_state->getValue('bloquealcaldia');
  }


}
