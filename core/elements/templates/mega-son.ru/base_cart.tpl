{extends 'file:templates/mega-son.ru/base.tpl'}
{block 'content'}
{$_modx->runSnippet("!msCart", [
    'tpl' => '@FILE chunks/msCart.tpl'
])}

    {$_modx->runSnippet("!msOrder", [
    'tpl' => '@FILE chunks/msOrder.tpl'
    ])}
{/block}