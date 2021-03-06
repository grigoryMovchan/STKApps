<?php

namespace Application\Core;

use Application\Models\AuthModel;

class Controller
{

    protected $error = null;
    protected $data = null;
    protected $auth;
    protected $view;

    /**
     * 
     * @param type $config_path
     * @param type $section_name
     */
    function __construct()
    {
        $this->view = new View;
        $this->auth = new AuthModel();
        // задает путь к директории /public/, чтобы скрипт было легко модифцировать
        // для выделенного или виртуального хостинга
        $this->data['publicDir'] = '/public/';
    }

    // Проверка авторизации
    protected function checkAuth()
    {
        if (!$this->auth->authorization()) {
            //~ совершаем процедуру выхода
            $this->auth->exit_user();
        }
    }

}
