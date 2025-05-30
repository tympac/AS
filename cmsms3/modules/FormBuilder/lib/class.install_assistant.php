<?php


namespace FormBuilder;


class install_assistant
{
  public static function CreateConfig()
  {
    $fn_to = 'fb_cnf.inc';
    $fn_from = 'fb_cnf_sample.inc';
    $folder_path = \cms_join_path(
    \cms_utils::get_module(__NAMESPACE__)->GetModulePath(),
      'includes'
    );
    
    return @\copy(
      \cms_join_path($folder_path, $fn_from),
      \cms_join_path($folder_path, $fn_to)
    );
  }
}

?>