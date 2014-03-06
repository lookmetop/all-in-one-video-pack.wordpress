<?php
class Kaltura_SidebarWidgetController extends Kaltura_BaseController
{
	protected function allowedActions()
	{
		return array('videocomments', 'videoposts');
	}

	public function videocommentsAction()
	{
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$pageSize = 5;

		$widgets 	= Kaltura_WPModel::getLastPublishedCommentWidgets($page, $pageSize);
		$totalCount = Kaltura_WPModel::getLastPublishedCommentWidgetsCount();

		$viewData['lastPage'] = false;
		$viewData['firstPage'] = false;

		if ($page * $pageSize >= $totalCount)
			$viewData['lastPage'] = true;

		if ($page == 1)
			$viewData['firstPage'] = true;

		$viewData['page'] = $page;
		$viewData['widgets'] = $widgets;
		$viewData['totalCount'] = $totalCount;

		$this->renderView('sidebar-widget/videocomments.php', $viewData);
		die;
	}

	public function videopostsAction()
	{
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$pageSize = 5;

		$widgets 	= Kaltura_WPModel::getLastPublishedPostWidgets($page, $pageSize);
		$totalCount = Kaltura_WPModel::getLastPublishedPostWidgetsCount();

		$viewData['lastPage'] = false;
		$viewData['firstPage'] = false;
		
		if ($page * $pageSize >= $totalCount)
			$viewData['lastPage'] = true;

		if ($page == 1)
			$viewData['firstPage'] = true;

		$viewData['page'] = $page;
		$viewData['widgets'] = $widgets;
		$viewData['totalCount'] = $totalCount;

		$this->renderView('sidebar-widget/videoposts.php', $viewData);
		die;
	}
}