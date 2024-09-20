const main_init = function () {
    const ibg = document.querySelectorAll('.ibg')
    const header = document.querySelector('.header')
    const heroSwiper = document.querySelector('.hero-swiper')
    const menuIcons = document.querySelectorAll('.menu-icons')
    const toolbar = document.querySelector('.toolbar')
    const productsToolbar = document.querySelector('.products-toolbar')
    const productsList = document.querySelector('.products-list')
    const itemView = document.querySelector('.item-view')
    const itemCounts = document.querySelectorAll('.item-about__count')
    const itemFeature = document.querySelector('.item-feature')
    const blogSidebar = document.querySelector('.blog-sidebar')

    if (ibg.length > 0) {
        for (let i = 0; i < ibg.length; i++) {
            if (ibg[i].querySelector('img')) {
                ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')'
            }
        }
    }

    if (header) {
        const headerScroll = () => {
            (scrollY > 80) ?
                header.classList.add('_scroll-active') :
                header.classList.remove('_scroll-active')
        }
        document.addEventListener('scroll', headerScroll)
        headerScroll()
    }

    if (heroSwiper) {
        const scrollbar = heroSwiper.querySelector('.swiper-scrollbar')
        new Swiper(heroSwiper, {
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            speed: 500,

            scrollbar: {
                el: scrollbar,
                draggable: true,
            },
        })
    }

    if (menuIcons.length > 0 && toolbar) {
        const toolbarSections = toolbar.querySelectorAll('.toolbar-section')
        const openToolbar = (e) => {
            e.preventDefault()

            if (!toolbar.classList.contains('_active')) {
                toolbar.classList.add('_active')
                document.body.classList.add('_lock')
            }

            if (toolbarSections.length > 0) {
                const selector = e.target.getAttribute('href')
                for (const section of toolbarSections) {
                    section.classList.remove('_active')

                    const sectionSelector = section.dataset.id
                    if (sectionSelector === selector) {
                        section.classList.add('_active')
                    }
                }
            }
        }
        const menuItems = []
        for (const menu of menuIcons) {
            menuItems.push(...menu.querySelectorAll('a'))
        }
        for (const item of menuItems) {
            item.addEventListener('click', openToolbar)
        }

        const closeButtonToolbar = (e) => {
            e.preventDefault()

            if (toolbar.classList.contains('_active')) {
                toolbar.classList.remove('_active')
                document.body.classList.remove('_lock')
            }
        }
        const close = toolbar.querySelector('.toolbar-close')
        close.addEventListener('click', closeButtonToolbar)

        const closeWrapperToolbar = (e) => {
            if (e.target.closest('.toolbar-inner'))
                return

            if (toolbar.classList.contains('_active')) {
                toolbar.classList.remove('_active')
                document.body.classList.remove('_lock')
            }
        }
        toolbar.addEventListener('click', closeWrapperToolbar)
    }

    if (productsToolbar) {
        const openToolbar = (e) => {
            e.preventDefault()

            if (!productsToolbar.classList.contains('_active')) {
                productsToolbar.classList.add('_active')
                document.body.classList.add('_lock')
            }
        }
        const filterButton = document.querySelector('.products-tools__filter button')
        filterButton.addEventListener('click', openToolbar)

        const closeButtonToolbar = (e) => {
            e.preventDefault()

            if (productsToolbar.classList.contains('_active')) {
                productsToolbar.classList.remove('_active')
                document.body.classList.remove('_lock')
            }
        }
        const close = productsToolbar.querySelector('.products-toolbar__close')
        close.addEventListener('click', closeButtonToolbar)

        const closeWrapperToolbar = (e) => {
            if (e.target.closest('.products-toolbar__inner'))
                return

            if (productsToolbar.classList.contains('_active')) {
                productsToolbar.classList.remove('_active')
                document.body.classList.remove('_lock')
            }
        }
        productsToolbar.addEventListener('click', closeWrapperToolbar)
    }

    if (productsList) {
        const grid = localStorage.getItem('productsList_grid')
        if (grid) {
            productsList.classList.add(grid)
        }
        const buttons = document.querySelectorAll('.products-tools__grid button')
        const toggleGrid = (e) => {
            if (e.target.classList.contains('grid')) {
                if (productsList.classList.contains('_list')) {
                    productsList.classList.remove('_list')
                    localStorage.removeItem('productsList_grid')
                }
            } else {
                if (!productsList.classList.contains('_list')) {
                    productsList.classList.add('_list')
                    localStorage.setItem('productsList_grid', '_list')
                }
            }
        }

        for (const button of buttons) {
            button.addEventListener('click', toggleGrid)
        }
    }

    if (itemView) {
        const items = itemView.querySelectorAll('.item-view__item')
        const wrapper = itemView.querySelector('.item-view__image-wrapper')
        const image = itemView.querySelector('.item-view__image')
        const img = image.querySelector('img')

        itemView.classList.add('_active')

        const changeImage = (e) => {
            image.querySelector('img')
                .setAttribute(
                    'src',
                    e.target.querySelector('img')
                        .getAttribute('src')
                )
            for (const item of items) {
                if (item !== e.target && item.classList.contains('_active')) {
                    item.classList.remove('_active')
                }
            }
            if (!e.target.classList.contains('_active')) {
                e.target.classList.add('_active')
            }
        }
        for (const item of items) {
            item.addEventListener('mouseover', changeImage)
        }

        let scale = 2
        const isMobile = () => {
            return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ||
                (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) ||
                ('ontouchstart' in document.documentElement && navigator.userAgent.match(/Mobi/)) ?
                true : false
        }
        const imageScale = (e) => {
            const rect = wrapper.getBoundingClientRect()
            const x = e.clientX - rect.left
            const y = e.clientY - rect.top
            const perLeft = ((100 - 100 / scale) * x) / rect.width
            const perTop = ((100 - 100 / scale) * y) / rect.height
            const pxLeft = (rect.width * scale * perLeft) / 100
            const pxTop = (rect.height * scale * perTop) / 100

            wrapper.style.maxHeight = `${rect.height}px`
            image.style.width = `${rect.width * scale}px`
            image.style.left = `-${pxLeft}px`
            image.style.top = `-${pxTop}px`

            if (img.getBoundingClientRect().width >= img.getBoundingClientRect().height) img.style.width = '100%';
            else img.style.height = '100%';
        }
        if (!isMobile()) {
            wrapper.addEventListener('mouseover', () => {
                wrapper.addEventListener('mousemove', imageScale)
                image.classList.add('_scale')
            })
            wrapper.addEventListener('mouseout', () => {
                wrapper.removeEventListener('mouseover', imageScale)
                image.classList.remove('_scale')
                image.setAttribute('style', '')
                img.setAttribute('style', '')
                wrapper.setAttribute('style', '')
            })
            wrapper.addEventListener('wheel', (e) => {
                e.preventDefault()

                if (e.deltaY > 0) {
                    if (scale <= 1.2) scale = 1.2;
                    scale -= 0.2;
                } else {
                    if (scale >= 5) scale = 5;
                    scale += 0.2;
                }
                imageScale(e)
            })
        }
    }

    if (itemCounts.length > 0) {
        const counter = (e, out) => {
            const button = e.target
            const event = new Event('input', { 'bubbles': true })

            if (button.classList.contains('decr')) {
                if (out.min && out.value <= out.min || out.value <= 0) {
                    out.value = out.min ? out.min : 0
                    return
                }
                out.value--
            } else if (button.classList.contains('incr')) {
                if (out.max && out.value >= out.max) {
                    out.value = out.max
                    return
                }
                out.value++
            }

            out.dispatchEvent(event)
        }
        for (const count of itemCounts) {
            const buttons = count.querySelectorAll('.count-button')
            const out = count.querySelector('.item-count .out')

            for (const button of buttons) {
                button.addEventListener('click', (e) => counter(e, out))
            }
        }
    }

    if (itemFeature) {
        const links = itemFeature.querySelectorAll('.item-feature__link a')
        const sections = itemFeature.querySelectorAll('.item-feature__section')

        const changeSection = (e) => {
            e.preventDefault()

            const target = e.target
            const targetParent = target.closest('.item-feature__link')
            const selector = target.getAttribute('href').replace('#', '')
            let targetSection

            for (const link of links) {
                linkParent = link.closest('.item-feature__link')
                if (linkParent.classList.contains('_active')) linkParent.classList.remove('_active')
            }
            targetParent.classList.add('_active')

            for (const section of sections) {
                if (section.id.includes(selector)) targetSection = section
                if (section.classList.contains('_active')) section.classList.remove('_active')
            }
            targetSection.classList.add('_active')
        }
        for (const link of links) {
            link.addEventListener('click', changeSection)
        }

        links[0].closest('.item-feature__link').classList.add('_active')
        sections[0].classList.add('_active')
    }

    if (blogSidebar) {
        const sidebar = new StickySidebar(blogSidebar, {
            sidebarInner: '.sidebar-inner',
        })
    }
}()