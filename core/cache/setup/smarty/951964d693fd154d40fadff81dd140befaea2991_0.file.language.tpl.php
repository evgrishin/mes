<?php
/* Smarty version 3.1.33, created on 2019-09-26 11:00:43
  from 'C:\domains\newprojects\mega-son\www\setup\templates\language.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c702b0e04c8_35503496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '951964d693fd154d40fadff81dd140befaea2991' => 
    array (
      0 => 'C:\\domains\\newprojects\\mega-son\\www\\setup\\templates\\language.tpl',
      1 => 1550128366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8c702b0e04c8_35503496 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="install" action="?" method="post">

<?php if ($_smarty_tpl->tpl_vars['restarted']->value) {?>
    <br class="clear" />
    <br class="clear" />
    <p class="note"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['restarted_msg'];?>
</p>
<?php }?>

<div class="setup_navbar" style="border-top: 0;">
    <p class="title"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['choose_language'];?>
:
        <select name="language" autofocus="autofocus">
            <?php echo $_smarty_tpl->tpl_vars['languages']->value;?>

    	</select>
    </p>

    <input type="submit" name="proceed" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['select'];?>
" />
</div>
</form><?php }
}
