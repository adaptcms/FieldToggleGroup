<?php

namespace Adaptcms\FieldToggleGroup;

use Adaptcms\Base\Models\Package;

class FieldToggleGroup
{
  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
