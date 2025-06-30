<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public function switchLang($locale)
    {
        if (in_array($locale, ['en', 'id'])) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return redirect()->to(url()->previous());
    }
    
    public function render()
    {
        return view('livewire.language-switcher');
    }
}
