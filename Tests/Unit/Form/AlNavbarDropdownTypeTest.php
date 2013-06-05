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


namespace AlphaLemon\Block\BootstrapNavbarBlockBundle\Tests\Unit\Core\Form;

use AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\Form\Base\AlBaseType;
use AlphaLemon\Block\BootstrapNavbarBlockBundle\Core\Form\AlNavbarDropdownType;

/**
 * AlNavbarDropdownTypeTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlNavbarDropdownTypeTest extends AlBaseType
{
    protected function configureFields()
    {
        return array(
            'button_text',
        );
    }
    
    protected function getForm()
    {
        return new AlNavbarDropdownType();
    }
    
    public function testDefaultOptions()
    {
        $this->assertEquals(array('csrf_protection' =>false), $this->getForm()->getDefaultOptions(array()));
    }
    
    public function testGetName()
    {
        $this->assertEquals('al_json_block', $this->getForm()->getName());
    }
}
