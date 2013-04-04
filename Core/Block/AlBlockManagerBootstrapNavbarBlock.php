<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\BootstrapNavbarBlockBundle\Core\Block;

use AlphaLemon\Block\MenuBundle\Core\Block\AlBlockManagerMenu;

/**
 * Description of AlBlockManagerBootstrapNavbarBlock
 */
class AlBlockManagerBootstrapNavbarBlock extends AlBlockManagerMenu
{
    protected $blocksTemplate = 'BootstrapNavbarBlockBundle:Content:navbar.html.twig';    
}
