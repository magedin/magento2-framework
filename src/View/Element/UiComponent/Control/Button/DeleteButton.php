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
 * Class DeleteButton
 *
 * Represents a delete button UI component that extends the functionality
 * of the AbstractButton class. This class provides methods to configure
 * the delete button's behavior, including its label, confirmation message,
 * and delete URL.
 */
class DeleteButton extends AbstractButton
{
    /**
     * Retrieve the data for the delete button.
     *
     * This method constructs the button's configuration, including its label, CSS class,
     * JavaScript confirmation dialog, and sort order. The button is only displayed if
     * a request ID is available.
     *
     * @return array The configuration data for the delete button.
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($this->getRequestId()) {
            $defaultConfig = "Are you sure you want to delete this?";
            $data = [
                'label' => __($this->getLabel() ?? 'Delete'),
                'class' => $this->getClass() ?? 'delete',
                'on_click' => 'deleteConfirm(\'' . __($this->getConfirmMessage() ?? $defaultConfig) . '\', \'' .
                    $this->getDeleteUrl() . '\')',
                'sort_order' => $this->getSortOrder() ?? 50,
            ];
        }
        return $data;
    }

    /**
     * Generate the URL for the delete button.
     *
     * This method constructs the URL for the delete action, including the request ID
     * as a parameter.
     *
     * @return string The URL for the delete action.
     */
    protected function getDeleteUrl(): string
    {
        return $this->getUrl('*/*/delete', [$this->getRequestIdKey() => $this->getRequestId()]);
    }

    /**
     * Retrieve the confirmation message for the delete action.
     *
     * This method can be overridden to provide a custom confirmation message.
     * By default, it returns null, which will use the default message.
     *
     * @return string|null The confirmation message or null if not set.
     */
    protected function getConfirmMessage(): ?string
    {
        return null;
    }
}
