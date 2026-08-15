<?php
/* Smarty version 4.5.5, created on 2025-07-27 19:45:42
  from 'app:managementmanageEmails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_688673d632da19_75502867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09719f4591c99b1659fa7c09a44701548283ea2d' => 
    array (
      0 => 'app:managementmanageEmails.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_688673d632da19_75502867 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1871743490688673d6324441_91918421', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_1871743490688673d6324441_91918421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_1871743490688673d6324441_91918421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h1 class="app__pageHeading">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.manageEmails"),$_smarty_tpl ) );?>

	</h1>

	<list-panel
		class="manageEmails__listPanel"
		:items="currentMailables"
		:is-sidebar-visible="true"
	>
		<template #header>
			<pkp-header>
				<h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.publication.emails"),$_smarty_tpl ) );?>
</h1>
				<template #actions>
					<search
						search-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.mailables.search"),$_smarty_tpl ) );?>
"
						:search-phrase="searchPhrase"
						@search-phrase-changed="(newSearch) => this.searchPhrase = newSearch"
					></search>
					<pkp-button @click="confirmResetAll" :is-warnable="true">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.emails.resetAll"),$_smarty_tpl ) );?>

					</pkp-button>
				</template>
			</pkp-header>
		</template>
		<template #item-title="{item}">
			{{ item.name }}
		</template>
		<template #item-subtitle="{item}">
			{{ item.description }}
		</template>
		<template #item-actions="{item}">
			<pkp-button @click="openMailable(item)">
				<span aria-hidden="true">Edit</span>
				<span class="-screenReader">{{ t('common.editItem', {name: item.name}) }}</span>
			</pkp-button>
		</template>
		<template #sidebar>
			<pkp-header>
				<h2>
					<icon icon="Filter" class="h-4 w-4" :inline="true"></icon>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.filter"),$_smarty_tpl ) );?>

				</h2>
			</pkp-header>
			<pkp-filter
				v-for="(name, value) in groupFilters"
				:key="value"
				param="groupIds"
				:title="name"
				:value="value"
				:is-filter-active="isFilterActive('groupIds', value)"
				@add-filter="addFilter"
				@remove-filter="removeFilter"
			></pkp-filter>
			<div class="listPanel__block">
				<pkp-header>
					<h3>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.emails.sentFrom"),$_smarty_tpl ) );?>

					</h3>
				</pkp-header>
				<pkp-filter
					v-for="(name, value) in fromFilters"
					:key="value"
					param="fromRoleIds"
					:title="name"
					:value="parseInt(value, 10)"
					:is-filter-active="isFilterActive('fromRoleIds', parseInt(value))"
					@add-filter="addFilter"
					@remove-filter="removeFilter"
				></pkp-filter>
			</div>
			<div class="listPanel__block">
				<pkp-header>
					<h3>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.emails.sentTo"),$_smarty_tpl ) );?>

					</h3>
				</pkp-header>
				<pkp-filter
					v-for="(name, value) in toFilters"
					:key="value"
					param="toRoleIds"
					:title="name"
					:value="parseInt(value, 10)"
					:is-filter-active="isFilterActive('toRoleIds', parseInt(value))"
					@add-filter="addFilter"
					@remove-filter="removeFilter"
				></pkp-filter>
			</div>
		</template>
	</list-panel>
<?php
}
}
/* {/block "page"} */
}
