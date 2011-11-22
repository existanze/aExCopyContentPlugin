<?php

class copyContentActions extends sfActions
{

  public function executeCopy(sfWebRequest $request)
  {
  	$page_id = $request->getParameter('id');
	$page = aPageTable::retrieveByIdWithSlots($page_id);
	if (sfContext::getInstance()->getUser()->isAuthenticated() && $page)
    {
    	$culture = sfContext::getInstance()->getUser()->getCulture();
		$fallback = sfConfig::get('sf_default_culture', 'en');
    	
		if ($culture !== $fallback){
			$page_fallback = aPageTable::retrieveByIdWithSlots($page_id, $fallback);
			foreach ($page_fallback->Areas as $area)
		     {
		       $areaVersion = $area->AreaVersions[0];
		       foreach ($areaVersion->AreaVersionSlots as $areaVersionSlot)
		       {
		         $slot = $areaVersionSlot->Slot;
		         $permid = $areaVersionSlot->permid;
		         //$slot = $slot->copy();
		         if ($area->getName() == 'title'){
		         	//$page->setTitle(page_fallback->getTitle());
		         }else{
		         	$page->newAreaVersion($area->getName(), 'update', array('slot' => $slot, 'permid' => $permid, 'top' => false));
		         }
		         
		       }
		     }
		}
    	sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance()->redirect($_SERVER["SCRIPT_NAME"].$page->slug);
    }else{
		$this->setTemplate('error');
    }
  	
  }
  
	
}
