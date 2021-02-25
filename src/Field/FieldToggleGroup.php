<?php

namespace Adaptcms\FieldToggleGroup\Field;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Adaptcms\Base\Models\PackageField;
use Adaptcms\Fields\FieldType;

class FieldToggleGroup extends FieldType
{
  /**
  * Rules applied when record is being stored with a post type.
  *
  * @var array
  */
  public $storeRules = [
    //
  ];

  /**
  * Rules applied when record is being updated with a post type.
  *
  * @var array
  */
  public $updateRules = [
    //
  ];

  /**
  * @var boolean
  */
  // public $shouldNotSetData = true;

  /**
  * @var boolean
  */
  public $isVisible = true;

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
    return $value;
  }

  /**
  * Set Value
  *
  * @param mixed $value
  *
  * @return void
  */
  public function setValue($value)
  {
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
