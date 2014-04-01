<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.controller');

class DiglibControllerFavorites extends JController
{
	public function __construct($config = array())
	{
		parent::__construct($config);

		$this->registerTask('unfavorite', 'setFavorite');
		$this->registerTask('favorite', 'setFavorite');
	}

	public function setFavorite()
	{
		$task = $this->getTask();
		
		$type = JRequest::getString('type');
		$type_id = JRequest::getInt('id');

		$model = $this->getModel('Favorites');

		$user_id = JFactory::getUser()->id;

		if ($user_id) {
			if ($task == 'favorite') {
				$model->addFavorite($type, $type_id, $user_id);
			} else {
				$model->removeFavorite($type, $type_id, $user_id);
			}

			echo json_encode(array('state' => $task));
		} else {
			echo json_encode(array('state' => 'error'));
		}

	}
}