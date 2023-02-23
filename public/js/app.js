function verifyEmail() {
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    let email = document.getElementById('email').value;
    let errorMsg = document.getElementById('error-msg');
    let btnRegister = document.getElementById('btn-register');
     
    fetch('/verify', {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            'X-CSRF-TOKEN': csrfToken
        },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({email: email})
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'UNAVAILABLE') {
            errorMsg.style.display = 'block'
            btnRegister.disabled = true;
        } else {
            errorMsg.style.display = 'none'
            btnRegister.disabled = false;
        }
    })
}

function viewPack(id) {
    let container = document.querySelector('.container');
    container.innerHTML = '';

    let title = document.createElement('h1');
    title.classList.add('mt-5');

    let price = document.createElement('h3');
    price.classList.add('mt-4', 'text-success');

    let description = document.createElement('p');
    description.classList.add('fs-5', 'col-md-8', 'mt-4');

    let btnCreateEvent = document.createElement('div');
    btnCreateEvent.classList.add('mb-5', 'mt-4');

    fetch(`/packs/${id}`)
    .then(res => res.json())
    .then(data => {
        console.log(data);
        title.textContent = data.name;

        price.textContent = `$${data.price}`;

        description.textContent = data.description;

        btnCreateEvent.innerHTML = `<a href="/events/create/${id}" class="btn btn-primary btn-lg px-4">
                                        <i class="bi bi-plus-circle"></i> Crear evento
                                    </a>`;

        container.appendChild(title);
        container.appendChild(price);
        container.appendChild(description);
        container.appendChild(btnCreateEvent);
    })
}
