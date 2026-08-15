<?php
/* Smarty version 4.5.5, created on 2025-07-28 20:44:58
  from 'app:statscontext.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887d33a68abc8_52971229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1386d3280315c9197386ff1cab0947ea47d51a56' => 
    array (
      0 => 'app:statscontext.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6887d33a68abc8_52971229 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4522766316887d33a6753f1_48242957', "page");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_4522766316887d33a6753f1_48242957 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_4522766316887d33a6753f1_48242957',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div class="pkpStats">
		<pkp-header>
			<h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"context.context"),$_smarty_tpl ) );?>
</h1>
			<spinner v-if="isLoadingTimeline"></spinner>
			<template #actions>
				<date-range
					unique-id="context-stats-date-range"
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
				></date-range>
			</template>
		</pkp-header>
		<div class="pkpStats__container -pkpClearfix">
			<div class="pkpStats__content">
				<div v-if="chartData" class="pkpStats__graph">
					<div class="pkpStats__graphHeader">
						<h2 class="pkpStats__graphTitle -screenReader" id="context-stats-graph-title">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.views"),$_smarty_tpl ) );?>

						</h2>
						<div class="pkpStats__graphSelectors">
							<div class="pkpStats__graphSelector pkpStats__graphSelector--timelineInterval">
								<pkp-button
									:aria-pressed="timelineInterval === 'day'"
									aria-describedby="context-stats-graph-title"
									:disabled="!isDailyIntervalEnabled"
									@click="setTimelineInterval('day')"
								>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.daily"),$_smarty_tpl ) );?>

								</pkp-button>
								<pkp-button
									:aria-pressed="timelineInterval === 'month'"
									aria-describedby="context-stats-graph-title"
									:disabled="!isMonthlyIntervalEnabled"
									@click="setTimelineInterval('month')"
								>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.monthly"),$_smarty_tpl ) );?>

								</pkp-button>
							</div>
						</div>
					</div>
					<div class="sr-only">
						<table class="-screenReader" role="region" aria-live="polite">
							<caption><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.views.timelineInterval"),$_smarty_tpl ) );?>
</caption>
							<thead>
								<tr>
									<th scope="col"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.date"),$_smarty_tpl ) );?>
</th>
									<th scope="col"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.views"),$_smarty_tpl ) );?>
</th>
								</tr>
							</thead>
							<tbody>
								<tr	v-for="segment in timeline" :key="segment.date">
									<th scope="row">{{ segment.label }}</th>
									<td>{{ segment.value }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<line-chart :chart-data="chartData" aria-hidden="true"></line-chart>
					<span v-if="isLoadingTimeline" class="pkpStats__loadingCover">
						<spinner></spinner>
					</span>
				</div>
				<div class="pkpStats__panel" role="region" aria-live="polite">
					<pkp-header>
						<h2 id="contextDetailTableLabel">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.views"),$_smarty_tpl ) );?>

							<tooltip
								tooltip="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.context.tooltip.text"),$_smarty_tpl ) );?>
"
								label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.context.tooltip.label"),$_smarty_tpl ) );?>
"
							></tooltip>
							<spinner v-if="isLoadingItems"></spinner>
						</h2>
						<template #actions>
							<pkp-button
								ref="downloadReportModalButton"
								@click="openDownloadReportModal"
							>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.downloadReport"),$_smarty_tpl ) );?>

							</pkp-button>
						</template>
					</pkp-header>
					<pkp-table labelled-by="contextDetailTableLabel">
						<table-header>
							<table-column v-for="column in tableColumns" :key="column.name" :id="column.name">
								{{ column.label }}
							</table-column>
						</table-header>
						<table-body>
							<table-row v-for="(row) in items" :key="row.key">
								<table-cell>
									<a
										:href="row.url"
										class="pkpStats__itemLink"
										target="_blank"
									>
										<span class="pkpStats__itemTitle">{{ localize(row.name) }}</span>
									</a>
								</table-cell>
								<table-cell>{{ row.total }}</table-cell>
							</table-row>
							<template #no-content v-if="!items.length && isLoadingItems">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.loading"),$_smarty_tpl ) );?>

							</template>
						</table-body>
					</pkp-table>
				</div>
			</div>
		</div>
	</div>
<?php
}
}
/* {/block "page"} */
}
