<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\BootstrapNavbarBlockBundle\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManagerContainer;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock\AlBlockManagerJsonBlock;

/**
 * Description of AlBlockManagerBootstrapNavbarBlock
 */
class AlBlockManagerBootstrapNavbarBlock extends AlBlockManagerContainer
{
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
    
    protected function edit(array $values)
    {
        $data = json_decode($values['Content'], true); 
        $savedValues = AlBlockManagerJsonBlock::decodeJsonContent($this->alBlock);
        
        if ($data["operation"] == "add") {
            $savedValues[] = $data["value"];
            $values = array("Content" => json_encode($savedValues));
        }
        
        if ($data["operation"] == "remove") {
            unset($savedValues[$data["item"]]);
            
            $blocksRepository = $this->container->get('alpha_lemon_cms.factory_repository');
            $repository = $blocksRepository->createRepository('Block');
            $repository->deleteIncludedBlocks($data["slotName"]);
            
            $values = array("Content" => json_encode($savedValues));
        }
        
        return parent::edit($values);
    }
}
