<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Phone;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
  private $phones_controller;
  private $contact;
  private $list_phone;

  public function __construct(PhoneController $phones_controller)
  {
    $this->phones_controller = $phones_controller;
    $this->contact = new Contact();
    $this->list_phone = new PHone();
  }

  public function index($letra)
  {
    // $contacts = Contact::all();
    $contacts = Contact::indexLetra($letra);
    $criterio = $letra;
    return view('contact.index', compact('contacts','criterio'));        
  }

  public function busca(Request $request){
    if($request->criterio == NULL){
      $criterio = "Favor digitar um nome!";
      $contacts = Contact::search('*&');
      return view('contact.index', [
        'contacts' => $contacts,
        'criterio' => $criterio
        ]
      );
    } else {    
      $contacts = Contact::search($request->criterio);
      return view('contact.index', [
        'contacts' => $contacts,
        'criterio' => $request->criterio
        ]
      );
    }
  }

  public function create()
  {
    return view('contact.create');
  }

  public function store(Request $request)
  {
    $validation = $this->contactValidation($request->all());
    if($validation->fails()){
      return redirect()->back()
        ->withErrors($validation->errors())
        ->withInput($request->all());
    }

    if ($request->id){
      $phone = new Phone();
      $phone->ddd = $request->ddd;
      $phone->phone = $request->phone;
      $phone->contact_id = $request->id;
      $this->phones_controller->store($phone);
      return redirect("/contacts/{$request->id}/addPhone")->with("message", "Telefone adicionado com sucesso!");
    } else {
      $contact = Contact::create($request->all());
      if ($request->ddd && $request->phone) {
        $phone = new Phone();
        $phone->ddd = $request->ddd;
        $phone->phone = $request->phone;
        $phone->contact_id = $contact->id;
        $this->phones_controller->store($phone);
      }
    }
    return redirect("/contacts")->with("message", "Pessoa criada com sucesso!");
  }
  

  public function edit($id)
  {
    return view('contact.edit', ['contact' => $this->getContact($id)]); 
  }
  
  public function update(Request $request)
  {
    $contact = $this->getContact($request->id);
    // var_dump($contact->id, $contact->name, $contact->birthdate, $contact->email, $contact->photo );
    $contact->update($request->all());
    return redirect("/contacts")->with("message", "Contato editado com sucesso!");
  }
  
  
  public function deleteContact($id)
  {
    return view('contact.delete', ['contact' => $this->getContact($id)]);
  }

  public function destroy($id)
  {
    $this->getContact($id)->delete();
    return redirect(url('/contacts'))->with('success', 'Excluído!');
  }

  public function getPhone($id_phone){
    return $this->list_phone->find($id_phone);
  }

  public function addPhoneView($id){
    return view('contact.phone', ['contact' => $this->getContact($id)]); 
  }

  public function editPhoneView($id_phone, $id){
    return view('contact.phone', ['contact' => $this->getContact($id), 'phone' => $this->getPhone($id_phone)]); 
  }

  public function updatePhone(Request $request){
    // Iniciando a validação
    $validation = $this->contactValidation($request->all());
    if($validation->fails()){
      return redirect()->back()
      ->withErrors($validation->errors())
      ->withInput($request->all());
    }
    $phone = $this->list_phone->find($request->id_phone);
    $phone->ddd = $request->ddd;
    $phone->phone = $request->phone;
    $phone->contact_id = $request->id;
    $phone->save();
    return redirect("/contacts/{$request->id_phone}/{$request->id}/editPhone")->with("message", "Telefone editado com sucesso!");
  } 

  public function excluirPhone($id){
    $phone = $this->list_phone->find($id);
    $phone->delete();
    return redirect(url('/'))->with('success', 'Excluído!');
  }

  public function getContact($id){
    return $this->contact->find($id);
  }

  private function contactValidation($data){
    if (array_key_exists('ddd', $data) && array_key_exists('phone', $data)) {
      if ($data['ddd'] || $data['phone']) {
          $regras['ddd'] = 'required|size:2';
          $regras['phone'] = 'required';
      }
    }
    $regras['name'] = 'required|min:3';

    $flashMensage = [
      'name.required' => 'Campo nome é obrigatório',
      'name.min' => 'O campo tem que ter no minimo 3 caracteres!',
      'ddd.required' => 'O campo DDD é obrigatório',
      'ddd.size' => 'O campo DDD deve ter 2 digitos',
      'ddd.numeric' => 'Somente números!',
      'phone.required' => 'O campo telefone é obrigatório',
      'phone.numeric' => 'Somente numeros e sem espaço!',
    ];

    return Validator::make($data,$regras, $flashMensage);

  }

  

}
