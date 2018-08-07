<?php

namespace App\Observers;

use App\Url;

class UrlObserver
{
    public function saving(Url $url)
    {
        $this->checkHashes($url);
    }

    public function creating(Url $url)
    {
        $this->checkHashes($url);
    }

    private function checkHashes(Url $url)
    {
        $this->check('hash', $url);
        $this->check('pass', $url);
    }

    private function check($field, Url $url)
    {
        if (empty($url->$field)) {
            foreach (range(0, 9) as $key) {
                $available[] = implode('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
            }

            do {
                $$field = substr(str_shuffle(implode('', $available)), -16);
            } while (Url::where(compact($field))->exists());

            $url->$field = $$field;
        }
    }
}
