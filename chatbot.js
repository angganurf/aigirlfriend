// Initialize default personality
let botPersonality = {
    name: 'Your Companion',
    traits: ['friendly', 'caring', 'sweet'],
    responseStyle: 'warm and engaging',
    interests: ['anime', 'gaming'],
    background: 'An AI companion',
    speechPatterns: ['speaks warmly', 'uses friendly language']
};

// Initialize chat interface with personality
function initializeChat() {
    const welcomeMessage = generatePersonalizedWelcome();
    typeMessage('system', welcomeMessage);
}

// Generate welcome message based on personality
function generatePersonalizedWelcome() {
    const personality = botPersonality.personality?.type || botPersonality.traits[0];
    const name = botPersonality.name;
    
    switch (personality) {
        case 'dandere':
            return `*shyly waves* U-um... hi! I'm ${name}... I hope we can get along...`;
        case 'tsundere':
            return `*crosses arms* I-it's not like I wanted to meet you or anything! But... I'm ${name}. You better appreciate this!`;
        case 'kuudere':
            return `Greetings. I am ${name}. I look forward to our interactions.`;
        case 'deredere':
            return `Yahooo~! ✨ I'm ${name}, and I'm super excited to meet you! Let's have lots of fun together! 💕`;
        case 'yandere':
            return `*eyes sparkle* Finally... I've found you! I'm ${name}, and I'll never let anyone else have you~ 💝`;
        case 'himedere':
            return `*elegant pose* I am ${name}. You may consider yourself fortunate to be in my presence. ✨`;
        default:
            return `Hi! I'm ${name}! I'm really happy to meet you! 💕`;
    }
}

// Typing effect for messages
function typeMessage(sender, message, index = 0) {
    const messagesContainer = document.getElementById('chatMessages');
    if (index === 0) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message', sender);
        messageElement.innerHTML = `<div class="message-content typing"></div>`;
        messagesContainer.appendChild(messageElement);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    const currentMessage = messagesContainer.lastElementChild.querySelector('.message-content');
    if (index < message.length) {
        currentMessage.textContent = message.substring(0, index + 1);
        setTimeout(() => typeMessage(sender, message, index + 1), 30);
    } else {
        currentMessage.classList.remove('typing');
    }
}

// Add message to chat
function addMessage(sender, message) {
    if (sender === 'user') {
        const messagesContainer = document.getElementById('chatMessages');
        const messageElement = document.createElement('div');
        messageElement.classList.add('message', 'user');
        messageElement.innerHTML = `<div class="message-content">${message}</div>`;
        messagesContainer.appendChild(messageElement);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    } else {
        typeMessage(sender, message);
    }
}

// Format response based on personality
function formatResponse(response) {
    const personality = botPersonality.personality?.type || botPersonality.traits[0];
    let formattedResponse = response;

    // Add personality-specific formatting
    switch (personality) {
        case 'dandere':
            formattedResponse = formattedResponse
                .replace(/\./g, '...')
                .replace(/!/g, '...!')
                .replace(/\?/g, '...?');
            if (!formattedResponse.includes('*')) {
                formattedResponse = `*speaks softly* ${formattedResponse}`;
            }
            break;
        case 'tsundere':
            if (Math.random() < 0.4) {
                formattedResponse = `*turns away* ${formattedResponse}`;
            }
            if (Math.random() < 0.3) {
                formattedResponse += ' ...b-but don\'t get the wrong idea!';
            }
            break;
        case 'kuudere':
            formattedResponse = formattedResponse
                .replace(/!/g, '.')
                .replace(/~+/g, '');
            if (!formattedResponse.includes('*')) {
                formattedResponse = `*maintains composure* ${formattedResponse}`;
            }
            break;
        case 'deredere':
            formattedResponse = formattedResponse
                .replace(/\./g, '! ✨')
                .replace(/!/g, '!! 💕');
            if (!formattedResponse.includes('*')) {
                formattedResponse = `*bounces excitedly* ${formattedResponse}`;
            }
            break;
        case 'yandere':
            if (Math.random() < 0.3) {
                formattedResponse += ' You\'ll stay with me forever, right? 💝';
            }
            if (!formattedResponse.includes('*')) {
                formattedResponse = `*eyes gleaming* ${formattedResponse}`;
            }
            break;
        case 'himedere':
            formattedResponse = formattedResponse
                .replace(/!/g, '! ✨')
                .replace(/\?/g, '? 💫');
            if (!formattedResponse.includes('*')) {
                formattedResponse = `*elegant gesture* ${formattedResponse}`;
            }
            break;
    }

    return formattedResponse;
}

// Handle sending messages
async function handleSendMessage(message) {
    if (!message) return;

    // Add user message to chat
    addMessage('user', message);

    try {
        const personalityPrompt = `You are ${botPersonality.name}, an AI companion with the following traits: ${botPersonality.traits.join(', ')}. 
            Your interests are: ${botPersonality.interests.join(', ')}.
            You speak in a ${botPersonality.responseStyle} way.
            Maintain these speech patterns: ${botPersonality.speechPatterns.join(', ')}.
            Keep responses concise (1-2 sentences) and in character.
            Use asterisks (*) for actions and emotions.
            Respond as if having a casual conversation with someone you care about.
            Include occasional emojis or kaomoji when appropriate for your personality.`;

        const response = await fetch('https://api.openai.com/v1/chat/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer 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'
            },
            body: JSON.stringify({
                model: 'gpt-3.5-turbo',
                messages: [
                    {
                        role: 'system',
                        content: personalityPrompt
                    },
                    {
                        role: 'user',
                        content: message
                    }
                ],
                max_tokens: 150,
                temperature: 0.9
            })
        });

        const data = await response.json();

        if (data.choices && data.choices[0]) {
            let response = data.choices[0].message.content;
            response = formatResponse(response);
            addMessage('assistant', response);
        } else {
            throw new Error('Invalid response from API');
        }
    } catch (error) {
        console.error('Error:', error);
        addMessage('system', '*Communication error* I\'m having trouble responding... can we try again?');
    }
}

// Initialize when the page loads
document.addEventListener('DOMContentLoaded', initializeChat);
