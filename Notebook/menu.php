<?php
function getMenu($active = 'view', $sort = 'added') {
    $menu = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];

    $html = '<div>';
    foreach ($menu as $key => $label) {
        $color = ($key === $active) ? 'red' : 'blue';
        $html .= "<a href='?action=$key' style='color:$color;margin-right:10px;'>$label</a>";
    }
    $html .= '</div>';

    if ($active === 'view') {
        $sorts = ['added' => 'По добавлению', 'surname' => 'По фамилии', 'birthdate' => 'По дате рождения'];
        $html .= '<div style="margin-top:10px;">';
        foreach ($sorts as $key => $label) {
            $color = ($key === $sort) ? 'red' : 'blue';
            $html .= "<a href='?action=view&sort=$key' style='color:$color;margin-right:5px;font-size:smaller;'>$label</a>";
        }
        $html .= '</div>';
    }

    return $html;
}
