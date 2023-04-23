function updateTheme() {
    if (document.documentElement.dataset.alwaysDark !== undefined || document.documentElement.dataset.alwaysLight !== undefined) return

    document.documentElement.classList.add('change')

    if (document.cookie.includes('theme=dark')) document.documentElement.classList.add('dark')
    else if (document.cookie.includes('theme=light')) document.documentElement.classList.remove('dark')
    else document.documentElement.classList.remove('dark')

    setTimeout(() => document.documentElement.classList.remove('change'), 500)
}
function setTheme(to) {
    document.cookie = `theme=${to}; path=/; max-age=31536000; SameSite=Lax`
    updateTheme(true)
}

window.updateTheme = updateTheme
window.setTheme = setTheme

Livewire.on('setTheme', (to) => setTheme(to));
