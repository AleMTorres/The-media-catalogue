<?php

namespace App\Controllers;

use App\Models\CredentialsModel;



class Credentials extends BaseController
{
    public function login()
    {
        return view('credentials/login');
    }

    public function sign_up()
    {
        return view('credentials/sign_up');
    }

    public function login_form()
    {
        $modelUsers = new CredentialsModel();

        $user_name = $this->request->getVar('user');
        $password = $this->request->getVar('password');

        $userData = $modelUsers->where('user_name', $user_name)->first();


        if (isset($userData)) {
            if ($password == $userData['password']) {
                $sessionData = [
                    'id_autor'   => $userData['id'],
                    'name'       => $userData['name'],
                    'last_name'  => $userData['last_name'],
                    'user_name'  => $userData['user_name'],
                    'password'   => $userData['password'],
                    'logued'   => true,
                ];

                session()->set($sessionData);

                return redirect()->to('watchlist');
            } else {
                return redirect()->to('login')->with('msg', ['type' => 'danger', 'body' => 'El usuario o la contraseña están mal']);
            }
        } else {
            return redirect()->to('login')->with('msg', ['type' => 'danger', 'body' => 'El usuario o la contraseña están mal']);
        }
    }


    public function sign_up_form()
    {
        $modelUsers = new CredentialsModel();

        $name = $this->request->getVar('name');
        $last_name = $this->request->getVar('last_name');
        $user_name = $this->request->getVar('user');
        $password = $this->request->getVar('password');
        $repeat_password = $this->request->getVar('repeat_password');

        if ($password != $repeat_password) {
            return redirect()->to('sign_up')->with('msg', ['type' => 'danger', 'body' => 'Las contraseñas no coinciden']);
        }

        $userData = $modelUsers->where('user_name', $user_name)->first();

        if (!isset($userData)) {
            $query = [
                'name'      => $name,
                'last_name' => $last_name,
                'user_name' => $user_name,
                'password'  => $password,
            ];

            $modelUsers->insert($query);

            $userData = $modelUsers->where('user_name', $user_name)->first();

            if (isset($userData)) {
                $sessionData = [
                    'id_autor'   => $userData['id'],
                    'name'       => $userData['name'],
                    'last_name'  => $userData['last_name'],
                    'user_name'  => $userData['user_name'],
                    'password'   => $userData['password'],
                    'logued'   => true,
                ];
            };
            session()->set($sessionData);

            return redirect()->to('watchlist')->with('msg', ['type' => 'success', 'body' => 'Bienvenido, cinefilo/a!']);
        } else {
            return redirect()->to('sign_up')->with('msg', ['type' => 'danger', 'body' => 'Oops! Algo salió mal']);
        }
    }

    public function log_out()
    {

        session()->destroy();
        return redirect()->to(base_url());
    }
};
