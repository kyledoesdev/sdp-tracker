<script>
    // Injected early in the layout to prevent the dark mode flashbang
    function wantsDarkMode() {
        let stored =  JSON.parse(window.localStorage.getItem('darkMode'));

        return stored !== null ? stored
            : window.matchMedia('(prefers-color-scheme: dark)').matches
    }

    if (wantsDarkMode()) {
        document.documentElement.classList.add('dark')
    }

    document.addEventListener('livewire:navigated', () => {
        Alpine.store('darkMode').apply()
    })

    document.addEventListener('alpine:init', () => {
        Alpine.store('darkMode', {
            on: false,
            toggle() {
                this.on = !this.on
                this.apply()
            },
            init() {
                this.on = wantsDarkMode()

                let media = window.matchMedia('(prefers-color-scheme: dark)')

                media.addEventListener('change', () => {
                    this.on = media.matches
                })
            },
            apply() {
                window.localStorage.setItem('darkMode',
                    JSON.stringify(this.on)
                )
                this.on ? document.documentElement.classList.add('dark')
                    : document.documentElement.classList.remove('dark')
            }
        })
    })
</script>