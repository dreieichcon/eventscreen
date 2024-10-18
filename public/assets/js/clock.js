let clock = document.getElementById('clock-time');

setInterval (f => {
    clock.innerHTML = new Date().toLocaleTimeString("de-DE");
}, 1000);

setInterval (f => {
    location.reload()
}, 300000);
