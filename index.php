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
    <div class="min-h-screen bg-white">
        <div class="relative w-full h-screen overflow-hidden">
            <img id="backgroundGradient"  alt="City Background" class="absolute inset-0 w-full h-full object-cover" style="filter: blur(3.5px) brightness(0.6) contrast(1.1) grayscale(0.53) saturate(1.1);">
            <div class="relative z-10 h-full">
                <div class="flex justify-center md:justify-end absolute w-full md:w-auto top-4 right-0 md:right-4 gap-4 px-4">
                    <a href="https://pump.fun/coin/3KYMbNBjLzmwnA3cFjaHmv7oiDxXHQZt9h3dqYNcpump" target="_blank" class="text-black hover:text-gray-800 transition-colors">
                        <img src="pump.png" alt="Pump" class="w-6 h-6">
                    </a>
                    <a href="https://x.com/Aimiyabilofi" target="_blank" class="text-white hover:text-gray-800 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
                    </a>
                    <a href="https://t.me/MiyabiLofiBot" target="_blank" class="text-white hover:text-gray-800 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"></path></svg>
                    </a>
                </div>
                <div class="flex flex-col items-center pt-20 md:pt-8">
                    <div class="text-center mb-4">
                    <button id="copyCA" class="ca-btn glow-button">
                        CA:  <span id="caText"></span>
                        <div class="tooltip">Click to copy</div>
                    </button>
                    </div>
                    <p class="text-xl md:text-2xl font-poppins text-white md:mt-3">Create Your Own Girlfriend With</p>
                    <div class="md:hidden text-center mt-4 mb-2"><p class="text-xl font-bold font-poppins text-black">彼女</p></div>
                    <div class="text-center mt-2">
                        <h1 class="text-[20vw] md:text-[18vw] lg:text-[20vw] font-bold font-poppins text-white leading-none tracking-wider" id="mainTitle"> </h1>
                    </div>
                </div>
                <p class="hidden md:block absolute top-8 left-12 text-2xl font-bold font-poppins text-white">彼女</p>
                <div class="absolute right-1/2 transform translate-x-1/2 bottom-0 h-[70%] md:h-[85%] w-[700px] m-auto">
                    <img src="character1.png" alt="Anime Character" class="h-full w-full object-contain object-bottom">
                </div>
                <div class="absolute bottom-0 left-0 right-0 px-4" >
                    <div class="max-w-3xl mx-auto">
                        <div class="rounded-full p-2">
                            <div class="flex items-center">
                                <span class="hidden sm:inline pl-6 pr-4 text-lg font-medium text-black whitespace-nowrap"> Describe your Music </span>                                    
                                <button type="submit" class="btn-open mx-auto px-4 px-9 sm:px-12 py-3 sm:py-4 bg-yellow-400 rounded-full text-black border-none font-bold text-base sm:text-lg hover:opacity-90 transition-opacity disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);">
                                    <span>Create</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto bg-center">
                <section class="modal hidden overflow-auto">
                <div class="flex">
                    <img src="https://avatars.githubusercontent.com/u/62628408?s=96&v=4" width="50px" height="50px" alt="user" />
                    <button class="btn-close">⨉</button>
                </div>
                <div>

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

            <input type="email" id="email" placeholder="brendaneich@js.com" />
            <button class="btn">Do Something</button>
            </section>
            </div>
            <div class="overlay hidden"></div>
            <!-- <button class="btn btn-open">Open Modal</button> -->
           </div>  
        </div>        
    </div>
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
                document.getElementById('backgroundGradient').src = data.backgroundGradient;
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
        <script>
const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn-open");
const closeModalBtn = document.querySelector(".btn-close");

// close modal function
const closeModal = function () {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

// close the modal when the close button and overlay is clicked
closeModalBtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});

// open modal function
const openModal = function () {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};
// open modal event
openModalBtn.addEventListener("click", openModal);
            </script>
</body>
</html>
