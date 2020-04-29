<?php
include_once ROOT . '/models/auth_model.php';
class auth_controller
{
    public function actionLogpage() {
        require_once(ROOT.'/views/auth_view.php');
        return true;
    }
    public function actionLogin($get_params) {
        $user = auth_model::getUser($get_params['name']);
        if ($user) {
            if ($user['password'] == $get_params['pass']) {
                setcookie('auth', $get_params['name']);
                header('Refresh: 0; URL=/');
                return true;
            }
            $error = ['error', 'pass'];
            return $error;
        }
        $error = ['error', 'nickname'];
        return $error;
    }
}