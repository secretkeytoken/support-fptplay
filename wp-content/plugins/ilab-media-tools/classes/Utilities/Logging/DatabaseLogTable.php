<?php

// Copyright (c) 2016 Interfacelab LLC. All rights reserved.
//
// Released under the GPLv3 license
// http://www.gnu.org/licenses/gpl-3.0.html
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************


namespace MediaCloud\Plugin\Utilities\Logging;

use MediaCloud\Plugin\Utilities\View;

class DatabaseLogTable extends \WP_List_Table {
	/** @var null|DatabaseLogger Logger  */
	private $logger = null;

	public function __construct($args = []){
		parent::__construct(array_merge([
			'singular' => 'Log Entry',
			'plural' => 'Log Entries',
			'ajax' => false
		], $args));

		$this->logger = new DatabaseLogger();
	}

	public function no_items() {
		return 'No log entries';
	}

	public function get_columns() {
		return [
			'date' => 'Date',
			'level' => 'Level',
			'class' => 'Class',
			'method' => 'Method',
			'line' => 'Line',
			'message' => 'Message',
			'context' => 'Context'
		];
	}

	public function get_sortable_columns() {
		return [];
	}

	public function get_bulk_actions() {
		return [
		];
	}

	public function process_bulk_action() {
	}

	public function prepare_items() {
		$logLevel = (!empty($_REQUEST['level'])) ? $_REQUEST['level'] : null;
		$class = (!empty($_REQUEST['class'])) ? $_REQUEST['class'] : null;
		$search = (!empty($_REQUEST['message'])) ? $_REQUEST['message'] : null;

		$columns = $this->get_columns();
		$this->_column_headers = array($columns, [], []);

		$perPage = $this->get_items_per_page('log_entries_per_page', 120);
		$currentPage = $this->get_pagenum();

		$this->set_pagination_args([
			'total_items' => $this->logger->totalEntries($logLevel, $class, $search),
			'per_page' => $perPage
		]);

		$this->items = $this->logger->getLogEntries($logLevel, $class, $search, $perPage, $currentPage);
	}

	protected function get_table_classes() {
		$mode = get_user_setting( 'posts_list_mode', 'list' );

		$mode_class = esc_attr( 'table-view-' . $mode );

		return array('mediacloud-table', 'widefat', 'striped', $mode_class, $this->_args['plural'] );
	}

	public function column_date($item) {
		return '<span style="white-space:nowrap">'.date('n/j/Y g:i a',strtotime($item['date'])).'</span>';
	}

	public function column_level($item) {
		return $item['level'];
	}

	public function column_message($item) {
		return (strpos($item['message'], '<pre>') !== false) ? $item['message'] : esc_html($item['message']);
	}

	public function column_context($item) {
		return esc_html($item['context']);
	}

	public function column_class($item) {
		return '<div style="white-space:nowrap">'.$item['class'].'</div>';
	}

	public function column_method($item) {
		return '<span style="white-space:nowrap">'.$item['method'].'</span>';
	}

	public function column_line($item) {
		return '<span style="white-space:nowrap">'.$item['line'].'</span>';
	}

	public function extra_tablenav($which)
	{
		parent::extra_tablenav($which); // TODO: Change the autogenerated stub

		if ($which == 'top') {
			echo View::render_view('debug.log-filter', [
				'classes' => $this->logger->getClasses()
			]);
//            echo "<div class='log-options'>";
//            echo "<form method='post'><input type='hidden' name='action' value='csv'><input type='submit' style='display:inline-block' class='button button-primary' value='Export CSV'></form>";
//            echo "&nbsp;";
//            echo "<form method='post'><input type='hidden' name='action' value='bug'><input type='submit' style='display:inline-block' class='button button-primary' value='Generate System Report'></form>";
//            echo "&nbsp;";
//            echo "&nbsp;";
//            echo "&nbsp;";
//            echo "<form id='ilab-clear-log-form' method='post'><input type='hidden' name='action' value='clear-log'><input type='submit' style='display:inline-block' class='button button-warning' value='Clear Log'></form>";
//            echo "</div>";
		}
	}
}