User-agent: *

{**$_modx->runSnippet("pdoResources", [
"parent" => "0",
"limit" => 0,
"tpl" => {$_modx->config.site_url}
])**}

Host: {$_modx->config.site_url}

Sitemap: {24 | url : ["scheme" => "full"]}

{** Sitemap: {$_modx->config.site_url}sitemap.xml
**}