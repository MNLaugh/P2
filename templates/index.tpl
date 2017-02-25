{config_load file="global.conf" section="setup"}
{include file="header.tpl"}
{if $loggedin == true}
	{include file="top_bar.tpl"}
	{include file="left_bar.tpl"}
	<BODY class="theme-indigo">
	    <!-- Page Loader -->
	    <div class="page-loader-wrapper">
	        <div class="loader">
	            <div class="md-preloader pl-size-md">
	                <svg viewbox="0 0 75 75">
	                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
	                </svg>
	            </div>
	            <p>Please wait...</p>
	        </div>
	    </div>
	    <!-- #END# Page Loader -->
	    <!-- Overlay For Sidebars -->
	    <div class="overlay"></div>
	    <!-- #END# Overlay For Sidebars -->
	    <section class="content">
	        <div class="container-fluid">
	        	<div class="block-header">
	        		{if isset($arianna)}{$arianna}{/if}
	            </div>
	            {* inclusion d'un template $variable - eg $module = 'contacts' *}
	            {include file="$page.tpl"}
	        </div>
	    </section>
{else}
	{include file="page/login.tpl"}
{/if}
{include file="footer.tpl"}
