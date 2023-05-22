let modal = document.querySelector(".modal");
let triggers = document.querySelectorAll(".trigger");
let closeButton = document.querySelector(".close-button");
let chatHistory = [];
if (localStorage.getItem('chatHistory')) {
    chatHistory = JSON.parse(localStorage.getItem('chatHistory'));
}

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


document.getElementById('chatButton').addEventListener('click', function () {
    var chatContainer = document.querySelector('.chat-container');
    chatContainer.style.display = chatContainer.style.display === 'none' ? 'block' : 'none';
});
document.getElementById('closeChatButton').addEventListener('click', function () {
    document.querySelector('.chat-container').style.display = 'none';
});

document.getElementById('sendButton').addEventListener('click', function () {
    sendMessage(this.getAttribute('data-url'));
});

document.querySelector('.chat-input input').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage(routeUrl) {
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
        $.ajax({
            type: "POST",
            url: routeUrl,
            dataType: 'json',
            data: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                message: messageContent,
                history: JSON.stringify(chatHistory)
            },
            beforeSend: function () {
                document.getElementById('sendButton').disabled = true;
            },
            success: function (res) {
                if (res.success === true && res.message !== "") {
                    chatHistory.push({'role': 'user', 'content': messageContent});
                    chatHistory.push({'role': 'assistant', 'content': res.message});
                    localStorage.setItem('chatHistory', JSON.stringify(chatHistory));
                    setResponse(res.message, chatContentElement);
                } else {
                    setResponse(`Something went wrong. Please try again.`, chatContentElement);
                }
            },
            error: function () {
                setResponse(`Something went wrong. Please try again.`, chatContentElement);
            },
            complete: function () {
                document.getElementById('sendButton').disabled = false;
            }
        });
    }
}

function setResponse(message, chatContentElement) {
    var messageElement = document.createElement('div');
    messageElement.classList.add('message', 'incoming');

    var messageTextElement = document.createElement('p');
    messageTextElement.innerText = message;

    var timeElement = document.createElement('span');
    timeElement.classList.add('time');
    timeElement.innerText = getCurrentTime();

    messageElement.appendChild(messageTextElement);
    messageElement.appendChild(timeElement);
    chatContentElement.appendChild(messageElement);

    chatContentElement.scrollTop = chatContentElement.scrollHeight;
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
