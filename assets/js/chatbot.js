// Chatbot functionality
let chatMessages = [];

function toggleChatbot() {
    const chatbot = document.getElementById('chatbot');
    if(chatbot) {
        chatbot.classList.toggle('active');
    }
}

function sendMessage() {
    const input = document.getElementById('chatInput');
    if(!input) return;
    
    const message = input.value;
    if(!message) return;
    
    addMessage('You', message);
    input.value = '';
    
    // AI Responses
    setTimeout(() => {
        let response = 'How can I help you explore Nepal?';
        if(message.toLowerCase().includes('pokhara')) {
            response = 'Pokhara has great lakeside hotels! Would you like recommendations?';
        } else if(message.toLowerCase().includes('booking')) {
            response = 'I can help you book hotels, buses, and activities. What would you like?';
        } else if(message.toLowerCase().includes('price')) {
            response = 'Hotels range from ₹5000 to ₹20000+ per night. Budget preference?';
        }
        addMessage('Nepal Bot', response);
    }, 500);
}

function addMessage(sender, text) {
    chatMessages.push({sender, text});
    const messagesDiv = document.getElementById('chatMessages');
    if(messagesDiv) {
        messagesDiv.innerHTML += `
            <div class="message ${sender === 'You' ? 'user' : 'bot'}">
                <strong>${sender}:</strong> ${text}
            </div>
        `;
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
}
