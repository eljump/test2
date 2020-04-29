<?php
include_once ROOT . '/models/registration_model.php';
class registration_controller
{
    public function actionRegpage($get_params = '', $errors= '') {

        $allFields = registration_model::getFields();
        $diff = array('id', 'date');
        $userFields = array_values(array_diff($allFields, $diff));

        require_once(ROOT.'/views/registration_view.php');
        return true;
    }
    public function actionSuccess($fields, $values) {
        $res = registration_model::createUser($fields, $values);
        require_once (ROOT.'/views/successreg_view.php');
        $res ? header('Refresh: 6; URL=/auth') : header('Refresh: 6; URL=/registration');
    }
    public function actionCheck($get_params) {
        //echo 'здесь будет проверка на существование';
        $check_params = array(
            'nickname' => $get_params['nickname'],
            'e_mail' => $get_params['e_mail'],
            'phone' => $get_params['phone']);
        $checkResult = registration_model::checkFields($check_params);
        $errors = array();
        foreach ($checkResult as $item) {
            if ($item != 'free') {
                $errors[key($checkResult)] = $item;
            }
            next($checkResult);
        }
        if (!empty($errors)) {
            $this->actionRegpage($get_params, $errors);
        }
        else {
            $today = date("Y-m-d");
            $fields =  array_keys($get_params);
            $fields[] = 'date';
            $fields = implode(',',$fields);
            $values =  array_values($get_params);
            $values[] = $today;
            $values = implode('\',\'', $values);

            $this->actionSuccess($fields, $values);
        }
    }
}