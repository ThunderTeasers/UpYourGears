<?php

namespace App\Helpers;

use Collective\Html\FormFacade as Form;

class Helpers{
    static function delete_form($route_params, $label = 'Удалить'){
        $form = Form::open(['method' => 'DELETE', 'route' => $route_params]);
        $form .= Form::submit($label, ['class' => 'delete']);
        $form .= Form::close();

        return $form;
    }
}