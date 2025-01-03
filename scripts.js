const STABILITY_API_KEY = 'sk-0SbECviegUhjXJqc4YDH4jYvJmCIcQ8QB5MO5uYLsWYUd1ue'; //sk-svfiZTRWgGWT7icPRITSMavdj7CqXH56kcBlbT7ZvkKxYony
const STABILITY_API_URL = 'https://api.stability.ai/v1/generation/stable-diffusion-v1-6/text-to-image';

// Store the current companion configuration
let currentCompanion = {
    name: '',
    age: '20',
    appearance: {
        hairStyle: 'long',
        hairColor: 'black',
        eyeColor: 'blue',
        style: 'casual'
    },
    personality: {
        type: 'dandere'
    },
    interests: [],
    features: []
};

// Initialize event listeners
document.addEventListener('DOMContentLoaded', () => {
    console.log('Initializing...');
    initializeFormElements();
    setupEventListeners();
    initializeChat();
});

// Initialize form elements
function initializeFormElements() {
    console.log('Setting up form elements...');
    // Set default values
    document.getElementById('age').value = currentCompanion.age;
    document.getElementById('hairStyle').value = currentCompanion.appearance.hairStyle;
    document.getElementById('hairColor').value = currentCompanion.appearance.hairColor;
    document.getElementById('eyeColor').value = currentCompanion.appearance.eyeColor;
    document.getElementById('style').value = currentCompanion.appearance.style;
    document.getElementById('personalityType').value = currentCompanion.personality.type;
}

// Setup event listeners
function setupEventListeners() {
    console.log('Setting up event listeners...');
    const generateBtn = document.getElementById('generateWaifu');
    if (generateBtn) {
        generateBtn.addEventListener('click', generateWaifu);
    }

    document.getElementById('sendMessage')?.addEventListener('click', sendMessage);
    document.getElementById('messageInput')?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
    document.getElementById('companionName')?.addEventListener('input', updateCompanionName);
    document.getElementById('copyCA')?.addEventListener('click', copyCA);

    // Track all customization changes
    document.querySelectorAll('select, input[type="checkbox"], input[type="text"]').forEach(element => {
        element.addEventListener('change', () => {
            console.log('Form element changed:', element.value);
            updateCompanionConfig();
        });
    });
}

// Update companion name
function updateCompanionName() {
    const name = document.getElementById('companionName').value;
    document.getElementById('companionNameDisplay').textContent = name || 'Your Girlfriend';
    currentCompanion.name = name;
    updateChatbotPersonality();
}

// Update companion configuration
function updateCompanionConfig() {
    console.log('Updating companion config...');

    // Get all feature checkboxes
    const featureCheckboxes = document.querySelectorAll('.features-checkboxes input[type="checkbox"]');
    const selectedFeatures = Array.from(featureCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    console.log('Selected features:', selectedFeatures);

    // Get all interest checkboxes
    const interestCheckboxes = document.querySelectorAll('.interests-checkboxes input[type="checkbox"]');
    const selectedInterests = Array.from(interestCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    console.log('Selected interests:', selectedInterests);

    currentCompanion = {
        name: document.getElementById('companionName').value,
        age: document.getElementById('age').value,
        appearance: {
            hairStyle: document.getElementById('hairStyle').value,
            hairColor: document.getElementById('hairColor').value,
            eyeColor: document.getElementById('eyeColor').value,
            style: document.getElementById('style').value
        },
        personality: {
            type: document.getElementById('personalityType').value
        },
        interests: selectedInterests,
        features: selectedFeatures
    };

    console.log('Updated companion config:', currentCompanion);
    updateChatbotPersonality();
}

// Copy CA text
function copyCA() {
    const caText = document.getElementById('caText').textContent;
    if (caText) {
        navigator.clipboard.writeText(caText).then(() => {
            const tooltip = document.querySelector('.tooltip');
            tooltip.textContent = 'Copied!';
            // alert('Copied');
            setTimeout(() => {
                tooltip.textContent = 'Click to copy';
            }, 2000);
        });
    }
}

// Generate image using Stability AI
async function generateWaifu() {
    console.log('Starting image generation...');
    const generateBtn = document.getElementById('generateWaifu');
    generateBtn.disabled = true;
    generateBtn.textContent = 'Generating...';
    const waifuImage = document.getElementById('waifuImage');
    waifuImage.innerHTML = '<div class="placeholder-image">✧ Generating your girlfriend... ✧</div>';

    try {
        const prompt = buildImagePrompt();
        console.log('Using prompt:', prompt);

        const response = await fetch(STABILITY_API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${STABILITY_API_KEY}`,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                text_prompts: [
                    {
                        text: prompt,
                        weight: 1
                    },
                    {
                        text: "blurry, low quality, worst quality, bad anatomy, bad proportions, bad perspective, multiple views, deformed, mutated, extra limbs, missing limbs, disconnected limbs, mutation, ugly, disgusting, poorly drawn hands, poorly drawn face, poorly drawn feet, text, watermark, signature, out of frame, cropped, duplicate, error, censored, username, artist name",
                        weight: -1
                    }
                ],
                cfg_scale: 9,
                clip_guidance_preset: "FAST_BLUE",
                height: 768,
                width: 512,
                samples: 1,
                steps: 45,
                style_preset: "anime"
            })
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.message || `API Error: ${response.status}`);
        }

        const data = await response.json();
        console.log('Generation successful');

        if (!data.artifacts || !data.artifacts[0]) {
            throw new Error('No image data in response');
        }

        displayGeneratedImage(data.artifacts[0].base64);
        updateChatbotPersonality();

        // Send flirty welcome message
        setTimeout(() => {
            const personality = currentCompanion.personality.type;
            const features = currentCompanion.features;
            let message = '';

            // Add feature-specific actions
            let featureText = '';
            if (features.includes('catEars')) {
                featureText = ' *wiggles cat ears playfully*';
            }
            if (features.includes('glasses')) {
                featureText += ' *adjusts glasses with a cute smile*';
            }

            switch (personality) {
                case 'dandere':
                    message = `H-hi darling...${featureText} I've been waiting just for you... *blushes and looks at you shyly* 💕`;
                    break;
                case 'tsundere':
                    message = `Hmph!${featureText} I-it's not like I dressed up specially for you or anything... b-baka! 💝`;
                    break;
                case 'kuudere':
                    message = `*looks at you intently*${featureText} I find myself... unexpectedly drawn to you. How curious... 💜`;
                    break;
                case 'deredere':
                    message = `Kyaaa~! ✨${featureText} My heart's beating so fast now that you're here! Let's make wonderful memories together! 💖`;
                    break;
                case 'yandere':
                    message = `Finally... my beloved...${featureText} I'll treasure you forever and ever~ No one else can have you 💝`;
                    break;
                case 'himedere':
                    message = `*elegant pose*${featureText} Ara~ You seem worthy of my attention. Consider yourself blessed by my presence~ ✨💖`;
                    break;
                default:
                    message = `*eyes sparkling*${featureText} I'm so happy to finally meet you! My heart's all yours~ 💕`;
            }
            if (window.handleSendMessage) {
                window.handleSendMessage(message, 'assistant');
            }
        }, 1000);

    } catch (error) {
        console.error('Error generating image:', error);
        waifuImage.innerHTML = `<div class="placeholder-image error">✧ Error: ${error.message} ✧</div>`;
    } finally {
        generateBtn.disabled = false;
        generateBtn.textContent = '✧ Generate Girlfriend ✧';
    }
}

// Build image prompt
function buildImagePrompt() {
    const { appearance, features } = currentCompanion;

    let prompt = `masterpiece, best quality, highly detailed, ultra-detailed, beautiful anime girl, young woman, `;

    // Add selected features first to give them more weight
    if (features.includes('catEars')) {
        prompt += 'cat girl, nekomimi, cute cat ears, animal ears on top of head, kemonomimi, prominent cat ears, visible cat ears, ';
    }
    if (features.includes('glasses')) {
        prompt += 'wearing glasses, beautiful glasses, round glasses frame, megane, glasses focus, clear glasses, ';
    }
    if (features.includes('hairAccessories')) {
        prompt += 'wearing cute hair accessories, beautiful hair decorations, hair ribbons, hair clips, decorative hair ornaments, visible hair accessories, ';
    }
    if (features.includes('jewelry')) {
        prompt += 'wearing beautiful jewelry, elegant necklace, sparkly earrings, detailed accessories, visible jewelry, ';
    }

    // Hair style details with emphasis
    switch (appearance.hairStyle) {
        case 'twintails':
            prompt += `beautiful ${appearance.hairColor} twin tails, hair tied in two sides, symmetrical twin tails, `;
            break;
        case 'ponytail':
            prompt += `beautiful ${appearance.hairColor} ponytail, single high ponytail, elegant ponytail hairstyle, `;
            break;
        case 'braided':
            prompt += `beautiful ${appearance.hairColor} braided hair, intricate braids, detailed braid pattern, `;
            break;
        case 'short':
            prompt += `beautiful ${appearance.hairColor} short hair, neck length hair, cute short hairstyle, `;
            break;
        case 'medium':
            prompt += `beautiful ${appearance.hairColor} medium length hair, shoulder length hair, flowing medium hair, `;
            break;
        case 'long':
            prompt += `beautiful ${appearance.hairColor} long flowing hair, waist length hair, elegant long hairstyle, `;
            break;
    }

    // Eye color with emphasis
    switch (appearance.eyeColor) {
        case 'heterochromia':
            prompt += 'beautiful heterochromia eyes, different colored eyes, one blue eye one gold eye, striking heterochromia, ';
            break;
        default:
            prompt += `beautiful ${appearance.eyeColor} eyes, bright ${appearance.eyeColor} colored eyes, striking ${appearance.eyeColor} eye color, `;
    }

    // Outfit style with detailed descriptions
    switch (appearance.style) {
        case 'casual':
            prompt += 'wearing cute casual modern clothes, fashionable t-shirt, pleated skirt, relaxed pose, modern street fashion, trendy outfit, ';
            break;
        case 'elegant':
            prompt += 'wearing beautiful elegant long dress, flowing fancy dress, graceful pose, high fashion, luxury fashion, detailed dress, ';
            break;
        case 'sporty':
            prompt += 'wearing sporty athletic outfit, fitted sports wear, athletic pose, modern activewear, sports fashion, ';
            break;
        case 'gothic':
            prompt += 'wearing detailed gothic lolita dress, black frilly dress, intricate lace patterns, dramatic pose, gothic fashion, detailed frills, ';
            break;
        case 'uniform':
            prompt += 'wearing traditional japanese school uniform, detailed seifuku, pleated skirt, white blouse with ribbon, school girl style, ';
            break;
        case 'kimono':
            prompt += 'wearing beautiful traditional japanese kimono, detailed floral pattern, ornate obi sash, elegant pose, traditional japanese style, ';
            break;
        case 'maid':
            prompt += 'wearing cute french maid outfit, detailed black and white maid dress, frilly apron, maid headband, cute maid costume, ';
            break;
    }

    // Common positive traits
    prompt += 'full body portrait, perfect face, beautiful detailed eyes, ';
    prompt += 'looking at viewer, soft lighting, detailed face, high quality anime art style, ';
    prompt += 'professional anime artwork, anime style, high detail illustration';

    return prompt;
}

// Display generated image
function displayGeneratedImage(base64Image) {
    console.log('Displaying generated image...');
    const waifuImage = document.getElementById('waifuImage');
    waifuImage.innerHTML = `<img src="data:image/png;base64,${base64Image}" alt="Generated Girlfriend">`;

    const profileImage = document.querySelector('.profile-image');
    profileImage.style.backgroundImage = `url(data:image/png;base64,${base64Image})`;
    profileImage.style.backgroundSize = 'cover';
    profileImage.style.backgroundPosition = 'center';
}

// Send message to chatbot
function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const message = messageInput.value.trim();

    if (message && window.handleSendMessage) {
        window.handleSendMessage(message);
        messageInput.value = '';
    }
}

// Update chatbot personality
function updateChatbotPersonality() {
    const personalityType = currentCompanion.personality.type;
    const interests = currentCompanion.interests;

    let traits, responseStyle, speechPatterns;

    switch (personalityType) {
        case 'dandere':
            traits = ['shy', 'sweet', 'caring', 'gentle'];
            responseStyle = 'soft-spoken and gentle, often using hesitant language';
            speechPatterns = ['speaks quietly', 'uses polite language', 'sometimes stutters'];
            break;
        case 'tsundere':
            traits = ['prideful', 'caring underneath', 'competitive', 'honest'];
            responseStyle = 'initially harsh but gradually showing care';
            speechPatterns = ['uses tough language', 'occasional harsh remarks', 'rare moments of sweetness'];
            break;
        case 'kuudere':
            traits = ['calm', 'intelligent', 'composed', 'logical'];
            responseStyle = 'cool and collected, speaking with precision';
            speechPatterns = ['speaks formally', 'uses precise language', 'maintains composure'];
            break;
        case 'deredere':
            traits = ['cheerful', 'energetic', 'optimistic', 'friendly'];
            responseStyle = 'enthusiastic and bubbly';
            speechPatterns = ['uses excited language', 'lots of emoticons', 'energetic expressions'];
            break;
        case 'yandere':
            traits = ['obsessive', 'devoted', 'protective', 'intense'];
            responseStyle = 'intensely affectionate and possessive';
            speechPatterns = ['uses possessive language', 'sweet but intense', 'shows deep devotion'];
            break;
        case 'himedere':
            traits = ['elegant', 'refined', 'proud', 'sophisticated'];
            responseStyle = 'princess-like and refined';
            speechPatterns = ['uses refined language', 'speaks with authority', 'elegant expressions'];
            break;
    }

    if (window.botPersonality) {
        window.botPersonality = {
            name: currentCompanion.name || 'Your Girlfriend',
            traits: traits,
            responseStyle: responseStyle,
            interests: interests,
            background: `An AI girlfriend with a ${personalityType} personality`,
            speechPatterns: speechPatterns
        };
    }
}

// Initialize chat
function initializeChat() {
    if (window.initializeChat) {
        window.initializeChat();
    }
}
