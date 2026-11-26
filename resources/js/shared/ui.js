function showToast(message) {
    let toast = document.getElementById('uiToast');
    let toastText = document.getElementById('uiToastText');

    if (!toast || !toastText) {
        toast = document.createElement('div');
        toast.id = 'uiToast';
        toast.className = 'fixed bottom-4 right-5 z-50 flex items-center gap-2 rounded-xl border border-white/10 bg-slate-900 px-4 py-2.5 text-[11px] font-bold text-white shadow-lg';
        toastText = document.createElement('span');
        toastText.id = 'uiToastText';
        toast.append(toastText);
        document.body.append(toast);
    }

    toastText.textContent = message;
    toast.classList.remove('hidden');
    toast.classList.add('flex');
    clearTimeout(window.toastTimer);
    window.toastTimer = window.setTimeout(() => {
        toast.classList.add('hidden');
        toast.classList.remove('flex');
    }, 3000);
}

function openModal(id) {
    const modal = document.getElementById(id);

    if (!modal) {
        return;
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal(id) {
    const modal = document.getElementById(id);

    if (!modal) {
        return;
    }

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function openInfoModal(title, body) {
    const titleElement = document.getElementById('infoModalTitle');
    const bodyElement = document.getElementById('infoModalBody');

    if (!titleElement || !bodyElement) {
        return;
    }

    titleElement.textContent = title;
    bodyElement.textContent = body;
    openModal('infoModal');
}

function triggerDownload(filename, content, mimeType = 'text/plain;charset=utf-8;') {
    const blob = new Blob([content], { type: mimeType });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');

    link.href = url;
    link.download = filename;
    link.click();
    window.setTimeout(() => URL.revokeObjectURL(url), 1000);
}

function handleGlobalSearch(event) {
    if (event.key !== 'Enter') {
        return;
    }

    const query = event.currentTarget.value.trim().toLocaleLowerCase('id');
    const content = document.querySelector('main');

    if (!content) {
        return;
    }

    const searchableItems = content.querySelectorAll('tbody tr, [data-searchable]');

    searchableItems.forEach((item) => {
        item.classList.toggle('hidden', query !== '' && !item.textContent.toLocaleLowerCase('id').includes(query));
    });
}

Object.assign(window, {
    closeModal,
    handleGlobalSearch,
    openInfoModal,
    openModal,
    showToast,
    triggerDownload,
});
