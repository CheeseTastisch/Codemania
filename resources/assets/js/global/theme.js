function updateTheme() {
    if (document.documentElement.dataset.alwaysDark !== undefined || document.documentElement.dataset.alwaysLight !== undefined) return

    document.documentElement.classList.add('change')

    document.documentElement.classList.remove('dark')
    document.documentElement.classList.remove('party')

    if (document.cookie.includes('theme=dark')) document.documentElement.classList.add('dark')
    else if (document.cookie.includes('theme=party')) document.documentElement.classList.add('party')

    if (document.documentElement.classList.contains('party')) {
        document.querySelectorAll('*').forEach(element => {
            for (let i = 1; i <= 5; i++) element.style.setProperty(`--random-${i}`, Math.random().toString())
        })
    }

    setTimeout(() => document.documentElement.classList.remove('change'), 500)
}
function setTheme(to) {
    document.cookie = `theme=${to}; path=/; max-age=31536000; SameSite=Lax`
    updateTheme(true)
}

window.updateTheme = updateTheme
window.setTheme = setTheme

Livewire.on('setTheme', (to) => setTheme(to));
