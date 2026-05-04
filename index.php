<!DOCTYPE html>
<html>
<head>
    <title>AI Chat</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #343541;
            color: white;
        }

        #chat-container {
            width: 60%;
            margin: auto;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #messages {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
        }

        .msg {
            max-width: 70%;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 10px;
            line-height: 1.4;
            white-space: pre-wrap;
        }

        .user {
            background: #10a37f;
            align-self: flex-end;
        }

        .ai {
            background: #444654;
            align-self: flex-start;
        }

        #input-area {
            display: flex;
            padding: 10px;
            background: #40414f;
        }

        input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        button {
            margin-left: 10px;
            padding: 10px;
            background: #10a37f;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .typing {
            font-style: italic;
            opacity: 0.7;
        }
    </style>
</head>
<body>

<div id="chat-container">
    <div id="messages"></div>

    <div id="input-area">
        <input type="text" id="input" placeholder="Type a message..." />
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
const messagesDiv = document.getElementById('messages');

function appendMessage(text, type) {
    const div = document.createElement('div');
    div.className = 'msg ' + type;
    div.innerText = text;
    messagesDiv.appendChild(div);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
    return div;
}

// ✨ Typing animation
function typeMessage(element, text, speed = 20) {
    let i = 0;
    element.innerText = '';

    function typing() {
        if (i < text.length) {
            element.innerText += text.charAt(i);
            i++;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
            setTimeout(typing, speed);
        }
    }

    typing();
}

async function sendMessage() {
    const input = document.getElementById('input');
    const userText = input.value.trim();

    if (!userText) return;

    appendMessage(userText, 'user');
    input.value = '';

    // Typing indicator
    const typingDiv = appendMessage("AI is typing...", 'ai typing');

    try {
        const res = await fetch('api.php', {
            method: 'POST',
            body: JSON.stringify({ message: userText })
        });

        const data = await res.json();

        typingDiv.classList.remove('typing');

        // Animate AI response
        typeMessage(typingDiv, data.reply);

        // Save chat
        await fetch('save_chat.php', {
            method: 'POST',
            body: JSON.stringify({
                user: userText,
                ai: data.reply
            })
        });

    } catch (err) {
        typingDiv.innerText = "Error: " + err.message;
    }
}

// Enter key support
document.getElementById("input").addEventListener("keypress", function(e) {
    if (e.key === "Enter") {
        sendMessage();
    }
});
</script>

</body>
</html>