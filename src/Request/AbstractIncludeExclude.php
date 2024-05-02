<?php

namespace EuropeanSourcing\Apiv3Client\Request;

abstract class AbstractIncludeExclude
{
    /**
     * Include or exclude ?
     *
     * @var string
     */
    private $action;

    /**
     * @return string
     */
    public function getAction()
    {
        if (null === $this->action) {
            return 'include';
        }

        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return AbstractIncludeExclude
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }
}
