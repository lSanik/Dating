if(typeof io == "undefined"){
    addMessage('Unable to connect to server!');
}
var socket = io('https://broadcast.dev:3000');
join(laravel_chat);

// when the page loads, focus on the message input
window.onload = function(){
    document.getElementById('message').focus();
};

// leave the room on unload
window.onbeforeunload = function(){
    leave(laravel_chat);
    return null;
};

// receives events from channel specified below
socket.on('test-channel:Underthecocotree\\LaravelChat\\Events\\UserHasRegistered', function(message){
    console.log(message.user);
    //self.users.push(message.user);
});

// send the message on submit
document.getElementById('chat-form').onsubmit = function(){
    var message = document.getElementById('message');

    if(validateMessage(message)){
        send(message.value);
        message.value = '';
    }

    return false;
};

// When we receive a message, add it to the DOM and scroll to the bottom
socket.on(laravel_chat.room, function(message){
    addMessage(message);
});

// Receive a message when a user joins a room
socket.on(laravel_chat.room + ' joined', function(message){
    addMessage(message.user +  ' has joined the room');
    updateUsers(message.users);
});

// Receive a message when a user leaves a room
socket.on(laravel_chat.room + ' left', function(message){
    addMessage(message.user +  ' has left the room');
    updateUsers(message.users);
});

// join a room
function join(room){
    socket.emit('join', room);
}

// leave a room
function leave(room){
    socket.emit('leave', room);
}

// send message in a room
function send(message){
    socket.emit('send', { room: laravel_chat.room, user: laravel_chat.user, message: message }); 
}

// validate message
function validateMessage(message){
    if(message.value === ''){
        updateStatus("You can't send an empty message...");
        return false;
    }

    updateStatus('Press enter to send...');

    return true;
}

// update status element
function updateStatus(status){
    document.getElementById('status').innerText = status;
}

// add message to the DOM
function addMessage(message) {
    var li = document.createElement("li");
    li.innerText = message;
    document.getElementById('messages').appendChild(li);

    scrollToBottom(document.getElementById('messages'));
}

// update channel users
function updateUsers(users){
    // emtpy users list
    var user_list = document.getElementById('online-users').getElementsByTagName('ul')[0];
    while (user_list.firstChild) {
        user_list.removeChild(user_list.firstChild);
    }

    // repopulate
    users.forEach(function(user){
        var li = document.createElement("li");
        li.innerText = user;
        document.getElementById('online-users').getElementsByTagName('ul')[0].appendChild(li);
    });
}

// scroll view to the bottom
function scrollToBottom(element){
    element.scrollTop = element.scrollHeight;
}