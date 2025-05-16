<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatRoom extends Component
{
    public $message = '';
    public $messages = [];
    public $users = [];

    protected $rules = ['message' => 'required|string|max:255'];

    public function sendMessage()
    {
        $this->validate();

        broadcast(new MessageSent(Auth::user(), $this->message))->toOthers();
        $this->messages[] = ['user' => Auth::user()->name, 'message' => $this->message];
        $this->message = '';
    }

    protected $listeners = [
        'echo-presence:chatroom,message.sent' => 'receiveMessage',
        'setUsers' => 'setUsers',
        'userJoined' => 'userJoined',
        'userLeft' => 'userLeft',
    ];

    public function receiveMessage($payload)
    {
        $this->messages[] = ['user' => $payload['user']['name'], 'message' => $payload['message']];
    }

    public function setUsers($users)
    {
        $this->users = $users;
    }

    public function userJoined($user)
    {
        $this->users[] = $user;
    }

    public function userLeft($user)
    {
        $this->users = array_filter($this->users, fn($u) => $u['id'] !== $user['id']);
    }

    public function render()
    {
        return view('livewire.chat-room');
    }
}
