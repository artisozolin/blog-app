document.addEventListener('DOMContentLoaded', () => {

    const forbiddenPattern = /['";=<>]|--/;

    function validateField(input, config, touched) {

        const value = input.value.trim();
        const errorElement = document.getElementById(config.errorId);
        let errorMessage = "";

        if (config.required && value === "") {
            errorMessage = "This field cannot be empty.";
        }

        else if (forbiddenPattern.test(value)) {
            errorMessage = "Invalid characters detected.";
        }

        else if (config.minLength && value.length < config.minLength) {
            errorMessage = `Minimum ${config.minLength} characters required.`;
        }

        else if (config.maxLength && value.length > config.maxLength) {
            errorMessage = `Maximum ${config.maxLength} characters allowed.`;
        }

        else if (config.type === "date" && value !== "") {
            const selectedDate = new Date(value);
            if (isNaN(selectedDate.getTime())) {
                errorMessage = "Invalid date.";
            }
        }

        else if (config.type === "image" && input.files.length > 0) {

            const file = input.files[0];

            const allowedTypes = ["image/jpeg", "image/png", "image/webp"];

            if (!allowedTypes.includes(file.type)) {
                errorMessage = "Only JPG, PNG, WEBP allowed.";
            }

            if (file.size > 2 * 1024 * 1024) {
                errorMessage = "Image must be under 2MB.";
            }
        }

        const isValid = errorMessage === "";

        if (!isValid && touched[input.id]) {
            input.classList.add('invalid-input');
            errorElement.textContent = errorMessage;
            errorElement.classList.remove('hidden');
        } else {
            input.classList.remove('invalid-input');
            errorElement.classList.add('hidden');
        }

        return isValid;
    }


    function updateSubmitButtonState(isFormValid, submitButton) {

        if (!submitButton) return;

        submitButton.disabled = !isFormValid;

        if (isFormValid) {
            submitButton.classList.remove('bg-gray-400','cursor-not-allowed');
            submitButton.classList.add('bg-blue-600');
        } else {
            submitButton.classList.add('bg-gray-400','cursor-not-allowed');
            submitButton.classList.remove('bg-blue-600');
        }
    }


    function setupFormValidation({formId, fields, submitButtonId}) {

        const form = document.getElementById(formId);
        if (!form) return;

        const submitButton = document.getElementById(submitButtonId);

        const inputs = fields.map(f => document.getElementById(f.id)).filter(Boolean);

        const touched = Object.fromEntries(
            fields.map(f => [f.id, false])
        );

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.classList.add('bg-gray-400','cursor-not-allowed');
        }

        inputs.forEach(input => {

            input.addEventListener('input', () => {

                if (!touched[input.id]) {
                    touched[input.id] = true;
                }

                const isValid = fields
                    .map(field =>
                        validateField(
                            document.getElementById(field.id),
                            field,
                            touched
                        )
                    )
                    .every(Boolean);

                updateSubmitButtonState(isValid, submitButton);

            });

        });


        form.addEventListener('submit', (e) => {

            fields.forEach(field => touched[field.id] = true);

            const isValid = fields
                .map(field =>
                    validateField(
                        document.getElementById(field.id),
                        field,
                        touched
                    )
                )
                .every(Boolean);

            updateSubmitButtonState(isValid, submitButton);

            if (!isValid) e.preventDefault();

        });

    }

    setupFormValidation({
        formId: 'loginForm',
        submitButtonId: 'loginSubmit',
        fields: [
            {
                id: 'loginUsername',
                errorId: 'loginUsernameError',
                required: true,
                minLength: 3,
                maxLength: 50
            },
            {
                id: 'loginPassword',
                errorId: 'loginPasswordError',
                required: true,
                minLength: 4,
                maxLength: 100
            }
        ]
    });

    setupFormValidation({
        formId: 'addPostForm',
        submitButtonId: 'addSubmit',
        fields: [
            {
                id: 'addTitle',
                errorId: 'addTitleError',
                required: true,
                minLength: 5,
                maxLength: 255
            },
            {
                id: 'addContent',
                errorId: 'addContentError',
                required: true,
                minLength: 20
            },
            {
                id: 'authorInput',
                errorId: 'authorError',
                required: true,
                maxLength: 255
            },
            {
                id: 'addImage',
                errorId: 'imageError',
                type: 'image'
            },
            {
                id: 'addDate',
                errorId: 'dateError',
                required: true,
                type: 'date'
            },
            {
                id: 'addStatus',
                errorId: 'addStatusError',
                required: true
            }
        ]
    });

    setupFormValidation({
        formId: 'editPostForm',
        submitButtonId: 'editSubmit',
        fields: [
            {
                id: 'editTitle',
                errorId: 'editTitleError',
                required: true,
                minLength: 5,
                maxLength: 255
            },
            {
                id: 'editContent',
                errorId: 'editContentError',
                required: true,
                minLength: 20
            },
            {
                id: 'editAuthor',
                errorId: 'editAuthorError',
                required: true,
                maxLength: 255
            },
            {
                id: 'editImage',
                errorId: 'editImageError',
                type: 'image'
            },
            {
                id: 'editDate',
                errorId: 'editDateError',
                required: true,
                type: 'date'
            },
            {
                id: 'editStatus',
                errorId: 'editStatusError',
                required: true
            }
        ]
    });

});
