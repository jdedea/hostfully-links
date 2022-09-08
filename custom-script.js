const sendMsg = document.getElementById('custom-send-msg');

sendMsg.addEventListener('click', function (e) {
    e.preventDefault()
    const nameField = document.getElementById('custom-input-name')
    const emailField = document.getElementById('custom-input-email')
    const messageField = document.getElementById('custom-input-message')


    const fd = new FormData();
    fd.append('name', nameField.value)
    fd.append('email', emailField.value)
    fd.append('message', messageField.value)

    fetch('https://invata.io/tmp_hostfully/handle_email.php', {
        method: "POST",
        body: fd
    })
    document.getElementById('message-success').classList.remove('hidden')
    sendMsg.disabled = true;
})