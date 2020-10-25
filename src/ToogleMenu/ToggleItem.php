<?php

namespace Pers0n4\XePlugin\Message\ToggleMenu;

use Xpressengine\ToggleMenu\AbstractToggleMenu;

class ToggleItem extends AbstractToggleMenu
{
    public function getText()
    {
        return 'Send message';
    }

    public function getType()
    {
        return static::MENUTYPE_LINK;
    }

    public function getAction()
    {
        return route('message::create', ['receiver_id' => $this->identifier]);
    }

    public function getScript()
    {
        return null;
    }
}
