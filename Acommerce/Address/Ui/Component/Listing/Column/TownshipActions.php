<?php

namespace Acommerce\Address\Ui\Component\Listing\Column;

class TownshipActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * Url path  to edit
     *
     * @var string
     */
    const URL_PATH_EDIT = 'acommerce_address/township/edit';
    /**
     * Url path  to delete
     *
     * @var string
     */
    const URL_PATH_DELETE = 'acommerce_address/township/delete';
    /**
     * URL builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;
    /**
     * constructor
     *
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['township_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->_urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'township_id' => $item['township_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->_urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'township_id' => $item['township_id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete "${ $.$data.default_name }"'),
                                'message' => __('Are you sure you wan\'t to delete the township "${ $.$data.default_name }" ?')
                            ]
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}
