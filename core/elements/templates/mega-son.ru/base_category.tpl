{extends 'file:templates/mega-son.ru/base.tpl'}
{block 'content'}
    <h1>category default</h1>
    {$_modx->runSnippet("!mFilter2", [
    'element' => 'msProducts',
    'class' => 'msProduct',
    'where' => '{"Data.vendor":1}',
    ])}
{/block}