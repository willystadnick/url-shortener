<?php

namespace App\Observers;

use App\Url;

class UrlObserver
{
    public function saving(Url $url)
    {
        return $this->touchHash($url);
    }

    public function creating(Url $url)
    {
        return $this->touchHash($url);
    }

    private function touchHash(Url $url)
    {
        if (empty($url->hash)) {
            $available = implode('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));

            do {
                $hash = substr(str_shuffle($available), -16);
            } while (Url::where(compact('hash'))->exists());

            $url->hash = $hash;
        }
    }
}
