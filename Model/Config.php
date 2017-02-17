<?php
/**
 * @copyright 2017 Absolute Commerce Ltd. (https://abscom.co/terms)
 */
namespace Absolute\CacheBust\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_STATIC_ENABLED  = 'absolute_cachebust/static/is_enabled';
    const XML_PATH_STATIC_TEMPLATE = 'absolute_cachebust/static/template';
    const XML_PATH_STATIC_VALUE    = 'absolute_cachebust/static/value';

    const XML_PATH_MEDIA_ENABLED  = 'absolute_cachebust/media/is_enabled';
    const XML_PATH_MEDIA_TEMPLATE = 'absolute_cachebust/media/template';
    const XML_PATH_MEDIA_VALUE    = 'absolute_cachebust/media/value';

    const TEMPLATE_DEFAULT = 'version%s';

    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig,
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isStaticEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_STATIC_ENABLED) == 1;
    }

    /**
     * @return bool
     */
    public function getStaticTemplate()
    {
        $template = trim($this->scopeConfig->getValue(self::XML_PATH_STATIC_TEMPLATE));
        if (empty($template)) {
            $template = self::TEMPLATE_DEFAULT;
        }

        return $template;
    }

    /**
     * @return bool
     */
    public function getStaticValue()
    {
        $value = trim($this->scopeConfig->getValue(self::XML_PATH_STATIC_VALUE));

        return $value;
    }

    /**
     * @return bool
     */
    public function isMediaEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_MEDIA_ENABLED) == 1;
    }

    /**
     * @return bool
     */
    public function getMediaTemplate()
    {
        $template = trim($this->scopeConfig->getValue(self::XML_PATH_MEDIA_TEMPLATE));
        if (empty($template)) {
            $template = self::TEMPLATE_DEFAULT;
        }

        return $template;
    }

    /**
     * @return bool
     */
    public function getMediaValue()
    {
        $value = trim($this->scopeConfig->getValue(self::XML_PATH_MEDIA_VALUE));

        return $value;
    }
}
