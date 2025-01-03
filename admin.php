<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Admin Panel</h1>
        </header>
        <main class="admin-content">
            <div class="input-group">
                <label for="mainTitle">Main Title:</label>
                <input type="text" id="mainTitle" placeholder="Enter main title">
            </div>
            <div class="input-group">
                <label for="caText">CA Text:</label>
                <input type="text" id="caText" placeholder="Enter CA text">
            </div>
            <div class="input-group">
                <label for="twitterText">Twitter Link:</label>
                <input type="text" id="twitterText" placeholder="Enter Twitter Link">
            </div>
            <div class="input-group">
                <label for="backgroundColor">Background Color: <a href="https://rgbacolorpicker.com/" target="_blank" style="color:#707cff;text-decoration:none;">Generate RGBA color</a></label>
                <input type="text" id="backgroundColor" style="width:200px;height:50px;">
            </div>
            <div class="input-group">
                <label for="backgroundColor">Accent Color: </label>
                <input type="color" id="backgroundButton" style="width:200px;height:50px;">
            </div>
            <div class="input-group">
                <label for="blur">Blur:</label>
                <input type="text" id="blur">
            </div>

            <div class="input-group">
                <label for="gradient">Background Gambar: <a href="https://cdn.socionity.uk/" target="_blank" style="color:#707cff;text-decoration:none;">Upload Imange</a></label>
                <input type="text" id="backgroundGradient" placeholder="e.g., linear-gradient(to right, #ff7e5f, #feb47b)">
            </div>

            <!-- <div class="input-group">
                <label for="opacity">Blur:</label>
                <input type="number" id="opacity">
            </div> -->
            
            <button id="saveSettings" class="save-btn">Save</button>
        </main>
    </div>
    <script src="admin.js"></script>
</body>
</html>

