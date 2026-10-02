<?php

namespace App\Controllers;

class PageController extends BaseController
{
    // Static About page (/about)[cite: 1]
    public function about()
    {
        $data['title'] = "About Developer";
        $data['developer'] = [
            'name'  => 'Abby Allysa Abinuman',
            'role'  => 'BSITAGD',
            'bio'   => 'GOAT of all time. AKA developer of this site.' // Developer details[cite: 1]
        ];

        return view('about', $data);
    }
}