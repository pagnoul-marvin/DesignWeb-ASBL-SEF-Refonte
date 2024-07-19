import {settings} from "./settings.js";

const sef = {
    sliderGap: 0,
    pourcentage: 0,
    minPourcentage: 0,
    maxPourcentage: 0,

    init() {
        this.noJs();
        this.initSliderElements();
        this.addEventListeners();
        //this.disappearDivElements();
    },

    addEventListeners() {
        window.addEventListener('scroll', () => {
            this.changeWidthOfProgressBarElement();
        });

        settings.buttonElements.forEach(button => {
            button.addEventListener('click', (e) => {
                this.sliderAnimation(e);
            });
        });
    },

    noJs() {
        settings.noJsBannerElement.classList.add(settings.noDisplayClass);
    },

    changeWidthOfProgressBarElement() {
        const winScroll = document.documentElement.scrollTop;
        const documentHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / documentHeight) * settings.multiplicationScrolled;
        settings.progressBarElement.style.width = `${scrolled}%`;
    },

    initSliderElements() {
        if (settings.sliderElement) {
            this.sliderGap = parseInt(window.getComputedStyle(settings.sliderElement).getPropertyValue('gap'));
            this.maxPourcentage = settings.sliderElement.scrollWidth - settings.sliderElement.clientWidth;
        }
    },

    sliderAnimation(e) {
        if (e.currentTarget.id === settings.beforeID) {

            if (this.pourcentage <= this.minPourcentage) {
                this.pourcentage = this.maxPourcentage + (settings.sliderLiElement.offsetWidth + this.sliderGap);
            }

            this.pourcentage -= settings.sliderLiElement.offsetWidth + this.sliderGap;

        } else if (e.currentTarget.id === settings.afterID) {

            if (this.pourcentage >= this.maxPourcentage) {
                this.pourcentage = this.minPourcentage - (settings.sliderLiElement.offsetWidth + this.sliderGap);
            }

            this.pourcentage += settings.sliderLiElement.offsetWidth + this.sliderGap;

        }

        settings.sliderElement.scrollTo({
            left: this.pourcentage,
            behavior: 'smooth',
        });
    },

    /*disappearDivElements() {
        setTimeout(function () {

            if (settings.validateDivElement) {
                settings.validateDivElement.classList.add('disappear');
            }
            if (settings.notValidateDivElement) {
                settings.notValidateDivElement.classList.add('disappear');
            }
        }, settings.timeBeforeDivElementsDisappear);
    },
     */
}

sef.init();