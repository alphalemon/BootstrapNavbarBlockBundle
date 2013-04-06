<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\BootstrapNavbarBlockBundle\Core\Block;

use AlphaLemon\Block\MenuBundle\Core\Block\AlBlockManagerMenu;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock\AlBlockManagerJsonBlock;

/**
 * Description of AlBlockManagerBootstrapNavbarBlock
 */
class AlBlockManagerBootstrapNavbarBlock extends AlBlockManagerMenu
{
    protected $blocksTemplate = 'BootstrapNavbarBlockBundle:Content:navbar.html.twig';    
    
    public function getDefaultValue()
    {
        $value = '
            {
                "0": {
                    "blockType" : "Link"
                },
                "1": {
                    "blockType" : "Link"
                }
            }';
            
        return array('Content' => $value);
    }
    
    protected function renderHtml()
    {
        $items = AlBlockManagerJsonBlock::decodeJsonContent($this->alBlock->getContent());
        
        return array('RenderView' => array(
            'view' => 'BootstrapNavbarBlockBundle:Content:navbar.html.twig',
            'options' => array( 'items' => $items, 'parent' => $this->alBlock),
        ));
    }
}