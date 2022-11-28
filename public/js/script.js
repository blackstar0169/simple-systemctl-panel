var baseURL = '';
var pageLoader = document.getElementById('page-loader');
const startBtn = document.getElementById('start-button');
const stopBtn = document.getElementById('stop-button');
const statusEl = document.getElementById('status');
const loader = document.getElementById('loader');

hide(loader);

startBtn.addEventListener('click', function (e) {
    e.preventDefault();
    var isRestart = false;
    if (startBtn.innerText === 'Restart') {
        isRestart = true;
    }
    start(isRestart);
}, true);
stopBtn.addEventListener('click', function (e) {
    e.preventDefault();
    if (startBtn.innerText === 'Restart') {
        stop();
    }
}, true);

function removePageLoader() {
    if (pageLoader) {
        pageLoader = null;
        loader.parentNode.removeChild(loader);
    }
}

function show(el) {
    el.style.display = '';
}
function hide(el) {
    el.style.display = 'none';
}

function showLoader() {
    show(loader);
    hide(stopBtn);
    hide(startBtn);
}
function hideLoader() {
    hide(loader);
    hide(stopBtn);
    hide(startBtn);
}


function changeStatus(status, enabled) {
    // Disabled
    if (!enabled) {
        // Hide buttons
        statusEl.innerText = 'Disabled';
        // Set status to disabled
        hide(stopBtn);
        hide(startBtn);
    } else if (status === 'active') {
        // Active
        statusEl.innerText = 'Active';
        startBtn.classList.add('txt-error');
        // Set status to active
        startBtn.innerText = 'Restart';
        show(stopBtn);
        show(startBtn);
    } else {
        // Inactive
        statusEl.innerText = status;
        startBtn.innerText = 'Start';
        hide(stopBtn);
        show(startBtn);
    }
}

function requestStatus() {
    $.ajax({
        url: '',
        data: {
            'p': 'ajax',
            'action': 'status'
        },
        method: 'GET',
        success: function (data) {
            removePageLoader();
            changeStatus(data.status, data.enabled);
        }
    })
}

function start(isRestart) {
    showLoader();
    changeStatus(isRestart ? 'Restarting...' : 'Starting...', true);
    $.ajax({
        url: '',
        data: {
            'p': 'ajax',
            'action': isRestart ? 'restart' : 'start'
        },
        method: 'post',
        success: function (data) {
            hideLoader();
            // changeStatus(isRestart ? 'Restarting...' : 'Starting...', true);
        }
    })
}

function stop() {
    showLoader();
    changeStatus('Stopping...', true);
    $.ajax({
        url: '',
        data: {
            'p': 'ajax',
            'action': 'stop'
        },
        method: 'post',
        success: function (data) {
            hideLoader();
            // changeStatus('Stopping...', true);
        }
    })
}

setInterval(requestStatus, 3000);
requestStatus();
