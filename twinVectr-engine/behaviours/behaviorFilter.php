<?php


namespace twinVectr\engine;

/**
 * Base Action Behavior class
 */
class BehaviorFilter extends \twinVectr\engine\Behavior {

  // Action key
  public $Filter;

  
  function __construct($componentInstance) {
    // Basic Validation
    if(!$this->Filter) {
      // Log
      //\Evoke\Core\Theme::$Instance->logError('Component: '. $componentInstance->Name .', Behavior: '. $this->Name .' (BehaviorAction) - "Action" prop must be set.');
    }

    // Base constructor
    parent::__construct($componentInstance);
  }

  /**
   * Add Wordpress action hook
   *
   * Validate action hook name first
   *
   * @override
   *
   * @param string $actionHookName Name of the hook action
   * @param string|array $callback Wordpress callback
   * @param int $priority Used to specify the order in which the functions associated with a particular action are executed
   * @param int $acceptedArgs The number of arguments the function accepts
   */
  protected function addFilter($filterHookName, $callback, $priority = 10, $acceptedArgs = 1) {
    // Basic Validation
    if($this->Action != $actionHookName) {
      // Log
      //\Evoke\Core\Theme::$Instance->logError('Component: '. $this->_compoment->Name .', Behavior: '. $this->Name .' (BehaviorAction) - "actionHookName" parameter passed into the addAction() method must be equal to Behavior\'s "Action" prop.');
      return;
    }

    add_filter($filterHookName, $callback, $priority, $acceptedArgs);
  }
}

?>
