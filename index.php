<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Girlfriend Creator</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="top-buttons">
        <a href="#" target="_blank" class="twitter-btn glow-button" id="twitterText">
            <svg viewBox="0 0 24 24" width="24" height="24">
                <path fill="currentColor" d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
            </svg>
            Twitter
        </a>
        <button id="copyCA" class="ca-btn glow-button">
            CA:  <span id="caText"></span>
            <div class="tooltip">Click to copy</div>
        </button>
    </div>

    <div class="app-container">
        <header class="main-header">
            <div class="header-content">
                <div class="sparkle">✧</div>
                <h1 id="mainTitle"></h1>
                <div class="sparkle">✧</div>
            </div>
            <div class="header-glow"></div>
        </header>

        <div class="main-content">
            <div class="left-panel" >
                <div class="preview-section" id="bgcolor">
                        <div id="waifuImage">
                            <div class="placeholder-image">✧ Your girlfriend will appear here ✧</div>
                        </div>
                    <button id="generateWaifu" class="generate-btn glow-button">✧ Generate Girlfriend ✧</button>
                </div>

                <div class="chat-section" id="bgcolorc">
                    <div class="chat-header">
                        <div class="profile-image"></div>
                        <div class="profile-info">
                            <h3 id="companionNameDisplay">Your Girlfriend</h3>
                            <span class="status">✧ Online ✧</span>
                        </div>
                    </div>
                    <div id="chatMessages"></div>
                    <div class="chat-input">
                        <input type="text" id="messageInput" placeholder="Send a message...">
                        <button id="sendMessage" class="glow-button">
                            <svg viewBox="0 0 24 24"><path fill="currentColor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="right-panel" id="bgcolors">
                <div class="customization-grid">
                    <div class="customization-section">
                        <h2><span class="icon">♡</span> Basic Info</h2>
                        <div class="input-group">
                            <label>Name</label>
                            <input type="text" id="companionName" placeholder="Enter her name...">
                        </div>
                        <div class="input-group">
                            <label>Age</label>
                            <select id="age">
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                            </select>
                        </div>
                    </div>

                    <div class="customization-section">
                        <h2><span class="icon">✧</span> Appearance</h2>
                        <div class="input-group">
                            <label>Hair Style</label>
                            <select id="hairStyle">
                                <option value="long">Long</option>
                                <option value="medium">Medium</option>
                                <option value="short">Short</option>
                                <option value="twintails">Twin Tails</option>
                                <option value="ponytail">Ponytail</option>
                                <option value="braided">Braided</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Hair Color</label>
                            <select id="hairColor">
                                <option value="black">Black</option>
                                <option value="brown">Brown</option>
                                <option value="blonde">Blonde</option>
                                <option value="pink">Pink</option>
                                <option value="blue">Blue</option>
                                <option value="purple">Purple</option>
                                <option value="silver">Silver</option>
                                <option value="red">Red</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Eye Color</label>
                            <select id="eyeColor">
                                <option value="blue">Blue</option>
                                <option value="green">Green</option>
                                <option value="brown">Brown</option>
                                <option value="amber">Amber</option>
                                <option value="purple">Purple</option>
                                <option value="red">Red</option>
                                <option value="heterochromia">Heterochromia</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Style</label>
                            <select id="style">
                                <option value="casual">Casual</option>
                                <option value="elegant">Elegant</option>
                                <option value="sporty">Sporty</option>
                                <option value="gothic">Gothic Lolita</option>
                                <option value="uniform">School Uniform</option>
                                <option value="kimono">Kimono</option>
                                <option value="maid">Maid Outfit</option>
                            </select>
                        </div>
                    </div>

                    <div class="customization-section">
                        <h2><span class="icon">♪</span> Personality & Features</h2>
                        <div class="input-group">
                            <label>Personality Type</label>
                            <select id="personalityType">
                                <option value="dandere">Dandere (Shy & Sweet)</option>
                                <option value="tsundere">Tsundere (Hot & Cold)</option>
                                <option value="kuudere">Kuudere (Cool & Calm)</option>
                                <option value="deredere">Deredere (Cheerful)</option>
                                <option value="yandere">Yandere (Devoted)</option>
                                <option value="himedere">Himedere (Princess)</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Additional Features</label>
                            <div class="checkbox-grid features-checkboxes">
                                <label><input type="checkbox" value="glasses"> Glasses</label>
                                <label><input type="checkbox" value="hairAccessories"> Hair Accessories</label>
                                <label><input type="checkbox" value="catEars"> Cat Ears</label>
                                <label><input type="checkbox" value="jewelry"> Jewelry</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Interests</label>
                            <div class="checkbox-grid interests-checkboxes">
                                <label><input type="checkbox" value="anime"> Anime</label>
                                <label><input type="checkbox" value="gaming"> Gaming</label>
                                <label><input type="checkbox" value="cooking"> Cooking</label>
                                <label><input type="checkbox" value="music"> Music</label>
                                <label><input type="checkbox" value="art"> Art</label>
                                <label><input type="checkbox" value="reading"> Reading</label>
                                <label><input type="checkbox" value="sports"> Sports</label>
                                <label><input type="checkbox" value="technology"> Tech</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts.js"></script>
    <script src="chatbot.js"></script>
    <script>
        // Fetch settings.json to apply background
        fetch('settings.json')
            .then(response => response.json())
            .then(data => {
                const body = document.body;

                // // Apply background color or gradient from JSON
                if (data.backgroundGradient) {
                    body.style.background = `url(${data.backgroundGradient}) center/cover fixed no-repeat`;
                }
                document.getElementById('mainTitle').textContent = data.mainTitle;
                document.getElementById('caText').textContent = data.caText;                
                document.getElementById('twitterText').href = data.twitterText;
                // document.getElementById('placeholderText').textContent = data.placeholderText;
                // Apply blur and opacity if provided
                if (data.backgroundColor) {
                    document.getElementById('bgcolor').style.background = data.backgroundColor;
                    document.getElementById('bgcolorc').style.background = data.backgroundColor;
                    document.getElementById('bgcolors').style.background = data.backgroundColor;

                }
                if (data.blur) {
                    document.getElementById('bgcolor').style.backdropFilter = `blur(${data.blur}px)`;
                    document.getElementById('bgcolors').style.backdropFilter = `blur(${data.blur}px)`;
                }
                // if (data.opacity) {
                //     document.getElementById('bgcolor').style.opacity = data.opacity;
                // }

                if (data.backgroundButton) {
                    document.getElementById('generateWaifu').style.background = data.backgroundButton;
                    document.getElementById('sendMessage').style.background = data.backgroundButton;
                    
                }
                
                var elements = document.getElementsByClassName('icon');
                for (var i = 0; i < elements.length; i++) {
                    elements[i].style.color = data.backgroundButton;
                }
                var elements = document.getElementsByClassName('sparkle');
                for (var i = 0; i < elements.length; i++) {
                    elements[i].style.color = data.backgroundButton;
                }
                
                // Pilih semua elemen select dan input[type="text"]
                const inputs = document.querySelectorAll('select, input[type="text"]');

                // Variabel untuk warna efek
                const accentColor = data.backgroundButton; // Ganti dengan warna yang diinginkan
                const accentGlow = data.backgroundButton; // Warna glow

                inputs.forEach(input => {
                    // Tambahkan efek saat elemen mendapatkan fokus
                    input.addEventListener('focus', () => {
                        input.style.borderColor = accentColor;
                        input.style.outline = 'none';
                        input.style.boxShadow = `0 0 10px ${accentGlow}`;
                    });

                    // Hapus efek saat elemen kehilangan fokus
                    input.addEventListener('blur', () => {
                        input.style.borderColor = '';
                        input.style.boxShadow = '';
                    });
                });

                // Pilih elemen dengan kelas 'preview-section'
                    const previewSection = document.querySelectorAll('.preview-section, .chat-section, .right-panel, .customization-section, input[type="text"], select');

                    // Warna yang digunakan untuk shadow dan border
                    const shadowColor = data.backgroundButton; // Sesuaikan warna shadow
                    const borderColor = data.backgroundButton; // Sesuaikan warna border

                    // Terapkan shadow dan border menggunakan JavaScript
                    // previewSection.style.boxShadow = `0 8px 32px ${shadowColor}`;
                    previewSection.forEach(previewSections => {
                        // element.style.boxShadow = `0 8px 32px ${shadowColor}`;
                        previewSections.style.border = `1px solid ${borderColor}`;
                    });


                    // Pilih elemen dengan kelas 'preview-section'
                    const chatHeader = document.querySelector('.chat-header');

                    // Warna yang digunakan untuk shadow dan border                    
                    const borderBottom = data.backgroundButton; // Sesuaikan warna border

                    // Terapkan shadow dan border menggunakan JavaScript
                    // chatHeader.style.boxShadow = `0 8px 32px ${shadowColor}`;
                    chatHeader.style.borderBottom = `1px solid ${borderBottom}`;


                    // Pilih elemen dengan kelas 'preview-section'
                    const chatInput = document.querySelector('.chat-input');

                    // Warna yang digunakan untuk shadow dan border                    
                    const borderTop = data.backgroundButton; // Sesuaikan warna border

                    // Terapkan shadow dan border menggunakan JavaScript
                    // chatHeader.style.boxShadow = `0 8px 32px ${shadowColor}`;
                    chatInput.style.borderTop = `1px solid ${borderTop}`;
            })
            .catch(error => console.error('Error fetching settings:', error));
            
        </script>
</body>
</html>
