// Function to store canvas data in the URL
function savePage() {
    var canvas = document.getElementById('myCanvas');
    var dataURL = canvas.toDataURL(); // Get the base64 encoded image data
    var url = window.location.href.split('?')[0]; // Get the current URL without query parameters
    history.replaceState(null, '', url + '?canvasData=' + encodeURIComponent(dataURL)); // Update the URL
    console.log('Canvas data stored in URL');
}

// Function to retrieve canvas data from the URL
function retrieveCanvasData() {
    var params = new URLSearchParams(window.location.search);
    var canvasData = params.get('canvasData');
    if (canvasData) {
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var img = new Image();
        img.onload = function() {
            context.drawImage(img, 0, 0);
        };
        img.onerror = function() {
            console.error('Error loading canvas data from URL');
        };
        img.src = canvasData;
        console.log('Canvas data retrieved from URL');
    }
}

// Call the retrieveCanvasData function when the page loads
window.onload = function() {
    retrieveCanvasData(); // Call your existing function
    // Add any additional code you have here
};

// Call savePage function when you want to save canvas data
// For example, you might call this function when a button is clicked
document.getElementById('saveButton').addEventListener('click', savePage);
