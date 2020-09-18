<?php

namespace App\Http\Controllers;

use App\Model\WhiteList\Validation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Model\WhiteList\ActiveVATPayer;


/**
 * Class WhiteListController
 * @package App\Http\Controllers
 * @author              Robert Kubica <rkubica@edokumenty.eu>
 * @copyright       (c) eDokumenty Sp. z o.o.
 */
class WhiteListController extends Controller {

    /**
     * WhiteListController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return false|\Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|View
     */
    public function validation(Request $request) {
        $request->validateWithBag('validation', [
            'nip'  => [
                'required',
                'max:10',
                'min:10',
            ],
            'iban' => [
                'nullable',
                'max:26',
                'min:26',
            ],

        ]);


        $validation = new Validation($request->get('nip'), $request->get('iban'));
        $isActive = ActiveVATPayer::check($validation);

        if ($isActive) {
            echo '<script>alert(\'Czynny płatnik VAT\')</script>';
        } else {
            echo '<script>alert(\'Brak płatnika na liście czynnych płatnikow VAT\')</script>';
        }
        return $this->showValidationPage();
    }

    /**
     * @return Factory|View
     */
    public function showValidationPage() {
        return view('whiteList.validation');
    }


}
