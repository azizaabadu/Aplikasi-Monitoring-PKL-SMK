document.addEventListener('submit', (event) => {
    const form = event.target;

    if (!(form instanceof HTMLFormElement) || !form.hasAttribute('data-disable-on-submit')) {
        return;
    }

    const submitButton = event.submitter ?? form.querySelector('button[type="submit"]');

    if (!(submitButton instanceof HTMLButtonElement)) {
        return;
    }

    submitButton.disabled = true;
    submitButton.setAttribute('aria-disabled', 'true');
    submitButton.classList.add('cursor-wait', 'opacity-70');
});

