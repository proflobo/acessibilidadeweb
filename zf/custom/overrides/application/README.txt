=================
ABOUT THIS FOLDER
=================

Use "framework-vars-overrides.php" to add your overrides to any of Zhong's variables. For example, here's how to change a language variable:

// Code begins
$this->global_vars['language']['main-menu'] = 'Menu';
// Code ends

You can also override any of the Zhong's views. For example:

// Code begins
$this->global_vars['views-overrides']['views__modules__siteLogo'] = '<img alt="" src="/my-logo.png"/>';
// Code ends

To see which views are overridable, check the views methods in ZhongFramework.php
