<?php

namespace App\Http\Controllers;

use App\Model\WhiteList\Validation;
use http\Client\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * @return Factory|View
     */
    public function showValidationPage() {
        return view('whiteList.validation');
    }
    
    /**
     * @param Request $request
     * @return Response
     */
    public function validateForm(Request $request) {
        
        $validation = new Validation($request->get('nip'), $request->get('iban'));
        
    }
    
    
}
