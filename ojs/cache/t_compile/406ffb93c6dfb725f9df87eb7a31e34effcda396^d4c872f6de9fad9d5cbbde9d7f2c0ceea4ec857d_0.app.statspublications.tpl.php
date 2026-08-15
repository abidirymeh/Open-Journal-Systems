<?php
/* Smarty version 4.5.5, created on 2025-07-28 20:43:08
  from 'app:statspublications.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887d2cc7ee426_39134924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4c872f6de9fad9d5cbbde9d7f2c0ceea4ec857d' => 
    array (
      0 => 'app:statspublications.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6887d2cc7ee426_39134924 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8816480986887d2cc74dea1_35058014', "page");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_8816480986887d2cc74dea1_35058014 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_8816480986887d2cc74dea1_35058014',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div class="pkpStats">
		<pkp-header>
			<h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.publications"),$_smarty_tpl ) );?>
</h1>
			<spinner v-if="isLoadingTimeline"></spinner>
			<template #actions>
				<date-range
					unique-id="publication-stats-date-range"
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
				<pkp-header
					class="pkpStats__sidebarHeader"
					:tabindex="isSidebarVisible ? 0 : -1"
				>
					<h2>
						<icon icon="Filter" class="h-4 w-4" :inline="true"></icon>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.filter"),$_smarty_tpl ) );?>

					</h2>
				</pkp-header>
				<div
					v-for="(filterSet, index) in filters"
					:key="index"
					class="pkpStats__filterSet"
				>
					<pkp-header v-if="filterSet.heading">
						<h3>{{ filterSet.heading }}</h3>
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
				<div v-if="chartData" class="pkpStats__graph">
					<div class="pkpStats__graphHeader">
						<h2 class="pkpStats__graphTitle -screenReader" id="publication-stats-graph-title">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"submission.views"),$_smarty_tpl ) );?>

						</h2>
						<div class="pkpStats__graphSelectors">
							<div class="pkpStats__graphSelector pkpStats__graphSelector--timelineType">
								<pkp-button
									:aria-pressed="timelineType === 'abstract'"
									aria-describedby="publication-stats-graph-title"
									@click="setTimelineType('abstract')"
								>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.publications.abstracts"),$_smarty_tpl ) );?>

								</pkp-button>
								<pkp-button
									:aria-pressed="timelineType === 'files'"
									aria-describedby="publication-stats-graph-title"
									@click="setTimelineType('files')"
								>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"submission.files"),$_smarty_tpl ) );?>

								</pkp-button>
							</div>
							<div class="pkpStats__graphSelector pkpStats__graphSelector--timelineInterval">
								<pkp-button
									:aria-pressed="timelineInterval === 'day'"
									aria-describedby="publication-stats-graph-title"
									:disabled="!isDailyIntervalEnabled"
									@click="setTimelineInterval('day')"
								>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.daily"),$_smarty_tpl ) );?>

								</pkp-button>
								<pkp-button
									:aria-pressed="timelineInterval === 'month'"
									aria-describedby="publication-stats-graph-title"
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
							<caption v-if="timelineType === 'files'"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.publications.totalGalleyViews.timelineInterval"),$_smarty_tpl ) );?>
</caption>
							<caption v-else><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.publications.totalAbstractViews.timelineInterval"),$_smarty_tpl ) );?>
</caption>
							<thead>
								<tr>
									<th scope="col"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.date"),$_smarty_tpl ) );?>
</th>
									<th v-if="timelineType === 'files'" scope="col"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.fileViews"),$_smarty_tpl ) );?>
</th>
									<th v-else scope="col"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"submission.abstractViews"),$_smarty_tpl ) );?>
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
						<h2 id="publicationDetailTableLabel">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.publications.details"),$_smarty_tpl ) );?>

							<spinner v-if="isLoadingItems"></spinner>
						</h2>
						<template #actions>
							<div class="pkpStats__itemsOfTotal">
								{{
									replaceLocaleParams(itemsOfTotalLabel, {
										count: items.length,
										total: itemsMax
									})
								}}
								<a
									v-if="items.length < itemsMax"
									href="#publicationDetailTablePagination"
									class="-screenReader"
								>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.pagination.label"),$_smarty_tpl ) );?>

								</a>
							</div>
							<pkp-button
								ref="downloadReportModalButton"
								@click="openDownloadReportModal"
							>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.downloadReport"),$_smarty_tpl ) );?>

							</pkp-button>
						</template>
					</pkp-header>
					<pkp-table
						labelled-by="publicationDetailTableLabel"
						@sort="setOrderBy"
					>
						<table-header>
							<table-column
								v-for="column in tableColumns"
								:key="column.name"
								:id="column.name"
								:allows-sorting="column.name === 'total'"
							>
								<template v-if="column.name === 'title'">
									{{ column.label }}
									<search
										#thead-title
										class="pkpStats__titleSearch"
										:search-phrase="searchPhrase"
										search-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.searchSubmissionDescription"),$_smarty_tpl ) );?>
"
										@search-phrase-changed="setSearchPhrase"
									></search>
								</template>
								<template v-else>
									{{ column.label }}
								</template>
							</table-column>
						</table-header>
						<table-body>
							<table-row v-for="(row) in items" :key="row.key">
								<table-cell>
									<a
										:href="row.publication.urlPublished"
										class="pkpStats__itemLink"
										target="_blank"
									>
										<span class="pkpStats__itemAuthors">{{ row.publication.authorsStringShort }}</span>
										<span class="pkpStats__itemTitle">{{ localize(row.publication.fullTitle) }}</span>
									</a>
								</table-cell>
								<table-cell>{{ row.abstractViews }}</table-cell>
								<table-cell>{{ row.galleyViews }}</table-cell>
								<table-cell>{{ row.pdfViews }}</table-cell>
								<table-cell>{{ row.htmlViews }}</table-cell>
								<table-cell>{{ row.otherViews }}</table-cell>
								<table-cell>{{ row.total }}</table-cell>
							</table-row>
							<template #no-content v-if="!items.length">
								<template v-if="isLoadingItems">
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.loading"),$_smarty_tpl ) );?>

								</template>
								<template v-else>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.publications.none"),$_smarty_tpl ) );?>

								</template>
							</template>
						</table-body>
					</pkp-table>
					<pagination
						v-if="lastPage > 1"
						id="publicationDetailTablePagination"
						:current-page="currentPage"
						:is-loading="isLoadingItems"
						:last-page="lastPage"
						@set-page="setPage"
					></pagination>
				</div>
			</div>
		</div>
	</div>
<?php
}
}
/* {/block "page"} */
}
