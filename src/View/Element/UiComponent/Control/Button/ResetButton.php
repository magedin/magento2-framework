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

namespace MagedIn\Framework\Magento2\View\Element\UiComponent\Control\Button;

/**
 * Class ResetButton
 *
 * Represents a reset button for the rule edit page in the UI component.
 */
class ResetButton extends AbstractButton
{
    /**
     * Retrieve the button data for rendering the reset button.
     *
     * The button data includes:
     * - `label`: The text displayed on the button (default: "Reset").
     * - `class`: The CSS class applied to the button (default: "reset").
     * - `on_click`: The JavaScript action triggered on click (default: reload the page).
     * - `sort_order`: The order in which the button appears (default: 50).
     *
     * @return array The button configuration data.
     */
    public function getButtonData(): array
    {
        return [
            'label' => __($this->label ?? 'Reset'),
            'class' => $this->getClass() ?? 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => $this->getSortOrder() ?? 20,
        ];
    }
}
