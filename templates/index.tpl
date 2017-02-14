{config_load file="global.conf" section="setup"}
{include file="header.tpl" title=Manager}
{*include file="top_bar.tpl" title=Manager*}
{*include file="left_bar.tpl"*}

    <section class="content">
        <div class="container-fluid">
        	<div class="block-header">
        		{$arianna}
            </div>
            {* inclusion d'un template $variable - eg $module = 'contacts' *}
            {include file="$page.tpl"}
        </div>
    </section>

{include file="footer.tpl"}
