<?php

namespace App\Controllers;

use App\SessionGuard as Guard;

use App\Models\User;

class homeController extends Controller
{
    public function __construct()
    {
        // if (!Guard::isUserLoggedIn()) {
        // 	redirect('/login');
        // }
        // redirect('/home');

        parent::__construct();
    }

    public function index()
    {
        // $this->sendPage('book/home', [
        // 	'user' => Guard::user()->user
        // ]);
        $this->sendPage('layouts/home', []);
    }

    public function sendNotFound()
    {
        http_response_code(404);
        exit($this->view->render('errors/404'));
    }

    // public function showAddPage()
    // {
    // 	$this->sendPage('contacts/add', [
    // 		'errors' => session_get_once('errors'),
    // 		'old' => $this->getSavedFormValues()
    // 	]);
    // }
    // public function create()
    // {
    // 	$data = $this->filterContactData($_POST);
    // 	$model_errors = Contact::validate($data);
    // 	if (empty($model_errors)) {
    // 		$contact = new Contact();
    // 		$contact->fill($data);
    // 		$contact->user()->associate(Guard::user());
    // 		$contact->save();
    // 		redirect('/');
    // 	}
    // 	// Lưu các giá trị của form vào $_SESSION['form']
    // 	$this->saveFormValues($_POST);
    // 	// Lưu các thông báo lỗi vào $_SESSION['errors']
    // 	redirect('/contacts/add', ['errors' => $model_errors]);
    // }
    // protected function filterContactData(array $data)
    // {
    // 	return [
    // 		'name' => $data['name'] ?? null,
    // 		'phone' => preg_replace('/\D+/', '', $data['phone']),
    // 		'notes' => $data['notes'] ?? null
    // 	];
    // }


    // public function showEditPage($contactId)
    // {
    // 	$contact = Guard::user()->contacts->find($contactId);
    // 	if (!$contact) {
    // 		$this->sendNotFound();
    // 	}
    // 	$form_values = $this->getSavedFormValues();
    // 	$data = [
    // 		'errors' => session_get_once('errors'),
    // 		'contact' => (!empty($form_values)) ?
    // 			array_merge($form_values, ['id' => $contact->id]) :
    // 			$contact->toArray()
    // 	];
    // 	$this->sendPage('contacts/edit', $data);
    // }
    // public function update($contactId)
    // {
    // 	$contact = Guard::user()->contacts->find($contactId);
    // 	if (!$contact) {
    // 		$this->sendNotFound();
    // 	}
    // 	$data = $this->filterContactData($_POST);
    // 	$model_errors = Contact::validate($data);
    // 	if (empty($model_errors)) {
    // 		$contact->fill($data);
    // 		$contact->save();
    // 		redirect('/');
    // 	}
    // 	$this->saveFormValues($_POST);
    // 	redirect('/contacts/edit/' . $contactId, [
    // 		'errors' => $model_errors
    // 	]);
    // }

    // 	public function delete($contactId)
    // 	{
    // 		$contact = Guard::user()->contacts->find($contactId);
    // 		if (!$contact) {
    // 			$this->sendNotFound();
    // 		}
    // 		$contact->delete();
    // 		redirect('/');
    // 	}
}
