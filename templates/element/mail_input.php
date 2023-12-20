<?php
/**
 * Mail / Elements / mail_input
 *
 * @var \BcMail\View\MailFrontAppView $this
 */

$group_field = null;
$iteration = 0;
if (!isset($blockEnd)) {
	$blockEnd = 0;
}

if (!empty($mailFields)) {
  foreach ($mailFields as $key => $field) {
    $iteration++;
    if ($field->use_field && ($blockStart && $iteration >= $blockStart) && (!$blockEnd || $iteration <= $blockEnd)) {

      $next_key = $key + 1;
      $description = $field->description;

      $attributes = $this->Mailfield->getAttributes($field);
      $attributes['placeholder'] = $field['head'];
      $options = $this->Mailfield->getOptions($field);
      if ($field->not_empty && $attributes['placeholder']) {
        $attributes['placeholder'] .= '*';
      }

      if ($group_field != $field->group_field || (!$group_field && !$field->group_field)) {
        $id = 'RowMessage' . \Cake\Utility\Inflector::camelize($field->field_name);
        $class = ['field'];
        if ($attributes['class']) $class[] = $attributes['class'];
        $style = '';
        if ($field->type == 'hidden') $style = ' style="display:none"';
        echo '<div id="' . $id . '" class="' . implode(' ', $class) . '"' . $style . '>' . "\n";
      }

      if ($freezed && $field->no_send) {
        echo $this->BcBaser->mailFormControl(
          $field->field_name,
          array_merge($attributes, [
            'type' => 'hidden',
            'options' => $options
          ])
        );
      } else {
        echo '<div>' . $attributes['placeholder'] . '</div>';
        echo $this->BcBaser->mailFormControl(
          $field->field_name,
          array_merge($attributes, [
            'type' => $field->type,
            'options' => $options
          ])
        ) . (($freezed)? '&nbsp;' : '');
      }

      $isGroupValidComplate = in_array('VALID_GROUP_COMPLATE', explode(',', $field->valid_ex));
      if(!$isGroupValidComplate) {
        echo $this->BcBaser->mailFormError("MailMessage." . $field->field_name);
      }
      $isRequiredToClose = true;
      if ($this->BcBaser->isMailFormGroupLastField($mailFields, $field)) {
        if($isGroupValidComplate) {
          $groupValidErrors = $this->BcBaser->getMailFormGroupValidErrors($mailFields, $field->group_valid);
          if ($groupValidErrors) {
            foreach($groupValidErrors as $groupValidError) {
              echo $groupValidError;
            }
          }
        }
        echo $this->BcBaser->mailFormError("MailMessage." . $field->group_valid . "_not_same", __d('baser_core', "入力データが一致していません。"));
        echo $this->BcBaser->mailFormError("MailMessage." . $field->group_valid . "_not_complate", __d('baser_core', "入力データが不完全です。"));
      } elseif(!empty($field->group_field)) {
        $isRequiredToClose = false;
      }
      if($isRequiredToClose) {
        echo "</div>\n";
      }
      $group_field = $field->group_field;
    }
  }
}
