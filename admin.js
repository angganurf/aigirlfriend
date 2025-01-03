// Load existing settings into inputs
fetch('settings.json')
    .then(response => response.json())
    .then(data => {
        document.getElementById('mainTitle').value = data.mainTitle;
        document.getElementById('caText').value = data.caText;
        document.getElementById('backgroundColor').value = data.backgroundColor;
        document.getElementById('twitterText').value = data.twitterText;
        document.getElementById('backgroundGradient').value = data.backgroundGradient;
        document.getElementById('blur').value = data.blur;
        document.getElementById('backgroundButton').value = data.backgroundButton;
    })
    .catch(error => console.log('Error loading settings:', error));

// Save settings to JSON
document.getElementById('saveSettings').addEventListener('click', () => {
    const settings = {
        mainTitle: document.getElementById('mainTitle').value,
        caText: document.getElementById('caText').value,
        backgroundColor: document.getElementById('backgroundColor').value,
        twitterText: document.getElementById('twitterText').value,
        backgroundGradient: document.getElementById('backgroundGradient').value,
        blur: document.getElementById('blur').value,
        backgroundButton: document.getElementById('backgroundButton').value,
    };

    fetch('save_settings.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(settings),
    })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.log('Error saving settings:', error));
});
