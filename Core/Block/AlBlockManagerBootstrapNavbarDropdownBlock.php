<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\BootstrapNavbarBlockBundle\Core\Block;

use AlphaLemon\Block\BootstrapButtonBlockBundle\Core\Block\AlBlockManagerBootstrapDropdownButtonBlock;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock\AlBlockManagerJsonBlock;

/**
 * Description of AlBlockManagerBootstrapNavbarDropdownBlock
 */
class AlBlockManagerBootstrapNavbarDropdownBlock extends AlBlockManagerBootstrapDropdownButtonBlock
{
    protected $blockTemplate = 'BootstrapNavbarBlockBundle:Dropdown:navbar_dropdown_button.html.twig';  
    
    public function getDefaultValue()
    {
        $value = '
                {
                    "0": {
                        "button_text": "Dropdown Button 1",
                        "button_type": "",
                        "button_attribute": "",
                        "button_dropup" : "none",
                        "items": [
                            {
                                "data" : "Item 1", 
                                "metadata" : {  
                                    "type": "link",
                                    "href": "#",
                                    "attributes": {}
                                }
                            },
                            { 
                                "data" : "Item 2", 
                                "metadata" : {  
                                    "type": "link",
                                    "href": "#",
                                    "attributes": {}
                                }
                            },
                            { 
                                "data" : "Item 3", 
                                "metadata" : {  
                                    "type": "link",
                                    "href": "#",
                                    "attributes": {}
                                }
                            }
                        ]
                    }
                }
            ';
        
        return array('Content' => $value);
    }
    
    public function editorParameters()
    {
        $items = AlBlockManagerJsonBlock::decodeJsonContent($this->alBlock->getContent());
        $item = $items[0];
        $attributes = $item["items"];  
        unset($item["items"]);
        
        $formClass = $this->container->get('bootstrap_navbar_dropbown.form');
        $buttonForm = $this->container->get('form.factory')->create($formClass, $item);
        
        return array(
            "template" => $this->editorTemplate,
            "title" => "Button editor",
            "form" => $buttonForm->createView(),
            'attributes' => $attributes,  
        );
    }
}
