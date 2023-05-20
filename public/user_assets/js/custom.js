let modal = document.querySelector(".modal");
let triggers = document.querySelectorAll(".trigger");
let closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

for (let i = 0, len = triggers.length; i < len; i++) {
    triggers[i].addEventListener("click", toggleModal);
}
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);


document.getElementById('chatButton').addEventListener('click', function() {
    var chatContainer = document.querySelector('.chat-container');
    chatContainer.style.display = chatContainer.style.display === 'none' ? 'block' : 'none';
});
document.getElementById('closeChatButton').addEventListener('click', function() {
    document.querySelector('.chat-container').style.display = 'none';
});

document.getElementById('sendButton').addEventListener('click', function() {
    sendMessage();
});

document.querySelector('.chat-input input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    var inputElement = document.querySelector('.chat-input input');
    var messageContent = inputElement.value.trim();

    if (messageContent !== '') {
        var chatContentElement = document.querySelector('.chat-content');

        var messageElement = document.createElement('div');
        messageElement.classList.add('message', 'outgoing');

        var messageTextElement = document.createElement('p');
        messageTextElement.innerText = messageContent;

        var timeElement = document.createElement('span');
        timeElement.classList.add('time');
        timeElement.innerText = getCurrentTime();

        messageElement.appendChild(messageTextElement);
        messageElement.appendChild(timeElement);

        chatContentElement.appendChild(messageElement);

        inputElement.value = '';
        inputElement.focus();

        // Scroll to the bottom of the chat content
        chatContentElement.scrollTop = chatContentElement.scrollHeight;
    }
}

function getCurrentTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return hours + ':' + minutes + ' ' + ampm;
}
