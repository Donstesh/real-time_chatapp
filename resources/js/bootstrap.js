import './Echo'; // this sets up window.Echo

Echo.join('chatroom')
    .here(users => {
        Livewire.emit('setUsers', users);
    })
    .joining(user => {
        Livewire.emit('userJoined', user);
    })
    .leaving(user => {
        Livewire.emit('userLeft', user);
    });

