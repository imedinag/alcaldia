<?php

namespace Drupal\alcaldia\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
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

Class AlcaldiaBlock extends BlockBase implements BlockPluginInterface{

  public function build(){
    $config = $this->getConfiguration();
    $text = $config['bloquealcaldia']['value'];
    return [
      '#markup' => $this->t($text),
    ];
  }
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['bloquealcaldia'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Body'),
      '#description' => $this->t('Cuerpo del bloque'),
      '#default_value' => isset($config['bloquealcaldia']) ? $config['bloquealcaldia']['value'] : '',
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['bloquealcaldia'] = $form_state->getValue('bloquealcaldia');
  }


}
