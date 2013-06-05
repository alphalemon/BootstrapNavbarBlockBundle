<?php
/*
 * This file is part of the BootstrapNavbarBlockBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 * 
 * @license    MIT LICENSE
 * 
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
            'options' => array(
                'items' => $items, 
            ),
        ));
    }
}
