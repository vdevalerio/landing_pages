let messages;

async function initializeSetter() {
    fetch('../../config.json')
        .then(response => response.json())
        .then(data => {
            contactUsData = data.contactUs.form.fields;

            messages = {
                'nameRequired': contactUsData.name.messages.required,
                'emailRequired': contactUsData.email.messages.required,
                'emailTypeMismatch': contactUsData.email.messages.typeMismatch,
                'messageRequired': contactUsData.message.messages.required,
            };

            var inputs = document.querySelectorAll('[required]');
            inputs.forEach(function (input) {
                input.addEventListener('invalid', function () {
                    if (input.validity.valueMissing) {
                        if (input.id === 'name') {
                            input.setCustomValidity(messages.nameRequired);
                        } else if (input.id === 'email') {
                            input.setCustomValidity(messages.emailRequired);
                        } else if (input.id === 'message') {
                            input.setCustomValidity(messages.messageRequired);
                        }
                    } else if (input.validity.typeMismatch) {
                        if (input.id === 'email') {
                            input.setCustomValidity(messages.emailTypeMismatch);
                        }
                    } else {
                        input.setCustomValidity('');
                    }
                });
            });
        });
}

initializeSetter();