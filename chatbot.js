let chatMessages = [];

function toggleChatbot() {
    document.getElementById('chatbot').classList.toggle('active');
}

function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value;
    if(!message) return;
    
    addMessage('You', message);
    input.value = '';
    
    // AI Responses
    setTimeout(() => {
        let response = 'Sorry, I can help with: ';
        if(message.toLowerCase().includes('pokhara')) {
            response = 'Pokhara has great lakeside hotels from ₹8,000/night!';
        } else if(message.toLowerCase().includes('booking')) {
            response = 'Want to book? Say "Book Everest hotel"';
        }
        addMessage('Nepal Bot', response);
    }, 1000);
}

function addMessage(sender, text) {
    chatMessages.push({sender, text});
    const messagesDiv = document.getElementById('chatMessages');
    messagesDiv.innerHTML += `
        <div class="message ${sender === 'You' ? 'user' : 'bot'}">
            <strong>${sender}:</strong> ${text}
        </div>
    `;
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}