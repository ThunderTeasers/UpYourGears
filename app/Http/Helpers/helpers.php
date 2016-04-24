<?php

function delete_form($route_params, $label = 'Удалить'){
    $form = Form::open(['method' => 'DELETE', 'route' => $route_params]);
    $form .= Form::submit($label, ['class' => 'table__delete']);
    $form .= Form::close();

    return $form;
}