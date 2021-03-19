<?php

namespace Adaptcms\FieldToggleGroup\Field;

use Illuminate\Http\Request;

use Adaptcms\Fields\FieldType;

class FieldToggleGroup extends FieldType
{
  /**
  * @var array
  */
  public $defaultSettings = [
    'options' => [
      'is_sortable'        => false,
      'is_searchable'      => false,
      'is_required_create' => false,
      'is_required_edit'   => false
    ],
    'action_rules' => [
      'index'  => false,
      'create' => true,
      'edit'   => true,
      'show'   => true,
      'search' => false
    ]
  ];

  /**
  * Migration Command
  * When a package field is made from this field, you must supply a valid
  * migration string in string format.
  * Here is an example, please note the use of `:columnName` and having the command
  * in single quotes so the CMS can execute the command via migrations:
  *
  * '$table->string(":columnName")->nullable();'
  *
  * @return string
  */
  public function migrationCommand()
  {
    return '$table->json(":columnName");';
  }

  /**
  * Get Value
  *
  * @param mixed $value
  *
  * @return mixed
  */
  public function getValue($value)
  {
    // if (!empty($value)) {
    //   $value = json_decode($value, true);
    // }

    return $value;
  }

  /**
  * Create Field Rules
  *
  * @return array
  */
  public function createFieldRules()
  {
    return [
      'meta'         => 'required|min:1',
      'meta.0'       => 'required',
      'meta.0.key'   => 'required',
      'meta.0.label' => 'required'
    ];
  }

  /**
  * Update Field Rules
  *
  * @return array
  */
  public function updateFieldRules()
  {
    return [
      'meta'         => 'required|min:1',
      'meta.0'       => 'required',
      'meta.0.key'   => 'required',
      'meta.0.label' => 'required'
    ];
  }
}
