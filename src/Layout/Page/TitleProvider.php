<?php
/**
 * MagedIn Technology
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  MagedIn
 * @copyright Copyright (c) 2025 MagedIn Technology.
 *
 * @author    MagedIn Support <support@magedin.com>
 */

declare(strict_types=1);

namespace MagedIn\Framework\Magento2\Layout\Page;

use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Theme\Block\Html\Title as TitleBlock;

class TitleProvider
{
    const TITLE_BLOCK_NAME = 'page.main.title';

    /**
     * @var LayoutInterface
     */
    private LayoutInterface $layout;

    /**
     * @param LayoutInterface $layout
     */
    public function __construct(
        LayoutInterface $layout
    ) {
        $this->layout = $layout;
    }

    /**
     * @return string|null
     */
    public function getPageTitle(): ?string
    {
        if ($this->getPageTitleBlockInstance()) {
            return (string) $this->getPageTitleBlockInstance()->getPageTitle();
        }
        return null;
    }

    /**
     * @return TitleBlock|BlockInterface|null
     */
    public function getPageTitleBlockInstance(): ?BlockInterface
    {
        return $this->layout->getBlock(self::TITLE_BLOCK_NAME) ?: null;
    }
}
