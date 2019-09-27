<?php
/* Smarty version 3.1.33, created on 2019-09-26 11:00:45
  from 'C:\domains\newprojects\mega-son\www\setup\templates\welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c702d887477_19731230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c37f55f5214b8af40ca4428301f88aae6696730' => 
    array (
      0 => 'C:\\domains\\newprojects\\mega-son\\www\\setup\\templates\\welcome.tpl',
      1 => 1550128366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8c702d887477_19731230 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="assets/js/sections/welcome.js"><?php echo '</script'; ?>
>
<form id="welcome" action="?action=welcome" method="post">
<div>
    <h2><?php echo $_smarty_tpl->tpl_vars['_lang']->value['welcome'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['_lang']->value['welcome_message'];?>

    <br />
</div>

<?php if (@constant('MODX_SETUP_KEY') != '@traditional@') {?>
<p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key_change'];?>
</p>

<div id="cck-div">
    <h3><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key'];?>
</h3>
    <p><small><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key_override'];?>
</small></p>
    <div class="labelHolder">
        <label for="config_key"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key'];?>
</label>
        <input type="text" name="config_key" id="config_key" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config_key']->value, ENT_QUOTES, 'UTF-8', true);?>
" style="width:250px" />
        <br />
        <?php if ($_smarty_tpl->tpl_vars['writableError']->value) {?>
        <span class="field_error"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_not_writable_err'];?>
</span>
        <?php }?>
    </div>
</div>
<?php }?>
<div class="setup_navbar">
    <input type="submit" name="proceed" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['next'];?>
" autofocus="autofocus" />
</div>
</form>
<?php }
}
