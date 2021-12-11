<?php

/**
 * Mail / Elements / mail_input
 *
 * @var BcAppView $this
 */

$group_field = null;
$iteration = 0;
if (!isset($blockEnd)) {
	$blockEnd = 0;
}

if (!empty($mailFields)) {

	foreach ($mailFields as $key => $record) {

		$field = $record['MailField'];
		$iteration++;
		if ($field['use_field'] && ($blockStart && $iteration >= $blockStart) && (!$blockEnd || $iteration <= $blockEnd)) {

			$attributes = $this->Mailfield->getAttributes($record);
			$attributes['placeholder'] = $field['head'];
			$options = $this->Mailfield->getOptions($record);
			if ($field['not_empty'] && $attributes['placeholder']) {
				$attributes['placeholder'] .= '*';
			}

			if ($group_field != $field['group_field'] || (!$group_field && !$field['group_field'])) {
				$id = 'RowMessage' . Inflector::camelize($record['MailField']['field_name']);
				$class = ['field'];
				if ($attributes['class']) $class[] = $attributes['class'];
				$style = '';
				if ($field['type'] == 'hidden') $style = ' style="display:none"';
				echo '<div id="' . $id . '" class="' . implode(' ', $class) . '"' . $style . '>' . "\n";
			}

			if ($freezed && $field['no_send']) {
				$type = 'hidden';
			} else {
				$type = $field['type'];
			}
			if ($freezed && !$field['no_send']) {
				echo '<div>' . $attributes['placeholder'] . '</div>';
			}
			echo $this->Mailform->control(
				$type,
				"MailMessage." . $field['field_name'],
				$options,
				$attributes
			);


			$isGroupValidComplate = in_array('VALID_GROUP_COMPLATE', explode(',', $field['valid_ex']));
			if (!$isGroupValidComplate) {
				echo $this->Mailform->error("MailMessage." . $field['field_name']);
			}
			$isRequiredToClose = true;
			if ($this->Mailform->isGroupLastField($mailFields, $field)) {
				if ($isGroupValidComplate) {
					$groupValidErrors = $this->Mailform->getGroupValidErrors($mailFields, $field['group_valid']);
					if ($groupValidErrors) {
						foreach ($groupValidErrors as $groupValidError) {
							echo $groupValidError;
						}
					}
				}
				echo $this->Mailform->error("MailMessage." . $field['group_valid'] . "_not_same", __("入力データが一致していません。"));
				echo $this->Mailform->error("MailMessage." . $field['group_valid'] . "_not_complate", __("入力データが不完全です。"));
			} elseif (!empty($field['group_field'])) {
				$isRequiredToClose = false;
			}
			if ($isRequiredToClose) {
				echo "</div>\n";
			}
			$group_field = $field['group_field'];
		}
	}
}
