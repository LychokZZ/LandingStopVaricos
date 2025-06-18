function getUserIP() {
    return "0.0.0.0";
}

async function handleSubmit(event) {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const errorDiv = document.getElementById('errorMsg');
    errorDiv.textContent = '';

    const phoneRegex = /^\+?[\d\s\-]{10,15}$/;

    if (name.length < 2) {
        errorDiv.textContent = 'Ім’я повинно містити мінімум 2 символи.';
        return false;
    }

    if (!phoneRegex.test(phone)) {
        errorDiv.textContent = 'Введіть коректний номер телефону.';
        return false;
    }

    const data = {
        key_hash: 'demo_api_key_123456',
        name,
        phone,
        address: '',

        ip: getUserIP(),

        subid: document.querySelector('input[name="subid"]').value,
        subid1: document.querySelector('input[name="subid1"]').value,
        subid2: document.querySelector('input[name="subid2"]').value,
        subid3: document.querySelector('input[name="subid3"]').value,
        subid4: document.querySelector('input[name="subid4"]').value,
        subid5: document.querySelector('input[name="subid5"]').value,
    };

    try {
        const response = await fetch('https://your-api-endpoint.com/endpoint', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(data)
        });

        if (response.ok) {
            alert("Замовлення успішно надіслано!");
        } else {
            alert("Помилка при надсиланні замовлення.");
        }
    } catch (error) {
        console.error(error);
        alert("Помилка з'єднання з сервером.");
    }

    return false;
}
