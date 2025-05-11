// assets/device.js

function generateDeviceID() {
    const data = [
        navigator.userAgent,
        screen.width + "x" + screen.height,
        navigator.language,
        navigator.platform,
        new Date().getTimezoneOffset()
    ].join('||');

    return btoa(unescape(encodeURIComponent(data))).substr(0, 32);
}

function saveDeviceID() {
    const deviceID = generateDeviceID();

    fetch('save_device.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'device_id=' + encodeURIComponent(deviceID)
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}
