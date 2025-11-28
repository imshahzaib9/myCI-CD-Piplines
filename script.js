function testAPI() {
    const responseElement = document.getElementById('api-response');
    responseElement.textContent = 'Loading...';
    
    fetch('api.php')
        .then(response => response.json())
        .then(data => {
            responseElement.textContent = JSON.stringify(data, null, 2);
        })
        .catch(error => {
            responseElement.textContent = 'Error: ' + error.message;
        });
}