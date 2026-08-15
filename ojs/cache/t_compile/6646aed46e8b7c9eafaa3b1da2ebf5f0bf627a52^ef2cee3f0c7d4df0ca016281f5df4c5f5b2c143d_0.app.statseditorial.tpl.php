<?php
/* Smarty version 4.5.5, created on 2025-07-28 20:45:12
  from 'app:statseditorial.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887d348afa5d8_98529635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef2cee3f0c7d4df0ca016281f5df4c5f5b2c143d' => 
    array (
      0 => 'app:statseditorial.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6887d348afa5d8_98529635 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17796435316887d348aebd01_91134435', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_17796435316887d348aebd01_91134435 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_17796435316887d348aebd01_91134435',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div class="pkpStats pkpStats--editorial">
		<h1 class="-screenReader"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.editorialActivity"),$_smarty_tpl ) );?>
</h1>
		<div v-if="activeByStage" class="pkpStats__graph">
			<div class="pkpStats--editorial__stageWrapper -pkpClearfix">
				<div class="pkpStats--editorial__stageChartWrapper">
					<doughnut-chart :chart-data="chartData"></doughnut-chart>
				</div>
				<div class="pkpStats--editorial__stageList">
					<h2 class="pkpStats--editorial__stage pkpStats--editorial__stage--total">
						<span class="pkpStats--editorial__stageCount">{{ totalActive }}</span>
						<span class="pkpStats--editorial__stageLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.submissionsActive"),$_smarty_tpl ) );?>
</span>
					</h2>
					<div v-for="stage in activeByStage" :key="stage.name" class="pkpStats--editorial__stage">
						<span class="pkpStats--editorial__stageCount">{{ stage.count }}</span>
						<span class="pkpStats--editorial__stageLabel">{{ stage.name }}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="pkpStats__panel">
			<pkp-header>
				<h1 id="editorialActivityTableLabel">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.trends"),$_smarty_tpl ) );?>

					<span v-if="isLoading" class="pkpSpinner" aria-hidden="true"></span>
				</h1>
				<template #actions>
					<date-range
						unique-id="editorial-stats-date-range"
						:date-start="dateStart"
						:date-start-min="dateStartMin"
						:date-end="dateEnd"
						:date-end-max="dateEndMax"
						:options="dateRangeOptions"
						date-range-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange"),$_smarty_tpl ) );?>
"
						date-format-instructions-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.instructions"),$_smarty_tpl ) );?>
"
						change-date-range-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.change"),$_smarty_tpl ) );?>
"
						since-date-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.sinceDate"),$_smarty_tpl ) );?>
"
						until-date-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.untilDate"),$_smarty_tpl ) );?>
"
						all-dates-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.allDates"),$_smarty_tpl ) );?>
"
						custom-range-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.customRange"),$_smarty_tpl ) );?>
"
						from-date-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.from"),$_smarty_tpl ) );?>
"
						to-date-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.to"),$_smarty_tpl ) );?>
"
						apply-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.apply"),$_smarty_tpl ) );?>
"
						invalid-date-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.invalidDate"),$_smarty_tpl ) );?>
"
						date-does-not-exist-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.dateDoesNotExist"),$_smarty_tpl ) );?>
"
						invalid-date-range-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.invalidDateRange"),$_smarty_tpl ) );?>
"
						invalid-end-date-max-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.invalidEndDateMax"),$_smarty_tpl ) );?>
"
						invalid-start-date-min-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.dateRange.invalidStartDateMin"),$_smarty_tpl ) );?>
"
						@set-range="setDateRange"
						@updated:current-range="setCurrentDateRange"
					></date-range>
					<pkp-button
						v-if="filters.length"
						:is-active="isSidebarVisible"
						@click="toggleSidebar"
					>
						<icon icon="Filter" class="h-4 w-4" :inline="true"></icon>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.filter"),$_smarty_tpl ) );?>

					</pkp-button>
				</template>
			</pkp-header>
			<div class="pkpStats__container -pkpClearfix">
				<!-- Filters in the sidebar -->
				<div
					v-if="filters.length"
					ref="sidebar"
					class="pkpStats__sidebar"
					:class="sidebarClasses"
				>
					<div
						v-for="(filterSet, index) in filters"
						:key="index"
						class="pkpStats__filterSet"
					>
						<pkp-header v-if="filterSet.heading">
							<h2>{{ filterSet.heading }}</h2>
						</pkp-header>
						<pkp-filter
							v-for="filter in filterSet.filters"
							:key="filter.param + filter.value"
							v-bind="filter"
							:is-filter-active="isFilterActive(filter.param, filter.value)"
							@add-filter="addFilter"
							@remove-filter="removeFilter"
						></pkp-filter>
					</div>
				</div>
				<div class="pkpStats__content">
					<div class="pkpStats__table" role="region" aria-live="polite">
						<pkp-table
							class="pkpTable--editorialStats"
							labelled-by="editorialActivityTableLabel"
						>
							<table-header>
								<table-column v-for="column in tableColumns" :key="column.name" :id="column.name">
									{{ column.label }}
								</table-column>
							</table-header>
							<table-body>
								<table-row
									v-for="(row, index) in tableRows"
									:key="row.key"
								>
									<table-cell>
										{{ row.name }}
										<tooltip v-if="row.description"
											:label="t('stats.descriptionForStat', {stat: row.name})"
											:tooltip="row.description"
											icon-size="small"
										></tooltip>
									</table-cell>
									<table-cell>{{ row.dateRange }}</table-cell>
									<table-cell>{{ row.total }}</table-cell>
								</table-row>
							</table-body>
						</pkp-table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
}
/* {/block "page"} */
}
